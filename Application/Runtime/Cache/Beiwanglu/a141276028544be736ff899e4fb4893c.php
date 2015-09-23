<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>规划宝后台管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="/appserver1/Public/guihuabao/css/bootstrap.min.css" rel="stylesheet">
    <link href="/appserver1/Public/guihuabao/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/appserver1/Public/guihuabao/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/appserver1/Public/guihuabao/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css " rel="stylesheet">
    <link href="/appserver1/Public/guihuabao/css/owl.carousel.css" rel="stylesheet">

    <!--right slidebar-->
    <link href="/appserver1/Public/guihuabao/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/appserver1/Public/guihuabao/css/styleone.css" rel="stylesheet">
    <link href="/appserver1/Public/guihuabao/css/style-responsive.css" rel="stylesheet">

    <link href="/appserver1/Public/guihuabao/css/ownset.css" rel="stylesheet">
</head>

<body>

<section id="container" >
    <!--header start-->
    
<header class="header reset" style="background: #1c7ff4;">
    <!--logo start-->
    <a class="logo"><img height="30" src="/appserver1/Public/guihuabao/img/logo_1.png"/></a>
    <!--logo end-->
</header>


    <!--header end-->
    <!--sidebar start-->
    <aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu reset mt80" id="nav-accordion">
            <li>
                <a>
                    <i class="fa user"></i>
                    <span>备忘录</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper mt80">
            <form class="form-horizontal tasi-form"  enctype= "multipart/form-data">

                <div class="hxzs_heading clearfix">
                    <h2>详情</h2>
                    <a href="<?php echo U('Beiwanglu/index',array('cid'=>$_SESSION['cid'],'uid'=>$_SESSION['uid'],'companyappid'=>$_SESSION['companyappid']));?>" class="btn btn-info" style="display:block;float:right;">返回列表</a>
                </div>
                <!--<g:hiddenField name="toolId" value="${toolId}"></g:hiddenField>-->
                <div class="mt25">
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label">标题：</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="<?php echo ($beiwangluInfo["title"]); ?>"  readonly/>
                        </div>
                    </div>
                    <div class="textarea">
                        <textarea style="width:100%;height:500px;" readonly ><?php echo ($beiwangluInfo["content"]); ?></textarea>
                    </div>

                </div>
            </form>
        </section>
        <!--main content end-->


    </section>


</section>
</body>
</html>