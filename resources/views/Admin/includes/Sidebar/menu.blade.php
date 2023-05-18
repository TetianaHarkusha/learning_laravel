<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
    <a href="{{route('dashboard.main')}}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Головна сторінка</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
        Користувачі
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="#" class="nav-link">
            <p>Список користувачів</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link">
            <p>Список адмінів</p>
        </a>
        </li>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link">
            <p>Створити нового</p>
        </a>
        </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>
        Публікації
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{route('dashboard.posts.index')}}" class="nav-link">
            <p>Переглянути всі</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{route('dashboard.posts.create')}}" class="nav-link">
            <p>Створити нову</p>
        </a>
        </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="{{route('main')}}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Головна сторінка сайту</p>
    </a>
    </li>
</ul>
</nav>