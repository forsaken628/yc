<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $identity app\models\User */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\log\Logger;

AppAsset::register($this);
$identity = Yii::$app->user->identity;
//$f = $this->context->action->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords"
          content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
    <meta name="description" content="">
    <?= Html::csrfMetaTags() ?>
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" type="image/png">

    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

</head>

<body class="sticky-header">
<?php $this->beginBody() ?>


<section>
    <!-- left side start-->
    <div id="left-side" class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="/"><img src="/images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a data-href="/site/index"><img src="/images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="/images/photos/user-avatar.png" class="media-object">
                    <div class="media-body">
                        <h4><a><?= $identity->username ?></a></h4>
                        <span>"Hello There..."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">用户信息</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li><a><i class="fa fa-user"></i> <span> 简介</span></a></li>
                    <li><a><i class="fa fa-cog"></i> <span> 设置</span></a></li>
                    <li><a href="/site/logout"><i class="fa fa-sign-out"></i> <span> 登出</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li><a data-href="/site/index"><i class="fa fa-home"></i> <span>我的主页</span></a></li>
                <li><a data-href="/site/users"><i class="fa fa-laptop"></i> <span>用户管理</span></a></li>
                <li><a data-href="/site/classes"><i class="fa fa-book"></i> <span>班级</span></a></li>
                <li><a data-href="/site/courses"><i class="fa fa-book"></i> <span>课程</span></a></li>
                <li><a data-href="/site/venues"><i class="fa fa-book"></i> <span>教室</span></a></li>
<!--                <li class="menu-list"><a><i class="fa fa-cogs"></i> <span>系统设置</span></a>-->
<!--                    <ul class="sub-menu-list">-->
<!--                        <li><a data-href="/config/auths"> 权限管理</a></li>-->
<!--                        <li><a data-href="/config/logs"> 日志</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
                <li class="hidden-xs"><a href="/site/logout"><i class="fa fa-sign-in"></i> <span>登出</span></a></li>

            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->

    <!-- main content start-->
    <div class="main-content">

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--notification menu start -->
            <form class="searchform" action="" method="">
                <input class="form-control" name="keyword" placeholder="搜索" type="text">
            </form>
            <div class="menu-right">
                <ul class="notification-menu">
                    <li>
                        <a class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                            <i class="fa fa-tasks"></i>
                            <span class="badge">8</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <h5 class="title">You have 8 pending task</h5>
                            <ul class="dropdown-list user-list">
                                <li class="new">
                                    <a>
                                        <div class="task-info">
                                            <div>Database update</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div style="width: 40%" aria-valuemax="100" aria-valuemin="0"
                                                 aria-valuenow="40" role="progressbar"
                                                 class="progress-bar progress-bar-warning">
                                                <span class="">40%</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="new">
                                    <a>
                                        <div class="task-info">
                                            <div>Dashboard done</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div style="width: 90%" aria-valuemax="100" aria-valuemin="0"
                                                 aria-valuenow="90" role="progressbar"
                                                 class="progress-bar progress-bar-success">
                                                <span class="">90%</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <div class="task-info">
                                            <div>Web Development</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div style="width: 66%" aria-valuemax="100" aria-valuemin="0"
                                                 aria-valuenow="66" role="progressbar"
                                                 class="progress-bar progress-bar-info">
                                                <span class="">66% </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <div class="task-info">
                                            <div>Mobile App</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div style="width: 33%" aria-valuemax="100" aria-valuemin="0"
                                                 aria-valuenow="33" role="progressbar"
                                                 class="progress-bar progress-bar-danger">
                                                <span class="">33% </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <div class="task-info">
                                            <div>Issues fixed</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div style="width: 80%" aria-valuemax="100" aria-valuemin="0"
                                                 aria-valuenow="80" role="progressbar" class="progress-bar">
                                                <span class="">80% </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="new"><a>See All Pending Task</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <h5 class="title">You have 5 Mails </h5>
                            <ul class="dropdown-list normal-list">
                                <li class="new">
                                    <a>
                                        <span class="thumb"><img src="/images/photos/user1.png" alt=""></span>
                                        <span class="desc">
                                          <span class="name">John Doe <span
                                                  class="badge badge-success">new</span></span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="thumb"><img src="/images/photos/user2.png" alt=""></span>
                                        <span class="desc">
                                          <span class="name">Jonathan Smith</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="thumb"><img src="/images/photos/user3.png" alt=""></span>
                                        <span class="desc">
                                          <span class="name">Jane Doe</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="thumb"><img src="/images/photos/user4.png" alt=""></span>
                                        <span class="desc">
                                          <span class="name">Mark Henry</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="thumb"><img src="/images/photos/user5.png" alt=""></span>
                                        <span class="desc">
                                          <span class="name">Jim Doe</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="new"><a>Read All Mails</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge">4</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <h5 class="title">Notifications</h5>
                            <ul class="dropdown-list normal-list">
                                <li class="new">
                                    <a>
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        <span class="name">Server #1 overloaded.  </span>
                                        <em class="small">34 mins</em>
                                    </a>
                                </li>
                                <li class="new">
                                    <a>
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        <span class="name">Server #3 overloaded.  </span>
                                        <em class="small">1 hrs</em>
                                    </a>
                                </li>
                                <li class="new">
                                    <a>
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        <span class="name">Server #5 overloaded.  </span>
                                        <em class="small">4 hrs</em>
                                    </a>
                                </li>
                                <li class="new">
                                    <a>
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        <span class="name">Server #31 overloaded.  </span>
                                        <em class="small">4 hrs</em>
                                    </a>
                                </li>
                                <li class="new"><a>See All Notifications</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="/images/photos/user-avatar.png" alt="">
                            <?= $identity->username ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a><i class="fa fa-user"></i> 简介</a></li>
                            <li><a><i class="fa fa-cog"></i> 设置</a></li>
                            <li><a href="/site/logout"><i class="fa fa-sign-out"></i> 登出</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->

        <!-- page heading end-->

        <!--body wrapper start-->
        <div id="wrapper" class="wrapper container-fluid">

            <?= $content ?>

        </div>
        <!--body wrapper end-->

        <!--footer section start-->

        <footer>
            2016 © yzc console
        </footer>

        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<?php $this->endBody() ?>

<!-- Placed js at the end of the document so the pages load faster -->

<!--common scripts for all pages-->
<script src="/js/scripts.js"></script>

</body>
<?php $this->endPage() ?>
</html>

