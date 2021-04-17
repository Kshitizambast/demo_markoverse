
// For SCROLLABLE element slide controls

$(".slide_control-overlaybtn-right").click(function () {
    var ctrl_id = $(this).attr('id');
    var control = ctrl_id.slice(6);
    var slide_id = control + "_slide";   
    var $elem=$('#'+ slide_id); 
    var width=$elem.width()-10;        
    document.getElementById(slide_id).scrollLeft += width;
});

$(".slide_control-overlaybtn-left").click(function () {
    var ctrl_id = $(this).attr('id');
    var control = ctrl_id.slice(6);
    var slide_id = control + "_slide";          
    var $elem=$('#'+ slide_id); 
    var width=$elem.width()-100;    
    document.getElementById(slide_id).scrollLeft -= width;
});

$('.scrollHandle').scroll( function() {
    var $elem='#' + $(this).attr('id');
    console.log($elem);
    var newScrollLeft = $($elem).scrollLeft(),
        width=$($elem).width(),
        scrollWidth=$($elem).get(0).scrollWidth;
        var controlLeft = '.' + $(this).attr('id') + '_control-left';
        var controlRight = '.' + $(this).attr('id') + '_control-right';
        $(controlLeft).css( "visibility", "visible" );
        $(controlRight).css( "visibility", "visible" );
    if (scrollWidth- newScrollLeft-width<=0.9) {
        $(controlRight).css( "visibility", "hidden" );                                                   
    }
    if(newScrollLeft==0){
        $(controlLeft).css( "visibility", "hidden" );         
    }
});


// //////////////////////////////// Ends

