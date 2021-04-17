@component('mail::message')
# Introduction

Hey {{$shop->owner->name}}!

The Activated Card In Your Shop '{{$shop->shop_name}}' Is Now Expired In Your Shop. Please Buy New One.
It's Free.

@component('mail::button', ['url' => ''])
See Cards
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
