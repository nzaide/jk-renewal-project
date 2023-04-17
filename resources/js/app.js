import './bootstrap';
// mixin for common methods
import './commonMethods';

import '../../node_modules/bootstrap/dist/js/bootstrap.bundle.min';
import '../vendor/jk-network-static/js/svg-injector.min';
import '../vendor/jk-network-static/js/feather.min';
import '../vendor/jk-network-static/js/in-view.min';
import '../vendor/jk-network-static/js/sticky-kit.min';
import '../vendor/jk-network-static/js/flatpickr.min';
import '../vendor/quick-website-ui-kit-v1.1.1/src/assets/js/quick-website';
import.meta.glob([
    '../vendor/jk-network-static/img/**',
]);

window.axios.defaults.headers.common = {
  'Accept': 'application/json',
  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};