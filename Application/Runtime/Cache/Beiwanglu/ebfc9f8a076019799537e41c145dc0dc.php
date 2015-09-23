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
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 style="float:left;">备忘录列表</h2>
                            <a href="<?php echo U('Beiwanglu/create');?>" class="btn btn-info" style="display:block;float:right;">新建</a>
                            <div style="clear:both;"></div>
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="70%">标题</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="${(i % 2) == 0 ? 'even' : 'odd'}">
                                    <td><?php echo ($vo["id"]); ?></td>
                                    <td><a href="<?php echo U('Beiwanglu/show','id='.$vo['id']);?>"><?php echo ($vo["title"]); ?></a></td>
                                    <td>
                                        <a href="<?php echo U('Beiwanglu/show','id='.$vo['id']);?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                                        <a href="<?php echo U('Beiwanglu/update','id='.$vo['id']);?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                        <a href="<?php echo U('Beiwanglu/beiwangluDelete','id='.$vo['id']);?>" class="btn btn-danger btn-xs" onclick="return confirm('确定删除？');"><i class="fa fa-trash-o "></i></a>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                            </tbody>
                        </table>
                        <div class="pagination">
                           <!--<?php echo ($page); ?>-->
                        </div>
                    </section>
                </div>
            </div>


        </section>
    </section>
    <!--main content end-->
</section>





</body>
</html>