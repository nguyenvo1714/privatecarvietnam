<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <!--link href="/css/app.css" rel="stylesheet"-->
        <!-- {!! Html::style('css/bootstrap.min.css') !!} -->
        {!! Html::style('css/app.css') !!}
        {!! Html::style('css/font-awesome.min.css') !!}
        {!! Html::style('css/adminStyle.css') !!}
        {!! Html::style('css/jquery-ui.min.css') !!}
        {!! Html::style('css/jquery-ui.theme.min.css') !!}
        {!! Html::style('css/fileinput.min.css') !!}
        <!-- Scripts -->
        {!! Html::script('js/app.js') !!}
        {!! Html::script('js/fileinput.min.js') !!}
        <!-- {!! Html::script('js/custome.js') !!} -->
        {!! Html::script('js/jquery-ui.min.js') !!}
        {!! Html::script('js/jquery.validate.min.js') !!}
        {!! Html::script('js/custom.validate.js') !!}
        {!! Html::script('js/adminScript.js') !!}
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>

            $( function() {
                $( "#datepicker" ).datepicker({
                    dateFormat: "yy-mm-dd"
                });
            } );

            $( function() {
                $( "#datepicker1" ).datepicker({
                    dateFormat: "yy-mm-dd"
                });
            } );

            $( function() {
                $( "#birthday" ).datepicker({
                    dateFormat: "yy-mm-dd",
                    changeYear: true,
                    changeMonth: true,
                    yearRange: "-90:+00"
                });
            } );            

            var control = '{{ $controller }}';
            var selected_type = '';
            var selected_blog = '';
            var selected_is_discount = '';
            var selected_active = [];
            var selected_place = '';
            var selected_driver = [];
            var selected_transfer = '';
            var selected_is_hot = '';
            var i = 0;

            switch(control) {
                case('TransferController'):
                    @if( ! empty($transfer->type_id))
                        selected_type = '{{ $transfer->type_id }}';
                    @endif

                    @if( ! empty($transfer->place_id))
                        selected_place = '{{ $transfer->place_id }}'
                    @endif

                    @if( ! empty($transfer->blog_id))
                        selected_blog = '{{ $transfer->blog_id }}'
                    @endif

                    @if( ! empty($transfer->transfer_name_id))
                        selected_transfer = '{{ $transfer->transfer_name_id }}'
                    @endif

                    @if(isset($transfer->is_hot))
                        selected_is_hot = '{{ $transfer->is_hot }}'
                    @endif
                    
                    @if(isset($transfer->is_discount))
                        selected_is_discount = '{{ $transfer->is_discount }}'
                    @endif

                    @if(  ! empty($cars) && count($cars) > 0)
                        @foreach($cars as $car)
                            selected_driver[i] = '{{ $car->driver_id }}';
                            selected_active[i] = '{{ $car->is_active }}'
                            i++;
                        @endforeach
                    @endif
                break;
                case('TransferNameController'):
                    @if( ! empty($transferName->type_id))
                        selected_type = '{{ $transferName->type_id }}'
                    @endif
                break;
                case('BlogController'):
                    @if( ! empty($blog->type_id))
                        selected_type = '{{ $blog->type_id }}'
                    @endif
                break;
            }
            // @if( ! empty($tour->type_id))
            //     selected_type = '{{ $tour->type_id->id }}'
            // @endif
            @if( ! empty($tour->blog_id->id))
                selected_blog = '{{ $tour->blog->id }}'
            @endif

            @if(isset($tour->is_discount))
                selected_is_discount = '{{ $tour->is_discount }}'
            @endif
        </script>
        <script>
            var route_prefix = "{{ url(config('lfm.prefix')) }}";
        </script>
    </head>
    <body>
        <div id="app">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="container left-container collapse navbar-collapse" id="myNavbar">
                                <div class="navbar-title">
                                    <a href="http://privatecarvietnam.com"><i class="fa fa-paw"></i> <span>PrivatecarVietnam</span> </a>
                                </div>
                                <div class="profile">
                                    <div class="media">
                                        <div class="media-left">
                                            {{ Html::image('img/admin.jpg', 'admin', ['style' => 'width:60px', 'class' => 'img-circle']) }}
                                        </div>
                                        <div class="media-body">
                                            <span>Welcome, </span>
                                            <h2>Admin</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-menu">
                                    <h3>General</h3>
                                    <ul class="side-menu row">
                                        @if($controller == 'BlogController')
                                            @php ($active = 'active') @php ($in = 'in')
                                        @else
                                            @php ($active = '') @php ($in = '')
                                        @endif
                                        <li class="parent {{ $active }}">
                                            <a data-toggle="collapse" href="#collapse1" class=" {{ $active }}"><i class="fa fa-wpforms"></i> Blog<i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="nav-child collapse {{ $in }}" id="collapse1">
                                                @if($action == 'index')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list1" class="{{ $currentPage }}"><a href="{{ url('/blogs') }}"> View</a></li>
                                                @if($action == 'create')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list2" class="{{ $currentPage }}"><a href="{{ url('/blog/create') }}"> New blog</a></li>
                                                <li id="list3" class="{{ $currentPage }}""><!-- <i class="fa fa-trash-o"></i> --> <a href="#">Delete</a></li>
                                            </ul>
                                        </li>
                                        @if($controller == 'TypeController')
                                            @php ($active = 'active') @php ($in = 'in')
                                        @else
                                            @php ($active = '') @php ($in = '')
                                        @endif
                                        <li class="parent {{ $active }}">
                                            <a data-toggle="collapse" href="#collapse6" class=" {{ $active }}"><i class="fa fa-wpforms"></i> Type<i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="nav-child collapse {{ $in }}" id="collapse6">
                                                @if($action == 'index')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list1" class="{{ $currentPage }}"><a href="{{ url('/types') }}"> View</a></li>
                                                @if($action == 'create')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list2" class="{{ $currentPage }}"><a href="{{ url('/type/create') }}"> New type</a></li>
                                                <li id="list3" class="{{ $currentPage }}""><!-- <i class="fa fa-trash-o"></i> --> <a href="#">Delete</a></li>
                                            </ul>
                                        </li>
                                        @if($controller == 'TransferNameController')
                                            @php ($active = 'active') @php ($in = 'in')
                                        @else
                                            @php ($active = '') @php ($in = '')
                                        @endif
                                        <li class="parent {{ $active }}">
                                            <a data-toggle="collapse" href="#collapse8" class=" {{ $active }}"><i class="fa fa-wpforms"></i> Transfer Name<i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="nav-child collapse {{ $in }}" id="collapse8">
                                                @if($action == 'index')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list1" class="{{ $currentPage }}"><a href="{{ url('/transferNames') }}"> View</a></li>
                                                @if($action == 'create')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list2" class="{{ $currentPage }}"><a href="{{ url('/transferName/create') }}"> New transfer name</a></li>
                                                <li id="list3" class="{{ $currentPage }}""><!-- <i class="fa fa-trash-o"></i> --> <a href="#">Delete</a></li>
                                            </ul>
                                        </li>
                                        @if($controller == 'TransferController')
                                            @php ($active = 'active') @php ($in = 'in')
                                        @else
                                            @php ($active = '') @php ($in = '')
                                        @endif
                                        <li class="parent {{ $active }}">
                                            <a data-toggle="collapse" href="#collapse7" class=" {{ $active }}"><i class="fa fa-wpforms"></i> Transfer<i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="nav-child collapse {{ $in }}" id="collapse7">
                                                @if($action == 'index')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list1" class="{{ $currentPage }}"><a href="{{ url('/transfers') }}"> View</a></li>
                                                @if($action == 'create')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list2" class="{{ $currentPage }}"><a href="{{ url('/transfer/create') }}"> New transfer</a></li>
                                                <li id="list3" class="{{ $currentPage }}""><!-- <i class="fa fa-trash-o"></i> --> <a href="#">Delete</a></li>
                                            </ul>
                                        </li>
                                        <!-- @if($controller == 'CarController')
                                            @php ($active = 'active') @php ($in = 'in')
                                        @else
                                            @php ($active = '') @php ($in = '')
                                        @endif
                                        <li class="parent {{ $active }}">
                                            <a data-toggle="collapse" href="#collapse2" class="{{ $active }}"><i class="fa fa-car"></i> Car<i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="nav-child collapse {{ $in }}" id="collapse2">
                                                @if($action == 'index')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list1" class="{{ $currentPage }}"><a href="{{ url('/cars') }}"><i class="fa fa-file-text-o"></i> View</a></li>
                                                @if($action == 'create')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list2" class="{{ $currentPage }}"><a href="{{ url('/car/create') }}"> New car</a></li>
                                                <li id="list3" class="{{ $currentPage }}""><a href="#">Delete</a></li>
                                            </ul>
                                        </li> -->
                                        @if($controller == 'DriverController')
                                            @php ($active = 'active') @php ($in = 'in')
                                        @else
                                            @php ($active = '') @php ($in = '')
                                        @endif
                                        <li class="parent {{ $active }}">
                                            <a data-toggle="collapse" href="#collapse9" class="{{ $active }}"><i class="fa fa-car"></i> Driver<i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="nav-child collapse {{ $in }}" id="collapse9">
                                                @if($action == 'index')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list1" class="{{ $currentPage }}"><a href="{{ url('/drivers') }}"><i class="fa fa-file-text-o"></i> View</a></li>
                                                @if($action == 'create')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list2" class="{{ $currentPage }}"><a href="{{ url('/driver/create') }}"> New car</a></li>
                                                <li id="list3" class="{{ $currentPage }}""><!-- <i class="fa fa-trash-o"></i> --> <a href="#">Delete</a></li>
                                            </ul>
                                        </li>
                                        @if($controller == 'ContractController')
                                            @php ($active = 'active') @php ($in = 'in')
                                        @else
                                            @php ($active = '') @php ($in = '')
                                        @endif
                                        <li class="parent {{ $active }}">
                                            <a data-toggle="collapse" href="#collapse3" class="{{ $active }}"><i class="fa fa-handshake-o"></i> Contract<i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="nav-child collapse {{ $in }}" id="collapse3">
                                                @if($action == 'index')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list1" class="{{ $currentPage }}"><a href="{{ url('/contracts') }}"><i class="   fa fa-file-text-o"></i> View</a></li>
                                                @if($action == 'create')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list2" class="{{ $currentPage }}"><i class="fa fa-plus"></i> New contract</li>
                                                <li id="list3" class="{{ $currentPage }}""><!-- <i class="fa fa-trash-o"></i> --> <a href="#">Delete</a></li>
                                            </ul>
                                        </li>
                                        @if($controller == 'PlaceController')
                                            @php ($active = 'active') @php ($in = 'in')
                                        @else
                                            @php ($active = '') @php ($in = '')
                                        @endif
                                        <li class="parent {{ $active }}">
                                            <a data-toggle="collapse" href="#collapse4" class="{{ $active }}"><i class="fa fa-handshake-o"></i> Place<i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="nav-child collapse {{ $in }}" id='collapse4'>
                                                @if($action == 'index')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list1" class="{{ $currentPage }}"><a href="{{ url('/places') }}">View</a></li>
                                                @if($action == 'create')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list2" class="{{ $currentPage }}"><a href="{{ url('/place/create') }}"> New place</a></li>
                                                <li id="list3" class="{{ $currentPage }}""><!-- <i class="fa fa-trash-o"></i> --> <a href="#">Delete</a></li>
                                            </ul>
                                        </li>
                                        <!-- @if($controller == 'TourController')
                                            @php ($active = 'active') @php ($in = 'in')
                                        @else
                                            @php ($active = '') @php ($in = '')
                                        @endif
                                        <li class="parent {{ $active }}">
                                            <a data-toggle="collapse" href="#collapse5" class="{{ $active }}"><i class="fa fa-bus"></i> Tour<i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="nav-child collapse {{ $in }}" id="collapse5">
                                                @if($action == 'index')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list1" class="{{ $currentPage }}"><a href="{{ url('/tours') }}"><i class="fa fa-file-text-o"></i> View tours</a></li>
                                                @if($action == 'create')
                                                    @php ($currentPage = 'current-page')
                                                @else
                                                    @php ($currentPage = '')
                                                @endif
                                                <li id="list2" class="{{ $currentPage }}"><a href="{{ url('/tour/create') }}"><i class="fa fa-plus"></i> New tour</a></li>
                                                <li id="list3" class="{{ $currentPage }}""><a href="#">Delete</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="top-menu">
                                 <nav class="navbar navbar-default">
                                    <div>
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            </button>
                                        </div>
                                        <ul class="nav navbar-nav navbar-right"">
                                            <li class="dropdown">
                                                <a class="dropdown-toggle user-profile" data-toggle="dropdown" href="#">
                                                    {{ Html::image('img/admin.jpg', 'admin') }} Jonh Does
                                                    <span class=" fa fa-angle-down"></span>
                                                </a>
                                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                                    <li><a href="javascript:;"> Profile</a></li>
                                                    <!-- <li>
                                                        <a href="javascript:;">
                                                            <span class="badge bg-red pull-right">50%</span>
                                                            <span>Settings</span>
                                                        </a>
                                                    </li> -->
                                                    <li><a href="javascript:;">Help</a></li>
                                                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle info-number" data-toggle="dropdown" href="#">
                                                    <i class="fa fa-envelope-o"></i>
                                                    <span class="badge bg-green">6</span>
                                                </a>
                                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                                    <li>
                                                      <a>
                                                        <span class="image">{{ Html::image('img/admin.jpg', 'admin') }}</span>
                                                        <span>
                                                          <span>John Smith</span>
                                                          <span class="time">3 mins ago</span>
                                                        </span>
                                                        <span class="message">
                                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                                        </span>
                                                      </a>
                                                    </li>
                                                    <li>
                                                      <a>
                                                        <span class="image">{{ Html::image('img/admin.jpg', 'admin') }}</span>
                                                        <span>
                                                          <span>John Smith</span>
                                                          <span class="time">3 mins ago</span>
                                                        </span>
                                                        <span class="message">
                                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                                        </span>
                                                      </a>
                                                    </li>
                                                    <li>
                                                      <a>
                                                        <span class="image">{{ Html::image('img/admin.jpg', 'admin') }}</span>
                                                        <span>
                                                          <span>John Smith</span>
                                                          <span class="time">3 mins ago</span>
                                                        </span>
                                                        <span class="message">
                                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                                        </span>
                                                      </a>
                                                    </li>
                                                    <li>
                                                      <a>
                                                        <span class="image">{{ Html::image('img/admin.jpg', 'admin') }}</span>
                                                        <span>
                                                          <span>John Smith</span>
                                                          <span class="time">3 mins ago</span>
                                                        </span>
                                                        <span class="message">
                                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                                        </span>
                                                      </a>
                                                    </li>
                                                    <li>
                                                      <div class="text-center">
                                                        <a>
                                                          <strong>See All Alerts</strong>
                                                          <i class="fa fa-angle-right"></i>
                                                        </a>
                                                      </div>
                                                    </li>
                                                  </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="main-content">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <script>
            {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
        </script>
        <script>
            $('#lfm').filemanager('image', {prefix: route_prefix});
            // $('[class*="lfm"]').each(function() {
            //     $(this).filemanager('image', {prefix: route_prefix});
            // });
        </script>
    </body>
    <footer>
        Footer
    </footer>
</html>