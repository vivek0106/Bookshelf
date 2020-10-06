$(document).ready(function(){
    $("#ham").click(function(){    
        $(".sideBarOutside").css("z-index","10")
        $(".sideBarOutside").css("display","block")
        $(".sideBar").css("left","0px")
    });
    $("#navClose").click(function(){
        $(".sideBarOutside").css("z-index","0")
        $(".sideBarOutside").css("display","none")
        $(".sideBar").css("left","-60%")
    });
    $(".sideBarOutside").click(function(){
        $(".sideBarOutside").css("z-index","0")
        $(".sideBarOutside").css("display","none")
        $(".sideBar").css("left","-60%")
    });
     
    $("#search").focus(function(){      
        $(".searchBar").css("border","1px solid orange")
    });
    $("#search").blur(function(){      
        $(".searchBar").css("border","unset")
    });
    $(".logoutBtn").click(function(){
            document.location.href="http://localhost/BookShelf/logout.php?logoutBtn=true";       
    });
    $(".navLoginBtn").click(function(){
        document.location.href="http://localhost/BookShelf/";       
});


});

$("#contactUsForm").on('submit',function(e){
    e.preventDefault();
    $(".loading-icon").removeClass("d-none");
    $("#contactUsBtn").attr('disabled',true);
    var formData = new FormData(this);
    formData.append("contactUs",true);
    if($('#conname').val()=="" || $('#conemail').val()=="" ||$("#conmessage").val()==""){
        console.log("inside if");
        $(".contactUsError").removeClass("d-none");
        $(".contactUsError").html("None of the fields can be blank");
        $(".contactUsError").css("color","red");
        $(".loading-icon").addClass("d-none");
        $("#contactUsBtn").attr('disabled',false);      
    }
    else{
        console.log("inside else");
        $.ajax({
            url:"../contactUsForm.php",
            type:"POST",
            processData: false,
            contentType: false,
            data:formData,
            success:function(response){
                $(".loading-icon").addClass("d-none");
                $("#contactUsBtn").attr('disabled',false);
                $(".contactUsError").html("");
                if(response==1){
                    alert("We will contact you as soon. as possible");
                    $("#contactUsForm").trigger("reset");
                }
                else{
                    alert("Not able to send email at this moment please try again later");
                }
            }
        });
    }
});