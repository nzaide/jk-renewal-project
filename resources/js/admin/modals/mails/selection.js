const key = 'selected-job-seekers';
const pageLinkClickedKey = 'page-link-clicked';

export const getSelectedUsers = () => {
    return JSON.parse(sessionStorage.getItem(key) || '[]');
};

export const selectUser = user => {
    const selectedUsers = getSelectedUsers();

    if (selectedUsers.includes(user)) {
        return;
    }

    selectedUsers.push(user);
    sessionStorage.setItem(key, JSON.stringify(selectedUsers));
};

export const deselectUser = user => {
    const selectedUsers = getSelectedUsers().filter(selected => selected !== user);
    sessionStorage.setItem(key, JSON.stringify(selectedUsers));
};

export const clearSelectedUsers = () => {
    sessionStorage.removeItem(key);
};

export const initSelectionManager = () => {
    // Clear the session unless page link was clicked
    if (!sessionStorage.getItem(pageLinkClickedKey)) {
        clearSelectedUsers();
    }
    sessionStorage.removeItem(pageLinkClickedKey);

    const selectedUsers = getSelectedUsers();

    const userSelectors = document.querySelectorAll('input[data-action="select-user"]');
    userSelectors.forEach(userSelector => {
        const selectedUser = userSelector.dataset.selectedUser;

        userSelector.checked = selectedUsers.includes(selectedUser);

        userSelector.addEventListener('change', e => {
            if (e.target.checked) {
                selectUser(selectedUser);
            } else {
                deselectUser(selectedUser);
            }
        });
    });

    const allUserSelector = document.querySelector('input[data-action="select-all-user"]');
    allUserSelector.addEventListener('change', e => {
        const changeEvent = new Event('change');

        userSelectors.forEach(element => {
            if (!element.disabled) {
                element.checked = e.target.checked;
                element.dispatchEvent(changeEvent);
            }
        });
    });
}
