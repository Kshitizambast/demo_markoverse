resizeLogic(); // on load
        $(window).resize(resizeLogic); // on window resize


        function resizeLogic() {
            var cw = $('.modal-dialog').css('max-width');

            console.log(cw);
            
            $('.modal-content').css({'height':cw});
        }

        $('.markoBoost').click(function(){
            if($( this ).hasClass( "toggled" )){
                $(this).removeClass("toggled");
                $(this).html("<i class='fas fa-rocket'></i> Boost");
            } else {
                $(this).addClass("toggled");
                $(this).html("<i class='fas fa-rocket'></i> Boosted");
            }
        });
		
		$('.markoDetails').click(function(){    
            $(this).closest("div.markoCards").find(".Ccoupon-extraOffer").css( "right", "0" );  
        });

        $('.Ccoupon-extraOfferHide').click(function(){
            $(this).closest("div.markoCards").find(".Ccoupon-extraOffer").css( "right", "-350px" );  
        });
