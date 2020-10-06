function addToCart(bookID,buy){
    $.ajax({
        url:"http://localhost/BookShelf/cart/addToCart.php",
        type:"POST",
        data:{
            bookID:bookID,
            cartBtn:true
        },
        success:function(response){
            console.log(response);
            if(response == 1){
            //    alert("Product added to your cart"); 
               getCartCount();
               if(buy == true){
                   window.location.href = "../cart/"
               }
            }
            else if(response == 2){
                alert("Product already exists in your cart");
                if(buy == true){
                    window.location.href = "../cart/"
                }
            }
            else{

            }
        }
    })
}
$(document).ready(function(){
    getCartCount();
    
    updateTotal();
});
function getCartCount(){
    $.ajax({
        url:"http://localhost/BookShelf/cart/getCartCount.php",
        type:"POST",
        data:{
            getCartCount:true
        },
        success:function(response){
            // console.log(response);
            if(response > 0){
                console.log(response);
                $(".cartBadge").html(response);
            }
            else{
                console.log("Error");
            }
        }
    })
}

$(".fa-minus-circle").click(function(){
    var qty = $(this).next().val();
    if(qty>0){
        $(this).next().val(--qty);
    }
});


$(".fa-plus-circle").click(function(){
    console.log("plus clicked")
    var qty = $(this).prev().val();
    $(this).prev().val(++qty);
});
function removeFromCart(bookID){
    $.ajax({
        url:"removeFromCart.php",
        type:"post",
        data:{
            bookID:bookID,
            removeBtn:true
        },
        success:function(response){
            console.log(response);
            if(response==1){
                window.location.reload();
            }
            else{
                alert("some error occured");
            }
        }
    })
}
$(".qty").change(function(){
   
    $(".qty").each(function(i,obj){
       /// console.log(i+":--"+$(obj).val());
        
        document.getElementsByClassName("checkoutQty")[i].innerHTML=$(obj).val();
        document.getElementsByClassName("total")[i].innerHTML =  Number(document.getElementsByClassName("checkoutPrice")[i].innerHTML)*Number(document.getElementsByClassName("checkoutQty")[i].innerHTML);
        updateTotal();
        $.ajax({
            url:"updateDbQty.php",
            type:"POST",
            data:{
                qty:$(obj).val(),
                pid:$(obj).attr("id")
            },
            success:function(response){
                if(response == 1){
                    console.log("Qty in db updated");
                }
                else{
                    console.log(response);
                }
            }
        });

    });


});
function updateDbQty(pd){
  
}
function updateTotal(){
    $(".qty").each(function(i,obj){
        //console.log(i+":--"+$(obj).val());
        document.getElementsByClassName("checkoutQty")[i].innerHTML=$(obj).val();
        document.getElementsByClassName("total")[i].innerHTML =  Number(document.getElementsByClassName("checkoutPrice")[i].innerHTML)*Number(document.getElementsByClassName("checkoutQty")[i].innerHTML);
    });
    var total=0;
    $(".total").each(function(i,obj){
       // console.log(i+":--"+$(obj).val());
        total += Number($(obj).text());
    });
    $(".cartAmt").html(total);
    $("#hiddenTotalAmt").val($(".cartAmt").text());
}
$("#paymentMode").change(function(){
    console.log("mode changed");
    $("#hiddenTotalAmt").val($(".cartAmt").text());
    if($("#paymentMode").val() == "COD"){
        $(".placeOrderBtn").removeClass("d-none");
        $(".payNowBtn").addClass("d-none");
    }
    else{
        $(".placeOrderBtn").addClass("d-none");
        $(".payNowBtn").removeClass("d-none");
    }
});

function placeOrder(){
    var formData = new FormData();
        formData.append("orderPlaced",true);
        formData.append("paymentDetails",true);
        formData.append("uid",getCookie("bookshelfUserID"));
        formData.append("totalAmt",Number($(".cartAmt").text()));        
    if($("#paymentMode").val()=="COD"){
        formData.append("paymentMode","COD");
        $.ajax({
            url:"../orders/placeOrder.php",
            type:"POST",
            processData: false,
            contentType: false,
            data:formData,
            success:function(response){
                console.log(response);
                if(response == 1){
                    window.location.href = "../orders/index.php"
                }
                else{
                    alert("Failed to place order. Please try again later")
                }
            }
        });
    }
    else if($("#paymentMode").val()=="Online"){
        formData.append("paymentMode","Online");
        $.ajax({
            url:"../orders/pay.php",
            type:"POST",
            processData: false,
            contentType: false,
            data:formData,
            success:function(response){
                console.log(response);
                if(response == 1){
                    window.location.href = "../razorpay/pay.php";
                }
                else{
                    alert("Failed to place order. Please try again later")
                }
            }
        });
    }
    else{
        
    }
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }