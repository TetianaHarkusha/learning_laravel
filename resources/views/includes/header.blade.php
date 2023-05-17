<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
    </div>
    
    <x-menu class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <x-slot:li></x-slot:li>
        <x-slot:a class="nav-link px-2">link-secondary</x-slot:a>
    </x-menu>

    @if (Auth::check())
        <div class="col-md-3 text-end">
            <span class="user">{{Auth::user()->login}}</span>
            <a href="{{ route('logout') }}" class="btn btn-primary" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    @else
        <div class="col-md-3 text-end">
            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2" role="button">{{ __('Login') }}</a>
            <a href="{{ route('register') }}" class="btn btn-primary" role="button">{{ __('Register') }}</a>
        </div>
    @endif
</header>