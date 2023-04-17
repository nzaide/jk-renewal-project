new Vue({
    el: "#app",
    data() {
        return {
            language: null,
            job_posts: {
                data: [],
                currentPage: 1,
                lastPage: null,
                defaultUrl: '/admin/job-posts/search',
                total: 0,
                search: '',
            },
        }
    },
    methods: {
        setLanguage(language) {
            this.language = language;
        },
        async fetchData(type, url=null, search='') {
            if (!url) {
                url = this[type].defaultUrl + '?language=' + this.language + '&search=' + search;
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

            // Add tooltip
            Vue.nextTick(function () {
                $('.tooltip-selector').popover({
                    animate: true,
                }).on("mouseenter", function() {
                    var $this = this;
                    $(this).popover("show");
                    $(".popover").on("mouseleave", function() {
                        $($this).popover('hide');
                    });
                }).on("mouseleave", function() {
                    var $this = this;
                    if (!$(".popover:hover").length) {
                        $($this).popover("hide");
                    }
                });
            });
        },
    }
});