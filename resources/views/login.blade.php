<?php
$rev = json_decode(file_get_contents(getcwd() . '/../rev-manifest.json'), true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('login.login') }}</title>

    <link rel="icon"
          type="image/png"
          href="<?php echo url('/img/favicon.png')?>">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo url('/build/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo url('/css/dashboard.css') ?>">
    <script src="<?php echo url('/build/angular.min.js') ?>"></script>
    <script src="<?php echo url('/src/' . $rev['login.js']) ?>"></script>
</head>
<body ng-app="login" style="background-image: url(<?php echo url('/img/login.jpg')?>); background-size: cover">
    <div class="wrapper wrapper-full-page" ng-controller="LoginController">
        <div class="full-page login-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form ng-submit="login()" name="loginForm">
                                <div class="card animated fadeInDown">
                                    <div class="header text-center">
                                        <img src="<?php echo url('/img/logo.png')?>" /> <br/>
                                    </div>
                                    <div class="content">
                                        <div class="form-group">
                                            <label>{{ trans('app.email') }}</label>
                                            <input ng-required="true" ng-model="user.email" type="email" placeholder="{{ trans('app.email')  }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>{{ trans('app.password') }}</label>
                                            <input ng-required="true" ng-model="user.password" type="password" placeholder="{{ trans('app.password')  }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12" ng-show="showError">
                                        <div class="alert alert-danger">
                                            [[ message ]]
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button ng-disabled="loginForm.$invalid" type="submit" class="btn btn-fill btn-info btn-wd">{{ trans('login.login') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>