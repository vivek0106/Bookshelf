var editStatus=false;
function enableEdit(){
    console.log("edit clicked");
    if(editStatus == false){
        $("input,select,textarea").prop("disabled",false);
        $(".userInfoUpdateBtn").removeClass("d-none");
        editStatus=true;
    }
    else{
        $("input,select,textarea").prop("disabled",true);
        $(".userInfoUpdateBtn").addClass("d-none");
        editStatus=false;
    }
}
$(document).ready(function(){

$("#userInfoForm").on("submit",function(e){
    e.preventDefault();
    var formData = new FormData(this);
    formData.append("saveBtn",true);
    console.log(formData);
    $.ajax({
        url:"updateInfo.php",
        type:"POST",
        processData: false,
        contentType: false,
        data:formData,
        success:function(response){
            if(response==1){
                alert("Your information has been updated");
                window.location.reload();
            }
            else{
                alert("Cannot update your profile at this moment please try again later");
            }
        }
    })
});
});