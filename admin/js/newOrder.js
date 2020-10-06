function accept(orderID){
    console.log("accept clicked");
    $.ajax({
        url:"newOrdersInc/acceptOrder.php",
        type:"POST",
        data:{
            orderID: orderID,
            checkBtn:true
        },
        success:function(response){
            console.log(response);
            if(response==1){
                getNewOrders();
            }
        }
    });
}
function ship(orderID){
    console.log("ship clicked");
    $.ajax({
        url:"newOrdersInc/shipOrders.php",
        type:"POST",
        data:{
            orderID: orderID,
            shipBtn:true
        },
        success:function(response){
            console.log(response);
            if(response==1){
                getApprovedOrders();
            }
        }
    });
}
function sendForDelivery(orderID){
    console.log("pending clicked");
    $.ajax({
        url:"newOrdersInc/pendingOrders.php",
        type:"POST",
        data:{
            orderID: orderID,
            pendingBtn:true
        },
        success:function(response){
            console.log(response);
            if(response==1){
                getShippedOrders();
            }
        }
    });
}
function deliver(orderID){
    console.log("deliver clicked");
    $.ajax({
        url:"newOrdersInc/deliverOrders.php",
        type:"POST",
        data:{
            orderID: orderID,
            deliverBtn:true
        },
        success:function(response){
            console.log(response);
            if(response==1){
                getPendingOrders();
            }
        }
    });
}

function getNewOrders(){
    $.ajax({
        url:"newOrdersInc/getNewOrders.php",
        type:"POST",
        data:{
            newOrdersBtn:true
        },
        success:function(response){
            console.log(response);
            $("#newOrdersBody").html(response);
        }
    })
}
function getApprovedOrders(){
    $.ajax({
        url:"newOrdersInc/getApprovedOrders.php",
        type:"POST",
        data:{
            approvedOrdersBtn:true,
        },
        success:function(response){
            console.log(response);
            $("#approvedOrdersBody").html(response);
        }
    })
}
function getShippedOrders(){
    $.ajax({
        url:"newOrdersInc/getShippedOrders.php",
        type:"POST",
        data:{
            shippedOrdersBtn:true,
        },
        success:function(response){
            console.log(response);
            $("#shippedOrdersBody").html(response);
        }
    })
}
function getPendingOrders(){
    $.ajax({
        url:"newOrdersInc/getPendingOrders.php",
        type:"POST",
        data:{
            pendingOrdersBtn:true,
        },
        success:function(response){
            console.log(response);
            $("#pendingOrdersBody").html(response);
        }
    })
}

function getDeliveredOrders(){
    $.ajax({
        url:"newOrdersInc/getDeliveredOrders.php",
        type:"POST",
        data:{
            deliveredOrdersBtn:true,
        },
        success:function(response){
            console.log(response);
            $("#deliveredOrdersBody").html(response);
        }
    })
}
function getCancelledOrders(){
    $.ajax({
        url:"newOrdersInc/getCancelledOrders.php",
        type:"POST",
        data:{
            cancelledOrdersBtn:true,
        },
        success:function(response){
            console.log(response);
            $("#cancelledOrdersBody").html(response);
        }
    })
}

function cancel(orderID){
    $.ajax({
        url:"newOrdersInc/cancelOrders.php",
        type:"POST",
        data:{
            cancelBtn:true,
            orderID:orderID
        },
        success:function(response){
            console.log(response);
            if(response==1){
                alert("Order Cancelled");
                 window.location.reload();
            }
        }
    })
}