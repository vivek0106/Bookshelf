$(document).ready(function() {

    $("span.label").click(function(){
        console.log("span clicked")
        $(this).next().focus();
    });

    $("input.form-control").focus(function(){
        $(this).prev().removeClass("label");
            $(this).prev().addClass("up");
        
    });
   
    $("input.form-control").blur(function(){                 
        if($(this).val() == ""){
            $(this).prev().removeClass("up");
            $(this).prev().addClass("label");
        }
        else{
            $(this).prev().addClass("up");
            $(this).prev().removeClass("label");
        }

    });

    $(".fa-eye").click(function(){
        $("#pass").attr("type","type");
        $(this).css("display","none");
        $(this).next().css("display","inline");
    });

    $(".fa-eye-slash").click(function(){
        $("#pass").attr("type","password")
        $(this).css("display","none");
        $(this).prev().css("display","inline");  
    });

   
    $("#fname , #lname , #signupPass, #signupEmail , #contact, #cpass, #forgotEmail").keyup(function(){
        console.log("keyup");
        if($(this).val() == ""){
            console.log("in if");
            $(this).next().removeClass("d-none");           
        }
        else{
            console.log("in else");
            $(this).next().addClass("d-none");
        }
        if($("#forgotEmail").val()==""){
            $("#forgotEmail").next().html("Email is required")
        }
    });

    // ajax code for login 
});
function goBacktoLogin(){
    location.replace("login.html");
}

