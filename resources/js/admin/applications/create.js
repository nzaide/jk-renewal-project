
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
        }
    },
    mounted() {
        flatpickr('.flatpickr');
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
    }
});
