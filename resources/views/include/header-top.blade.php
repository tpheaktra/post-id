@auth
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto pull-right">
        <?php $profile = auth::user()->profile; ?>
        <li><a class="nav-link">Hi, {{ Auth::user()->name ? Auth::user()->name : 'Your Name' }}  </a> </li>
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <b>មន្ទីពេទ្យ</b>  - <span>{{$show_base}}</span>
                </a>
                <ul class="dropdown-menu arror-profile">
                    <div class="arrow-border"></div>
                    <li>
                        <ul class="menu">
                           @foreach ($getAllBase as $key => $hosp)
                                <li style="cursor: pointer"><span data-name="{{$hosp->hospital_id}}" class="submit_value">មន្ទីពេទ្យ - {{ $hosp->name_kh  }}</span> </li>
                           @endforeach
                        </ul>
                    </li>
                    <script>
                        $('.menu li span').on('click', function(){
                            var hospId = $(this).attr('data-name');
                            var url = "{{url('/patient/interview/change/base/')}}/"+hospId;
                            window.location = url;
                        })
                    </script>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="user-avatar">
                        <img src="{{ asset ('upload/'.$profile) }}" class="img-profile-header img-circle">
                    </span>
                    <span class="user-name">Profile</span>
                    <b class="caret"></b>
                </a>

            <ul class="dropdown-menu arror-profile">
                <div class="arrow-border"></div>
                <li>
                    <div class="navbar-content">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset ('upload/'.$profile) }}" class="img-responsive" width="120px" height="120px" />
                                </br>
                            </div>
                            <div class="col-md-7">
                                <span style="text-transform: capitalize;">{{ Auth::user()->name ? Auth::user()->name : 'Your Name' }}</span>
                                <p style="font-size: 11px; line-height: 0; font-style: italic;">{{ Auth::user()->email ? Auth::user()->email : 'your@gmail.com' }}</p>
                                <a href="{{route('profile.index')}}" class="btn btn-default btn-sm"><i class="fa fa-cogs" aria-hidden="true"></i> ព័ត៌មានប្រវត្តិរូប</a>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-footer security">
                        <div class="navbar-footer-content">
                            <div class="">
                                <div class="col-md-6">
                                    <a href="{{route('profile.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-unlock-alt" aria-hidden="true"></i> &nbsp;  សុវត្ថិភាពគណនី</a>
                                </div>
                                <div class="col-md-6">
                                    <a class="dropdown-item btn btn-primary btn-sm pull-right" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;
                                        ចាកចេញ
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
@endauth