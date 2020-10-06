function addToWish(pid){
    $.ajax({
        url:"../wishlist/addToWishlist.php",
        type:"post",
        data:{
            pid:pid,
            wishBtn:true
        },
        success:function(response){
            if(response == 1){
                alert("Book added to wishlist");
            }
            else if(response == 2){
                alert("This book is already present in wishlist");
            }
            else{
                console.log(response);
            }
        }
    });
}
function removeFromWish(pid){
    $.ajax({
        url:"../wishlist/removeFromWish.php",
        type:"post",
        data:{
            pid:pid,
            wishBtn:true
        },
        success:function(response){
            if(response == 1){
                alert("Book removed to wishlist");
                window.location.reload();
            }
            else{
                console.log(response);
            }
        }
    });
}