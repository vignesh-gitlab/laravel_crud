<header style="background: #f2f2f2; padding: 10px; text-align:center;">
    <h2>{{ $pageTitle}}</h2>
</header>
<div class="container" style="margin-top: 10px;">
    <a href="{{ url('/') }}" class="btn btn-warning {{ Request::is('/') ? 'active' : '' }}">Home</a>
    <a href="{{ url('/contact') }}" class="btn btn-warning {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
    <a href="{{ url('/about') }}" class="btn btn-warning {{ Request::is('about') ? 'active' : '' }}">About</a>
</div>