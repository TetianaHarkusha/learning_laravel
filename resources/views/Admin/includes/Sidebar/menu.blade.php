<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
    <a href="{{route('dashboard.main')}}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>{{ __('Main page') }}</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>{{  __('Users') }}
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="#" class="nav-link">
            <p>{{ __('List') }} {{ __('of users')}}</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link">
            <p>{{ __('List') }} {{ __('of admins')}}</p>
        </a>
        </li>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link">
            <p>{{ __('Create') }} </p>
        </a>
        </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>{{ __('Posts') }}
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{route('dashboard.posts.index')}}" class="nav-link">
            <p>{{ __('View') }} {{ __('all') }}</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{route('dashboard.posts.create')}}" class="nav-link">
            <p>{{ __('Create') }}</p>
        </a>
        </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="{{route('main')}}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>{{ __('Go to site') }}</p>
    </a>
    </li>
</ul>
</nav>