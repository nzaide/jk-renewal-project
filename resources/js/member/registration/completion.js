
new Vue({
  el: "#app",
  data() {
    return {
      currentPage: 1,
      currentYear: new Date().getFullYear() - 15,
      currentYearOnly: new Date().getFullYear(),
      lastYear: new Date().getFullYear() - 49,
      selectionDay: 31,
      input: {
        // 1st page input
        gender: '',
        DOByear: '',
        DOBmonth: '',
        DOBday: '',
        residence: '',
        // 2nd pages input
        salary: '',
        schoolType: '',
        lastSchool: '',
        major: '',
        gradYear: '',
        gradMonth: '',
        //3rd pages input
        companyName: '',
        employementStatus: '',
        cmpGradYearFrom: '',
        cmpGradMonthFrom: '',
        cmpGradYearTo: '',
        cmpGradMonthTo: '',
        occupation: '',
        position: '',
        description: '',
        //4th page input
        jbChangeJob: '',
        bussinessDomain: '',
        desiredOccupation: '',
        desiredResidence: '',
        desiredSalary: '',
        consideration: [],
      },
      // class binding
      progressBar: 'progress__bar',
      progressBarPercentage: 'progress__bar--25',
      isLoading: false,
      errors: []
    }
  },
  mounted() {
    this.updateProgressBar();
  },
  methods: {
    updateProgressBar() {
      this.progressBarPercentage = 'progress__bar--' + (this.currentPage * 25).toString();
    },
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
    async next() {
      if (!this.isLoading) {
        this.errors = [];
        let parameters = this.getParams();
        let url = this.getURL();
        this.isLoading = true;

        // skip page 3 if no expirience
        if (this.currentPage === 3 && !this.input.employementStatus) {
          this.currentPage += 1;
          this.updateProgressBar();
          this.isLoading = false;

          return;
        }

        await axios.post('/members/new/completion/' + url, parameters).then(response => {
          if (response.status = 200) {
            // proceed to next page
            this.currentPage += 1;
            this.updateProgressBar();
            this.isLoading = false;
          }
        })
          .catch((error) => {
            this.errors = error.response.data.errors;
            console.log(this.errors)
            this.isLoading = false;
          })
      }
    },
    previous() {
      this.currentPage -= 1;
      this.updateProgressBar();
    },
    // get formatted parameters base on currentpage
    getParams() {
      let params = {};

      if (this.currentPage === 1) {
        params = {
          gender: this.input.gender,
          dob_year: this.input.DOByear,
          dob_month: this.input.DOBmonth,
          dob_day: this.input.DOBday,
          residence: this.input.residence,
        };
      }
      if (this.currentPage == 2) {
        params = {
          salary: this.input.salary,
          school_type: this.input.schoolType,
          last_school: this.input.lastSchool,
          major: this.input.major,
          grad_year: this.input.gradYear,
          grad_moth: this.input.gradMonth,
        };
      }

      if (this.currentPage == 3) {
        params = {
          company_name: this.input.companyName,
          employment_status: this.input.employementStatus,
          cmp_year_from: this.input.cmpGradYearFrom,
          cmp_month_from: this.input.cmpGradMonthFrom,
          cmp_year_to: this.input.cmpGradYearTo,
          cmp_month_to: this.input.cmpGradMonthTo,
          occupation: this.input.occupation,
          position: this.input.position,
          description: this.input.description,
        };
      }

      if (this.currentPage == 4) {
        params = {
          jb_change_job: this.input.jbChangeJob,
          business_domain: this.input.bussinessDomain,
          desired_occupation: this.input.desiredOccupation,
          desired_residense: this.input.desiredResidence,
          desired_salary: this.input.desiredSalary,
          consideration: this.input.consideration,
        };
      }

      return params;
    },
    getURL() {
      let url = '';
      if (this.currentPage == 1) {
        url = 'form_one'
      }
      if (this.currentPage == 2) {
        url = 'form_two'
      }
      if (this.currentPage == 3) {
        url = 'form_three'
      }
      if (this.currentPage == 4) {
        url = 'form_four'
      }
      return url;
    }
  },
});