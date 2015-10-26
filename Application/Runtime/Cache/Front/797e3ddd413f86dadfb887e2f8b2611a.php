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
<section id="container" class="">
    <!--header start-->
    
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
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <!-- page start-->
                        <header class="panel-heading clearfix">
                            相册列表
                            <a  class="btn btn-primary" style="margin-right: 20px;float: right" href="<?php echo U('Album/albumCreate','mokuai_id='.$mokuai_id);?>">创建相册</a>
                        </header>
                        <div class="panel-body">

                           <ul class="albumlist clearfix row">
                               <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="album col-sm-2">
                                        <a class="album_pic" href="<?php echo U('Album/albumShow',array('id'=>$vo['id'],'mokuai_id'=>$mokuai_id));?>"><img src="/appserver/Public/weixinapp/upload/<?php echo ($vo['fengmian']); ?>"/></a>
                                        <span><?php echo ($vo["title"]); ?></span>
                                   </li><?php endforeach; endif; else: echo "" ;endif; ?>
                           </ul>
                            <div class="dataTables_paginate paging_bootstrap pagination"><?php echo ($page); ?></div>
                        </div>
                    </section>
                </div></div>
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
<body>

</body>
</html>