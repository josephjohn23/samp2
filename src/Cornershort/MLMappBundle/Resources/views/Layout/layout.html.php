<?php $view->extend('CornershortMLMappBundle:Layout:base.html.php') ?>

<?php $view['slots']->start('body') ?>

<!-- BEGIN HEADER -->
<?php
echo $view['actions']->render(
        new \Symfony\Component\HttpKernel\Controller\ControllerReference(
        'CornershortMLMappBundle:Default:pageHeader', array('route' => $app->getRequest()->attributes->get('_route'))
        )
);
?>
<!-- END HEADER -->

<!-- BEGIN CONTAINER -->
<div class="container-fluid">
    <div class="page-content page-content-popup">
        <div class="page-content-fixed-header">
            <!-- BEGIN BREADCRUMBS -->
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo $view['router']->path('cornershort_mlmapp_homepage') ?>">Home</a>
                </li>
                <?php
                if ($app->getSession()->get('menu_parent_name')) {
                    ?>
                    <li>
                        <i class="<?php echo $app->getSession()->get('menu_parent_icon'); ?>"></i>
                        <?php echo $app->getSession()->get('menu_parent_name'); ?>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <?php
                }
                ?>
                <?php
                if ($app->getSession()->get('menu_route')) {

                    if ($app->getSession()->get('menu_route') != $app->getRequest()->attributes->get('_route')) {
                        $liText = '<a href="' . $view['router']->path($app->getSession()->get('menu_route')) . '">' . $app->getSession()->get('menu_name') . '</a>';
                    } else {
                        $liText = $app->getSession()->get('menu_name');
                    }
                    ?>
                    <li>
                        <?php
                        echo $liText;
                        if ($app->getSession()->get('menu_route') != $app->getRequest()->attributes->get('_route')) {
                            ?>
                            <i class="fa fa-angle-right"></i>
                            <?php
                        }
                        ?>
                    </li>
                    <?php
                }
                ?>
                <?php
                if ($app->getSession()->get('menu_route') != $app->getRequest()->attributes->get('_route')) {
                    ?>
                    <li>View</li>
                    <?php
                }
                ?>
            </ul>
            <!-- END BREADCRUMBS -->

        </div>
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR MENU -->
            <?php
            echo $view['actions']->render(
                    new \Symfony\Component\HttpKernel\Controller\ControllerReference(
                    'CornershortMLMappBundle:Default:sidebarMenu', array('route' => $app->getRequest()->attributes->get('_route'))
                    )
            );
            ?>
            <!-- END SIDEBAR MENU -->
        </div>
        <div class="page-fixed-main-content">
            <!-- BEGIN PAGE BASE CONTENT -->
            <?php $view['slots']->output('before-content') ?>
            <?php $view['slots']->output('content') ?>
            <?php $view['slots']->output('_content') ?>
            <?php $view['slots']->output('after-content') ?>
            <!-- END PAGE BASE CONTENT -->

            <div class="page-toolbar">
                <?php $view['slots']->output('page-toolbar') ?>
            </div>
        </div>

        <!-- BEGIN FOOTER -->
        <p class="copyright-v2">
            <?php echo date('Y', time()) ?> &copy;  CornerShort.com MLM Portal v<?php echo $this->container->getParameter('application_version'); ?>
        </p>
        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
        <!-- END QUICK SIDEBAR TOGGLER -->
        <a href="#index" class="go2top">
            <i class="icon-arrow-up"></i>
        </a>
        <!-- END FOOTER -->
    </div>
</div>
<!-- END CONTAINER -->


<?php $view['slots']->stop() ?>

<?php $view['slots']->start('layout_js') ?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        //Layout.init(); // init current layout
        //QuickSidebar.init(); // init quick sidebar
    });
</script>
<!--
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $this->container->getParameter('ga_tracking') ?>', 'auto');
  ga('send', 'pageview');

</script>
-->
<?php $view['slots']->stop() ?>
