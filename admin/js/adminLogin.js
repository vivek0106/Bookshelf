$(document).ready(function(){
    $("#adminForm").on('submit',function(e){
        e.preventDefault();
        var formData=new FormData(this);
        formData.append("adminLoginBtn",true);
        if($("#email").val() == "" || $("#pass").val()==""){
            $(".adminError").removeClass("d-none");
            $(".adminError").html("None of the fields can be blank");
        }
        else{
            console.log("inside else");
            $.ajax({
                url:"adminLogin.php",
                type:"POST",
                processData: false,
                contentType: false,
                data:formData,
                success:function (response) { 
                    if(response==1){
                        window.location.replace("admin.php");
                    }
                    else if(response==2){
                        $(".adminError").removeClass("d-none");
                        $(".adminError").html("Please try again");
                    }
                    else if(response==0){
                        $(".adminError").removeClass("d-none");
                        $(".adminError").html("Username or password is incorrect");
                    }
                    else{
                        console.log(response);
                    }
                }
            });
        }
    });
});