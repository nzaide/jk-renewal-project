new Vue({
    el: "#app",
    data() {
        return {
            admins: {
                data: [],
                currentPage: 1,
                lastPage: null,
                defaultUrl: '/api/admin/admins',
                total: 0,
            },
            job_posts: {
                data: [],
                currentPage: 1,
                lastPage: null,
                defaultUrl: '/api/admin/job-posts',
                total: 0,
                search: '',
            },
            job_seekers: {
                data: [],
                currentPage: 1,
                lastPage: null,
                defaultUrl: '/api/admin/job-seekers',
                total: 0,
                search: '',
            },
            targetApplicationId: null,
        }
    },
    mounted() {
        let topScrollbar = document.getElementById('topScrollbar');
        let table = document.getElementById('table');
        topScrollbar.onscroll = function() {
            table.scrollLeft = topScrollbar.scrollLeft;
        };
        table.onscroll = function() {
            topScrollbar.scrollLeft = table.scrollLeft;
        };
        flatpickr('.flatpickr');
        $('[data-toggle="tooltip"]').tooltip();

        // Show confirmation modal on status change
        $('.status-selector').on('change', function() {
            let statusSelector = $(this);
            let applicationId = statusSelector.attr('data-id');
            let currentStatus = statusSelector.attr('current-status');
            let formSelector = $('.update-application-status-form' + applicationId);
            let modalSelector = $('#update-application-status-modal' + applicationId);

            formSelector.find('#application_status').val(statusSelector.val());
            modalSelector.modal('show');
        });

        $('.modal').on('hidden.bs.modal', function () {
            const statusSelectSelector = 'select[data-id="' + this.dataset.id + '"]';
            let statusSelect = $(statusSelectSelector);
            statusSelect.val(statusSelect.attr('current-status'));
        });

        $('.msg-close-btn').on('click', function () {
            $(this.dataset.target).addClass('d-none');
        });

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('value');
        let submitBtns = document.getElementsByClassName('submit-btn');
        for (let submitBtn of submitBtns) {
            submitBtn.addEventListener('click', function (e) {
                document.getElementById('successMsg').classList.add('d-none');
                document.getElementById('errorMsg').classList.add('d-none');
                const form = this.form;
                const status = form.querySelector('#application_status');
                let body = {};
                body[status.name] = status.value;

                fetch(form.action, {
                    method: 'PATCH',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: JSON.stringify(body),
                })
                    .then((response) => response.json())
                    .then((rb) => {
                        if (rb.errors) {
                            document.getElementById('errorMsg').classList.remove('d-none');
                        } else {
                            document.getElementById('successMsg').classList.remove('d-none');

                            const statusSelectSelector = 'select[data-id="' + form.dataset.id + '"]';
                            let statusSelect = document.querySelector(statusSelectSelector);
                            statusSelect.setAttribute('current-status', status.value);
                            statusSelect.className = '';
                            statusSelect.classList.add(...statusCommonClasses);
                            statusSelect.classList.add(...statusSpecificClasses[status.value]);
                        }
                    });
            });
        }

        // For smaller screens
        if (document.body.clientWidth != document.body.scrollWidth) {
            $('#header-main').addClass('w-110');
        }
    },
    methods: {
        setToInput(
            type,
            id,
            name,
            nationality = null,
            language = null,
            fluency = null,
            currentSalary = null,
            expectedSalary = null
        ) {
            const idInputId = type + 'Id';
            const nameInputId = type + 'Name';
            document.getElementById(idInputId).value = id;
            document.getElementById(nameInputId).value = name;
            if (type == 'jobSeeker') {
                let languageFluency = null;
                if (language) {
                    languageFluency = language;
                    if (fluency) {
                        let fluencyText;
                        switch (language) {
                            case 'Japanese':
                                fluencyText = fluencies['japanese'][fluency];
                                break;
                            case 'Korean':
                                fluencyText = fluencies['korean'][fluency];
                                break;
                            case 'Mandarin':
                                fluencyText = fluencies['mandarin'][fluency];
                                break;
                            default:
                                fluencyText = fluencies['other'][fluency];
                                break;
                        }
                        languageFluency += ': ' + fluencyText;
                    }
                }
                document.getElementById('nationality').value = nationality;
                document.getElementById('languageFluency').value = languageFluency;
                document.getElementById('currentSalary').value = currentSalary;
                document.getElementById('expectedSalary').value = expectedSalary;
            }
        },
        showInput(id, name, event) {
            const inputId = name + id;
            document.getElementById(inputId).classList.remove('d-none');
            document.getElementById(inputId).value = event.target.dataset.text;
            document.getElementById(inputId).focus();
            let newEvent = new MouseEvent('click', {
                bubbles: true
            });
            document.getElementById(inputId).dispatchEvent(newEvent);
            event.target.classList.add('d-none');
            this.targetApplicationId = id;
        },
        hideInput(id, name, event) {
            const textId = name + 'Text' + id;
            document.getElementById(textId).classList.remove('d-none');
            event.target.classList.add('d-none');
        },
        async fetchData(type, url=null, search='') {
            if (!url) {
                url = this[type].defaultUrl + '?search=' + search;
            }
            this[type].data = [];
            this[type].search = search;
            const response = await (await fetch(url)).json();
            response.data.forEach((data) => {
                this[type].data.push(data);
            });
            this[type].currentPage = response.current_page;
            this[type].startPage = response.from;
            this[type].lastPage = response.last_page;
            this[type].prevPageUrl = response.prev_page_url;
            this[type].nextPageUrl = response.next_page_url;
            this[type].links = response.links;
            this[type].total = response.total;
        },
        async editInline(
            name,
            value = null,
            text = null,
            id = null,
            nationality = null,
            language = null,
            fluency = null,
            currentSalary = null,
            expectedSalary = null
        ) {
            if (!id) {
                id = this.targetApplicationId;
            }

            const elementId = name + id;
            if (!value) {
                value = document.getElementById(elementId).value;
            }
            if (!text) {
                text = value;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('value');
            document.getElementById('successMsg').classList.add('d-none');
            document.getElementById('errorMsg').classList.add('d-none');
            let body = {};
            body[name] = value;

            const url = '/admin/applications/' + id;
            fetch(url, {
                method: 'PUT',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify(body),
            })
                .then((response) => response.json())
                .then((rb) => {
                    const textElementId = name + 'Text' + id;
                    const tooltipElementId = name + 'Tooltip' + id;
                    if (rb.errors) {
                        document.getElementById('errorMsg').classList.remove('d-none');
                    } else {
                        document.getElementById('successMsg').classList.remove('d-none');

                        document.getElementById(textElementId).dataset.text = text;
                        if (document.getElementById(tooltipElementId)) {
                            document.getElementById(tooltipElementId).dataset.originalTitle = text;
                            if (text.length < 15) {
                                document.getElementById(tooltipElementId).dataset.originalTitle = '';
                            }
                        }

                        if (text.length > 15) {
                            text = text.substring(0, 15) + '&hellip;';
                        }
                        document.getElementById(textElementId).innerHTML = text;

                        if (name == 'job_seeker_id') {
                            let languageFluency = null;
                            if (language) {
                                languageFluency = language;
                                if (fluency) {
                                    let fluencyText;
                                    switch (language) {
                                        case 'Japanese':
                                            fluencyText = fluencies['japanese'][fluency];
                                            break;
                                        case 'Korean':
                                            fluencyText = fluencies['korean'][fluency];
                                            break;
                                        case 'Mandarin':
                                            fluencyText = fluencies['mandarin'][fluency];
                                            break;
                                        default:
                                            fluencyText = fluencies['other'][fluency];
                                            break;
                                    }
                                    languageFluency += ': ' + fluencyText;
                                }
                            }

                            const languageFluencyId = 'languageFluency' + id;
                            if (languageFluency && languageFluency.length > 15) {
                                languageFluency = languageFluency.substring(0, 15) + '&hellip;';
                            }
                            document.getElementById(languageFluencyId).innerHTML = languageFluency || '-----';

                            const nationalityId = 'nationality' + id;
                            if (nationality && nationality.length > 15) {
                                nationality = nationality.substring(0, 15) + '&hellip;';
                            }
                            document.getElementById(nationalityId).innerHTML = nationality || '-----';

                            const currentSalaryId = 'currentSalary' + id;
                            document.getElementById(currentSalaryId).innerHTML = currentSalary || '-----';

                            const expectedSalaryId = 'expectedSalary' + id;
                            document.getElementById(expectedSalaryId).innerHTML = expectedSalary || '-----';
                        }
                    }
                    document.getElementById(elementId).classList.add('d-none');
                    document.getElementById(textElementId).classList.remove('d-none');
                });
        },
    }
});
