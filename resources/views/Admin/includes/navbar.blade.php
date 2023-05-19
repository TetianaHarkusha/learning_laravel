<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard.main')}}" class="nav-link">Головна</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form name="changelang" action="{{ route('locale') }}" method="POST">
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
      </li>
    </ul>
</nav>