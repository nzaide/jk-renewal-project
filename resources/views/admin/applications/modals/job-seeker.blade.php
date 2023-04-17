<div class="modal fade" id="jobSeekerModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Applicant') }}</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="" placeholder="Search" v-model="job_seekers.search">
                    <div class="input-group-append">
                        <button
                            type="button"
                            class="btn btn-facebook"
                            @click="fetchData('job_seekers', null, job_seekers.search)"
                        >
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div v-for="(job_seeker) in job_seekers.data" class="d-flex border p-2">
                    <div class="flex-grow-1 overflow-auto mr-3">
                        @{{ job_seeker.fullname }}
                    </div>
                    <a
                        href="#"
                        data-dismiss="modal"
                        @click.prevent="
                            @if(isset($willEditInline))
                            editInline(
                                'job_seeker_id',
                                job_seeker.id,
                                job_seeker.fullname,
                                null,
                                job_seeker.nationality.nationality,
                                job_seeker.language_first ? job_seeker.language_first.language : null,
                                job_seeker.language_first_fluency,
                                job_seeker.current_salary,
                                job_seeker.expected_salary
                            )
                            @else
                            setToInput(
                                'jobSeeker',
                                job_seeker.id,
                                job_seeker.fullname,
                                job_seeker.nationality.nationality,
                                job_seeker.language_first ? job_seeker.language_first.language : null,
                                job_seeker.language_first_fluency,
                                job_seeker.current_salary,
                                job_seeker.expected_salary
                            )
                            @endif
                        "
                    >
                        {{ __('Select') }}
                    </a>
                </div>
                <div v-if="job_seekers.total == 0" class="text-center">
                    {{ __('No results found.') }}
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <nav v-if="job_seekers.lastPage > 1" class="mt-3">
                    <ul class="pagination justify-content-center">
                        <li v-if="job_seekers.currentPage == job_seekers.startPage">
                            <div class="page-item disabled">
                                <a class="page-link border-0 shadow-none" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="fas fa-angle-left"></i>
                                </a>
                            </div>
                        </li>
                        <li v-else>
                            <div class="page-item">
                                <a class="page-link border-0 shadow-none" href="#" @click.prevent="fetchData('job_seekers', job_seekers.prevPageUrl)">
                                    <i class="fas fa-angle-left"></i>
                                </a>
                            </div>
                        </li>
                        <li v-for="page in job_seekers.links">
                            <div v-if="page.label >= 1">
                                <div v-if="page.active" class="page-item active">
                                    <span class="page-link">@{{ page.label }}</span>
                                </div>
                                <div v-else class="page-item">
                                    <a class="page-link" href="#" @click.prevent="fetchData('job_seekers', page.url)">@{{ page.label }}</a>
                                </div>
                            </div>
                        </li>
                        <li v-if="job_seekers.currentPage == job_seekers.lastPage">
                            <div class="page-item disabled">
                                <a class="page-link border-0 shadow-none" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                        <li v-else>
                            <div class="page-item">
                                <a class="page-link border-0 shadow-none" href="#" @click.prevent="fetchData('job_seekers', job_seekers.nextPageUrl)">
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
