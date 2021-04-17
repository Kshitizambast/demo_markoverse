<?php

//use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;

//use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Route;
use App\Events\OrderStatusChanged;
use App\Jobs\SendOpenShopEmail;
//use Illuminate\Support\Facades\Redis;
/*
|------#--------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/**
 * 
 */
// use App\Events;

Route::get('/test', function(){
		event(new OrderStatusChanged);

		return 'Job is done';
});

Route::post('/showorder/apply-coupon', 'CustomerProductController@applyCoupon');
Route::post('/showorder/order-place', 'CustomerProductController@placeOrder');
 





Route::get('/', 'PageController@index')->name('index');

Route::get('/public', 'PageController@index')->name('index');

Route::get('/home', 'PageController@index');
Route::get('/market', 'PageController@market');

Route::get('/about', 'PageController@about');

Route::get('/tools', 'PageController@tools');
Route::get('/wallet', 'PageController@wallet');
Route::get('/people', 'PageController@people');
Route::get('/trading', 'PageController@trading');
Route::get('/feed', 'PageController@feedback');
Route::post('/feed/save', 'PageController@storeFeedback')->name('user.feedback');

//Route::get('/openshop', 'PageController@openshop');
Route::get('/product_details/{id}', 'PageController@showWithOutLogin');
Route::get('/product_details/login/{id}', 'PageController@showWithLogin');
Route::get('/testcat', 'PageController@fashion');
// Route::post('user/{user}/shop', 'OwnerShopController@store')

//Route::get('/home', 'HomeController@index');
Route::get('/cards', 'CardController@index');
Route::get('/cards/json-out', 'CardController@jsonOut');

Route::get('/profile/{id}', 'UserProfileController@index')->name('profile');
Route::post('/user/upload-image', 'UserProfileController@storeImage')->name('user.upload_image');
Route::post('/user/{id}/edit-details', 'UserProfileController@update');
Route::post('user/{id}/change-password', 'UserProfileController@updatePassword');

####################__OPEN__SHOP__#############

Route::get('/firststage', 'CategorySelectorController@index');
Route::get('supercategory/{superCategory}', 'CategorySelectorController@subcategory');


Route::get('supercategory/subcategory/{subcategory}', 'RegisterShopController@openshop');


Route::get('shoplogin', 'ShopLoginController@showLoginForm')->name('shop.login.form');
Route::post('shoplogin', 'ShopLoginController@shopLogin')->name('shop.login');

Route::post('supercategory/subcategory/saveshop', 'RegisterShopController@store')->name('shop.register');
Route::post('dashboard/shopimages', 'OwnerShopController@saveShopImages')->name('shop.shop-image');
#####################__END__##########################


########******routes to the OWNERSHOPCONTROLLER*****#########


Route::get('/dashboard', 'OwnerShopController@index');
Route::get('dashboard/shop-profile/{id}', 'ShopProfileController@updateShopData');
Route::post('dashboard/change-password', 'ShopProfileController@updatePassword');
Route::post('dashboard/switch', 'ShopProfileController@closeShop');
//Route::post('dashboard/shop/{shop}/addproducts', 'OwnerShopController@addproducts');

Route::post('dashboard/saveproductimages/{id}', 'OwnerShopController@storeProductsImages')->name('shop.addproductimages');




Route::get('dashboard/addproducts', 'OwnerShopController@addproducts');
Route::post('dashboard/saveproduct', 'OwnerShopController@storeProducts')->name('shop.addproduct');
Route::get('dashboard/editproduct/{id}', 'OwnerShopController@editProduct')->name('editproduct');
Route::post('dashboard/editproduct/{id}', 'OwnerShopController@updateProduct')->name('shop.updateproduct');
Route::post('dashboard/delete', 'OwnerShopController@deleteProduct')->name('delete');
Route::get('dashboard/show_product_details/{id}', 'OwnerShopController@showProductsDetails');




Route::post('dashboard/buycard', 'OwnerShopController@buyCard')->name('shop.buycard');


Route::get('dashboard/products', 'OwnerShopController@showProducts')->name('shop.showproduct');
Route::get('dashboard/orders', 'OwnerShopController@orders');
Route::get('dashboard/customers', 'OwnerShopController@customersToShop');
Route::get('dashboard/commerce', 'OwnerShopController@showCommerce');

Route::get('dashboard/mycustomers', 'OwnerCustomerController@myCustomers');

Route::get('dashboard/cards', 'OwnerShopController@showCards');
Route::get('dashboard/owner/{owner}/shop/{shop}', 'OwnerShopController@show');
Route::patch('dashboard/owner/{owner}',  'OwnerShopController@update');

Route::post('dashboard/products/product_activity', 'OwnerShopController@changeProductActivity')->name('product.activity');
Route::get('dashboard/controlpannel', 'OwnerCustomerController@index');

Route::get('dashboard/images', 'OwnerShopController@showImages')->name('admin.pics');
Route::post('dashboard/images', 'OwnerShopController@removeImage')->name('admin.remove');
Route::post('dashboard/delete_product_image', 'OwnerShopController@removeProductImage')->name('admin.remove_product_image');

Route::get('dashboard/not-yet-calculated', 'OwnerCovalentController@yetToCalculate');

####################### PASSWORD RESET FOR SHOPS ############
Route::post('shop/password/email','Auth\ShopForgotPasswordController@sendResetLinkEmail')->name('shop.password.email');
Route::get('shop/password/reset','Auth\ShopForgotPasswordController@showLinkRequestForm')->name('shop.password.request');
Route::post('shop/password/reset','Auth\ShopResetPasswordController@reset');
Route::get('shop/password/reset/{token}','Auth\ShopResetPasswordController@showResetForm')->name('shop.password.reset');


Route::post('/dashboard/restart', 'OwnerCovalentController@restartServices')->name('restart.services');





###############*********END************#######################


#####################*****USERSHOPCOTROLLER*****######################
Route::get('/shops', 'UserShopController@index');

Route::get('shops/{shops}', 'UserShopController@show');

Route::get('user/{user}/shop/{shop}/follow', 'UserShopController@follow');

###############*********END************#######################

//USER___ORDER
Route::get('/showorder', 'UserOrderController@index')->name('show.order');
Route::post('removeOrder', 'UserOrderController@delete')->name('delete.order');


//USER___CARDS
Route::post('/card/add', 'UserCardController@customerLikes');
Route::get('investor/{investor}/card/{card}/add', 'UserCardController@investorLikes');
Route::get('cards/show', 'UserCardController@show');

//User-Cards.
//ADMIN___BUSSINESS
Route::get('/admin', 'AdminController@index');
Route::get('/admin/cards', 'AdminController@cards');
Route::get('/admin/shops', 'AdminController@shops');
Route::get('/admin/createcard', 'AdminController@createcard');
Route::get('/admin/investors', 'AdminController@investors');
Route::get('/admin/customers', 'AdminController@customer');
Route::get('/admin/products', 'AdminController@product');
Route::get('/admin/investor-requests', 'AdminController@investorMoneyReq');
Route::post('/admin/pay-to-investor', 'AdminController@payInvestors')->name('investor.paid');
Route::get('/admin/feedback', 'AdminController@feedback');
Route::get('/admin/shop-cash-management', 'AdminController@shopCashManagement');

Route::post('/admin/shop-cash-management/confirm-payment', 'AdminController@sendConfirmationCode')->name('shop.confirm-payment');


//BLOG____SECTION__BY___ADMIN
Route::get('/admin/blog-section', 'BlogPostController@index');
Route::post('/admin/blog-section/save', 'BlogPostController@store')->name('upload.blog');










//RANK____CARD
Route::get('/admin/card/{card}/rank', 'CardFunctionalityController@rank');

//INVESTOR____FUNCTIONALITY
Route::get('/invest', 'InvestmentFunctionalityController@index')->name('invest');
Route::post('/investin/{investor}/shop/{shop}/letmeinvest', 'InvestmentFunctionalityController@letMeInvest');
Route::get('/investhere', 'InvestmentFunctionalityController@shopToInvest');
Route::get('/investment-transaction', 'InvestmentFunctionalityController@investorTransaction');
Route::get('/investment-watchlist', 'InvestmentFunctionalityController@investorWatchlist');




//INVESTOR___TRANSACTION
Route::get('/invest/task', 'InvestmentFunctionalityController@viewTask')->name('share.task');
Route::post('/invest/send', 'InvestmentFunctionalityController@sendToBank')->name('request.investment.money');
Route::post('/invest/recharge', 'InvestmentFunctionalityController@rechargeCredit')->name('credit.recharge');


//INVESTMENT NAVIGATION
Route::get('/invest/shop-to-invest', 'InvestmentFunctionalityController@viewTask')->name('share.task');
Route::post('/invest/send', 'InvestmentFunctionalityController@sendToBank')->name('request.investment.money');
Route::post('/invest/recharge', 'InvestmentFunctionalityController@rechargeCredit')->name('credit.recharge');



//SELLING_PROCESS
Route::post('/product_details/login/{product}/addtobag/{customer}', 'CustomerProductController@main');
Route::post('/editbag', 'CustomerProductController@editRecord')->name('edit_my_bag');
Route::post('/delete_order', 'CustomerProductController@delete')->name('delete_my_product');

Route::get('dashboard/showCustomerOrders', 'OwnerCustomerController@showCustomerBag')->name('customer.orders');
Route::post('dashboard/payment_done', 'OwnerCustomerController@proceedPayment')->name('payment.done');
Route::post('dashboard/delte_by_shop', 'OwnerCustomerController@deleteOrder')->name('delete.byshop');



Route::get('/supercategory/subcategory/1/test', function(){
	return view('registerShop.test');
})->name('test.feature');

//USER_PRODUCT_REVIEW
Route::post('/review', 'UserProductController@storeReview')->name('product.review');
Route::post('/review/update', 'UserProductController@updateReview')->name('review.update');
Route::post('/review/delete', 'UserProductController@deleteReview')->name('review.delete'); 

//Search Section
Route::get('/search-index','SearchController@index');
Route::get('/search-index/search','SearchController@search');


//View All Section
Route::get('/view-shops/{category_id}', 'ViewAllController@shops');

Route::get('/view-products/{category_id}', 'ViewAllController@products');

#---------Auth----------#
Auth::routes();
Route::get('/sign-in/facebook', 'Auth\LoginController@facebook');
Route::get('/sign-in/facebook/redirect', 'Auth\LoginController@redirectFacebook');

#---------Payment-------#
Route::get('payment-razorpay', 'PaymentController@create')->name('paywithrazorpay');
Route::post('payment', 'PaymentController@payment')->name('payment');
Route::get('payment/save-card/customers', 'PaymentController@saveCard');

#---Home Page Reloading--#
Route::get('/category/{category_id}', 'PageController@categorySwitch');


/* PAY BILLS

*/

Route::get('/pay-bill', 'BillPaymentController@index');

Route::post('/pay-bill/search-merchants', 'BillPaymentController@fetchMerchants');

Route::post('/pay-bill/payment-with-razorpay', 'BillPaymentController@paymentFromRazorpay');

Route::post('/pay-bill/recently-paid', 'BillPaymentController@recentlyPaidShop');

Route::post('/pay-bill/payment-with-razorpay-confirmation', 'BillPaymentController@paymentFromRazorpayConfirmation');
