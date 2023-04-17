new Vue({
  el: '#app',
  data() {
    return {
      id: 0,
      action: '/members/academic-histories',
    }
  },
  methods: {
    getDetails(id) {
      const data = JSON.parse(this.$refs[`rawData${id}`].value);
      this.id = data.id;
      this.$refs.id.value = data.id;
      this.$refs.graduation_school_type.value = data.graduation_school_type.id;
      this.$refs.school_name.value = data.school_name;
      this.$refs.majoring.value = data.majoring;
      this.$refs.graduation_year.value = data.graduation_year;
      this.$refs.graduation_month.value = data.graduation_month;
      this.$refs.method.value = 'PATCH';
      this.$refs.main_form.action = `/members/academic-histories/${data.id}`;
      const el = this.$refs.bottom;
      if (el) {
        el.scrollIntoView({ behavior: "smooth" });
      }
    },
    deleteConfirmation(id) {
      this.id = id;
      const delMsgCnt = this.$refs.delete_message_container;
      const msg = this.$refs[`rawMsg${this.id}`].value;
      delMsgCnt.innerHTML = msg;
      this.$refs.modal.style.display = 'flex';
      this.$refs.modal.scrollTop = 0;
      this.$refs.delete.action = `/members/academic-histories/${id}`;
    },
    cancelDelete(){
      this.$refs.delete.action = '';
      this.$refs.modal.classList.add('hidden');
    },
    clear() {
      this.id = 0;
      this.$refs.id.value = '';
      this.$refs.graduation_school_type.value = '';
      this.$refs.school_name.value = '';
      this.$refs.majoring.value = '';
      this.$refs.graduation_year.value = '';
      this.$refs.graduation_month.value = '';
      this.$refs.method.value = '';
      this.$refs.main_form.action = '/members/academic-histories';
    }
  },
});