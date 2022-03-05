$(function(){
    $('#btnAddMore').click(function(e){
        e.preventDefault();
        let defaultTr = $('#tbody').find('.defaultTr').clone();                
        let extraTr = $('<tr class="extraTr"></tr>');
        extraTr.html(defaultTr.html());
        extraTr.find('td:last-child').html('<button type="button" class="btn btn-danger btn-sm btn-delete-child">-</button>');
        $('#tbody').append(extraTr);
    });
    $('#tbody').delegate('.btn-delete-child', 'click', function(e){ 
        e.preventDefault();
        $(this).closest('tr').remove();
    });
}); 