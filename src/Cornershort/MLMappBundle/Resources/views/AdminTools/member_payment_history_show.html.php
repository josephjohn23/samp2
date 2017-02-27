<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>
<?php $view->extend('CornershortMLMappBundle:Layout:data_tables_list.html.php'); ?>

<?php $view['slots']->set('PageTitle', 'Show Member Payment History'); ?>
<?php $view['slots']->set('PageTitleSmall', ''); ?>

<?php $view['slots']->set('data-table-caption', '<i class="icon-settings"></i>Show Member Payment History'); ?>

<?php $view['slots']->start('data-table-thead'); ?>

<tr>
    <th>ID</th>
    <th>Order No</th>
    <th>Leader's ID</th>
    <th>Member's ID</th>
    <th>Payment Option</th>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Level Amount</th>
    <th>Product Amount</th>
    <th>Requested</th>
    <th>Level Upgraded</th>
    <th>Product Upgraded</th>
    <th>Completed</th>
    <th>Level</th>
</tr>
<?php $view['slots']->stop(); ?>

<?php
$view['slots']->start('data-table-tbody');
?>
    <tr>
        <td>1</td>
        <td>00001</td>
        <td>PH0001</th>
        <td>PH0002</td>
        <td>Card</td>
        <td>Manalo</td>
        <td>Juan</td>
        <td>PHP 1,500</td>
        <td>PHP 1,500</td>
        <td>Feb 30, 2017</td>
        <td>Feb 30, 2017</td>
        <td>Feb 30, 2017</td>
        <td>Feb 30, 2017</td>
        <td>1</td>
    </tr>

    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header error-dialog-type" style="background:#c9302c; color:white;">
                    <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Confirmation</h4>
                </div>
                <div class="modal-body">
                    <h3 class="modal-title">Are you sure you want to Upgrade this member? <span class="device-name" style="font-weight:bold;"></h3>
                </div>
                <div class="modal-footer">
                    <button id='cornershort-form-submit' class="btn btn-green" onClick="$('#basic').modal('hide');"> <i class="fa fa-check" style="font-size:25px;"></i></button>
                    <a class="btn" style="background:#dddddd;" onClick="$('#basic').modal('hide');"> <i class="fa fa-times" style="font-size:25px;"></i></a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php
$view['slots']->stop()
?>
