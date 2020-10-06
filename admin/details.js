////executes when the admin clicks on the update button 
$("#updateDetailsBtn").click(function(e){  
    e.preventDefault();
    $("updateError").html("");
    if($('#bname').val()=="" ||  $('#isbn').val()=="" || $('#genreId').val()=="" ||  $('#pages').val()=="" || $('#author').val()=="" ||
    $('#publication').val()=="" || $('#publish').val()=="" || $('#description').val()=="" || $('#rating').val()==""|| $('#price').val()=="" ||
    $('#quantity').val()=="")
    {
        $(".error").html("None of the fields can be blank");
        $(".error").css("color","red");
    }
    else
    { 
    console.log("inside else");
    $('#bname').prop("disabled",false);
         $('#isbn').prop("disabled",false);
                    $('#pages').prop("disabled",false);
                    $('#author').prop("disabled",false);
                    $('#publication').prop("disabled",false);
                    $('#publish').prop("disabled",false);
                    $('#description').prop("disabled",false);
                    $('#rating').prop("disabled",false);
                    $('#price').prop("disabled",false);
                    $('#quantity').prop("disabled",false);
                    $('#genreName').prop("disabled",false);
                    $('#tags').prop("disabled",false);
                    $('#featured').prop("disabled",false);
        var formData  = new FormData(document.getElementById("updateProductDetailsForm"));
        formData.append("updateDetailsBtn",true);
        $.ajax({
            url:"updateDetails.php",
            type:"POST",
            processData: false,
            contentType: false,
            data:formData,
            success: function(response){
                if(response==1){
                    $(".updateError").html("Product update successful");
                    $(".updateError").css("color","green");
                }
                else{
                    $(".updateError").html("Update Failed");
                    $(".updateError").css("color","red");
                }
            }
        });
    }
});

$(".fa-edit").click(function(){
  $(this).parent().parent().prev().children().prop("disabled",false);    
});

$(".deleteProduct").click(function(e){
    e.preventDefault();
    var cnf = confirm("Are you sure you want to delete this product from database ?");
    if(cnf){
        var isbn = $("#isbn").val();
        $.ajax({
            url: "deleteProduct.php",
            type: "POST",
            data :{
                deleteBtn:true,
                isbn:isbn
            },
            success:function(response){
                if(response==1){                    
                    $(".updateError").css("color","red");
                    $(".updateError").html("Product Deleted");
                    alert("Product Deleted");
                    window.location.reload();
                }
                else{
                    $(".updateError").html("Delete Failed");
                    $(".updateError").css("color","red");
                }
            }
        });
    }
});