new Vue({
  el: "#app",
  data() {
    return {
      show: false  
    }
  },
  methods: {
    showPassword() {
      this.show = !this.show;
      if (this.show) {
        this.$refs.password.type = 'text';
      } else {
        this.$refs.password.type = 'password';
      }
    }
  }
});