new Vue({el:"#app",data(){return{show:!1}},methods:{showPassword(){this.show=!this.show,this.show?this.$refs.password.type="text":this.$refs.password.type="password"}}});
