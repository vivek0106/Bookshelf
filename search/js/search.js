function callProduct(id){
    window.location.href="../product/product.php?id="+id;
}
let filterUrl = "";
$(".filterByGenre,#filterByPrice").change(function(){
    filterUrl = "http://localhost/BookShelf/search/filter.php?filterByGenre=";
    console.log("checkbox changed");
    $(".filterByGenre").each(function(i,obj){
        if($(obj).is(":checked")){
            filterUrl += $(obj).val()+"-";
        }
        else{
            console.log("i= "+i+" not checked");
        }
    });
    filterUrl=filterUrl.substring(0,filterUrl.length-1);
    if($("#filterByPrice").val() >0){
        filterUrl+="&filterByPrice="+$("#filterByPrice").val();
    }
    console.log(filterUrl);
});

$("#filterProductForm").on('submit',function(e){
    e.preventDefault();
    $.ajax({
        url:filterUrl,
        type:"POST",
        data:{
            filter:true
        },
        success:function(response){
            $(".page").addClass("d-none");
            $(".bookList").html(response);
        }
    })
})

