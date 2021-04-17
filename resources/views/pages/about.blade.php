@extends('layouts.app')
@section('content')

<h2>Help Me!</h2>
<hr>
<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active" id="pills-shop-tab" data-toggle="tab" href="#pills-shop" role="tab" aria-controls="pills-shop" aria-selected="true"><i class="fas fa-store mr-2"></i>As Shop</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="pills-customer-help-tab" data-toggle="tab" href="#pills-customer-help" role="tab" aria-controls="pills-customer-help" aria-selected="false"><i class="far fa-grin mr-2"></i>As Customer</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="pills-photo-tab" data-toggle="tab" href="#pills-photo" role="tab" aria-controls="pills-photo" aria-selected="false"><i class="fas fa-info-circle mr-2"></i>As Investors</a>
	  </li>
</ul>

<div class="tab-content" id="myTabContent">

 <div class="tab-pane fade show active" id="pills-shop" role="tabpanel" aria-labelledby="pills-shop-tab">
	  	<h3>FAQ</h3>
	<p class="mb-0"><strong>Q.What is Markoverse?</strong></p>
	<p class="mt-1">Markoverse is a retail market ecosystem. In this platform we have shops(local shops), customers and investors. We connect customers and investors to the shop via cards. Cards are the coupons that has offers and gifts.</p>
	<hr>
	<p class="mb-0"><strong>Q.What problem it solves for shops?</strong></p>
	<p class="mt-1">We help you to understand your customers and the market. Unlike e-commerce you build your reputation and not of someone else. A good reputation in your market helps you to get famous in other markets and that is how you can grow the number of shops.</p>
	<hr>
	<p class="mb-0"><strong>Q.How it works</strong></p>
	<p class="mt-1">The cards that connect customers and investors to the shops have rank associated with them. The rank of card is based on the likes of customers and investors. Probability of getting the card active in some shop depends on the rank of cards.</p>
	<hr>
	<p class="mb-0"><strong>Q.What I get?</strong></p>
	<p class="mt-1">You get a dashboard with multiple features. You get very easy selling process. Just open the control panel in customer tab and enter the customer’s email. See what he bought, take the money, click done. </p>
	<hr>
	<p class="mb-0"><strong>Q.How to open shop on markoverse?</strong></p>
	<p class="mt-1">Just signup as user then click the “sell” link. Choose the category and fill the form. Enter some products and then apply card. Wait for the investors to invest and your shop is online.</p>
	<hr>
	<p class="mb-0"><strong>Q.How cards help the shops?</strong></p>
	<p class="mt-1">Cards are nothing but the coupons and gifts combined. Cards are ranked by the likes of customers and investors. You choose the card of highest rank and apply it. Now the customers and investors get notification about your shop. Customers buy the products and investors spread the words. </p>
	<hr>
	<p class="mb-0"><strong>Q.Why investors matter?</strong></p>
	<p class="mt-1">
		Investors are the users that put some money on you and try to maximize their profit by maximizing your profit. They choose the cards that shows more profit than the cards chosen by customers. They spread the word about your shop on social media so that you can sell large. They are your well-wisher.
	</p>

</div>

<div class="tab-pane fade" id="pills-customer-help" role="tabpanel" aria-labelledby="pills-customer-help-tab">
	<h3>FAQ</h3>
	<hr>
	<p class="mb-0"><strong>Q.What do markoverse offers?</strong></p>
	<p class="mt-1">Markoverse provides an opportunity for you to choose your own deal for your daily shops. Choose the deal you want, try to rank it up by sharing it with your friends and shops with different categories will choose the deal. The deal will be active for 9 days maximum.
</p>
	<hr>

	<p class="mb-0"><strong>Q.How to choose the cards?</strong></p>
	<p class="mt-1">Click the like button in the cards you want. Ranges are there that show minimum and maximum purchases. After some time we will add reward points and gifts for you in the card. Help the shops to get the deal suited for you. Enjoy the local market in a new way.</p>
	<hr>
	<p class="mb-0"><strong>Q.How to purchase on markoverse?
	</strong></p>
	<p class="mt-1">It’s very easy. Choose the product, click “Add to cart” to put it in your cart and go to the shop. Tell the seller your email. He/She will click “Deal Done” to complete the selling process. </p>
	<hr>
	<p class="mb-0"><strong>Q.Why Should I buy with markoverse?
	</strong></p>
	<p class="mt-1">If you buy using “markoverse” you are not just the customer of the shop but also become the customer of “markoverse”. Being the customer of us you get additional gifts and rewards from us. On the other hand your every purchase helps investors to earn money and helps the shop to get  reputation points. </p>
	<hr>
	<p class="mb-0"><strong>Q.How can I help markoverse?
	</strong></p>
	<p class="mt-1">Just help yourself by sharing your experience with your friends and insist the seller beside you join markoverse. We highly recommend you to invest in the shops. If you have any problem using it just provide the feedback with us.
</p>
	<hr>
	<p class="mb-0"><strong>Q.What is the vision of markoverse?

	</strong></p>
	<p class="mt-1">JThere is no substitute for the relationship between a seller and customer. We are trying to make an ecosystem where this relationship blossoms. By card we try to connect customers/investors with shops. On the other hand, as investors you can understand the market of your town and utilise it to earn money. We hope you enjoy the new innovative system for local markets. Feel free to provide feedback.
</p>
	<hr>
</div>
<div class="tab-pane fade" id="pills-photo" role="tabpanel" aria-labelledby="pills-photo-tab">
	<h3>FAQ</h3>
	<hr>
	<p class="mb-0"><strong>Q.Who are investors?
    </strong></p>
	<p class="mt-1">Investors are the people who try to earn some money by investing in shops nearby. They put some money and try to maximize the profit of the shop and at the end of the 10 days they get what they earn.
    </p>
	<hr>

	<p class="mb-0"><strong>Q.What problem does it solves for investors?
    </strong></p>
	<p class="mt-1">Having some money always in your packet is indeed an advantage. With money comes freedom. “Markoverse” consider the investors  a very important part. On the other hand as we grow you grow with us. This is the first step in investment for you but we will make sure it won’t be your last.
    </p>
	<hr>

	<p class="mb-0"><strong>Q.How investment works?
    </strong></p>
	<p class="mt-1">For every shop we give you the amount you  can invest. You try to increase the profit of the shop by advertising them on social media or by any means. Their profit is your profit.
    </p>
	<hr>

	<p class="mb-0"><strong>Q.How to invest?
    </strong></p>
	<p class="mt-1">After you sign up you get the credit of Rs.100. This amount is only for investment. After 10 days you get your earnings. You can recharge your credit only with your earnings
    </p>
	<hr>

	<p class="mb-0"><strong>Q.How to help Shops?
    </strong></p>
	<p class="mt-1">Choose the cards that are profitable for shops. Shops need you to balance the rank of card. Consider the shop you have invested as your asset. Invest the amount associated with the shop. You then share the templates of shops on social media or in any way try to increase the profit of the shop. At the end of the 10 days you get what you earn.
    </p>
	<hr>

	<p class="mb-0"><strong>Q.How Investors help to balance the card?
    </strong></p>
	<p class="mt-1">There are cards which literally are the deals users choose for the shops. As a customer chooses the card that shows maximum discount, an investor chooses the card that is profitable for shops. We rank the cards based on the likes of both. 
    </p>
	<hr>

	<p class="mb-0"><strong>Q.How to get my money?
    </strong></p>
	<p class="mt-1">In Earning section you have “send to bank” option click it and we will give you the money in 2 to 3 hrs.
    </p>
	<hr>
	
	<p class="mb-0"><strong>Q.How to recharge my credit?
    </strong></p>
	<p class="mt-1">For the time being you can only recharge with your earnings. In the future we will provide a more advanced recharge system.

    </p>
	<hr>
	<p class="mb-0"><strong>Q.Why there is a limit in earnings and in payable amount?
    </strong></p>
	<p class="mt-1">There is a limit in earning and in payable amount because we want your investor account to be running all the time. If you have less than the minimum you can not invest in any shop.
    </p>
	<hr>

</div>

</div>

@endsection