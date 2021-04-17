@component('mail::message')
# Reminder

Hey {{$shop->owner->name}},
<br>
Your 10 Days Will Be Over Tommorow, Your Shop {{$shop->shop_name}} Will Not Appear On The Markoverse To Invest Or For Shopping. Please <h5>Renew Your Acccount Tommorow</h5>, Thanks

@component('mail::button', ['url' => ''])
Pay Rs.500
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
