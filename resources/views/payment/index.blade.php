@extends('layouts.app')

@section('content')
<div>
	<pay-bill user-name='{{auth()->user()->username}}' user-email='{{auth()->user()->email}}' user-contact='8670714909'></pay-bill>
</div>

@endsection