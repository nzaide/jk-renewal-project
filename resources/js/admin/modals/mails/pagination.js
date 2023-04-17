import { clearDisplayedSentMails, displaySentMails } from './list';

const mailListModal = document.getElementById('mail-list-modal');
const paginationControls = mailListModal.querySelector('.pagination');

const handlePageLinkClickedEvent = async event => {
    clearDisplayedSentMails();
    resetPaginationControls();

    const url = event.currentTarget.dataset.url;
    const response = await axios.get(url);

    displaySentMails(response.data.data);
    renderPaginationControls(response.data.links);
}

export const renderPaginationControls = links => {
    const pageItems = document.createDocumentFragment();

    let activeLinkIndex = null;

    links.forEach((link, index) => {
        const pageItem = document.createElement('li');
        pageItem.classList.add('page-item');

        if (link.active) {
            pageItem.classList.add('active');
            activeLinkIndex = index;
        }

        const pageLink = document.createElement('button');
        pageLink.classList.add('page-link');
        pageLink.dataset.url = link.url;
        pageLink.type = 'button';

        switch (index) {
            case 0:
                pageLink.innerHTML = '&lsaquo;';
                break;
            case links.length - 1:
                pageLink.innerHTML = '&rsaquo;';
                break;
            default:
                pageLink.innerText = link.label;
                break;
        }

        pageLink.addEventListener('click', handlePageLinkClickedEvent);

        pageItem.appendChild(pageLink);
        pageItems.appendChild(pageItem);
    });

    if (activeLinkIndex === 1) {
        pageItems.firstChild.classList.add('disabled');
    }

    if (activeLinkIndex === links.length - 2) {
        pageItems.lastChild.classList.add('disabled');
    }

    paginationControls.innerHTML = null;
    paginationControls.appendChild(pageItems);
};

export const resetPaginationControls = () => {
    paginationControls.innerHTML = null;
};
