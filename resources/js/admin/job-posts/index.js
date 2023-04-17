let topScrollbar = document.getElementById('topScrollbar');
let table = document.getElementById('table');
topScrollbar.onscroll = function() {
    table.scrollLeft = topScrollbar.scrollLeft;
};
table.onscroll = function() {
    topScrollbar.scrollLeft = table.scrollLeft;
};

let statusSelectors = document.getElementsByClassName('status-selector');
for (let statusSelector of statusSelectors) {
    statusSelector.addEventListener('change', function () {
        this.form.submit();
    });
}
