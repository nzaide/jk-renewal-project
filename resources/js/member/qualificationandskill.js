new Vue({
  el: "#app",
  data() {
    return {
      name: '',
      detail: '',
      skill_name: '',
      skill_details: '',
      id: '',
      skill_id: '',
      isElementVisible: true,
      skillValue: ''
    }
  },
  methods: {

    async select(id) {
      await fetch(`/api/skill/` + id)
        .then((res) => res.json())
        .then((res) => {
          this.skill_name = res.skill_name,
            this.skill_details = res.skill_details,
            this.id = res.id
        });
    },

    clear: function (event) {
      this.skill_name = '';
      this.skill_details = '';
      this.id = '';
    },

    async deleteSkill(id) {
      await fetch(`/api/skill/` + id)
        .then((res) => res.json())
        .then((res) => {
          this.skill_id = id;
          this.skillValue = res.skill_name;
        });
    },


  },
  created() {
    setTimeout(() => this.isElementVisible = false, 3000);
  },
  mounted() {
  }
});
