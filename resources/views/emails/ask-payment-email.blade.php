@component('mail::message')
# Shop Registration Complete

Hey {{$shop->owner->name}},
Your Shop Is Deactivated Now, Renew your account by paying Rs. {{$shop->shop_data->ammount_to_covalent}}.
Please Recharge Soon. Customers And Investors Are Waiting!.

@component('mail::button', ['url' => ''])
Pay Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
