<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ShopSim98| Admin Page</title>

    {{-- <meta property="og:url"                content="https://yamlive.spyets.com/admin" /> --}}
    <meta property="og:title"              content="ShopSim98 Admin" />
    <meta property="og:description"        content="Admin Dashboard for ShopSim98" />
    {{-- <meta property="og:image"              content="https://s3.ap-southeast-1.amazonaws.com/yamlive/28d64a089602a3537.jpg" /> --}}

    <link href="{{asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('public/images/favicon.png')}}">
    <!-- Toastr style -->
    <link href="{{asset('frontend/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <link href="{{asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/admin/main.css') }}" rel="stylesheet">
    <meta property="og:image" content="https://yt3.ggpht.com/a-/ACSszfG6SiS4096AdxOv4vjhBXJphsGQuBWBBwkLww=s900-mo-c-c0xffffffff-rj-k-no" />
    <meta property="og:image:secure_url" content="https://yt3.ggpht.com/a-/ACSszfG6SiS4096AdxOv4vjhBXJphsGQuBWBBwkLww=s900-mo-c-c0xffffffff-rj-k-no" />

    @yield('css')

    @yield('header')
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <img alt="image" class="img-circle" src="{{Auth::user()->image ? Auth::user()->image : ''}}" style="width: 70px;" />
                            </span>
                            <span class="block m-t-xs"> <strong class="font-bold" id="admin-name">{{Auth::user()->name}}
                                <a href="/admin/logout"><i style="color:#E97258;cursor: pointer;" class="fa fa-power-off" aria-hidden="true"></i></a>
                            </strong></span>
                        </div>
                    </li>
                    <li class="{{($url == 'page-home') ? 'active' : ''}}  toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa Video">
                        <a><i class="fa fa-picture-o" aria-hidden="true"></i><span class="nav-label ul-header">Giao diện</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'page-home') ? 'active' : ''}}"><a href="/admin/page-home" id="" >Trang chủ</a></li>
                        </ul>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'page-info-recharge') ? 'active' : ''}}"><a href="/admin/page-info-recharge" id="" >Thông tin nạp tiền</a></li>
                        </ul>
                    </li>
                    <li class="{{($url == 'users' || $url == 'create-user' || $url == 'edit-user' || $url == 'analytics-artist') ? 'active' : ''}}  toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa Video">
                        <a><i class="fa fa-user ul-header" aria-hidden="true"></i> <span class="nav-label ul-header">User</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'users') ? 'active' : ''}}"><a href="/admin/users/all" id="" >Danh sách người dùng</a></li>
                            <li class="{{($url == 'analytics-artist') ? 'active' : ''}}"><a href="/admin/analytics-artist/all" id="admin-analytics-user">Analytics user</a></li>
                            @can('gate-create-user')
                            <li class="{{($url == 'create-user') ? 'active' : ''}}"><a href="/admin/create-user">Thêm người dùng</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="{{($url == 'role-user' || $url == 'role-group' || $url == 'role-permission') ? 'active' : ''}}  toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa Video">
                        <a><i class="fa fa-users ul-header" aria-hidden="true"></i> <span class="nav-label ul-header">Role</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            @can('gate-view-moderator')
                            <li class="{{($url == 'role-user') ? 'active' : ''}}"><a href="/admin/role/user">Phân quyền</a></li>
                            @endcan
                            @can('gate-view-role')
                            <li class="{{($url == 'role-group') ? 'active' : ''}}"><a href="/admin/role/group">Nhóm quyền</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="{{($url == 'platform-log') ? 'active' : ''}}  toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa Video">
                        <a><i class="fa fa-bell" aria-hidden="true"></i> <span class="nav-label ul-header">Platform log</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'platform-log') ? 'active' : ''}}"><a href="/admin/log/platform-log">Activities log</a></li>
                            <li><a href="/admin/logs">System log</a></li>
                        </ul>
                    </li>
                    <li class="{{($url == 'videos' || $url == 'create-video' || $url == 'analytics-video' || $url == 'edit-video' || $url == 'video-waiting') ? 'active' : ''}} toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa Video">
                        <a><i class="fa fa-video-camera ul-header" aria-hidden="true"></i> <span class="nav-label ul-header">Video</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            @can('gate-view-video')
                            <li class="{{($url == 'videos') ? 'active' : ''}}"><a href="/admin/videos/all" id="">Danh sách video</a></li>
                            @endcan
                            @can('gate-verify-video')
                            <li class="{{($url == 'video-waiting') ? 'active' : ''}}"><a href="/admin/video-waiting/all" id="">Kiểm duyệt video</a></li>
                            @endcan
                            <li class="{{($url == 'analytics-video') ? 'active' : ''}}"><a href="/admin/analytics-video/all" id="admin-analytics-video">Analytics video</a></li>
                            @can('gate-create-video')
                            <li class="{{($url == 'create-video') ? 'active' : ''}}"><a href="/admin/create-video">Thêm video</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="{{($url == 'events' || $url == 'info-event'|| $url == 'create-event' || $url == 'edit-event' || $url == 'event-waiting') ? 'active' : ''}} toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa event">
                        <a><i class="fa fa-calendar" aria-hidden="true"></i> <span class="nav-label ul-header">Event</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'events') ? 'active' : ''}}"><a href="/admin/events/all" id="admin-list-event">Danh sách event</a></li>
                            @can('gate-verify-event')
                            <li class="{{($url == 'event-waiting') ? 'active' : ''}}"><a href="/admin/event-waiting/all" id="">Kiểm duyệt event</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="{{($url == 'albums' || $url == 'info-album'|| $url == 'create-album' || $url == 'edit-album') ? 'active' : ''}} toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa Album">
                        <a><i class="fa fa-th-list ul-header" aria-hidden="true"></i> <span class="nav-label ul-header">Album</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'albums') ? 'active' : ''}}"><a href="/admin/albums/all" id="admin-list-album">Danh sách album</a></li>
                            @can('gate-create-album')
                            <li class="{{($url == 'create-album') ? 'active' : ''}}"><a href="/admin/create-album">Thêm album</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="{{($url == 'categories' || $url == 'create-category') ? 'active' : ''}} toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa Category">
                        <a><i class="fa fa-folder-open ul-header" aria-hidden="true"></i> <span class="nav-label ul-header">Category</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'categories') ? 'active' : ''}}"><a href="/admin/categories" id="admin-list-category">Danh sách category</a></li>
                            @can('gate-create-category')
                            <li class="{{($url == 'create-category') ? 'active' : ''}}"><a href="/admin/create-category">Thêm category</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="{{($url == 'brands' || $url == 'create-brand') ? 'active' : ''}} toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa brand">
                        <a><i class="fa fa-phone-square ul-header" aria-hidden="true"></i> <span class="nav-label ul-header">Nhà mạng</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'brands') ? 'active' : ''}}"><a href="/admin/brands" id="admin-list-brand">Danh sách nhà mạng</a></li>
                            <li class="{{($url == 'create-brand') ? 'active' : ''}}"><a href="/admin/create-brand">Thêm nhà mạng</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="/admin/logout">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            @yield('content')
            <div class="footer">
                <div>
                    <strong>Copyright</strong> <a target="blank" href="https://vunquitk11.com/">vunquitk11.com</a> &copy; {{date('Y')}}
                </div>
            </div>
        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="{{asset('frontend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('frontend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{asset('frontend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('frontend/js/inspinia.js') }}"></script>
    <script src="{{asset('frontend/js/plugins/pace/pace.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{asset('frontend/js/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{asset('frontend/js/plugins/chartJs/Chart.min.js')}}"></script>

    @yield('script')
    <script>
        var width = $('#cancel-button').width();
        var height = $('#cancel-button').height();
        function loadingButton(id){
            $('#'+id).width(width);
            $('#'+id).height(height);
            $('#'+id).css('line-height','0');
            // $('#'+id).css('opacity','0.8');
            $('#'+id).html('<div class="loader"></div>');
            document.getElementById(id).disabled = true;
            return;
        }

        function unloadingButton(id,str){
            $('#'+id).width(width);
            $('#'+id).height(height);
            $('#'+id).css('line-height','0');
            // $('#'+id).css('opacity','0.8');
            $('#'+id).html(str);
            document.getElementById(id).disabled = false;
            return;
        }

        function toastr_fill_all(){
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 2000
                };
                toastr.info('Please complete the information.', 'ShopSim98 Admin');
            }, 300);
        }


        function toastr_active(active,object,status){
            var str = active + ' '+ object + ' '+status+'.';
            if(status == 'success' && ((active == 'Upload') || (active == 'Create'))){
                str = str+' Please waiting for verify.';
            }
            if(status == 'success'){
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 2000
                    };
                    toastr.success(str, 'ShopSim98');
                }, 300);
            }else if(status == 'failed'){
                str = str+' Please try again later.'
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 2000
                    };
                    toastr.danger(str, 'ShopSim98 Admin');
                }, 300);
            }
        }

        $(document).ready(function() {
            @if(session('success'))
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 2000
                };
                toastr.success('{{session("success")}}', 'ShopSim98 Admin');
            }, 300);
            @endif
            @if(session('danger'))
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 2000
                };
                toastr.error('{{session("danger")}}', 'ShopSim98 Admin');
            }, 300);
            @endif
            @if(session('warning'))
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 1200
                };
                toastr.warning('{{session("warning")}}', 'ShopSim98 Admin');
            }, 300);
            @endif
        });
    </script>
</body>

</html>
