<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>微宝</title>

    <!-- Bootstrap core CSS -->
    <link href="/appserver/Public/weixinapp/css/bootstrap.min.css" rel="stylesheet">
    <link href="/appserver/Public/weixinapp/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/appserver/Public/weixinapp/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--right slidebar-->
    <link href="/appserver/Public/weixinapp/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/appserver/Public/weixinapp/css/style.css" rel="stylesheet">
    <link href="/appserver/Public/weixinapp/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/appserver/Public/js/html5shiv.js"></script>
    <script src="/appserver/Public/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section id="container" class="">
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>Blank</title>

    <!-- Bootstrap core CSS -->
    <link href="/appserver/Public/weixinapp/css/bootstrap.min.css" rel="stylesheet">
    <link href="/appserver/Public/weixinapp/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/appserver/Public/weixinapp/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--right slidebar-->
    <link href="/appserver/Public/weixinapp/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/appserver/Public/weixinapp/css/style.css" rel="stylesheet">
    <link href="/appserver/Public/weixinapp/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/appserver/Public/weixinapp/js/html5shiv.js"></script>
    <script src="/appserver/Public/weixinapp/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <div data-original-title="左侧菜单" data-placement="right" class="fa fa-bars tooltips"></div>
    </div>
    <!--logo start-->
    <a href="index.html" class="logo" >WB<span>admin</span></a>
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
    <link href="/appserver/Public/weixinapp/css/bootstrap.min.css" rel="stylesheet">
    <link href="/appserver/Public/weixinapp/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/appserver/Public/weixinapp/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--right slidebar-->
    <link href="/appserver/Public/weixinapp/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/appserver/Public/weixinapp/css/style.css" rel="stylesheet">

    <link href="/appserver/Public/weixinapp/css/style-responsive.css" rel="stylesheet" />
    <style type="text/css">
        ul.sidebar-menu li ul.sub li a.activeColor{ color:#fff;}
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/appserver/Public/weixinapp/js/html5shiv.js"></script>
    <script src="/appserver/Public/weixinapp/js/respond.min.js"></script>

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
                    <span>相册</span>
                </a>

            </li>
            <!--multi level menu end-->

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<script src="/appserver/Public/weixinapp/js/jquery.js"></script>

</body>
</html>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height" >
            <section class="panel">
                <header class="panel-heading">
                    添加图片
                </header>
                <!-- page start-->
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" id="sv" enctype="multipart/form-data"  method="post" action="<?php echo U('Front/pictureAdd');?>">
                        <input type="hidden" value="<?php echo ($albumId); ?>" name="id"/>
                        <input type="hidden" value="<?php echo ($mokuai_id); ?>" name="mokuai_id"/>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">图片</label>
                            <div class="col-sm-10 clearfix">
                                <input type="file" multiple="true" id="up_img" name="file1" class="form-control" style="border:none;display:inline-block;" form="form1">

                                <input type="hidden" name="img" id="fengmian" value="<?php  $name=$_GET['name']; echo $name; ?>"/>
                                <div id="imgDefault" style="float:left;">
                                    <img id="img" src="/appserver/Public/weixinapp/upload/<?php  $msg=$_GET['msg']; $name=$_GET['name']; if($msg){ echo $name;}else{?>touxiang.jpg<?php } ?>" style="margin:20px 20px 0 0;width:200px;"/>
                                    <button type="submit" class="btn btn-primary" id="upload" form="form1">上传</button>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">描述</label>
                            <div class="col-sm-10">
                                <input type="text" name="introduction" class="form-control">
                            </div>
                        </div>
                        <button type="submit" id="s" class="btn btn-info">提交</button>
                        <a href="<?php echo U('Front/albumList');?>" class="btn btn-danger">取消</a>


                    </form>
                    <form class="form-horizontal tasi-form"  enctype="multipart/form-data"  method="post" action="<?php echo U('Front/albumUpload');?>" id="form1">
                        <input type="hidden" value="add" name="sign"/>
                        <input type="hidden" value="<?php echo ($albumId); ?>" name="id"/>
                        <input type="hidden" value="<?php echo ($mokuai_id); ?>" name="mokuai_id"/>
                    </form>
                </div>



            </section>

            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

    <!-- Right Slidebar start -->
    <div class="sb-slidebar sb-right sb-style-overlay">


    </div>
    <!-- Right Slidebar end -->

    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            2014 &copy; vkadmin by Kairos.
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>


<!--<div class="result page"><?php echo ($page); ?></div>-->





<script src="/appserver/Public/weixinapp/js/jquery.js"></script>
<script src="/appserver/Public/weixinapp/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="/appserver/Public/weixinapp/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/appserver/Public/weixinapp/js/jquery.scrollTo.min.js"></script>
<script src="/appserver/Public/weixinapp/js/slidebars.min.js"></script>
<script src="/appserver/Public/weixinapp/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="/appserver/Public/weixinapp/js/respond.min.js" ></script>

<!--common script for all pages-->
<script src="/appserver/Public/weixinapp/js/common-scripts.js"></script>

<!--上传图片预览 js-->
<script src="/appserver/Public/weixinapp/js/uploadPreview.js"></script>
<script type="text/javascript">
    window.onload = function () {
        new uploadPreview({ UpBtn: "up_img", DivShow: "imgDefault", ImgShow: "img" });
//        $('#upload').click(function(){
//            var img=$('#up_img').val();
//            $.ajax({
//                url: '__APP_PATH__/Front/albumUpload',
//                type: 'post',
//                dataType: 'json',
//                data: {
//                    img:img,
//
//                },
//                success: function (data) {
//                }
//            })
//        })
    }
</script>
</body>
</html>