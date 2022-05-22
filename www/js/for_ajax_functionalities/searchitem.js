$(document).on('click','.clicksearch',function(){
    $('#modalsearch').click();
        $('div input#searchit').focus();
        // $('.close_tender').click();
        $('#example3_filter input').focus();
        $('#example3_filter input').select();  
});


$(document).keydown(function (eventValue) {
    if (eventValue.keyCode == 112) {
        
        $('#modalsearch').click();
        $('div input#searchit').focus();
        // $('.close_tender').click();
        $('#example3_filter input').focus();
        $('#example3_filter input').select();  
        
        
    }               
});//F1 enter keycode
$(document).keydown(function (eventValue) {
    if (eventValue.keyCode == 113) {
        $('#example3_filter input').focus();
        $('#example3_filter input').select();
    }               
});//F2 enter keycode

$(function() {
            window.focus()
            
            $('#goto_first').click(function() {
                highlight(0);
            });
            $('#goto_prev').click(function() {
                highlight($('#example3 tbody tr.highlight').index() - 1);
            });
            $('#goto_next').click(function() {
                highlight($('#example3 tbody tr.highlight').index() + 1);
            });
            $('#goto_last').click(function() {
                highlight($('#example3 tbody tr:last').index());
            });

            $("#example3 tr").on('click', function(e) {

            var id=$('.highlight').attr('iid');
                $('#modalprice_quantity').click();
                $('.close_search').click();
                $('.id').val(String('00000' + id).slice(-4));
                $('.qty').focus();
                $(document).keydown(function (eventValue) {
                    if (eventValue.keyCode == 13) {
                        var id=$('.id').val();
                        var qty=$('.qty').val();
                        var price=$('.price').val();
                        
                        $('#modalprice_quantity').click();
                        if(qty=='')
                        {
                            $('#modalprice_quantity').click();
                            $('.qty').focus(); 
                        }
                        // else if(price=='')
                        // {
                        //     $('#modalprice_quantity').click();
                        //     // $('.price').focus();
                        // }
                        else
                        {
                            $.ajax({
                                url:'ajax/inventoryi.php',
                                type:'POST',
                                dataType:'json',
                                data:{id:id,qty:qty,price:price},
                                success:function(data){ 
                                    window.location.reload(true);                                                                     
                                } , 
                                error:function(){
                                    window.location.reload(true); 
                                }
                        }); 
                        }
                     

                        

                            
                    }               
                });// enter keycode
                        
        });

function highlight(tableIndex) {
    if ((tableIndex + 1) > $('#example3 tbody tr').length) //restart process
    tableIndex = 0;
    if ($('#example3 tbody tr:eq(' + tableIndex + ')').length > 0) {
    $('#example3 tbody tr').removeClass('highlight');
    $('#example3 tbody tr:eq(' + tableIndex + ')').addClass('highlight');
    }
}
})
$(document).keydown(function(e) {
  switch (e.which) {
    case 38:
      $('#goto_prev').trigger('click');
      break;
    case 40:
      $('#goto_next').trigger('click');
      break;
    case 32:
      $(".highlight").click();

  }
});


