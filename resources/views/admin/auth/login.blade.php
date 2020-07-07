<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ShopSim98 | Login</title>

    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    <meta property="og:image" content="https://cdn0.iconfinder.com/data/icons/social-media-2092/100/social-35-512.png"/>
	<meta property="og:image:secure_url" content="https://cdn0.iconfinder.com/data/icons/social-media-2092/100/social-35-512.png" />

    <link rel="icon" href="{{ asset('homepage/img/sln_logo.png') }}"/>

    <!-- Toastr style -->
    <link href="{{ asset('frontend/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name" style="margin-left: -62px;">ADMIN</h1>

            </div>
            <h3>Welcome to ShopSim98</h3>
            <p>Login</p>
            @if(session('error'))
                <p style="color: #ed5565;">
                    {{session('error')}}
              </p>
            @endif
            <form method="POST" class="m-t" role="form" action="">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
            <a href="/admin/forgot-password">Quên mật khẩu</a>
            <p class="m-t"> <small>ShopSim98 &copy; <a href="https://shopsim8.com/">shopsim98.com</a> {{date('Y')}}</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('frontend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    
    <!-- Toastr -->
    <script src="{{ asset('frontend/js/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{asset('frontend/js/plugins/chartJs/Chart.min.js')}}"></script>

    <script>
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
