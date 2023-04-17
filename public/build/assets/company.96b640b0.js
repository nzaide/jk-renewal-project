new Vue({el:"#app",methods:{async followCompany(o){await axios.post("/companies/companies/"+o+"/follow").then(a=>{a.status==200&&window.location.reload()})}}});
