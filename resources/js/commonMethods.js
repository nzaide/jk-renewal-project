
import Vue from 'vue';

window.Vue = Vue;

Vue.mixin({
  data() {
    return {
      confirmSubmitButton: '',
      confirmCancelMessage: '',
      confirmCancelButton: '',
      completionMessage: '',
      completionRedirectLink: '',
      modalsOpen: 0,
    };
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
    closeModal(modal) {
      // closes modal
      document.getElementById(modal).style.display = 'none';

      // decrease modal open count
      this.modalsOpen -= 1;

      this.enableBodyScroll();
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
    enableBodyScroll() {
      // enables body scroll if no modals are open
      if (this.modalsOpen < 1) {
        const offsetY = Math.abs(parseInt(document.body.style.top, 10));
        document.body.classList.remove('modal-open');
        document.body.style.top = 'initial';
        if (offsetY) {
          window.scrollTo(0, offsetY);
        }
        document.documentElement.style.scrollBehavior = 'smooth';
      }
    },
    scrollToTop(
      containerId = null,
      isModal = false,
      modalContentClass = '.modal__content'
    ) {
      if (containerId) {
        if (isModal) {
          document
            .getElementById(containerId)
            .querySelector(modalContentClass)
            .scrollTo(0, 0);
        } else {
          document.getElementById(containerId).scrollTo(0, 0);
        }
      } else {
        window.scrollTo(0, 0);
      }
    },
  },
});
