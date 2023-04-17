import flatpickr from "flatpickr";

const startDateInput = document.getElementById('start-date-input');
const endDateInput = document.getElementById('end-date-input');

const startDatePicker = flatpickr(startDateInput, {
    dateFormat: 'd-m-Y',
    defaultDate: startDateInput.value,
    maxDate: endDateInput.value,
    onChange: selectedDates => {
        endDatePicker.set('minDate', selectedDates[0] || null);
    },
});

const endDatePicker = flatpickr(endDateInput, {
    dateFormat: 'd-m-Y',
    defaultDate: endDateInput.value,
    minDate: startDateInput.value,
    onChange: selectedDates => {
        startDatePicker.set('maxDate', selectedDates[0] || null);
    },
});

const searchForm = document.getElementById('search-form');
searchForm.addEventListener('reset', e => {
    e.preventDefault();

    startDatePicker.clear();
    endDatePicker.clear();

    return false;
});
