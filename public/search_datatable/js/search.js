$('.datatable-filters .switchery').click(function () {
    if ($('.datatable-filters .panel-body').is(':hidden')) {
        $('.datatable-filters .panel-heading-controls span small').css({
            'left': '16px',
        });
    } else {
        $('.datatable-filters .panel-heading-controls span small').css({
            'left': '0px',
        });
    }
    $('.datatable-filters .panel-body').slideToggle(300);
});


$('.datatable-filters input ,.datatable-filters select').on('keyup change , change', function () {
    table = $('#datatable').datatable();
    word = $(this).val();
    col_index = $(this).attr('col-id');

    if (table.columns(col_index).search() !== word) {
        table.columns(col_index)
            .search(word)
            .draw();
    }

    $.fn.dataTable.ext.search.pop();

});