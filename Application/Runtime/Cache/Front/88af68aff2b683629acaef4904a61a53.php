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
    <link href="/appserver/Public/guihuabao/css/ownset.css" rel="stylesheet">
    <style>
        .c0{background-color: #3494ed;}
        .c1{background-color:#03ae87;}

       .xsreport li p{color:#fff;font-size:24px;text-align:center;padding:20px;word-wrap:break-word; word-break:normal;display:table-cell;vertical-align: middle;}
    </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/appserver/Public/js/html5shiv.js"></script>
    <script src="/appserver/Public/js/respond.min.js"></script>
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
    <!---->
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" style="margin-left:0;">
        <section class="wrapper site-min-height" >
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <!-- page start-->
                        <header class="panel-heading">
                            功能列表
                        </header>
                        <div class="panel-body" style="min-height:800px;">
                            <!--<a  class="btn btn-primary" style="margin-right: 20px;margin-top:10px;float: right" href="<?php echo U('gongneng/gongnengcreate');?>">创建功能</a>-->
                            <ul class="xsreport">
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>/mokuai_id/<?php echo ($vo["id"]); ?>" target="view_window" style="width:150px;height:150px;display:table;border-radius:150px;" class="c<?php echo ($i%2); ?>"><p>我是好人</p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <!--<table class="table table-striped" cellpadding=3 cellspacing=5>-->
                                <!--<thead>-->
                                <!--<tr>-->
                                    <!--&lt;!&ndash;<th>#</th>&ndash;&gt;-->
                                    <!--<th>编号</th>-->
                                    <!--<th>名称</th>-->
                                    <!--<th>备注</th>-->
                                    <!--<th>创建时间</th>-->
                                    <!--<th>操作</th>-->

                                <!--</tr>-->
                                <!--</thead>-->
                                <!--<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                                    <!--<tr>-->
                                        <!--<td><?php echo ($vo["id"]); ?></td>-->
                                        <!--<td><?php echo ($vo["name"]); ?></td>-->
                                        <!--<td><?php echo ($vo["url"]); ?></td>-->
                                        <!--<td><?php echo ($vo["cid"]); ?></td>-->
                                        <!--<td><?php echo ($vo["adddate"]); ?></td>-->


                                        <!--&lt;!&ndash;<td> <a  href="<?php echo U('wininfo/wininfolist','actId='.$vo['id']);?>"><button class="btn btn-primary btn-xs">&ndash;&gt;-->
                                        <!--&lt;!&ndash;中奖人</button></a>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<td> <a  href="<?php echo U('redenvelopelist/create','actId='.$vo['id']);?>"><button class="btn btn-primary btn-xs">&ndash;&gt;-->
                                        <!--&lt;!&ndash;奖品包</button></a>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<td> <a  href="<?php echo U('rulelist/create','actId='.$vo['id']);?>"><button class="btn btn-primary btn-xs">&ndash;&gt;-->
                                        <!--&lt;!&ndash;规则</button></a>&ndash;&gt;-->
                                        <!--<td> <a  href="<?php echo U('gongneng/gongnengshow','id='.$vo['id']);?>"><button class="btn btn-primary btn-xs">-->
                                            <!--<i class="fa fa-pencil"></i></button></a>-->
                                            <!--<a href="<?php echo U('gongneng/gongnengdelete','id='.$vo['id']);?>" onclick="return confirm('确定将此记录删除?')">-->
                                                <!--<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>-->
                                        <!--</td>-->
                                    <!--</tr>-->
                                <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                                <!--<tr>-->
                                <!--</tr>-->

                            <!--</table>-->
                            <!--<div class="dataTables_paginate paging_bootstrap pagination"><?php echo ($page); ?></div>-->
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