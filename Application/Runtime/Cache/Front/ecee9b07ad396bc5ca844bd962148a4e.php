<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html style="height:100%">
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
<body style="height:100%;">

    <!--header start-->

    <!--header end-->

    <!--main content start-->
    <!--<section id="main-content" style="margin:0;">-->
        <!--<section class="wrapper site-min-height" >-->
            <div class="row wrapper" style="height:100%;background:#000;margin:0;">
                <div class="col-sm-8" style="height:100%;">
                    <section class="panel" style="height:100%;background:#000;color:#fff;">
                        <header class="panel-heading clearfix">
                            图片详情
                            <a  class="btn btn-primary" style="margin-right: 20px;float: right" href="<?php echo U('Front/pictureDelete','id='.$pictureInfo['id']);?>" onclick="return confirm('确定要删除吗？') ">删除图片</a>
                            <!--<a  class="btn btn-primary" style="margin-right: 20px;float: right" href="<?php echo U('Front/pictureEdit','id='.$pictureInfo['id']);?>">修改备注</a>-->


                        </header>
                        <div class="panel-body" style="height:90%;text-align:center;">
                            <span style="display:inline-block;height:100%;vertical-align:middle;"></span>

                                 <img src="/appserver/Public/weixinapp/upload/<?php echo ($pictureInfo['img']); ?>" style="max-height:500px;"/>

                        </div>
                    </section>
                </div>
                <div class="col-sm-4" style="height:100%;">
                    <section class="panel" style="height:100%;">
                        <div class="panel-body" style="height:100%;">
                            <div class="clearfix">
                                <h2 style="font-size:16px;clear:both;color:#03a9f4">相册信息</h2>
                                <img src="/appserver/Public/weixinapp/upload/<?php echo ($albumInfo["fengmian"]); ?>" style="height:50px;height:50px;margin-right:20px;float:left">
                                <div style="float:left;">
                                    <div style="line-height:25px;">相册：<?php echo ($albumInfo["title"]); ?></div>
                                    <div style="line-height:25px;">创建时间：<?php echo ($albumInfo["add_date"]); ?></div>
                                </div>

                            </div>
                            <h2 style="font-size:16px;clear:both;color:#03a9f4">图片信息</h2>
                            <div style="margin-top:20px;">图片备注：<?php echo ($pictureInfo["introduction"]); ?></div>
                            <div>创建时间：<?php echo ($pictureInfo["add_date"]); ?></div>
                            <h2 style="font-size:16px;clear:both;color:#03a9f4">添加评论</h2>
                            <form enctype="multipart/form-data"  method="post" action="<?php echo U('Front/replyAdd');?>" class="clearfix">
                                <textarea name="content" style="width:100%;resize:none;" rows="4"></textarea>
                                <button type="reset" class="btn btn-info" style="float:right;margin-left:20px;"/>取消</button>
                                 <button type="submit"  class="btn btn-info" style="float:right;">提交</button>

                            </form>
                            <h2 style="font-size:16px;clear:both;color:#03a9f4">评论列表</h2>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="clearfix" style="border-bottom:1px solid #d2d2d2;">
                                    <img src="/appserver/Public/weixinapp/upload/<?php echo ($replyInfo["img"]); ?>" style="height:50px;height:50px;margin-right:20px;float:left;">
                                    <div style="float:left;">
                                        <div style="line-height:25px;"><?php echo ($replyInfo["puname"]); ?></div>
                                        <div style="line-height:25px;">创建时间：<?php echo ($replyInfo["add_date"]); ?></div>
                                    </div>
                                    <div><?php echo ($replyInfo["content"]); ?></div>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        <!--</section>-->
    <!--</section>-->
    <!--main content end-->

    <!-- Right Slidebar start -->
    <!--<div class="sb-slidebar sb-right sb-style-overlay">-->


    <!--</div>-->
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





<script src="/appserver/Public/weixinapp/js/jquery.js"></script>
<script src="/appserver/Public/weixinapp/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="/appserver/Public/weixinapp/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/appserver/Public/weixinapp/js/jquery.scrollTo.min.js"></script>
<script src="/appserver/Public/weixinapp/js/slidebars.min.js"></script>
<script src="/appserver/Public/weixinapp/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="/appserver/Public/weixinapp/js/respond.min.js" ></script>

<!--common script for all pages-->
<script src="/appserver/Public/weixinapp/js/common-scripts.js"></script>


</body>
</html>