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
    
    <div class="col-md-3 text-end btn-group">
        <form name="changelang" class="form me-2" action="{{ route('locale') }}" method="POST">
        @csrf
        <select onchange="document.changelang.submit()" name="lang" class="form-select" aria-label="Default select example">
            <option selected>{{ Str::upper(app()->getLocale()) }}</option>
            @foreach (Config::get('languages') as $lang => $language)
                @if ($lang != app()->getLocale())
                    <option value="{{ $lang }}">{{ Str::upper($lang) }}</option>
                @endif
            @endforeach
        </select>
        </form>
    @if (Auth::check())
        <a href="" class="btn btn-outline-primary me-2 disabled" role="button">{{ __(Auth::user()->login) }}</a>
        <a href="{{ route('logout') }}" class="btn btn-primary" 
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    @else
        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2" role="button">{{ __('Login') }}</a>
        <a href="{{ route('register') }}" class="btn btn-primary" role="button">{{ __('Register') }}</a>
    @endif
    </div>
</header>