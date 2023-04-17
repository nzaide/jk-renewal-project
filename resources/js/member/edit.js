new Vue({
  el: '#app',
  data() {
    return {
      currentYear: new Date().getFullYear() - 15,
      lastYear: new Date().getFullYear() - 45,
      selectionDay: 31,
      errors: {
        gender: '',
        date_of_birth: '',
        residence_prefecture: '',
        current_salary: '',
      },
      isLoading: false,
      isSuccess: false,
      isEditCompletedModal: false,
      isShowFlashMessage: false,
      input: {
        gender: '',
        DOByear: '',
        DOBmonth: '',
        DOBday: '',
        residence_prefecture: '',
        current_salary: '',
      },
    }
  },
  mounted() {
    this.getData()
  },
  methods: {
    range: function (start, end) {
      return Array(end - start + 1).fill().map((_, idx) => start + idx);
    },
    updateDateSelection() {
      if (this.input.DOByear !== 0 && this.input.DOBmonth !== 0) {
        this.selectionDay = new Date(this.input.DOByear, this.input.DOBmonth, 0).getDate();
        if (this.input.DOBday > this.selectionDay) {
          this.input.DOBday = '';
        }
      }
    },
    changeLoadingDisplay(show = false) {
      this.isLoading = show;
    },
    getData() {
      axios.get('/members/get_user_data', ).then(response => {
        let data = response.data;

        //date of birth manipulation
        let bdayStr = data.user.date_of_birth;
        let convertedBday = new Date(bdayStr);

        this.input.gender = data.user.gender;
        this.input.residence_prefecture = data.user.residence_prefecture;
        this.input.current_salary = data.user.current_salary;
        this.input.DOByear = convertedBday.getFullYear();
        this.input.DOBmonth = convertedBday.getMonth() + 1;
        this.input.DOBday = convertedBday.getDate();
      });
    },
    async submitEdit() {
      const formData = this.prepareDataForEdit()
      axios.put('/members/profile/update', formData).then(response => {
        this.isSuccess = true;
        window.location.href = '/members/profile/edit';
      }).catch(error => {
        this.errors = error.response.data.errors;
      })
    },
    prepareDataForEdit() {
      this.changeLoadingDisplay(true);
      this.errors = null;
      this.isSuccess = false;
      this.isEditCompletedModal = true;
      this.input.date_of_birth = this.input.DOByear + '-' + this.input.DOBmonth + '-' + this.input.DOBday;
      const formData = this.input;

      return formData
    },
  },
})