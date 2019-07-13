<!-- Fixed navbar -->
<nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
    <a class="navbar-brand" href="#">KSS-Lab</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">ホーム<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('forum.index') }}">掲示板</a>
            </li>

        </ul>
        @guest
            <a class="btn btn-outline-light mx-1" href="{{ route('login') }}">{{ __('auth.login') }}</a>
            @if (Route::has('register'))
                <a class="btn btn-outline-light mx-1" href="{{ route('register') }}">{{ __('auth.register') }}</a>
            @endif
        @else
            <a class="btn btn-outline-light mx-1" href="{{ route('account.show',['account'=>\Illuminate\Support\Facades\Auth::user()->public_id]) }}">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
            <a class="btn btn-outline-light mx-1" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                {{ __('auth.logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </div>
</nav>
