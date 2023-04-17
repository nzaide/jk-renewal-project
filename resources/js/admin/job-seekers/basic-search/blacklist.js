let removeBlacklistBtns = document.getElementsByClassName('remove-blacklist');
for (let removeBlacklistBtn of removeBlacklistBtns) {
    removeBlacklistBtn.addEventListener('click', function () {
        document.getElementById('deleteBlacklistForm').action =
            this.dataset.action;
    });
}

let addBlacklistBtns = document.getElementsByClassName('add-blacklist');
for (let addBlacklistBtn of addBlacklistBtns) {
    addBlacklistBtn.addEventListener('click', function () {
        document.getElementById('markBlacklistForm').action =
            this.dataset.action;
    });
}
