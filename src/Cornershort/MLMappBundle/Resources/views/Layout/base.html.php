<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" ng-app="myAppModule">
    <!--<![endif]-->

    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php $view['slots']->output('title', 'CornerShort.com') ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="CornerShort Multi-Level Marketing Portal" name="description" />
        <meta content="" name="author" />

        <!-- BEGIN LAYOUT FIRST STYLES -->
        <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
        <!-- END LAYOUT FIRST STYLES -->

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/fullcalendar/fullcalendar.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/jqvmap/jqvmap/jqvmap.css') ?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/css/components-md.min.css') ?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/css/plugins-md.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/css/cornershort-layout-custom.css') ?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->

        <?php $view['slots']->output('page_plugin_css') ?>
        <?php $view['slots']->output('component_plugin_css') ?>
        <?php $view['slots']->output('layout_css') ?>
        <?php $view['slots']->output('page_css') ?>
        <?php $view['slots']->output('component_css') ?>

        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/layouts/layout6/css/layout.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/layouts/layout6/css/custom.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->

        <link rel="shortcut icon" href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/images/favicon.ico') ?>" /> </head>
    <!-- END HEAD -->

    <body ng-controller="myAppController" class="<?php $view['slots']->output('body_class', 'page-md') ?>">

        <?php $view['slots']->output('body') ?>

        <!--[if lt IE 9]>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/respond.min.js') ?>"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/excanvas.min.js') ?>"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/ie8.fix.min.js') ?>"></script>
        <![endif]-->

        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/jquery.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/js.cookie.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/jquery.blockui.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/angularjs/angular.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/angularjs/plugins/ui-bootstrap-tpls.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/fosjsrouting/js/router.js') ?>"></script>
        <script src="<?php echo $view['router']->generate('fos_js_routing_js', array('callback' => 'fos.Router.setData')) ?>"></script>
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <?php $view['slots']->output('page_plugin_js') ?>
        <?php $view['slots']->output('component_plugin_js') ?>
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/scripts/app.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/js/layout.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/js/main.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/js/controller/main.js') ?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/js/graph.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/layouts/layout6/scripts/layout.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/layouts/global/scripts/quick-sidebar.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/layouts/global/scripts/quick-nav.min.js') ?>" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <?php $view['slots']->output('layout_js') ?>
        <?php $view['slots']->output('page_js') ?>
        <?php $view['slots']->output('component_js') ?>
        <!-- END PAGE LEVEL SCRIPTS -->

    </body>
</html>
