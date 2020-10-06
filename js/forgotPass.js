$(document).ready(function(){ 
    $(".forgotSubmitBtn").click(function(e){
        e.preventDefault();
        $(".forgotPassError").addClass("d-none");
        $(".emailSentSuccess").addClass("d-none");
        if($("#forgotEmail").val() == ""){
            $(".forgotPassError").removeClass("d-none");
            $(".forgotPassError").html("Email is required");
        }
        else{
            $(".forgotPassSpinner").addClass("spinner-border spinner-border-sm");
            var formData = new FormData();
            formData.append("forgotPass",true);
            formData.append("email",$("#forgotEmail").val());
            $.ajax({
                url: "verifyUser.php",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success:function(response){
                    $(".forgotPassSpinner").removeClass("spinner-border spinner-border-sm");
                    if(response == 1){
                        console.log("email sent");
                        $(".emailSentSuccess").removeClass("d-none");
                        $(".emailSentSuccess").html("Confirmation link sent. Please check your inbox.");
                    }
                    else if(response == 0){
                        $(".forgotPassError").removeClass("d-none");
                        $(".forgotPassError").html("Email not sent. Errors Encountered");
                    }
                    else if(response == 2){
                        console.log("token not set");
                    }
                    else if(response==3){
                        $(".forgotPassError").removeClass("d-none");
                        $(".forgotPassError").html("Account not found !");
                    }
                    else{
                        console.log("error executing select query");
                    }
                    console.log(response);
                }
            });
        }
    });
});