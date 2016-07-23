<?php $user = Session::get('user'); ?>
<?php
    $rev = json_decode(file_get_contents(getcwd() . '/../rev-manifest.json'), true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('main.title') }}</title>

    <link rel="icon"
          type="image/png"
          href="<?php echo url('/img/favicon.png')?>">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo url('/build/' . $rev['dashboard-vendors.css']) ?>" />
</head>
<body ng-app="dashboard">
<div class="wrapper wrapper-full-page">
    <div class="wrapper">
        <div class="sidebar" data-image="/assets/img/full-screen-image-3.jpg" data-color="blue"
        <?php if(!empty(env('theme'))){ echo "data-color=\"" . env('theme') . "\""; }?>
        >
            <!--

                Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                Tip 2: you can also add an image using data-image tag

            -->

            <div class="logo">
                <a href="<?php echo url('/')?>" class="logo-text">
                    {{ trans('main.title') }}
                </a>
            </div>

            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?php echo url('/assets/img/user_place.png')?>"/>
                    </div>
                    <div class="info">
                        <a href="<?php echo url('/profile')?>">
                            <?php if(!empty($user['name']))
                                echo $user['name'];
                            else
                                echo $user['_id'];?>
                        </a>
                    </div>
                </div>

                <ul class="nav">
                    <li>
                        <a href="<?php echo url('/')?>">
                            <i class="pe-7s-graph"></i>

                            <p>{{ trans('app.dashboard') }}</p>
                        </a>
                    </li>


                    <?php if(in_array('superadmin', $user['roles'])): ?>
                        <li>
                            <a href="<?php echo url('/companies')?>">
                                <i class="fa fa-building-o"></i>

                                <p>{{ trans('app.companies') }}</p>
                            </a>
                        </li>
                    <?php endif?>
                    <?php if(!in_array('superadmin', $user['roles']) && in_array('admin', $user['roles'])): ?>
                        <li>
                            <a href="<?php echo url('/my-company')?>">
                                <i class="fa fa-building-o"></i>

                                <p>{{ trans('app.myCompany') }}</p>
                            </a>
                        </li>
                    <?php endif?>
                    <?php if(!in_array('superadmin', $user['roles'])): ?>
                        <?php if(env('hasLeads', false)): ?>
                        <li>
                            <a href="<?php echo url('/leads')?>">
                                <i class="pe-7s-user-female"></i>

                                <p>{{ trans('app.leads') }}</p>
                            </a>
                        </li>
                        <?php endif?>
                        <?php if(env('hasCalendar', false)): ?>
                        <li>
                            <a href="<?php echo url('/calendar')?>">
                                <i class="pe-7s-date"></i>

                                <p>{{ trans('app.calendar') }}</p>
                            </a>
                        </li>
                        <?php endif?>
                    <?php endif?>
                    <?php if(in_array('superadmin', $user['roles']) || in_array('admin', $user['roles'])): ?>
                        
                        <?php if(env('hasTasks', false)): ?>
                        <li>
                            <a href="<?php echo url('/tasks')?>">
                                <i class="pe-7s-check"></i>

                                <p>{{ trans('app.tasks') }}</p>
                            </a>
                        </li>
                        <?php endif?>
                    <?php endif?>
                    <?php if(in_array('admin', $user['roles'])): ?>
                        <?php if(env('hasUsers', false)): ?>
                        <li>
                            <a href="<?php echo url('/users')?>">
                                <i class="pe-7s-users"></i>

                                <p>{{ trans('app.users') }}</p>
                            </a>
                        </li>
                        <?php endif?>
                    <?php endif?>
                    <?php if(env('hasProjects', false)): ?>
                    <li>
                        <a href="<?php echo url('/projects')?>">
                            <i class="fa fa-tasks"></i>

                            <p>{{ trans('app.projects') }}</p>
                        </a>
                    </li>
                    <?php endif?>
                    <li>
                        <a href="<?php echo url('/logout')?>">
                            <i class="pe-7s-lock"></i>
                            <p>{{ trans('app.logout') }}</p>
                       </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">{{ trans('main.title') }}</a>
                    </div>
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    @yield('content', trans('main.forbidden'))
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo url('/build/' . $rev['dashboard-vendors.js']) ?>"></script>
<script src="<?php echo url('/src/' . $rev['dashboard.js']) ?>"></script>
</body>