export const renderValidationErrors = (form, errors) => {
    for (const field in errors) {
        if (Object.hasOwnProperty.call(errors, field)) {
            const errorContainer = document.createElement('div');

            errorContainer.classList.add('invalid-feedback');
            errorContainer.innerText = errors[field];

            const element = form.querySelector(`[name="${field}"]`);

            if (element) {
                element.classList.add('is-invalid');
                element.parentNode.appendChild(errorContainer);
            }
        }
    }
};

export const clearValidationErrors = form => {
    form
        .querySelectorAll('.invalid-feedback')
        .forEach(element => { element.remove() });

    form
        .querySelectorAll('.is-invalid')
        .forEach(element => { element.classList.remove('is-invalid') });
};
