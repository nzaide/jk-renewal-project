let fileInputs = document.getElementsByClassName('file-input');
for (let fileInput of fileInputs) {
    fileInput.addEventListener('change', function () {
        const id = this.id;
        if (this.files.length) {
            const fileSize = this.files[0].size * 0.001;
            const maxSize = this.dataset.max;

            if (fileSize > maxSize) {
                alert(sizeValidationMessage.replace(':max', maxSize));
                this.value = null;
            } else {
                document.getElementById(id + 'Name').value = this.files[0].name;
                document.getElementById(id + 'NameDisplay').innerHTML = this.files[0].name;
                let reader = new FileReader();
                reader.readAsDataURL(this.files[0]);
                reader.onloadend = function() {
                    let base64Data = reader.result;
                    document.getElementById(id + 'Base64').value = base64Data;
                }
            }
        }
    });
}
