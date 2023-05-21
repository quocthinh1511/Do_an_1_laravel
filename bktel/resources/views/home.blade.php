@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
<template>


<nav-bar-component></nav-bar-component>
<dashboard-component  :name_cus="{{ json_encode($name_cus) }}"
    :age="{{ json_encode($age) }}"
:gender="{{ json_encode($gender) }}"></dashboard-component>

<!-- <home-component></home-component> -->
<side-bar-component></side-bar-component> 
<footer-component></footer-component>
</template>




@endsection
