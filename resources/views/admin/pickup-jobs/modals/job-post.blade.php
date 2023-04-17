<div class="modal fade" id="jobPostModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header m-0 py-2">
                <h4 class="modal-title text-dark font-18 bold">{{ __('Select Job Post') }}</h4>
                <button class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-header m-0 py-3">
                <div class="input-group m-0">
                    <input type="text" class="form-control form-control-sm" value="" placeholder="Search" v-model="job_posts.search">
                    <div class="input-group-append">
                        <button
                            type="button"
                            class="btn btn-facebook btn-sm"
                            @click="fetchData('job_posts', null, job_posts.search)"
                        >
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover table-responsive">
                    <thead>
                        <tr>
                            <th width="1%">{{ __('ID') }}</th>
                            <th>{{ __('Job Title') }}</th>
                            <th>{{ __('Type of Industry') }}</th>
                            <th width="1%">{{ __('Details') }}</th>
                            <th width="1%">{{ __('Select') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(job_post) in job_posts.data" class="mx-6 px-6">
                            <td class="py-2">@{{ job_post.id }}</td>
                            <td class="py-2">
                                <span class="tooltip-selector" v-if="job_post.job_name_en && job_post.job_name_en.length > 20" data-toggle="popover" :data-content="job_post.job_name_en">
                                    @{{ job_post.job_name_en.substring(0, 20) + '...' }}
                                </span>
                                <span v-else>@{{ job_post.job_name_en ?? '-----' }}</span>
                            </td>
                            <td class="py-2">
                                <span class="tooltip-selector" v-if="job_post.industry_en && job_post.industry_en.length > 20" data-toggle="popover" :data-content="job_post.industry_en">
                                    @{{ job_post.industry_en.substring(0, 20) + '...' }}
                                </span>
                                <span v-else>@{{ job_post.industry_en ?? '-----' }}</span>
                            </td>
                            <td class="py-2">
                                <a :href="`/admin/job-posts/${job_post.id}/edit`">{{ __('Details') }}</a>
                            </td>
                            <td class="py-2">
                            <form action="{{ route('admin.required-languages.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="job_post_id" :value="job_post.id">
                                <input type="hidden" name="language" :value="language">
                                <button type="submit" class="btn btn-link btn-sm text-danger p-0 m-0">
                                    {{ __('Select') }}
                                </button>
                            </td>
                        </tr>
                        <tr v-if="job_posts.total == 0" class="text-center">
                            <td colspan="5">{{ __('No results found.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-center m-0 py-2">
                <nav v-if="job_posts.lastPage > 1">
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
@push('scripts')
@vite('resources/js/admin/pickup-jobs/search.js')
@endpush
