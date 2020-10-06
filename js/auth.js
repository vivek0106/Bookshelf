$(document).ready(function(){        
    $(".loginBtn").click(function(e){
        e.preventDefault();
        $(".loginSpinner").addClass("spinner-border spinner-border-sm");
        $(".error").css("display","none");
        if($("#email").val == "" || $("#pass").val()==""){
            $(".error").html("None of the fields can be blank");
            $(".error").css("display","block");
            $(".loginSpinner").removeClass("spinner-border spinner-border-sm");
        }
        else{
                let check = 'unchecked';
                if($('input[name=rememberme]').is(":checked")){
                    console.log("checked");
                    check = 'checked';
                }
                else{
                    console.log("unchecked");
                    check = 'unchecked';
                }
                $.ajax({
                url:"authenticate.php",
                type:"POST",
                data:{
                    loginBtn:true,
                    email: $("#email").val(),
                    pass: $("#pass").val(),
                    rememberme: check
                },
                success: function(response){
                    if(response == "success"){
                        console.log(response);
                        window.location.replace("home/index.php");
                        $(".loginSpinner").removeClass("spinner-border spinner-border-sm");
                    }
                    else{
                        $(".error").css("display","block");
                        $(".error").html(response);
                        console.log(response);
                        $(".loginSpinner").removeClass("spinner-border spinner-border-sm");
                    }
                }
            });  
        }          
    });
});