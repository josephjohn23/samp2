<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>

<?php $view['slots']->start('page-toolbar') ?>
<!-- <div class="form-actions noborder">
    <button type="button" id="visor-form-submit" class="btn btn-lg btn-success">Submit</button>
    <button type="button" id="visor-form-cancel" class="btn btn-lg red">Cancel</button>
</div> -->
<?php $view['slots']->stop() ?>


<?php $view['slots']->start('content') ?>

<form id="visor-form" method="<?php $view['slots']->output('visor-form-method', 'post') ?>" action="<?php $view['slots']->output('visor-form-action', '') ?>">
    <div class="form-body">
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            You have some form errors. Please check below.
        </div>
        <div class="alert alert-success display-hide">
            <button class="close" data-close="alert"></button>
            Your form validation is successful!
        </div>
        <?php $view['slots']->output('visor-form-body', '') ?>
    </div>
</form>

<?php $view['slots']->stop() ?>


<?php
$slot_content = '';
if ($view['slots']->has('page_plugin_js')) {
    $slot_content = $view['slots']->get('page_plugin_js');
}
?>

<?php $view['slots']->start('page_plugin_js') ?>
<?php echo $slot_content ?>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/global/plugins/jquery-validation/js/additional-methods.min.js') ?>"></script>
<?php $view['slots']->stop() ?>


<?php
$slot_content = '';
if ($view['slots']->has('page_js')) {
    $slot_content = $view['slots']->get('page_js');
}
?>

<?php $view['slots']->start('page_js') ?>
<?php echo $slot_content ?>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('bundles/cornershortmlmapp/assets/js/visor-form-validation.js') ?>"></script>
<script>
    $.validator.addMethod("unique", function (value, element) {
        var parentForm = $(element).closest('form');
        var timeRepeated = 0;
        if (value != '') {
            $(parentForm.find(':text')).each(function () {
                if ($(this).val() === value) {
                    timeRepeated++;
                }
            });
        }
        return timeRepeated === 1 || timeRepeated === 0;

    }, "* Duplicate");
    jQuery(document).ready(function () {
        FormValidation.init();
    });
</script>
<?php $view['slots']->stop() ?>
