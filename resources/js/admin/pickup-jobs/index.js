import '../../../../node_modules/jquery-ui/dist/jquery-ui';

$('.tooltip-selector').popover({
    animate: true,
}).on("mouseenter", function() {
    var $this = this;
    $(this).popover("show");
    $(".popover").on("mouseleave", function() {
        $($this).popover('hide');
    });
}).on("mouseleave", function() {
    var $this = this;
    if (!$(".popover:hover").length) {
        $($this).popover("hide");
    }
});

$.each(languages, (index, value) => {
    tableSortable(value, index);
});

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('value');
function tableSortable(tableClass, language) {
    let tableSort = $('.' + tableClass.toLowerCase() + '-language-table tbody');
    tableSort.sortable({
        placeholder: 'sortable-placeholder',
        classes: {
            'ui-sortable-placeholder': 'bg-secondary',
            'ui-sortable-helper': 'font-weight-bolder active',
        },
        cursor: 'move',
        opacity: 0.8,
        axis: 'y',
        update: () => {
            let sortedIds = tableSort.sortable('toArray', {key:'id'});
            axios.patch('/admin/languages/' + language + '/required-languages/sort',
                // Parameters
                {
                    sorted_ids: sortedIds,
                    language: language,
                },
                // Headers
                {
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                }
            ).then(() => {
                // Code
            }).catch((error) => {
                alert(error.message);

                // Revert to original position
                tableSort.sortable('cancel');
            });
        }
    });
}

$('.remove-btn').on('click', function() {
    let form = $('#deleteModal').find('#deleteForm');
    form.attr('action', $(this).attr('data-url'));
});