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
            <form class="form-horizontal tasi-form" action="<?php echo U('Beiwanglu/beiwangluAdd');?>" method="post"  enctype= "multipart/form-data">

                <div class="hxzs_heading clearfix">

                    <h2>新建</h2>
                    <a href="<?php echo U('Beiwanglu/index',array('cid'=>$_SESSION['cid'],'uid'=>$_SESSION['uid'],'companyappid'=>$_SESSION['companyappid']));?>" class="btn btn-info" style="display:block;float:right;">返回列表</a>

                    <button type="submit" class="btn btn-info f-r">保存</button>


                </div>
                <!--<g:hiddenField name="toolId" value="${toolId}"></g:hiddenField>-->
                <div class="mt25">
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label">标题：</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" name="title" />
                        </div>
                    </div>
                    <div class="textarea">
                        <textarea  name="content" style="width:100%;height:500px;"></textarea>
                    </div>

                </div>
            </form>
        </section>
        <!--main content end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="${resource(dir: 'js', file: 'jquery.js')}"></script>
    <script src="${resource(dir: 'js', file: 'bootstrap.min.js')}"></script>
    <script class="include" type="text/javascript" src="${resource(dir: 'js', file: 'jquery.dcjqaccordion.2.7.js')}"></script>
    <script src="${resource(dir: 'js', file: 'jquery.scrollTo.min.js')}"></script>
    <script src="${resource(dir: 'js', file: 'jquery.nicescroll.js')}" type="text/javascript"></script>
    <script src="${resource(dir: 'js', file: 'jquery.sparkline.js')}" type="text/javascript"></script>
    <script src="${resource(dir: 'assets/jquery-easy-pie-chart/', file: 'jquery.easy-pie-chart.js')}"></script>
    <script src="${resource(dir: 'js', file: 'owl.carousel.js')}" ></script>
    <script src="${resource(dir: 'js', file: 'jquery.customSelect.min.js')}" ></script>
    <script src="${resource(dir: 'js', file: 'respond.min.js')}" ></script>

    <!--right slidebar-->
    <script src="${resource(dir: 'js', file: 'slidebars.min.js')}"></script>

    <!--common script for all pages-->
    <script src="${resource(dir: 'js', file: 'common-scripts.js')}"></script>

    <!--script for this page-->
    <script src="${resource(dir: 'js', file: 'sparkline-chart.js')}"></script>
    <script src="${resource(dir: 'js', file: 'easy-pie-chart.js')}"></script>
    <script src="${resource(dir: 'js', file: 'count.js')}"></script>

    <!--keditor js-->
    <script charset="utf-8" src="${resource(dir: 'keditor', file: 'kindeditor.js')}"></script>
    <script charset="utf-8" src="${resource(dir: 'keditor/lang', file: 'zh_CN.js')}"></script>
</section>
</body>
</html>