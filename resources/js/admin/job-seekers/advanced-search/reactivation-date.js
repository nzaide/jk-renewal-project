import flatpickr from "flatpickr";

const reactivationStartDateInput = document.getElementById('reactivation-start-date-input');
const reactivationEndDateInput = document.getElementById('reactivation-end-date-input');

const reactivationStartDatePicker = flatpickr(reactivationStartDateInput, {
    dateFormat: 'd-m-Y',
    defaultDate: reactivationStartDateInput.value,
    maxDate: reactivationEndDateInput.value,
    onChange: selectedDates => {
        reactivationEndDatePicker.set('minDate', selectedDates[0] || null);
    },
});

const reactivationEndDatePicker = flatpickr(reactivationEndDateInput, {
    dateFormat: 'd-m-Y',
    defaultDate: reactivationEndDateInput.value,
    minDate: reactivationStartDateInput.value,
    onChange: selectedDates => {
        reactivationStartDatePicker.set('maxDate', selectedDates[0] || null);
    },
});

const searchForm = document.getElementById('search-form');
searchForm.addEventListener('reset', e => {
    e.preventDefault();

    reactivationStartDatePicker.clear();
    reactivationEndDatePicker.clear();

    return false;
});
