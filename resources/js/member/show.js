new Vue({
  el: "#app",
  data() {
    return {
      notificationFlg: ''
    }
  },
  computed: {
    isActive() {
      return this.notificationFlg;
    },
    checkedValue: {
      get() {
        return this.notificationFlg = document.getElementById('toggle_button').checked
      },
      set(newValue) {
        this.notificationFlg = newValue;
        this.updateNotificationFlg(newValue);
      }
    }
  },
  methods: {
    async updateNotificationFlg(value) {
      axios.post('/members/notofication-flg', {'notification_flg' : value}).then(response => {})
    },
  }
});