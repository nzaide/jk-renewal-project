new Vue({
    el: "#app",
    data() {
        return {
            getAdminAccounts:{
                data: [],
                currentPage: 1,
                lastPage: null,
                defaultUrl: '/api/admin/admins',
                total: 0,
            },
            isElementVisible: true,
            roles: roles,
            search: '',
        }
    },
    created() {
        setTimeout(() => this.isElementVisible = false, 3000);
        this.fetchData('getAdminAccounts');
    },
    methods: {
        changeToActive(event) {
            let roleButtons = document.getElementsByClassName('role-buttons');
            for (let i = 0; i < roleButtons.length; i++) {
                roleButtons[i].classList.remove('bg-light');
            }
            let dropdownItem = event.target;
            dropdownItem.classList.add('bg-light');
            document.getElementById('mainForm').action = dropdownItem.dataset.action;
            document.getElementsByName('_method')[0].value = dropdownItem.dataset.method;
            document.getElementById('role').value = dropdownItem.dataset.role;

            const confirmationModal = document.getElementById('confirmationModal');
            const confirmationMessage = confirmationModal.querySelector('#confirmationMsg');
            const confirmationFormMethod = confirmationModal.querySelector('input[name="_method"]');

            switch (dropdownItem.dataset.method) {
                case 'PUT':
                    confirmationMessage.innerHTML = 'change role to ' + this.roles[dropdownItem.dataset.role];
                    break;
                case 'DELETE':
                    confirmationMessage.innerHTML = 'delete';
                    break;
            }

            confirmationFormMethod.value = dropdownItem.dataset.method;
        },
        setAdminIds() {
            let formData = new FormData(document.getElementById('tableForm'));
            document.getElementById('ids').value = formData.getAll('ids[]');
        },
        selectPage(url) {
            this.fetchData('getAdminAccounts', url);
        },
        async fetchData(type, url=null, search='') {
            if (!url) {
                url = this[type].defaultUrl + '?search=' + search;
            }
            this[type].data = [];
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
    }
});
