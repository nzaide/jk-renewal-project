<?php

namespace App\Http\Requests\Admin;

use App\Enums\{
    EmploymentStatus,
    EmploymentType,
    EnglishFluency,
    Gender,
    GraduateLevel,
    HighestDegree,
    HighschoolLevel,
    JapaneseFluency,
    JobSeekerRequest,
    KoreanFluency,
    LocationType,
    MandarinFluency,
    MaritalStatus,
    OtherFluency,
    UndergraduateLevel,
    UniversityMajor,
    Visa,
};
use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class StoreJobSeekerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $employmentStatuses = array_map(function ($elem) {
            return $elem->value;
        }, EmploymentStatus::cases());
        $employmentTypes = array_map(function ($elem) {
            return $elem->value;
        }, EmploymentType::cases());
        $englishFluencies = array_map(function ($elem) {
            return $elem->value;
        }, EnglishFluency::cases());
        $genders = array_map(function ($elem) {
            return $elem->value;
        }, Gender::cases());
        $highestDegrees = array_map(function ($elem) {
            return $elem->value;
        }, HighestDegree::cases());
        $locationTypes = array_map(function ($elem) {
            return $elem->value;
        }, LocationType::cases());
        $maritalStatuses = array_map(function ($elem) {
            return $elem->value;
        }, MaritalStatus::cases());
        $universityMajors = array_map(function ($elem) {
            return $elem->value;
        }, UniversityMajor::cases());
        $visas = array_map(function ($elem) {
            return $elem->value;
        }, Visa::cases());

        $languages = [];
        $languages['language_first_fluency'] = Language::find($this->input('language_first_id'));
        $languages['language_second_fluency'] = Language::find($this->input('language_second_id'));
        $languages['language_third_fluency'] = Language::find($this->input('language_third_id'));
        $fluencyRule = function ($attribute, $value, $fail) use ($languages) {
            if (!$languages[$attribute]) {
                $fail(__('This is invalid value'));

                return;
            }

            $language = $languages[$attribute]->language;
            switch ($language) {
                case 'Japanese':
                    $fluencies = JapaneseFluency::cases();
                    break;
                case 'Korean':
                    $fluencies = KoreanFluency::cases();
                    break;
                case 'Mandarin':
                    $fluencies = MandarinFluency::cases();
                    break;
                default:
                    $fluencies = OtherFluency::cases();
                    break;
            }
            $fluencies = array_map(function ($elem) {
                return $elem->value;
            }, $fluencies);
            if (!in_array($value, $fluencies)) {
                $fail(__('This is invalid value'));
            }
        };

        $highestDegree = $this->input('highest_degree');
        $educationLevelRule = function ($attribute, $value, $fail) use ($highestDegree) {
            switch ($highestDegree) {
                case HighestDegree::Graduate->value:
                    $levels = GraduateLevel::cases();
                    break;
                case HighestDegree::Undergraduate->value:
                    $levels = UndergraduateLevel::cases();
                    break;
                case HighestDegree::Highschool->value:
                    $levels = HighschoolLevel::cases();
                    break;
                default:
                    $levels = [0];
            }
            $levels = array_map(function ($elem) {
                return isset($elem->value) ? $elem->value : $elem;
            }, $levels);
            if (!in_array($value, $levels)) {
                $fail(__('This is invalid value'));
            }
        };

        return [
            'interview_date' => ['required', 'date'],
            'fullname' => ['required', 'max:255'],
            'english_name' => ['nullable', 'max:255', 'regex:/^[\w\-\s]*$/'],
            'nationality_id' => ['required', 'exists:nationalities,id'],
            'language_first_id' => ['required', 'exists:languages,id'],
            'language_first_fluency' => ['nullable', $fluencyRule],
            'language_second_id' => ['nullable', 'exists:languages,id'],
            'language_second_fluency' => ['nullable', $fluencyRule],
            'language_second_speaking' => ['nullable', 'not_regex:/multiple/', 'numeric', 'between:1,10'],
            'language_second_reading' => ['nullable', 'not_regex:/multiple/', 'numeric', 'between:1,10'],
            'language_second_writing' => ['nullable', 'not_regex:/multiple/', 'numeric', 'between:1,10'],
            'language_third_id' => ['nullable', 'exists:languages,id'],
            'language_third_fluency' => ['nullable', $fluencyRule],
            'language_third_speaking' => ['nullable', 'not_regex:/multiple/', 'numeric', 'between:1,10'],
            'language_third_reading' => ['nullable', 'not_regex:/multiple/', 'numeric', 'between:1,10'],
            'language_third_writing' => ['nullable', 'not_regex:/multiple/', 'numeric', 'between:1,10'],
            'english_fluency' => ['required', Rule::in($englishFluencies)],
            'profile' => ['max:5000'],
            'birth_date' => ['required', 'before_or_equal:today', 'date'],
            'location_philippines' => ['required', 'exists:locations,id'],
            'location_abroad' => ['exists:locations,id'],
            'gender' => ['required', Rule::in($genders)],
            'marital_status' => ['required', Rule::in($maritalStatuses)],
            'job_posting' => ['required', 'max:255'],
            'visa_id' => ['required', Rule::in($visas)],
            'mail_address' => [
                'required',
                'email',
                'max:255',
                Rule::unique('job_seekers', 'mail_address')->where(
                    fn ($query) => $query->whereNull('deleted_at')->whereNotNull('email_verified_at')
                ),
                Rule::unique('job_seeker_requests', 'email')->where(
                    fn ($query) => $query->where('created_at', '>', date('Y-m-d H:i:s', strtotime('-1 day')))
                        ->where('request', JobSeekerRequest::RegisterDetails->value)
                ),
            ],
            'password' => [
                'required',
                'between:8,255',
                'regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
                'confirmed',
            ],
            'contact_number' => ['required', 'max:255'],
            'landline' => ['max:255'],
            'social_media' => ['max:255'],
            'other_contact' => ['required'],
            'highest_degree' => ['required', Rule::in($highestDegrees)],
            'education_level' => ['required', $educationLevelRule],
            'university_major' => ['required', Rule::in($universityMajors)],
            'employment_status' => ['required', Rule::in($employmentStatuses)],
            'present_employer' => ['required', 'max:255'],
            'industry_ids' => ['required', 'exists:industries,id'],
            'job_field_ids' => ['required', 'exists:job_fields,id'],
            'license_ids' => ['required', 'exists:licenses,id'],
            'current_salary' => ['required', 'max:255'],
            'resignation_reason' => ['required', 'max:255'],
            'start_availability' => ['required', 'max:255'],
            'pending_application' => ['required', 'max:255'],
            'interview_availability' => ['required', 'max:255'],
            'preferred_employment' => ['required', Rule::in($employmentTypes)],
            'expected_salary' => ['required', 'max:255'],
            'preferred_shift' => ['required', 'max:255'],
            'job_ids' => ['required', 'exists:jobs,id'],
            'other_tag_ids' => ['required', 'exists:other_tags,id'],
            'request' => ['max:255'],
            'interviewer' => ['required', 'max:255'],
            'reactivation_date' => ['nullable', 'date'],
            'complete_blind_resume' => [
                'file',
                'mimes:gif,docx,png,xls,xlsx,jpg,jpeg,pdf',
                'max:5000',
            ],
            'blind_resume' => [
                'file',
                'mimes:gif,docx,png,xls,xlsx,jpg,jpeg,pdf',
                'max:5000',
            ],
            'original_resume' => [
                'file',
                'mimes:gif,docx,png,xls,xlsx,jpg,jpeg,pdf',
                'max:5000',
            ],
            'shokumu_keirekisho' => [
                'file',
                'mimes:gif,docx,png,xls,xlsx,jpg,jpeg,pdf',
                'max:5000',
            ],
            'rirekisho' => [
                'file',
                'mimes:gif,docx,png,xls,xlsx,jpg,jpeg,pdf',
                'max:5000',
            ],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Seperate langauge inputs into their parts
        if ($this->input('language_first')) {
            $langaugeFirstParts = explode(',', $this->input('language_first'));
            if (count($langaugeFirstParts) > 1) {
                $this->merge([
                    'language_first_id' => $langaugeFirstParts[0],
                    'language_first_fluency' => $langaugeFirstParts[1] == '0' ? null : $langaugeFirstParts[1],
                ]);
            }
        }
        if ($this->input('language_second')) {
            $langaugeSecondParts = explode(',', $this->input('language_second'));
            if (count($langaugeSecondParts) > 1) {
                $this->merge([
                    'language_second_id' => $langaugeSecondParts[0] == '0' ? null : $langaugeSecondParts[0],
                    'language_second_fluency' => $langaugeSecondParts[1] == '0' ? null : $langaugeSecondParts[1],
                ]);
            }
        }
        if ($this->input('language_third')) {
            $langaugeThirdParts = explode(',', $this->input('language_third'));
            if (count($langaugeThirdParts) > 1) {
                $this->merge([
                    'language_third_id' => $langaugeThirdParts[0] == '0' ? null : $langaugeThirdParts[0],
                    'language_third_fluency' => $langaugeThirdParts[1] == '0' ? null : $langaugeThirdParts[1],
                ]);
            }
        }
        // Parse language skills
        if ($this->input('language_second_skills') && is_array($this->input('language_second_skills'))) {
            $languageSecondSkills = Arr::map($this->input('language_second_skills'), function ($value) {
                return explode(',', $value);
            });
            // Do not allow multiple choices for the same skill
            $languageSecondSpeaking = Arr::where($languageSecondSkills, function ($value) {
                return count($value) > 1 && $value[0] == 's';
            });
            if (count($languageSecondSpeaking) > 1) {
                $languageSecondSpeaking = 'multiple';
            } elseif (count($languageSecondSpeaking) < 1) {
                $languageSecondSpeaking = null;
            } else {
                $languageSecondSpeaking = end(array_values($languageSecondSpeaking)[0]);
            }
            $languageSecondReading = Arr::where($languageSecondSkills, function ($value) {
                return count($value) > 1 && $value[0] == 'r';
            });
            if (count($languageSecondReading) > 1) {
                $languageSecondReading = 'multiple';
            } elseif (count($languageSecondReading) < 1) {
                $languageSecondReading = null;
            } else {
                $languageSecondReading = end(array_values($languageSecondReading)[0]);
            }
            $languageSecondWriting = Arr::where($languageSecondSkills, function ($value) {
                return count($value) > 1 && $value[0] == 'w';
            });
            if (count($languageSecondWriting) > 1) {
                $languageSecondWriting = 'multiple';
            } elseif (count($languageSecondWriting) < 1) {
                $languageSecondWriting = null;
            } else {
                $languageSecondWriting = end(array_values($languageSecondWriting)[0]);
            }
            $this->merge([
                'language_second_speaking' => $languageSecondSpeaking,
                'language_second_reading' => $languageSecondReading,
                'language_second_writing' => $languageSecondWriting,
            ]);
        }
        if ($this->input('language_third_skills') && is_array($this->input('language_third_skills'))) {
            $languageThirdSkills = Arr::map($this->input('language_third_skills'), function ($value) {
                return explode(',', $value);
            });
            // Do not allow multiple choices for the same skill
            $languageThirdSpeaking = Arr::where($languageThirdSkills, function ($value) {
                return count($value) > 1 && $value[0] == 's';
            });
            if (count($languageThirdSpeaking) > 1) {
                $languageThirdSpeaking = 'multiple';
            } elseif (count($languageThirdSpeaking) < 1) {
                $languageThirdSpeaking = null;
            } else {
                $languageThirdSpeaking = end(array_values($languageThirdSpeaking)[0]);
            }
            $languageThirdReading = Arr::where($languageThirdSkills, function ($value) {
                return count($value) > 1 && $value[0] == 'r';
            });
            if (count($languageThirdReading) > 1) {
                $languageThirdReading = 'multiple';
            } elseif (count($languageThirdReading) < 1) {
                $languageThirdReading = null;
            } else {
                $languageThirdReading = end(array_values($languageThirdReading)[0]);
            }
            $languageThirdWriting = Arr::where($languageThirdSkills, function ($value) {
                return count($value) > 1 && $value[0] == 'w';
            });
            if (count($languageThirdWriting) > 1) {
                $languageThirdWriting = 'multiple';
            } elseif (count($languageThirdWriting) < 1) {
                $languageThirdWriting = null;
            } else {
                $languageThirdWriting = end(array_values($languageThirdWriting)[0]);
            }
            $this->merge([
                'language_third_speaking' => $languageThirdSpeaking,
                'language_third_reading' => $languageThirdReading,
                'language_third_writing' => $languageThirdWriting,
            ]);
        }

        // Seperate eduaction input into its parts
        if ($this->input('education')) {
            $education = explode(',', $this->input('education'));
            if (count($education) > 1) {
                $this->merge([
                    'highest_degree' => $education[0],
                    'education_level' => $education[1],
                ]);
            }
        }

        // Convert to UploadedFile objects so they can be validated as files
        if ($this->input('complete_blind_resume_base64') && is_string($this->input('complete_blind_resume_base64'))) {
            $this->merge([
                'complete_blind_resume' => $this->fromBase64($this->input('complete_blind_resume_base64')),
            ]);
        }
        if ($this->input('blind_resume_base64') && is_string($this->input('blind_resume_base64'))) {
            $this->merge([
                'blind_resume' => $this->fromBase64($this->input('blind_resume_base64')),
            ]);
        }
        if ($this->input('original_resume_base64') && is_string($this->input('original_resume_base64'))) {
            $this->merge([
                'original_resume' => $this->fromBase64($this->input('original_resume_base64')),
            ]);
        }
        if ($this->input('shokumu_keirekisho_base64') && is_string($this->input('shokumu_keirekisho_base64'))) {
            $this->merge([
                'shokumu_keirekisho' => $this->fromBase64($this->input('shokumu_keirekisho_base64')),
            ]);
        }
        if ($this->input('rirekisho_base64') && is_string($this->input('rirekisho_base64'))) {
            $this->merge([
                'rirekisho' => $this->fromBase64($this->input('rirekisho_base64')),
            ]);
        }
    }

    /**
     * Convert a base64 string to a UploadedFile object.
     *
     * @param string $base64File
     * @return \Illuminate\Http\UploadedFile|void
     */
    protected function fromBase64(string $base64File)
    {
        // Get file data base64 string
        $base64Data = Arr::last(explode(',', $base64File));
        if (!is_string($base64Data)) {
            $base64Data = '';
        }
        $fileData = base64_decode($base64Data);

        // Create temp file and get its absolute path
        $tempFile = tmpfile();
        if ($tempFile) {
            $tempFilePath = stream_get_meta_data($tempFile)['uri'];

            // Save file data in file
            file_put_contents($tempFilePath, $fileData);
            $tempFileObject = new File($tempFilePath);
            $file = new UploadedFile(
                $tempFileObject->getPathname(),
                $tempFileObject->getFilename(),
                $tempFileObject->getMimeType(),
                UPLOAD_ERR_OK,
                true // Mark it as test, since the file isn't from real HTTP POST.
            );

            // Close this file after response is sent.
            // Closing the file will cause to remove it from temp director!
            app()->terminating(function () use ($tempFile) {
                fclose($tempFile);
            });

            return $file;
        }
    }
}
