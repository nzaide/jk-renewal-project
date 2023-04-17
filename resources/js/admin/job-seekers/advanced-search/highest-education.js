import axios from "axios";

const highestDegreeSelector = document.getElementById('highest-degree-selector');
const educationLevelSelector = document.getElementById('education-level-selector');

const updateEducationLevelOptions = async () => {
    const highestDegree = highestDegreeSelector.value;

    educationLevelSelector
        .querySelectorAll('option:not(option[value=""])')
        .forEach(element => element.remove());

    const response = await axios
        .get('/admin/job-seekers/education-levels', { params: { highest_degree: highestDegree } });

    const options = document.createDocumentFragment();
    for (const data of response.data) {
        const option = document.createElement('option');

        option.value = data.value;
        option.innerText = data.text;

        options.appendChild(option);
    }
    educationLevelSelector.appendChild(options);
};

document.addEventListener('DOMContentLoaded', async () => {
    await updateEducationLevelOptions();

    educationLevelSelector.value = educationLevelSelector.dataset.selected;
});

highestDegreeSelector.addEventListener('change', () => updateEducationLevelOptions());
