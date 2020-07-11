<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ShopSim98| Admin Page</title>

    <link href="{{asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{{asset('frontend/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <link href="{{asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/admin/main.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
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
                            <li class="{{($url == 'page-home') ? 'active' : ''}}"><a href="/admin/page-home">Trang chủ</a></li>
                        </ul>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'page-home') ? 'active' : ''}}"><a href="/admin/page-home">Trang liên hệ</a></li>
                        </ul>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'page-home') ? 'active' : ''}}"><a href="/admin/page-home">Footer</a></li>
                        </ul>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'page-info-recharge') ? 'active' : ''}}"><a href="/admin/page-info-recharge">Thông tin nạp tiền</a></li>
                        </ul>
                    </li>
                    <li class="{{($url == 'users' || $url == 'create-user' || $url == 'edit-user' || $url == 'analytics-artist') ? 'active' : ''}}  toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa Video">
                        <a><i class="fa fa-user ul-header" aria-hidden="true"></i> <span class="nav-label ul-header">Khách hàng</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'users') ? 'active' : ''}}"><a href="/admin/users">Danh sách khách hàng</a></li>
                            <li class="{{($url == 'create-user') ? 'active' : ''}}"><a href="/admin/create-user">Thêm khách hàng</a></li>
                            <li class="{{($url == 'analytics-artist') ? 'active' : ''}}"><a href="/admin/a">Trích xuất</a></li>
                        </ul>
                    </li>
                    {{-- <li class="{{($url == 'role-user' || $url == 'role-group' || $url == 'role-permission') ? 'active' : ''}}  toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa Video">
                        <a><i class="fa fa-users ul-header" aria-hidden="true"></i> <span class="nav-label ul-header">Role</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'role-user') ? 'active' : ''}}"><a href="/admin/role/user">Phân quyền</a></li>
                            <li class="{{($url == 'role-group') ? 'active' : ''}}"><a href="/admin/role/group">Nhóm quyền</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="{{($url == 'platform-log') ? 'active' : ''}}  toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa Video">
                        <a><i class="fa fa-bell" aria-hidden="true"></i> <span class="nav-label ul-header">Platform log</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'platform-log') ? 'active' : ''}}"><a href="/admin/log/platform-log">Activities log</a></li>
                            <li><a href="/admin/logs">System log</a></li>
                        </ul>
                    </li> --}}
                    <li class="{{($url == 'brands' || $url == 'create-brand') ? 'active' : ''}} toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa brand">
                        <a><i class="fa fa-credit-card-alt ul-header" aria-hidden="true"></i> <span class="nav-label ul-header">Sim</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'brands') ? 'active' : ''}}"><a href="/admin/brands">Danh sách Sim</a></li>
                            <li class="{{($url == 'create-brand') ? 'active' : ''}}"><a href="/admin/create-brand">Thêm Sim</a></li>
                            <li class="{{($url == 'create-brand') ? 'active' : ''}}"><a href="/admin/create-brand">Trích xuất</a></li>
                        </ul>
                    </li>
                    <li class="{{($url == 'categories' || $url == 'create-category') ? 'active' : ''}} toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa Category">
                        <a><i class="fa fa-folder-open ul-header" aria-hidden="true"></i> <span class="nav-label ul-header">Category</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'categories') ? 'active' : ''}}"><a href="/admin/categories">Danh sách category</a></li>
                            <li class="{{($url == 'create-category') ? 'active' : ''}}"><a href="/admin/create-category">Thêm category</a></li>
                        </ul>
                    </li>
                    <li class="{{($url == 'brands' || $url == 'create-brand') ? 'active' : ''}} toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa brand">
                        <a><i class="fa fa-phone-square ul-header" aria-hidden="true"></i> <span class="nav-label ul-header">Nhà mạng</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'brands') ? 'active' : ''}}"><a href="/admin/brands">Danh sách nhà mạng</a></li>
                            <li class="{{($url == 'create-brand') ? 'active' : ''}}"><a href="/admin/create-brand">Thêm nhà mạng</a></li>
                        </ul>
                    </li>
                    <li class="{{($url == 'blog-categories' || $url == 'create-blog-category') ? 'active' : ''}} toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa blog category">
                        <a><i class="fa fa-book ul-header" aria-hidden="true"></i> <span class="nav-label ul-header">Blog Category</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'blog-categories') ? 'active' : ''}}"><a href="/admin/blog-categories">Danh sách Post category</a></li>
                            <li class="{{($url == 'create-blog-category') ? 'active' : ''}}"><a href="/admin/create-blog-category">Thêm Post category</a></li>
                        </ul>
                    </li>
                    <li class="{{($url == 'posts' || $url == 'create-post') ? 'active' : ''}} toggle-border-bottom" data-toggle="tooltip" title="Thêm/Xóa/Sửa post category">
                        <a><i class="fa fa-newspaper-o ul-header" aria-hidden="true"></i> <span class="nav-label ul-header">Post</span><span class="fa fa-caret-down"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{($url == 'posts') ? 'active' : ''}}"><a href="/admin/posts">Danh sách Post</a></li>
                            <li class="{{($url == 'create-post') ? 'active' : ''}}"><a href="/admin/create-post">Thêm Post</a></li>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
    @yield('script')
    <script>
        $('.summernote').summernote({
            height: 300,
            minHeight: null, 
            maxHeight: null, 
            callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    setTimeout(function () {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                }
            }
        });

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
