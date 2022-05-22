$(document).ready(function(){
    $('.add').on('click',function(){
    var id=$('.id').val();
    var name=$('.name').val();
    var brand=$('.brand').val();
    var pdescription=$('.pdescription').val();
    var units=$('.units').val();

        if(name=='' || brand=='' || units=='')
        {
            swal({
                        title: "",
                        text: "Fill out the given Name, Brand and Units. Please try again!",
                        icon: "success",
                        button: "OK",
                        });
                       $('.name').focus();
                       $('.brand').focus();
                       
        }
        else
        {
            $.ajax({
                url:'ajax/addproduct.php',
                type:'POST',
                dataType:'json',
                data:{id:id,name:name,brand:brand,pdescription:pdescription,units:units},
                cache: false,
                success:function(data){
              
                    // window.location.reload(true);
         
                    if(data==1)
                    {
                        swal({
                            title: "",
                            text: "Product name is already exist.",
                            icon: "error",
                            button: "OK",
                            });
                    }
                    else if(data==2)
                    {
                        window.location.reload(true);
                    }
                },
         
            });
        }
     
    });
});


$('.editt').on('click',function(){
    $('#modalbranchedit').click();
    var name=$(this).attr('name');
    var brand=$(this).attr('brand');
    var description=$(this).attr('description');
    var units=$(this).attr('units');
    var id=$(this).attr('id');

 

    $('.namee').val(name);
    $('.unitss').val(units);
    $('.brandd').val(brand);
    $('.descriptionn').val(description);
    $('.idd').val(String('00000' + id).slice(-4));

});
$('.updateproduct').on('click',function(){
    var name=$('.namee').val();
    var brand=$('.brandd').val();
    var description=$('.descriptionn').val();
    var units=$('.unitss').val();
    var id=$('.idd').val();
   
    $.ajax({
        url:'ajax/updateproduct.php',
        async:false,
        type:'POST',
        dataType:'json',
        data:{name:name,brand:brand,description:description,units:units,id:id},
        success:function(data){
            window.location.reload(true);
        },error:function(e)
        {
            alert(e.responseText);
        }
    });
});
$(document).on('click','.delete',function(){

swal({
    title: "DELETE ?",
    text: "System can't restore this after deletion.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    closeOnConfirm: false,
    closeOnCancel: true
    }, 
    function(isConfirm){
    if (isConfirm) 
    {
        var id=$('.delete').attr('id');
        $.ajax({
            url:'ajax/deleteproduct.php',
            type:'POST',
            dataType:'json',
            data:{id:id},
                success:function(data)
                {
                    window.location.reload(true);
            }
        });       
    }
});
});