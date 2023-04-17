new Vue({
    el: "#app",
    data() {
        return {
            evaluations:{
                data:[],
                pagination:null,
                currentPage:null,
                lastPage:null,
                total : null
            },
            count:{
                funny:null,
                sympathy:null
            },
            sort:'updated_at',
            baseURL:window.location.origin
        }
    },
    watch: {
        sort : function (newSort){
            this.fetchData(undefined,newSort)
        }
    },
    created() {
        this.fetchData(undefined,'updated_at')
    },
    methods: {
        activeStat(link){
            switch (true){
                case link.url == null : return 'pagination__item pagination__item--disabled'
                case link.active : return 'pagination__item pagination__item--active'
                default : return 'pagination__item'
            }
        },
        changePage(url){
            if(url!= null){
                this.fetchData(url)
            }
            window.scrollTo(0, this.$refs.dataList.offsetTop);
        },
        async react(loggedInId,evalUser,index,type){
            if(loggedInId == evalUser)
                return false;

            const response = await fetch(this.baseURL+'/api/evaluations/react/'+this.evaluations.data[index].id+'/'+type);
            if (response.status == '200'){
                const data = await response.json();
                if(type == 'sympathy'){
                    this.evaluations.data[index].sympathy_users_count = data
                }else if(type == 'funny'){
                    this.evaluations.data[index].funny_users_count = data
                }
                this.$refs[type+'-'+index][0].classList.toggle('active');
            }
        },
        async fetchData(url = "/api/evaluations/",filter_by){
            if(filter_by != undefined){
                url = this.baseURL+url+filter_by
            }
            let response = await (await fetch(url)).json()
            this.evaluations.data = response.data
            this.evaluations.pagination = response.links
            this.evaluations.currentPage = response.current_page
            this.evaluations.lastPage = response.last_page
            this.evaluations.total = response.total;
            this.$refs.dataList.style.display = 'block';
        }
    }
});
