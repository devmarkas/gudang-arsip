<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>Artha Apps | Login</title>
    
        <!-- Custom fonts for this template-->
        <link href="{{ asset('template') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    
            <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
        <!-- Custom styles for this template-->
        <link href="{{ asset('template') }}/css/markas-hosting.css" rel="stylesheet">
        <link href="{{ asset('template') }}/css/artha-apps.css" rel="stylesheet">
    
    </head>

<body>
    
    <div class="login o-hidden border-0">
        <div class="row full">
            <div class="col-lg-6">
                <div class="login-right">
                    <span class="artha">
                        ARTA 
                    </span>
                    <span class="apps">
                        Apps
                    </span> 
                    <form class="form login mt-5" action="">
                        <h1 class="text-center title">Sign In</h1>
                        <h4 class="text-center sub-title">Sign in to stay connected.</h4>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control password" id="password" required>
                        </div>   
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input remember" id="remember">
                            <label class="form-check-label" for="remember">Remember me?</label>
                        </div>
                        <div class="button d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mt-3">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block">
                <img src="{{asset ("template")}}/img/bg-login.svg">
            </div>
        </div>
    </div>            
        
    


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('template') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template') }}/js/markas-hosting.js"></script>

</body>

</html>