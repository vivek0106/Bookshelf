$(document).ready(function(){
    //executes when details button is clicked of a particular book
    $(".bookItem").click(function(){
        $(".spinner-border").removeClass("hide");
        var bID = $(this).attr("id");
        $.ajax({
                url:"details.php",
                type:"POST",
                data:{
                    getDetails:"true",
                    bookID:bID                    
                },
                success:function(response){
                    $(".spinner-border").addClass("hide");
                    $("#bookDetails").html(response);
                    $('#bname').prop("disabled",true);
                    $('#isbn').prop("disabled",true);
                    $('#pages').prop("disabled",true);
                    $('#author').prop("disabled",true);
                    $('#publication').prop("disabled",true);
                    $('#publish').prop("disabled",true);
                    $('#description').prop("disabled",true);
                    $('#rating').prop("disabled",true);
                    $('#price').prop("disabled",true);
                    $('#quantity').prop("disabled",true);
                    $('#genreName').prop("disabled",true);
                    $('#tags').prop("disabled",true);
                    $('#featured').prop("disabled",true);
            }
        }); 
        

    })
});

////to make a floating label
$("span.label").click(function(){
    $(this).next().focus();
});

$("input.form-control, textarea.form-control").focus(function(){
    $(this).prev().removeClass("label");
        $(this).prev().addClass("up");
    
});

$("input.form-control, textarea.form-control").blur(function(){                 
    if($(this).val() == ""){
        $(this).prev().removeClass("up");
        $(this).prev().addClass("label");
    }
    else{
        $(this).prev().addClass("up");
        $(this).prev().removeClass("label");
    }

});
///executes when admin clicks on add button in add products 
$("#addProductForm").on('submit',function(e){
    e.preventDefault();
    $(".loading-icon").removeClass("hide");
    $(".addBook").attr('disabled',true);
    var formData = new FormData(this);
    formData.append("addBook",true);
    if($('#addBookName').val()=="" ||  $('#addIsbn').val()=="" ||$('#addImage').val()=="" || $('#addGenreId').val()=="" ||  $('#addPages').val()=="" || $('#addAuthor').val()=="" ||
    $('#addPublication').val()=="" || $('#addYear').val()=="" || $('#addDescription').val()=="" ||  $('#addPrice').val()=="" ||
    $('#addStock').val()=="" || $('#addTag').val()=="" || $('#addFeatured').val()=="")
    {
        console.log("inside if");
        $(".addProductError").removeClass("d-none");
        $(".addProductError").html("None of the fields can be blank");
        $(".addProductError").css("color","red");
        $(".loading-icon").addClass("hide");
        $(".addBook").attr('disabled',false);        
    }
    else{
        console.log("inside else");
        $.ajax({
            url:"addProduct.php",
            type:"POST",
            processData: false,
            contentType: false,
            data:formData,
            success:function(response){
                    $(".loading-icon").addClass("hide");
                    $(".addBook").attr('disabled',false);
                    $(".addProductError").html("");
                    if(response == 1){
                        $(".addProductError").removeClass("d-none");
                        $(".addProductError").html("Product added!");
                        $(".addProductError").css("color","green");
                        $("#addProductForm").trigger("reset");
                    }
                    else if(response == 0){
                        $(".addProductError").removeClass("d-none");
                        $(".addProductError").html("Product could not be added! Please try again");
                        $(".addProductError").css("color","red");
                    }
                    else{
                       console.log(response);
                    }
            }
        });
    }
});

$("#addGenreId,#addFeatured").prop("selectedIndex",-1);
$("#addGenreId,#addFeatured").click(function(){
    if($(this).children("option:selected").val() != ""){
        
        console.log("inside if");
        $(this).prev().removeClass("label");
        $(this).prev().addClass("up");
    }
    else{
        $(this).prev().removeClass("up");
        $(this).prev().addClass("label");
    }
});

