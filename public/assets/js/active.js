$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
$(document).on('click','.status_checks',function(){
    var status = ($(this).hasClass("btn-success")) ? '0' : '1';
    var msg = (status=='0')? 'Deactivate' : 'Activate';
        var current_element = $(this);
        var id = $(current_element).attr('id');
        url = "/status-update";
        $.ajax({
        type:"POST",
        url: url,
        data: {id:$(current_element).attr('id'),status:status},
        //    dataType:"json",
        success: function(data)
        {   
            if(data == 'success') {
                if(status == '1'){
                    $("#"+id).addClass('btn-success');
                    $("#"+id).removeClass('btn-danger');
                    $("#"+id).text('Active');
                }else{
                    $("#"+id).addClass('btn-danger');
                    $("#"+id).removeClass('btn-success');
                    $("#"+id).text('Inactive');
                }
            }
        }
        });          
    });