<div class="row">
    <div class="col-sm-12">
        <img src="{{asset('images/banner-top.jpg')}}" width="99%">
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <ul class="home-menu">
            <li class="@if(Route::currentRouteName() == 'home.index' || Route::currentRouteName() == 'homehome' || Route::currentRouteName() == 'editpatient.edit' || Route::currentRouteName() == 'view.data') active @endif"><a href="{{route('home.index')}}">ការធ្វើអត្តសញ្ញាណកម្ម</a></li>
            <li class="@if(Route::currentRouteName() == 'report.index') active @endif"><a href="{{route('report.index')}}">របាយការណ៍</a></li>
           @permission('user-list','user-create','user-edit','user-delete')
            <li class="@if(Route::currentRouteName() == 'user.index' || Route::currentRouteName() == 'user.create' || Route::currentRouteName() == 'user.edit') active @endif"><a href="{{route('user.index')}}">គ្រប់គ្រងអ្នកប្រើប្រាស់</a></li>
            @endpermission
            @permission('role-list','role-create','role-edit','role-delete')
            <li class="@if(Route::currentRouteName() == 'role.index' || Route::currentRouteName() == 'role.create' || Route::currentRouteName() == 'role.edit') active @endif"><a href="{{route('role.index')}}">គ្រប់គ្រងតួនាទី</a></li>
            @endpermission
        </ul>
    </div>
</div>