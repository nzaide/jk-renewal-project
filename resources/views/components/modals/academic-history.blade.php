<div ref="modal" class="modal">
  <div class="modal__overlay"></div>
  <div class="modal__content modal__content--xs">
    <i class="modal__close block fa-solid fa-xmark" @click="closeAllModals()"></i>
    <div class="modal__header text-center">
      <i class="mb-8 fa-regular fa-circle-xmark modal__xmark"></i>
    </div>
    <p ref="delete_message_container" class="modal__confirmation-message text-center text-grey">
      
    </p>
    <div class="modal__button-wrapper modal__button-wrapper--confirmation">
      <button class="button button--gray mr-3 w-full" type="button" @click="closeAllModals()">
        {{ __('lang.label.no') }}
      </button>
      <button type="submit" form="delete_form" class="button button--red w-full" type="button">
        {{ __('lang.label.yes') }}
      </button>
    </div>
  </div>
</div>