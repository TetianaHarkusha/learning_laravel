<div class="user-panel mt-3 mb-3">
    <div class="d-flex">
        <div class="image">
            <img src="/Admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{route('dashboard.main')}}" class="d-block">{{Auth::user()->user->name}}<br>login: {{Auth::user()->login}}</a>
        </div>
    </div>
    <!--Section for information from the session -->
    <div class="info d-flex flex-column">
        <div class="count">Відвідини сторінки - {{session('count')}} раз</div>
        <div class="time">Час першого входу - {{session('time')}}</div>
    </div>  
    <!--/section -->
</div> 
