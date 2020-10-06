$("#showNewPass").click(function(){
    if($(this).prop("checked") == true){
        $("input.newPass").attr("type","text");
        $("input.newPassC").attr("type","text");
    }
    else{
        $("input.newPass").attr("type","password");
        $("input.newPassC").attr("type","password");
    }
});
$(".changePassBtn").click(function(e){
    console.log("btn clicked");
    e.preventDefault();
    $(".error").addClass("d-none");
    $(".response").html("");
    if($("#newPass").val() == "" &&  $("#newPassC").val()==""){
        $(".response").html("None of the Fields Can be blank ");
        $(".response").css("color","red");
    }
    else{
        if($("#newPass").val() != $("#newPassC").val()){
            $(".response").html("Passwords do not match");
            $(".response").css("color","red");
        }
        else{
            var temp = new URL(window.location.href);
            var str = temp.searchParams.get("str");
            $.ajax({
                url:"resetPassword.php",
                type:"POST",
                data: {
                    reset : "true",
                    str:str,
                    newPass:$("#newPass").val()
                },
                success: function(response){
                    if(response == 1){
                        $(".response").html("Password reset successful <a href='http://localhost/Bookshelf'>Click here to login</a>");
                        $("#newPassForm").trigger("reset");
                        $(".response").css("color","green");
                    }
                    else if(response == 2){
                        $(".response").html("Wrong Link");
                        $(".response").css("color","red");
                    }
                    else if(response == 4){
                        $(".response").html("Link Expired");
                        $(".response").css("color","red");
                    }
                    else if(response == 0){
                        $(".response").html("Password reset failed");
                        $(".response").css("color","red");
                    }
                    else{
                        console.log(response);
                    }
                }
            });
        }
    }
});
$("#newPass, #newPassC").keyup(function(){
    $(".response").html("");
    if($(this).val() == ""){
        $(this).next().removeClass("d-none");           
    }
    else{
        $(this).next().addClass("d-none");  
    }
});