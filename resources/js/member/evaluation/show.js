new Vue({
    el: "#app",
    data(){
        return{
            baseURL: window.location.origin,
        }
    },
    methods: {
        async followCompany(companyId) {
            await axios.post('/companies/companies/' + companyId + '/follow')
                .then(response => {
                    if (response.status == 200) {
                        window.location.reload();
                    }
                })
        },
        async react(event,evalId, type) {
            const response = await fetch(this.baseURL + '/api/evaluations/react/' + evalId + '/' + type);
            if (response.status == '200') {
                const data = await response.json();
                this.$refs[type].textContent = data;
                this.$refs[type].parentElement.classList.toggle('active');
            }
        },
    }
});