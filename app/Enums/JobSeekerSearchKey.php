<?php

namespace App\Enums;

enum JobSeekerSearchKey: string
{
    case AgeEnd = 'age_end';
    case AgeStart = 'age_start';
    case BirthDay = 'birth_day';
    case BirthMonth = 'birth_month';
    case ContactNumber = 'contact_number';
    case CreatedAtEnd = 'created_at_end';
    case CreatedAtStart = 'created_at_start';
    case EducationLevel = 'education_level';
    case EmploymentStatus = 'employment_status';
    case EnglishFluency = 'english_fluency';
    case ExcludeBlacklisted = 'exclude_blacklisted';
    case Fullname = 'fullname';
    case Gender = 'gender';
    case HighestDegree = 'highest_degree';
    case IndustryIds = 'industry_ids';
    case Interviewer = 'interviewer';
    case JobFieldIds = 'job_field_ids';
    case JobIds = 'job_ids';
    case JobPosting = 'job_posting';
    case LanguageFluencies = 'language_fluencies';
    case LanguageSecondId = 'language_second_id';
    case LanguageSecondReading = 'language_second_reading';
    case LanguageSecondSpeaking = 'language_second_speaking';
    case LanguageSecondWriting = 'language_second_writing';
    case LicenseIds = 'license_ids';
    case LocationAbroad = 'location_abroad';
    case LocationPhilippines = 'location_philippines';
    case MailAddress = 'mail_address';
    case MaritalStatus = 'marital_status';
    case NationalityId = 'nationality_id';
    case OtherTagIds = 'other_tag_ids';
    case PreferredEmployment = 'preferred_employment';
    case PresentEmployer = 'present_employer';
    case ReactivationDateEnd = 'reactivation_date_end';
    case ReactivationDateStart = 'reactivation_date_start';
    case Request = 'request';
    case UniversityMajor = 'university_major';
    case VisaId = 'visa_id';
}
