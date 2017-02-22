<?php $view->extend('VisorCloudBundle:Layouts:layout.html.php') ?>

<?php $view['slots']->start('page_css') ?>
<link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('bundles/visorcloud/assets/global/plugins/select2/select2.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('bundles/visorcloud/assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('bundles/visorcloud/assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('bundles/visorcloud/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css'); ?>"/>
<?php $view['slots']->stop() ?>



<?php $view['slots']->start('after-content') ?>
<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <?php $view['slots']->output('data-table-caption', '<i class="fa fa-users"></i>Data Table'); ?>
                </div>
                <div class="tools">
                    <?php $view['slots']->output('data-table-tools', ''); ?>
                </div>
            </div>

            <div class="portlet-body">
                <table id="visor-responsive-datatable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <?php $view['slots']->output('data-table-thead', '<tr><th></th></tr>'); ?>
                    </thead>
                    <tbody>
                        <?php $view['slots']->output('data-table-tbody', '<tr><td></td></tr>'); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $view['slots']->stop() ?>



<?php $view['slots']->start('page_plugin_js') ?>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/visorcloud/assets/global/plugins/select2/select2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/visorcloud/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/visorcloud/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/visorcloud/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/visorcloud/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/visorcloud/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/visorcloud/js/table-advanced.js') ?>"></script>
<?php $view['slots']->stop() ?>
