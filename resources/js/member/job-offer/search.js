new Vue({
  el: '#app',
  data: {
    region: 1,
    temp_prefectures: [],
    occupation: 1,
    temp_occupations: [],
    domain: 1,
    temp_domains: [],
  },
  methods: {
    openModal(modal, isScrollToTop = false) {
      // opens modal
      document.getElementById(modal).style.display = 'flex';

      if (isScrollToTop) {
        // scroll to top of modal
        document.querySelector('#' + modal + ' .modal__content').scrollTop = 0;
      }

      // count how many modals are open
      this.modalsOpen += 1;
    },
    closeAllModals() {
      const modals = document.querySelectorAll('.modal');
      if (modals) {
        modals.forEach((modal) => {
          modal.style.display = 'none';
        });
      }

      this.modalsOpen = 0;
      this.enableBodyScroll();
    },
    selectRegion(id) {
      this.region = id;
      const elements = this.$el.querySelectorAll('.prefecture');
      for(let i = 0 ; i < elements.length; i++){
        elements[i].classList.add('hidden');
      }
      this.$refs[`region${id}`].classList.remove('hidden');
      const regions = this.$el.querySelectorAll('.modal__item.regions');
      for(let i = 0 ; i < regions.length; i++){
        regions[i].classList.remove('modal__item--active');
      }
      this.$refs[`main${id}`].classList.add('modal__item--active');
      if (this.$refs[`mobile_prefectures${id}`].dataset.label) {
        this.$refs.dropdown_prefecture.checked = false;
        this.$refs.current_selected.innerHTML = this.$refs[`mobile_prefectures${id}`].dataset.label;
      }
    },
    setPrefectures() {
      this.$refs.prefectures.value = this.temp_prefectures.join(',');
      this.$refs.prefecture_modal.style.display = 'none';
    },
    selectOccupation(id) {
      this.occupation = id;
      const elements = this.$el.querySelectorAll('.occupation');
      for(let i = 0 ; i < elements.length; i++){
        elements[i].classList.add('hidden');
      }
      this.$refs[`occupation${id}`].classList.remove('hidden');
      const occupations = this.$el.querySelectorAll('.modal__item.occupations');
      for(let i = 0 ; i < occupations.length; i++){
        occupations[i].classList.remove('modal__item--active');
      }
      this.$refs[`main_oc${id}`].classList.add('modal__item--active');
      if (this.$refs[`mobile_occupations${id}`].dataset.label) {
        this.$refs.dropdown_occupation.checked = false;
        this.$refs.current_occupation.innerHTML = this.$refs[`mobile_occupations${id}`].dataset.label;
      }
    },
    setOccupations() {
      this.$refs.occupations.value = this.temp_occupations.join(',');
      this.$refs.occupation_modal.style.display = 'none';
    },
    selectDomain(id) {
      this.domain = id;
      const elements = this.$el.querySelectorAll('.domain');
      for(let i = 0 ; i < elements.length; i++){
        elements[i].classList.add('hidden');
      }
      this.$refs[`domain${id}`].classList.remove('hidden');
      const domains = this.$el.querySelectorAll('.modal__item.domains');
      for(let i = 0 ; i < domains.length; i++){
        domains[i].classList.remove('modal__item--active');
      }
      this.$refs[`main_dm${id}`].classList.add('modal__item--active');
      if (this.$refs[`mobile_domains${id}`].dataset.label) {
        this.$refs.dropdown_occupation.checked = false;
        this.$refs.current_domain.innerHTML = this.$refs[`mobile_domains${id}`].dataset.label;
      }
    },
    setDomains() {
      this.$refs.domains.value = this.temp_domains.join(',');
      this.$refs.domain_modal.style.display = 'none';
    }
  },
  mounted() {
    const url = window.location.href;
    if (url.includes('?')) {
      const el = this.$refs.job_offer_list;
      if (el) {
        el.scrollIntoView({ behavior: "smooth" });
      }
    }
    if (this.$refs.prefectures.value != '') {
      this.temp_prefectures = this.$refs.prefectures.value.split(',');
    }
    if (this.$refs.occupations.value != '') {
      this.temp_occupations = this.$refs.occupations.value.split(',');
    }
    if (this.$refs.domains.value != '') {
      this.temp_domains = this.$refs.domains.value.split(',');
    }
  },
});