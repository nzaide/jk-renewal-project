import 'bootstrap-select';
import { clearSelectedUsers, initSelectionManager } from '../modals/mails/selection';
import './advanced-search/birth-date';
import './advanced-search/highest-education';
import './advanced-search/reactivation-date';
import './basic-search/creation-date';
import './basic-search/blacklist';

const perPageLimiter = document.getElementById('per-page-limiter');
const perPageLimiterBottom = document.getElementById('per-page-limiter-bottom');
perPageLimiter.addEventListener('change', e => {
    perPageLimiterBottom.value = e.target.value;
    e.target.form.submit();
});

perPageLimiterBottom.addEventListener('change', e => {
    perPageLimiter.value = e.target.value;
    e.target.form.submit();
});

const searchForm = document.getElementById('search-form');

searchForm.addEventListener('submit', () => {
    clearSelectedUsers();
});

searchForm.addEventListener('reset', e => {
    e.preventDefault();

    $(':input', searchForm).val(null);
    $('.selectpicker', searchForm).selectpicker('deselectAll');

    return false;
});

const aspStateIndicator = document.getElementById('asp-state-indicator');
const persistAdvancedSearchPanelState = open => {
    const urlSearchParams = new URLSearchParams(window.location.search);

    aspStateIndicator.value = open;
    urlSearchParams.set(aspStateIndicator.name, open);

    const url = window.location.pathname + '?' + urlSearchParams.toString();
    history.replaceState(null, '', url);
}

const advancedSearchPanel = document.getElementById('advanced-search-panel');
$(advancedSearchPanel).on('shown.bs.collapse', () => { persistAdvancedSearchPanelState(true) });
$(advancedSearchPanel).on('hidden.bs.collapse', () => { persistAdvancedSearchPanelState(false) });

initSelectionManager();

const pageLinkClickedKey = 'page-link-clicked';
$('.page-link').on('click', () => { sessionStorage.setItem(pageLinkClickedKey, true) });
