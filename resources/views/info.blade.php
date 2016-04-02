@extends('layouts.app')
@section('section')
    <img src="{{  $userinfo->avatar }}" alt="">
@endsection

@section('content')

    <div class="container">
    	@if(session()->has('message'))
            <span class="text-success">{{ session('message') }}</span>
        @endif 
        @if(session()->has('error'))
            <span class="text-danger">{{ session('error') }}</span>
        @endif 
        <h1>Congralation! You are logged in!</h1>
    </div>
    <div class="container">
        <ul>
            <li>
                <a href="contact/import/google">Invite Friends</a>
            </li>

            <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=jobexir.com&display=popup"> share resume on fb</a>
            </li>
            <li>
                <a href="https://plus.google.com/share?url=http://www.jobexir.com" target="_blank">share resume on g+</a>
            </li>
        </ul>
    </div>

@endsection
