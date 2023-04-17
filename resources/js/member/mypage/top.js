new Vue({
    el: "#app",
    data() {
        return {
            recentJobOffers:{
                data:[],
                currentPage:1,
                lastPage: null,
                nextPage: 'api/recent-job-offers',
                viewMore: false
            },
            recentEvaluations:{
                data:[],
                currentPage:1,
                lastPage: null,
                nextPage: 'api/recent-evaluations',
                viewMore:false
            },
            hotEvaluations:{
                data:[],
                currentPage:1,
                lastPage: null,
                nextPage: 'api/recent-hot-evaluations',
                viewMore:false
            },
            hotCompanies:{
                data:[],
                currentPage:1,
                lastPage: null,
                nextPage: 'api/hot-companies',
                viewMore:false
            }
        }
    },
    created() {
        this.fetchData('recentJobOffers')
        this.fetchData('recentEvaluations')
        this.fetchData('hotEvaluations')
        this.fetchData('hotCompanies')
    },
    methods: {
        loadMore(type){
            this.fetchData(type)
        },
        async fetchData(type){
            const response = await (await fetch(this[type].nextPage)).json()
            response.data.forEach((data)=>{
                this[type].data.push(data)
            })
            this[type].currentPage = response.current_page
            this[type].lastPage = response.last_page
            this[type].nextPage = response.next_page_url

            this.$refs[type].style.display = 'block';

            if (this[type].lastPage != this[type].currentPage ){
                this[type].viewMore = true
            }else {
                this[type].viewMore = false
            }
        }
    }
});
