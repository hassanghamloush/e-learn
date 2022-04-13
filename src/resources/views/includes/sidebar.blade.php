


@php
    $userType = strtolower(Auth::user()->user_type);

    $teacherSideBar = [
        'dashboard' => [
            'icon'  => 'fas fa-home',
            'title' => 'Dashboard'
        ],
        'courses' => [
            'icon'  => 'fas fa-chalkboard-teacher',
            'title' => 'Courses'
        ],
        'routine' => [
            'icon'  => 'fas fa-calendar-alt',
            'title' => 'Routine'
        ],

        'attendance' => [
            'icon'  => 'fas fa-chalkboard-teacher',
            'title' => 'Attendence'
        ],
        'profile' => [
            'icon'  => 'fas fa-user',
            'title' => 'Profile'
        ],
        'logout' => [
            'icon'  => 'fas fa-sign-out-alt',
            'title' => 'Logout'
        ],
    ];
@endphp

<div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div>            		<img style="width: 50%" src="{{asset('img/site/yclogo.png')}}">

            </div>
        </div>



    <div class="sidebar-menu">
        <ul class="nav">
            @foreach($teacherSideBar as $key => $value)
               <a href="{{url($userType.'/'.$key)}}" page-title="{{$value['title']}}" title="{{$key}}">

                    <li id="sidebar_{{$key}}" class="{{ request()->is($userType.'/'.$key) ? 'active' : '' }}">
                        <div class="li-area">
                            <span class="{{$value['icon']}}"></span>
                            <span class="li-title">{{$value['title']}}</span>

                        </div>
                    </li>

                </a>
            @endforeach

        </ul>
    </div>
</div>

