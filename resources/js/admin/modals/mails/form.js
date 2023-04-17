import axios from 'axios';
import { saveEditorContents } from './editor';
import { clearValidationErrors, renderValidationErrors } from './error';
import { getSelectedUsers } from './selection';

const mailCreateForm = document.getElementById('mail-create-form');

const showLoadingIndicator = element => {
    element.dataset.text = element.innerText;
    element.disabled = true;
    element.innerHTML = '<span class="fa fa-spin fa-spinner"></span>';
};

const hideLoadingIndicator = element => {
    element.disabled = false;
    element.innerText = element.dataset.text;
};

const handleSubmissionSuccess = response => {
    if (response.status === 200) {
        location.reload();
    }
};

const handleSubmissionError = error => {
    if (error.response.status === 422) {
        renderValidationErrors(mailCreateForm, error.response.data.errors);
    }
};

const mailFormData = () => {
    const formData = new FormData(mailCreateForm);

    if (!+formData.get('send_to_all')) {
        const selectedUsers = getSelectedUsers();

        selectedUsers.forEach(id => {
            formData.append('job_seekers[][id]', id);
        });
    }

    return formData;
};

mailCreateForm.addEventListener('submit', e => {
    e.preventDefault();

    clearValidationErrors(mailCreateForm);
    showLoadingIndicator(e.submitter);
    saveEditorContents();

    const formData = mailFormData();
    const requestConfig = { headers: { 'Content-Type': 'multipart/form-data' } };

    axios.post('/admin/mails', formData, requestConfig)
        .then(response => { handleSubmissionSuccess(response) })
        .catch(error => { handleSubmissionError(error) })
        .then(() => { hideLoadingIndicator(e.submitter) });

    return false;
});

export const setRecepient = sendToAll => {
    mailCreateForm.querySelector('input[name="send_to_all"]').value = Number(sendToAll);
};

export const clearFormInputs = () => {
    mailCreateForm.reset();
};
