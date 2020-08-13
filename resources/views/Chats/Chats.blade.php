{{--@extends("layouts.app")--}}
{{--@section("content")--}}

{{--    <chats>dd</chats>--}}

{{--@endsection--}}
@extends('admin.masterAdmin')
@section('title')
    T-shirt D.L | Messages
@endsection

<style xmlns="http://www.w3.org/1999/html">
    .right .direct-chat-text {
        background: #f39c12;
        border-color: #f39c12;
        color: #fff;
        border-left-color: #f39c12;
    }
    .right .direct-chat-text:after, .right .direct-chat-text:before{
        right: auto;
        left: 100%;
        border-right-color: transparent;
        border-left-color: #f39c12;
    }
</style>
{{--<link href="{{ asset('css/appBootstrap.css') }}" rel="stylesheet">--}}

@section("head-admin")
    <style>
        .content-header{
            display: none;
        }
        .content, .container-fluid{
            padding-top: 0px;
        }
    </style>
    Messages
@endsection

@section('styleLinks')

@endsection

@section('messages')
    class="active"
@endsection

@section('body')

    <style>
        .right .direct-chat-text:after, .right .direct-chat-text:before{
            right: auto;
            left: 100%;
            border-right-color: transparent;
            border-left-color: #f39c12;
        }
    </style>


    <script src="{{ asset('js/app.js') }}" defer></script>

    <div id="app" class="">
        <chats :users="{{ $users }}" :auth_id="{{ auth()->user() }}" auth_name="{{auth()->user()->name}}"
               img="{{auth()->user()->img}}"

               :user="{{$user}}"

        ></chats>
    </div>

@endsection

@section('JSLinks')

@endsection


{{--<link href="{{ asset('css/appBootstrap.css') }}" rel="stylesheet">--}}
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}


{{--<div id="app" class="">--}}
{{--    <chats></chats>--}}
{{--</div>--}}
