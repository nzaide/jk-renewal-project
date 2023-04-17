import moment from 'moment';

const mailListModal = document.getElementById('mail-list-modal');
const tbody = mailListModal.querySelector('tbody');
const tloader = mailListModal.querySelector('.loader');

export const displaySentMails = mails => {
    mails.forEach(mail => {
        const row = tbody.insertRow();

        const id = row.insertCell();
        id.scope = 'col';
        id.innerText = mail.id;

        const subject = row.insertCell();
        subject.innerText = mail.title;

        const sentDate = row.insertCell();
        sentDate.innerText = moment(mail.created_at).format('YYYY/MM/DD');
    });

    if (mails.length === 0) {
        const row = tbody.insertRow();
        const placeholder = row.insertCell();

        placeholder.classList.add('text-center');
        placeholder.colSpan = 3;
        placeholder.innerText = 'No records found';
    }

    tloader.style.display = 'none';
};

export const clearDisplayedSentMails = () => {
    tbody
        .querySelectorAll('tr:not(.loader)')
        .forEach(element => element.remove());

    tloader.style.display = null;
};
