<div class="header">
    <span class="color-bar"></span>
    <nav class="nav-bar">
        <div class="logo-container"><span class="logo">≤</span>&nbsp;<span>The Goods Place</span></div>
        &nbsp;
        &nbsp;
        |
        &nbsp;
        &nbsp;
        <a href="/">Home</a>
        &nbsp;
        &nbsp;
        |
        &nbsp;
        &nbsp;
        @guest
        <a href="/login">Login</a>
        @endguest
        @auth
        <a href="/logout">Logout</a>
        @endauth
        &nbsp;
        &nbsp;
        @auth
        |
        &nbsp;
        &nbsp;
        <a href="/?author={{ auth()->user()->username }}">Your Advertisements</a>
        &nbsp;
        &nbsp;
        @endauth
        |
        &nbsp;
        &nbsp;
        <a class="ad-btn" href="/post">Place Advertisement</a>
    </nav>
</div>