@extends('layouts.app')
@section('content')
@section('content')

<div class="row">
                    <div class="col-md-6 offset-3 col-md-offset-6">
                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> {{ $message }}
                            </div>
                        @endif
                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Success!</strong> {{ $message }}
                            </div>
                        @endif
                   
                        <div class="card card-default">
                            <div class="card-header">
                                Razorpay: Payment
                            </div>

                            <div class="card-body text-center">
                                <form action="{{ route('payment') }}" method="POST" >
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZOR_KEY') }}"
                                            data-amount="1000"
                                            data-buttontext="Pay 1 INR"
                                            data-name="Markoverse"
                                            data-description="Rezorpay"
                    
                                            data-prefill.name="{{auth()->user()->id}}"
                                            data-prefill.email="{{auth()->user()->email}}"
                                            data-theme.color="#010204">
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

@endesction