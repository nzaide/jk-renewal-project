import axios from 'axios';
import { clearDisplayedSentMails, displaySentMails } from './list';
import { renderPaginationControls, resetPaginationControls } from './pagination';

const mailListModal = document.getElementById('mail-list-modal');

$(mailListModal).on('shown.bs.modal', async () => {
    const response = await axios.get('/admin/mails');

    displaySentMails(response.data.data);
    renderPaginationControls(response.data.links);
});

$(mailListModal).on('hidden.bs.modal', () => {
    clearDisplayedSentMails();
    resetPaginationControls();
});
