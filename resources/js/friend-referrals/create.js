$(function () {
    let termsAndPrivacy = $('.terms-and-privacy').text()
        .replace(terms_of_services, `<a href="#" data-toggle="modal" data-target="#terms-of-services-modal" class="text-primary">${terms_of_services}</a>`)
        .replace(privacy_policy, `<a href="#" data-toggle="modal" data-target="#privacy-policy-modal" class="text-primary">${privacy_policy}</a>`);
    $('.terms-and-privacy').html(termsAndPrivacy);
});

$('#resume').change(function () {
    $('#resume_label').text(choose_file);
    if (this.files.length > 0) {
        if (this.files[0].size > 5 * 1024 * 1024) {
            alert(file_must_be_less_than_5MB);
            this.value = null;
        } else {
            $('#resume_label').text(this.files[0].name);
        }
    }
});