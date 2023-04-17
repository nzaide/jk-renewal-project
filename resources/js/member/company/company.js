new Vue({
    el: "#app",
    methods: {
      async followCompany(companyId) {
        await axios.post('/companies/companies/' + companyId + '/follow')
        .then(response => {
          if (response.status == 200) {
            window.location.reload();
          }
        })
      }
    }
});