<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>Blank</title>

    <!-- Bootstrap core CSS -->
    <link href="/appserver1/Public/weixinapp/css/bootstrap.min.css" rel="stylesheet">
    <link href="/appserver1/Public/weixinapp/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/appserver1/Public/weixinapp/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--right slidebar-->
    <link href="/appserver1/Public/weixinapp/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/appserver1/Public/weixinapp/css/style.css" rel="stylesheet">
    <link href="/appserver1/Public/weixinapp/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/appserver1/Public/js/html5shiv.js"></script>
    <script src="/appserver1/Public/js/respond.min.js"></script>
    <![endif]-->
</head>
<section id="container" class="">
    <!--header start-->
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>Blank</title>

    <!-- Bootstrap core CSS -->
    <link href="/appserver1/Public/weixinapp/css/bootstrap.min.css" rel="stylesheet">
    <link href="/appserver1/Public/weixinapp/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/appserver1/Public/weixinapp/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--right slidebar-->
    <link href="/appserver1/Public/weixinapp/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/appserver1/Public/weixinapp/css/style.css" rel="stylesheet">
    <link href="/appserver1/Public/weixinapp/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/appserver1/Public/weixinapp/js/html5shiv.js"></script>
    <script src="/appserver1/Public/weixinapp/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <div data-original-title="左侧菜单" data-placement="right" class="fa fa-bars tooltips"></div>
    </div>
    <!--logo start-->
    <a href="index.html" class="logo" >vk<span>admin</span></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">

        </ul>
    </div>
    <div class="top-nav ">
        <ul class="nav pull-right top-menu">

            <!-- user login dropdown start-->
            <!--<li class="dropdown">-->
                <!--<a data-toggle="dropdown" class="dropdown-toggle" href="#">-->
                    <!--<img alt="" src="img/avatar1_small.jpg">-->
                    <!--<span class="username">风华</span>-->
                    <!--<b class="caret"></b>-->
                <!--</a>-->
                <!--<ul class="dropdown-menu extended logout">-->
                    <!--<div class="log-arrow-up"></div>-->
                    <!--<li><a href="#"><i class=" fa fa-suitcase"></i>个人资料</a></li>-->
                    <!--<li><a href="#"><i class="fa fa-cog"></i> 设置</a></li>-->
                    <!--<li><a href="#"><i class="fa fa-bell-o"></i> 通知</a></li>-->
                    <!--<li><a href="login.html"><i class="fa fa-key"></i> 安全退出</a></li>-->
                <!--</ul>-->
            <!--</li>-->

            <!-- user login dropdown end -->
            <li class="sb-toggle-right" style="display: none;">
                <i class="fa  fa-align-right"></i>
            </li>
        </ul>
    </div>
</header>
</body>
</html>
    <!--header end-->
    <!--sidebar start-->
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>Blank</title>

    <!-- Bootstrap core CSS -->
    <link href="/appserver1/Public/weixinapp/css/bootstrap.min.css" rel="stylesheet">
    <link href="/appserver1/Public/weixinapp/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/appserver1/Public/weixinapp/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--right slidebar-->
    <link href="/appserver1/Public/weixinapp/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/appserver1/Public/weixinapp/css/style.css" rel="stylesheet">

    <link href="/appserver1/Public/weixinapp/css/style-responsive.css" rel="stylesheet" />
    <style type="text/css">
        ul.sidebar-menu li ul.sub li a.activeColor{ color:#fff;}
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/appserver1/Public/weixinapp/js/html5shiv.js"></script>
    <script src="/appserver1/Public/weixinapp/js/respond.min.js"></script>

    <![endif]-->
</head>
<body>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">


            <!--multi level menu start-->
            <li class="sub-menu">
                <a href="javascript:;" class="dcjq-parent active">
                    <i class="fa fa-sitemap "></i>
                    <span>活动</span>
                </a>
                <ul class="sub">

                    <li><a id="a1" class="activeColor" href="<?php echo U('User/userlist');?>">用户列表</a></li>

                </ul>
                <ul class="sub">

                    <li><a id="a2" class="activeColor" href="<?php echo U('Company/companylist');?>">公司列表</a></li>

                </ul>
                <ul class="sub">

                    <li><a id="a3" class="activeColor" href="<?php echo U('rule/rulelist');?>">功能</a></li>

                </ul>

            </li>
            <!--multi level menu end-->

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<script src="/appserver1/Public/weixinapp/js/jquery.js"></script>

</body>
</html>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div style="margin: 10% auto 0; width: 50%;">
                    <section class="panel">
                        <header class="panel-heading">
                            新建用户
                        </header>
                        <div class="panel-body">
                            <form role="form" method="post" action="/appserver1/index.php/Login/User/userAdd">
                                <input type="hidden" name="company_id" />
                                <div class="form-group">
                                    <label for="username">用户名</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                           placeholder="请输入用户名">
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword">密码</label>
                                    <input type="password" class="form-control" id="InputPassword" name="password"
                                           placeholder="请输入密码">
                                </div>
                                <div class="form-group">
                                    <label for="name">姓名</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="请输
入姓名">
                                </div>
                                <div class="form-group">
                                    <label for="city">城市</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="请输
入城市">
                                </div>
                                <div class="form-group">
                                    <label for="address">地址</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                           placeholder="请输入地址">
                                </div>
                                <div class="form-group">
                                    <label for="role">权限</label>
                                    <select type="text" class="form-control" id="role" name="role" placeholder="请
输入权限">
                                        <option value="" selected>请选择权限</option>
                                        <option value="1" selected>1</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-info">保存</button>
                                <a class="btn btn-info" href="javascript:history.go(-1);" >返回</a>
                            </form>

                        </div>
                    </section>
    <!--main content end-->

    <!-- Right Slidebar start -->
    <div class="sb-slidebar sb-right sb-style-overlay">


    </div>
    <!-- Right Slidebar end -->

    <!--footer start-->
    <!--<footer class="site-footer">-->
        <!--<div class="text-center">-->
            <!--2014 &copy; vkadmin by Kairos.-->
            <!--<a href="#" class="go-top">-->
                <!--<i class="fa fa-angle-up"></i>-->
            <!--</a>-->
        <!--</div>-->
    <!--</footer>-->
    <!--footer end-->



<!--<div class="result page"><?php echo ($page); ?></div>-->





<script src="/appserver1/Public/weixinapp/js/jquery.js"></script>
<script src="/appserver1/Public/weixinapp/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="/appserver1/Public/weixinapp/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/appserver1/Public/weixinapp/js/jquery.scrollTo.min.js"></script>
<script src="/appserver1/Public/weixinapp/js/slidebars.min.js"></script>
<script src="/appserver1/Public/weixinapp/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="/appserver1/Public/weixinapp/js/respond.min.js" ></script>

<!--common script for all pages-->
<script src="/appserver1/Public/weixinapp/js/common-scripts.js"></script>
<body>

</body>
</html>