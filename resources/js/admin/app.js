import './bootstrap';
import $ from 'jquery';
window.$ = $;
window.jQuery = $;
import 'bootstrap';
import 'bootstrap-select';
import flatpickr from "flatpickr";

flatpickr('.flatpickr');
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
