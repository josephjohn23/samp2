<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>

<?php $view['slots']->start('page_css') ?>
<link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/select2/css/select2.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'); ?>"/>
<?php $view['slots']->stop() ?>



<?php $view['slots']->start('after-content') ?>
<div class="row">
    <div class="col-md-12">

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <?php $view['slots']->output('data-table-caption', '<i class="fa fa-users"></i>Data Table'); ?>
                </div>
                <div class="actions">
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
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/select2/js/select2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/js/table-advanced.js') ?>"></script>
<?php $view['slots']->stop() ?>


<?php $view['slots']->start('page_js') ?>
<script>
    $(document).ready(function () {
        $('#visor-responsive-datatable').DataTable({
            "lengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "All"]]
            , "pageLength": 15
        });
    });
</script>
<?php $view['slots']->stop() ?>
