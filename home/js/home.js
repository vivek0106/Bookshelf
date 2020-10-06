$(document).ready(function(){  
    $(".recNxt").click(function(){
        console.log("recNxt clicked")
        var w = $(".recomItem").width()
        var scr=$(".recomItem").scrollLeft() 
        $(".recomItem").animate({
            scrollLeft: scr+w
        },200);
    });
    $(".recPre").click(function(){
        console.log("recPre clicked")
        var w = $(".recomItem").width()
        var scr=$(".recomItem").scrollLeft() 
        $(".recomItem").animate({
            scrollLeft: scr-w
        },200);
    });
    $(".genNxt").click(function(){
        console.log("genNxt clicked")
        var w = $(".genreItem").width()
        var scr=$(".genreItemWrapper").scrollLeft()
        $(".genreItemWrapper").animate({
            scrollLeft: scr+w*2
        },200);
    });

    $(".genPre").click(function(){
        console.log("genpre clicked")
        var w = $(".genreItem").width()
        var scr=$(".genreItemWrapper").scrollLeft()
        $(".genreItemWrapper").animate({
            scrollLeft: scr-w*2
        },200);
    });
    $(".serNxt").click(function(){
        console.log("serNxt clicked")
        var w = $(".seriesItem").width()
        var scr=$(".seriesItemWrapper").scrollLeft()
        $(".seriesItemWrapper").animate({
            scrollLeft: scr+w*2
        },200);
    });

    $(".serPre").click(function(){
        console.log("serpre clicked")
        var w = $(".seriesItem").width()
        var scr=$(".seriesItemWrapper").scrollLeft()
        $(".seriesItemWrapper").animate({
            scrollLeft: scr-w*2
        },200);
    });
});

