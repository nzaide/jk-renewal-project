let deleteBtns = document.getElementsByClassName('delete-btn');
for (let deleteBtn of deleteBtns) {
    deleteBtn.addEventListener('click', function () {
        document.getElementById('deleteForm').action = this.dataset.action;
    });
}

let editBtns = document.getElementsByClassName('edit-btn');
for (let editBtn of editBtns) {
    editBtn.addEventListener('click', function () {
        this.parentElement.parentElement.classList.add('d-none');
        let editFieldsId = 'editFields' + this.dataset.id;
        document.getElementById(editFieldsId).classList.remove('d-none');
    });
}

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('value');
let saveBtns = document.getElementsByClassName('save-btn');
for (let saveBtn of saveBtns) {
    saveBtn.addEventListener('click', function () {
        let tr = this.parentElement.parentElement;
        let inputs = tr.querySelectorAll('input');
        let body = {};
        for (let input of inputs) {
            body[input.name] = input.value;
        }

        fetch('/admin/groups/' + this.dataset.id, {
            method: 'PATCH',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: JSON.stringify(body),
        })
            .then((response) => response.json())
            .then((rb) => {
                if (rb.errors) {
                    let validationMsgs = tr.getElementsByClassName('validation-msg');
                    for (let validationMsg of validationMsgs) {
                        validationMsg.innerHTML = '';
                        let error = rb.errors[validationMsg.dataset.name];
                        if (error) {
                            validationMsg.innerHTML = error[0];
                        }
                    }
                } else {
                    window.location.reload();
                }
            });
    });
}
