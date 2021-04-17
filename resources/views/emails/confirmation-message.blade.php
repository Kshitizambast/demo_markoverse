@component('mail::message')
# Payment Received

Hey {{$shop->owner->name}},
<br>
<h5>
	We Received Your Payment. You Confirmation Code is "<code>{{$code}}</code>",
	This money does not belong to us. It's for the investors who works real hard to maximize your profit. We hope you will maintain this relationship
</h5>, Thanks

@component('mail::button', ['url' => 'https://markoverse.com/shoplogin'])
Go To Shoplogin
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent