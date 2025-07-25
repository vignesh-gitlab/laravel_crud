<x-layout title="Home Page" pageTitle="Home">
    <!-- <div class="container" style="margin-top: 10px;">
        <a href="{{ url('/') }}" class="btn btn-warning {{ Request::is('/') ? 'active' : '' }}">Home</a>
        <a href="{{ url('/contact') }}" class="btn btn-warning {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
        <a href="{{ url('/about') }}" class="btn btn-warning {{ Request::is('about') ? 'active' : '' }}">About</a>
    </div> -->
    <div style="text-align: center;">
        <h2>This is home page.</h2>
    </div>
</x-layout>