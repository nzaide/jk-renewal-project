new Vue({
    el: "#app",
    data() {
        return {
            industries: {
                data: [],
                defaultUrl: '/admin/industries',
                search: '',
                modalTitle: 'Industry',
            },
            job_fields: {
                data: [],
                defaultUrl: '/admin/job-fields',
                search: '',
                modalTitle: 'Field and Job Title',
            },
            jobs: {
                data: [],
                defaultUrl: '/admin/jobs',
                search: '',
                modalTitle: 'Interested Jobs',
            },
            other_tags: {
                data: [],
                defaultUrl: '/admin/other-tags',
                search: '',
                modalTitle: 'Other Tags',
            },
        }
    },
    created() {
        this.fetchData('industries');
        this.fetchData('job_fields');
        this.fetchData('jobs');
        this.fetchData('other_tags');
    },
    methods: {
        setUpsertModal(type, method, id=null, name='', parent=false) {
            let action = this[type].defaultUrl;
            if (id != null) {
                action += '/' + id;
            }
            document.getElementById('upsertForm').action = action;
            document.getElementById('upsertForm').method = method;
            document.getElementById('name').value = name;
            document.getElementById('is_sub').value = parent;
            document.getElementById('parentSelect').hidden = !parent;
            let parentOptions = document.getElementsByClassName('parent-option');
            for (let parentOption of parentOptions) {
                parentOption.hidden = true;
                if (parentOption.dataset.type == type) {
                    parentOption.hidden = false;
                    parentOption.selected = parseInt(parentOption.value) === parent;
                }
            }
            let validationMsgs = document.getElementsByClassName('validation-msg');
            for (let validationMsg of validationMsgs) {
                validationMsg.innerHTML = '';
            }

            let modalTitle = '';
            if (method == 'POST') {
                modalTitle = 'Add ';
            }
            if (method == 'PUT') {
                modalTitle = 'Edit ';
            }
            modalTitle += this[type].modalTitle;
            if (parent) {
                modalTitle += ' - sub category';
            } else {
                modalTitle += ' - main category';
            }
            document.getElementById('upsertModalTitle').innerHTML = modalTitle;
        },
        setDeleteModal(type, id) {
            document.getElementById('deleteForm').action = this[type].defaultUrl + '/' + id;
        },
        async submitForm(formType) {
            // Set the action and method
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('value');
            const formId = formType + 'Form';
            const url = document.getElementById(formId).action;
            const method = document.getElementById(formId).attributes['method'].value;

            // Prepare the body
            let body = {show_collapse: {}};
            let collapses = document.getElementsByClassName('collapse');
            for (let collapse of collapses) {
                if (collapse.classList.contains('show')) {
                    body['show_collapse'][collapse.id] = true;
                }
            }
            let inputs = document.getElementById(formId).getElementsByClassName('input');
            for (let input of inputs) {
                body[input.name] = input.value;
            }

            // Send the request
            const response = await (await fetch(url, {
                method: method,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify(body),
            })).json();
            if (response.errors) {
                let validationMsgs = document.getElementsByClassName('validation-msg');
                for (let validationMsg of validationMsgs) {
                    validationMsg.innerHTML = '';
                    let error = response.errors[validationMsg.dataset.name];
                    if (error) {
                        validationMsg.innerHTML = error[0];
                    }
                }
            } else {
                window.location.reload();
            }
        },
        async fetchData(type, url=null, search='') {
            if (!url) {
                url = '/api' + this[type].defaultUrl + '?search=' + search;
            }
            this[type].data = await (await fetch(url)).json();
        },
    },
});
