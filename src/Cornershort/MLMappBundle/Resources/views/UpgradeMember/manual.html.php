<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>
<?php $view->extend('CornershortMLMappBundle:Layout:data_tables_list.html.php'); ?>

<?php $view['slots']->set('PageTitle', 'Manual Upgrade My Member'); ?>
<?php $view['slots']->set('PageTitleSmall', ''); ?>

<?php $view['slots']->set('data-table-caption', '<i class="icon-settings"></i>Manual Upgrade My Member'); ?>

<?php $view['slots']->start('data-table-thead'); ?>
<tr>
    <th>ID</th>
    <th>Leader's ID</th>
    <th>Member's ID</th>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Mobile Number</th>
    <th>Acct Exp Date</th>
    <th>Level</th>
    <th>Status</th>
    <th>Action</th>
</tr>
<?php $view['slots']->stop(); ?>

<?php
$view['slots']->start('data-table-tbody');
?>
    <tr>
        <td>1</td>
        <td>PH0001</th>
        <td>PH0002</td>
        <td>Dela Cruz</td>
        <td>Juan</td>
        <td>Manalo</td>
        <td>09251234567</td>
        <td>Feb 30, 2017</td>
        <td>1</td>
        <td>Active Request</td>
        <td><a href="#basic" data-toggle="modal">Upgrade</a></td>
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
