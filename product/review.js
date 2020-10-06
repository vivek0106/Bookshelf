$("#reviewForm").on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("reviewBtn",true);
        var temp = new URL(window.location.href);
        var bookID = temp.searchParams.get("id");
        formData.append("bookID",bookID);
        $.ajax({
            url:"addReview.php",
            type:"POST",
            processData: false,
            contentType: false,
            data:formData,
            success:function(response){
                console.log(response);
                $("#reviewForm").trigger("reset");
                if(response==1){
                    alert("Review Uploaded");
                    window.location.reload();
                }
            }
        });
    });
