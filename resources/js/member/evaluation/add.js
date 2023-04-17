new Vue({
    el: '#app',
    data () {
      return {
        targetCompany: null,
        companies: [],
        companiesWithInterviewHistory: [],
        companyId: "",
        targetCompanySelect: false,
        targetCompanyInput: false,
        companyNameFreeInput: null,
        targetCompanySuggestions: false,
        filteredCompanies: [],
        modal: false,
      };
    },
    methods: {
      async searchCompany (val)
      {
        const params = {
            type: 2,
            search: val
        };
        const {
            data: {
                companies
            }
        } = await axios.get('/members/evaluations/companies', {
            params
        });
        this.filteredCompanies = companies;
        console.log(this.filteredCompanies);
        this.modal = true;
      },
      async selected (val)
      {
        this.companyNameFreeInput = val;
        this.modal = false;
      },
      async focusInput (inputRef) {
      },
    },
    watch: {
        async targetCompany (val)
        {
          const params = {
              type: val,
          };
          const {
              data: {
                  companies
              }
          } = await axios.get('/members/evaluations/companies', {
              params
          });
          this.companies = companies;
          if (val == 1) {
            this.targetCompanySelect = true;
            this.targetCompanyInput = false;
            this.modal = false;
          } else if (val == 2) {
            this.targetCompanySelect = false;
            this.targetCompanyInput = true;
          }
        },
    },
    mounted() 
    {
        this.targetCompany = (oldtargetCompany != '')? oldtargetCompany : 1;
        this.companyId  = (
          oldcompanyId != '' && 
          Number.isInteger(parseInt(oldcompanyId))
        )?  oldcompanyId: '';
        this.companyNameFreeInput  = oldCompanyNameFreeInput;
    }
})