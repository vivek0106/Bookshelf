$(document).ready(function(){
    $("#gender").prop("selectedIndex",-1);
    $("#gender").focus(function(){
        console.log("gender clicked");
        if($(this).children("option:selected").val() != ""){
            console.log("inside if");
            $(this).prev().addClass("up");
            $(this).next().addClass("d-none");
        }
        else{
            $(this).prev().removeClass("up");
        }
    });
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
        event.preventDefault();
        return false;
        }
    });
    $("#next1").click(function(){
        if($("#fname").val()  != "" && $("#lname").val() !="" && $("#gender").children("option:selected").val() != undefined){
           $(".signuperror").addClass("d-none");
            $("#step1").addClass("d-none");
            $("#step2").removeClass("d-none");           
        }
        else{                     

            if($("#fname").val()==""){
                console.log("inside fname");
                $("#fnameP").removeClass("d-none");
            }
            else{
                $("#fnameP").addClass("d-none");
            }
            if($("#lname").val()==""){
                console.log("inside lname");
                $("#lnameP").removeClass("d-none");
            }
            else{
                $("#lnameP").addClass("d-none");
            }
            if($("#gender").children("option:selected").val() == undefined){
                console.log("inside gender");
                $("#genderP").removeClass("d-none");
            }
            else{
                $("#genderP").addClass("d-none");
            } 
        }
    });
    $("#back1").click(function(){
        $("#step2").addClass("d-none");
        $("#step1").removeClass("d-none");
    });
    $("#back2").click(function(){
        $("#step3").addClass("d-none");
        $("#step2").removeClass("d-none");
    });
    $("input#showPass").click(function(){
        if($(this).prop("checked") == true){
            $("input.pass").attr("type","text");
        }
        else{
            $("input.pass").attr("type","password");
        }
    });
    $("#next2").click(function(){
        $(".signuperror").addClass("d-none");
        $(".next2Spinner").addClass("spinner-border spinner-border-sm");
        if($("#signupEmail").val()  != "" && $("#contact").val() !="" && $("#signupPass").val() !="" && $("#cpass").val() !=""){
            if($("#signupPass").val()==$("#cpass").val()){
                $.ajax({
                    url: "verifyUser.php",
                    type: "POST",
                    data: {
                        checkEmailPhone: true,
                        checkEmail: $("#signupEmail").val(),
                        checkPhone: $("#contact").val()
                    },
                    success: function(response){
                        if(response == 1){
                            console.log("duplicate email");
                                $("#emailE").removeClass("d-none");
                                $(".next2Spinner").removeClass("spinner-border spinner-border-sm");

                        }
                        else if(response==2){
                            console.log("duplicate phone");
                            $("#contactE").removeClass("d-none");
                            $(".next2Spinner").removeClass("spinner-border spinner-border-sm");
                        }
                        else if(response==12){
                            $("#emailE").removeClass("d-none");
                            $("#contactE").removeClass("d-none");
                            $(".next2Spinner").removeClass("spinner-border spinner-border-sm");
                        }
                        else{
                            $(".error").addClass("d-none");
                            $("#step2").addClass("d-none");
                            $("#step3").removeClass("d-none");   
                            $(".next2Spinner").removeClass("spinner-border spinner-border-sm");
                            console.log("pass");
                        }
                    } 
                });
               
            }
            else{
                 console.log("wrng pass");
                 $("#cpassP").html("Passwords do not match");
                 $("#cpassP").removeClass("d-none");
                 $(".next2Spinner").removeClass("spinner-border spinner-border-sm");
            }
           
        } 
        else{
            $(".next2Spinner").removeClass("spinner-border spinner-border-sm");
            if($("#signupEmail").val()==""){
                console.log("inside email");
                $("#emailP").removeClass("d-none");
            }
            if($("#contact").val()==""){
                console.log("inside contact");
                $("#contactP").removeClass("d-none");
            }
            if($("#signupPass").val()==""){
                console.log("inside pass");
                $("#passP").removeClass("d-none");
            }
            if($("#cpass").val()==""){
                console.log("inside confirm pass");
                $("#cpassP").html("Confirm Password is required");
                $("#cpassP").removeClass("d-none");

            }
        }
    });
    $(".signupSubmitBtn").click(function(e){
        e.preventDefault();
        $(".signupSpinner").addClass("spinner-border spinner-border-sm");
        $(".signupError").addClass("d-none");
        $.ajax({
            url: "signup.php",
            type:"POST",
            data: {
                signupSubmitBtn:true,
                fname:$("#fname").val(),
                lname:$("#lname").val(),
                gender:$("#gender").children("option:selected").val(),
                contact:$("#contact").val(),
                signupEmail: $("#signupEmail").val(),
                signupPass: $("#signupPass").val(),
                address1:$("#address1").val(),
                address2:$("#address2").val(),
                city: $("#city").val(),
                pincode: $("#pincode").val() 
            },
            success: function(response){
                if(response == 1){
                    $(".signupSuccess").removeClass("d-none");
                    $("form#signupForm").trigger("reset");
                    $(".signupSpinner").removeClass("spinner-border spinner-border-sm");

                }
                else{
                    $("#finalError").removeClass("d-none");
                    $(".signupSuccess").addClass("d-none");
                    $(".signupSpinner").removeClass("spinner-border spinner-border-sm");
                }
            }
        });
    })
});