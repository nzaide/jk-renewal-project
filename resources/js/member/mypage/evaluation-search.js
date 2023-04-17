new Vue({
    el: "#app",
    data() {
        return {
            domainModal: {
                data: [],
                childData: [],
                active: 0,
                checked: {
                    ids: [],
                    values: []
                },
                tempChecked: {
                    ids: [],
                    values: []
                }
            },
            prefectureModal: {
                data: [],
                childData: [],
                active: 0,
                checked: {
                    ids: [],
                    values: []
                },
                tempChecked: {
                    ids: [],
                    values: []
                }
            },

            evaluations: {
                data: [],
                pagination: null,
                currentPage: null,
                lastPage: null,
                total: null
            },
            count: {
                funny: null,
                sympathy: null
            },
            loadData: false,
            sort: 'updated_at',

            baseURL: window.location.origin,
        }
    },
    watch: {
        sort: function () {
            this.fetchData()
        }
    },
    created() {
        this.fetchDomains();
        this.fetchRegions();
    },
    methods: {
        async fetchDomains() {
            let url = this.baseURL + '/api/domains';
            const response = await (await fetch(url)).json()
            this.domainModal.data = response;
            this.setActive(this.domainModal.active, 'domainModal');
        },
        async fetchRegions() {
            let url = this.baseURL + '/api/regions';
            const response = await (await fetch(url)).json()
            this.prefectureModal.data = response;
            this.setActive(this.prefectureModal.active, 'prefectureModal');
        },
        setActive(index, modalType) {
            this[modalType].active = index;
            if (modalType == 'domainModal')
                this[modalType].childData = this[modalType].data[index].details;
            else if (modalType == 'prefectureModal')
                this[modalType].childData = this[modalType].data[index].prefectures;
        },
        toggle(event, id, value, modalType) {
            if (event.target.checked) {
                this[modalType].tempChecked.ids.push(id)
                this[modalType].tempChecked.values.push(value)
            } else {
                this[modalType].tempChecked.ids.splice(this[modalType].tempChecked.ids.indexOf(id), 1)
                this[modalType].tempChecked.values.splice(this[modalType].tempChecked.values.indexOf(value), 1)
            }
        },
        checkStatus(id, modalType) {
            return this[modalType].tempChecked.ids.includes(id);
        },
        save(modalType) {
            this[modalType].checked.ids = this[modalType].tempChecked.ids;
            this[modalType].checked.values = this[modalType].tempChecked.values;
            if (modalType == 'domainModal') {
                this.$refs.domainOptions.value = this.domainModal.checked.values.join(',')
                this.$refs.domainModal.style.display = 'none'
            } else if (modalType == 'prefectureModal') {
                this.$refs.prefectureOptions.value = this.prefectureModal.checked.values.join(',')
                this.$refs.prefectureModal.style.display = 'none'
            }
        },
        activeStat(link) {
            switch (true) {
                case link.url == null :
                    return 'pagination__item pagination__item--disabled'
                case link.active :
                    return 'pagination__item pagination__item--active'
                default :
                    return 'pagination__item'
            }
        },
        changePage(url) {
            if (url != null) {
                this.fetchData(url)
            }
            window.scrollTo(0, this.$refs.searchResults.offsetTop);
        },
        async react(loggedInId, evalUser, index, type) {

            if (loggedInId == evalUser)
                return false;

            const response = await fetch(this.baseURL + '/api/evaluations/react/' + this.evaluations.data[index].id + '/' + type);
            if (response.status == '200') {
                const data = await response.json();
                if (type == 'sympathy') {
                    this.evaluations.data[index].sympathy_users_count = data
                } else if (type == 'funny') {
                    this.evaluations.data[index].funny_users_count = data
                }
                this.$refs[type+'-'+index][0].classList.toggle('active');

            }
        },
        async fetchData(url = undefined) {
            const isUrlUndefined = url == undefined
            if (isUrlUndefined) {
                url = this.baseURL + '/api/evaluations/search'
                url = url + '?'
            } else {
                url = url + '&'
            }

            const queryString = 'filter_by=' + this.sort
                + '&domains=' + this.domainModal.checked.ids.join(',')
                + '&prefectures=' + this.prefectureModal.checked.ids.join(',')
                + '&company=' + this.$refs.company.value
            url += queryString
            let response = await (await fetch(url)).json()
            this.evaluations.data = response.data
            this.evaluations.pagination = response.links
            this.evaluations.currentPage = response.current_page
            this.evaluations.lastPage = response.last_page
            this.evaluations.total = response.total;
            this.$refs.searchResults.style = 'block';
        },
    }
});
