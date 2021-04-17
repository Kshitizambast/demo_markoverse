@component('mail::message')
# Introduction

Hi {{$user->name}},
We are celebrating festivel of love. We bring new gifts and discount
in nearby shops. Join the luckey draw and get a chance to win celebration
pass from Markoverse

@component('mail::button', ['url' => 'https://www.markoverse.com/public'])
Explore Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
