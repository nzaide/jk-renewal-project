<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Recruiter') }}</h5>
            </div>
            <div class="modal-body">
                <div v-for="(admin) in admins.data" class="d-flex border p-2">
                    <div class="flex-grow-1 overflow-auto mr-3">
                        @{{ admin.fullname }}
                    </div>
                    <a href="#" data-dismiss="modal" @click.prevent="
                        @if(isset($willEditInline))
                        editInline('admin_id', admin.id, admin.fullname)
                        @else
                        setToInput('admin', admin.id, admin.fullname)
                        @endif
                    ">
                        {{ __('Select') }}
                    </a>
                </div>
                <div v-if="admins.total == 0" class="text-center">
                    {{ __('No results found.') }}
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <nav v-if="admins.lastPage > 1" class="mt-3">
                    <ul class="pagination justify-content-center">
                        <li v-if="admins.currentPage == admins.startPage">
                            <div class="page-item disabled">
                                <a class="page-link border-0 shadow-none" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="fas fa-angle-left"></i>
                                </a>
                            </div>
                        </li>
                        <li v-else>
                            <div class="page-item">
                                <a class="page-link border-0 shadow-none" href="#" @click.prevent="fetchData('admins', admins.prevPageUrl)">
                                    <i class="fas fa-angle-left"></i>
                                </a>
                            </div>
                        </li>
                        <li v-for="page in admins.links">
                            <div v-if="page.label >= 1">
                                <div v-if="page.active" class="page-item active">
                                    <span class="page-link">@{{ page.label }}</span>
                                </div>
                                <div v-else class="page-item">
                                    <a class="page-link" href="#" @click.prevent="fetchData('admins', page.url)">@{{ page.label }}</a>
                                </div>
                            </div>
                        </li>
                        <li v-if="admins.currentPage == admins.lastPage">
                            <div class="page-item disabled">
                                <a class="page-link border-0 shadow-none" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                        <li v-else>
                            <div class="page-item">
                                <a class="page-link border-0 shadow-none" href="#" @click.prevent="fetchData('admins', admins.nextPageUrl)">
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
