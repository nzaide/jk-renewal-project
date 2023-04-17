import { initEditor } from './editor';
import { clearValidationErrors } from './error';
import { clearFormInputs, setRecepient } from './form';
import { getSelectedUsers } from './selection';

const mailEmptyModal = document.getElementById('mail-empty-modal');
const mailCreateModal = document.getElementById('mail-create-modal');
const mailCreateModalTogglers = document.querySelectorAll('button[data-action="show-mail-create-modal"]');

mailCreateModalTogglers.forEach(mailCreateModalToggler => {
    mailCreateModalToggler.addEventListener('click', e => {
        const sendToAll = e.target.hasAttribute('data-send-mail-to-all');

        setRecepient(sendToAll);

        if (sendToAll || getSelectedUsers().length) {
            $(mailCreateModal).modal('show');
        } else {
            $(mailEmptyModal).modal('show');
        }
    });
});

$(mailCreateModal).on('hidden.bs.modal', () => {
    clearFormInputs();
    clearValidationErrors(mailCreateModal);
});

initEditor('#mail-create-modal textarea[name="contents"]');
