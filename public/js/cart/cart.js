 //    // ------------------------------------------------------- //
 //    //   Increase/Decrease product amount
 //    // ------------------------------------------------------ //



 // {-- -var itemPrice = $('#itemPrice{{$order_id[$i]}}').html();
                                                                                   //  var quantity = parseInt($('#quantity{{$order_id[$i]}}').val(), 10);
                                                                                   //  var newTotal = itemPrice * quantity;

                                                                                   //  $('#totalItemPrice{{$order_id[$i]}}').html(newTotal);
                                                                                   //  $('#subtotal{{$shop_id}}').html(newTotal);
                                                                                   //  $('#total{{$shop_id}}').html(newTotal);
 // $(document).ready(function(){
 //        identifierReset();
 //        calcTotal();
 //    });
 //    function identifierReset(){
 //        $(".totalItemPrice").each(function(i){
 //            $(this).attr('id', 'totalPrice' + i);
 //        });
 //        $(".input-items").each(function(i){
 //            $(this).attr('id', 'input-items'+i);
 //        });
 //        $(".btn-items-decrease").each(function(i){
 //            $(this).attr('id', '.btn-items-decrease'+i);
 //        });
 //        $(".btn-items-increase").each(function(i){
 //            $(this).attr('id', '.btn-items-increase'+i);
 //        });
 //        $(".itemPrice").each(function(i){
 //            // add class ex with the index
 //            // this is the element we are pointing at so a div
 //            $(this).addClass("itemPrice" + i);
 //            var price = parseInt($('.itemPrice'+i).html());
 //            var priceMultiplier = $('input[type="text"]#input-items'+i);
 //            var priceMultiplierValue = parseInt(priceMultiplier.val(), 10);
 //            $('#totalPrice'+i).html(price*priceMultiplierValue);
 //        });
 //    }




 //    function calcTotal() {
 //        identifierReset();
 //        var subTotal = 0;
 //        $('.totalItemPrice').each(function(i){
 //            subTotal +=  parseInt($('#totalPrice'+i).html(), 10);
 //        });
 //        $('#subtotal').html(subTotal);
 //        $('#total').html(subTotal);
 //      }
 //    $('.btn-items-decrease').on('click', function () {
 //        identifierReset();
 //        var input = $(this).siblings('.input-items');
 //        if (parseInt(input.val(), 10) >= 1) {
 //            input.val(parseInt(input.val(), 10) - 1);
 //            var priceMultiplierValue = parseInt(input.val());
 //            var i = $(this).attr("id").slice(-1);
 //            var itemPriceId = $('.itemPrice' + i);
 //            var price = parseInt($(itemPriceId).html(), 10);
 //            totalPrice = $('#totalPrice'+i).html(price*priceMultiplierValue);
 //        }
 //        calcTotal();
 //    });
 //    $('.btn-items-increase').on('click', function () {
 //        identifierReset();
 //        var input = $(this).siblings('.input-items');
 //        input.val(parseInt(input.val(), 10) + 1);
 //        var priceMultiplierValue = parseInt(input.val());
 //            var i = $(this).attr("id").slice(-1);
 //            var itemPriceId = $('.itemPrice' + i);
 //            var price = parseInt($(itemPriceId).html(), 10);
 //            $('#totalPrice'+i).html(price*priceMultiplierValue);
 //            calcTotal();
 //    });
 //    // ------------------------------------------------------- //
 //    //   Remove cart item
 //    // ------------------------------------------------------ //
 //    $('.cart-remove').on('click', function () {
 //        $(this).closest('.cart-item').remove();
 //        identifierReset();
 //        calcTotal();
 //    });















    $('.btn-items-decrease').on('click', function () {
        var input = $(this).siblings('.input-items');
        if (parseInt(input.val(), 10) >= 1) {
            input.val(parseInt(input.val(), 10) - 1);
        }
    });

    $('.btn-items-increase').on('click', function () {
        var input = $(this).siblings('.input-items');
        input.val(parseInt(input.val(), 10) + 1);
    });

    // ------------------------------------------------------- //
    //   Remove cart item
    // ------------------------------------------------------ //

    $('.cart-remove').on('click', function () {
        $(this).closest('.cart-item').remove();
    });