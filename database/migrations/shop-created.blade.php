@component('mail::message')
# Shop Registration Complete

Hey {{$shop->owner->name}},
Welcome To Markoverse.
You Have Registered Your Shop '{{$shop->shop_name}}' Successfully.

@component('mail::button', ['url' => 'https://markoverse.com/dashboard'])
Visit Shop
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
