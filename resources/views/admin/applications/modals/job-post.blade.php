<div class="modal fade" id="jobPostModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Job Post') }}</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="" placeholder="Search" v-model="job_posts.search">
                    <div class="input-group-append">
                        <button
                            type="button"
                            class="btn btn-facebook"
                            @click="fetchData('job_posts', null, job_posts.search)"
                        >
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div v-for="(job_post) in job_posts.data" class="d-flex border p-2">
                    <div class="flex-grow-1 overflow-auto mr-3">
                        @{{ job_post.job_name_en }}
                    </div>
                    <a
                        href="#"
                        data-dismiss="modal"
                        @click.prevent="
                            @if(isset($willEditInline))
                            editInline('job_post_id', job_post.id, job_post.job_name_en)
                            @else
                            setToInput('jobPost', job_post.id, job_post.job_name_en)
                            @endif
                        "
                    >
                        {{ __('Select') }}
                    </a>
                </div>
                <div v-if="job_posts.total == 0" class="text-center">
                    {{ __('No results found.') }}
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <nav v-if="job_posts.lastPage > 1" class="mt-3">
                    <ul class="pagination justify-content-center">
                        <li v-if="job_posts.currentPage == job_posts.startPage">
                            <div class="page-item disabled">
                                <a class="page-link border-0 shadow-none" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="fas fa-angle-left"></i>
                                </a>
                            </div>
                        </li>
                        <li v-else>
                            <div class="page-item">
                                <a class="page-link border-0 shadow-none" href="#" @click.prevent="fetchData('job_posts', job_posts.prevPageUrl)">
                                    <i class="fas fa-angle-left"></i>
                                </a>
                            </div>
                        </li>
                        <li v-for="page in job_posts.links">
                            <div v-if="page.label >= 1">
                                <div v-if="page.active" class="page-item active">
                                    <span class="page-link">@{{ page.label }}</span>
                                </div>
                                <div v-else class="page-item">
                                    <a class="page-link" href="#" @click.prevent="fetchData('job_posts', page.url)">@{{ page.label }}</a>
                                </div>
                            </div>
                        </li>
                        <li v-if="job_posts.currentPage == job_posts.lastPage">
                            <div class="page-item disabled">
                                <a class="page-link border-0 shadow-none" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                        <li v-else>
                            <div class="page-item">
                                <a class="page-link border-0 shadow-none" href="#" @click.prevent="fetchData('job_posts', job_posts.nextPageUrl)">
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
