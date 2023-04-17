const birthMonthSelector = document.getElementById('birth-month-selector');
const birthDaySelector = document.getElementById('birth-day-selector');

const updateBirthDayOptions = () => {
    const currentYear = (new Date()).getFullYear();
    const selectedMonth = birthMonthSelector.value;
    const selectedDay = birthDaySelector.dataset.selected;

    birthDaySelector
        .querySelectorAll('option:not(option[value=""])')
        .forEach(element => element.remove());

    if (selectedMonth) {
        let numberOfDays = (new Date(currentYear, selectedMonth, 0)).getDate();
        if (numberOfDays === 28) numberOfDays++;

        const options = document.createDocumentFragment();
        for (let i = 1; i <= numberOfDays; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.innerText = i;

            if (i == selectedDay) {
                option.selected = true;
            }

            options.appendChild(option);
        }
        birthDaySelector.appendChild(options);
    }
};

document.addEventListener('DOMContentLoaded', () => updateBirthDayOptions());
birthMonthSelector.addEventListener('change', () => updateBirthDayOptions());
birthDaySelector.addEventListener('change', () => {
    birthDaySelector.dataset.selected = birthDaySelector.value;
});