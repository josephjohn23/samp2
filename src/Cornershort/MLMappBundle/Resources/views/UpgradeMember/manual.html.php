<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>
<?php $view->extend('CornershortMLMappBundle:Layout:data_tables_list.html.php'); ?>

<?php $view['slots']->set('PageTitle', 'Manual Upgrade My Member'); ?>
<?php $view['slots']->set('PageTitleSmall', ''); ?>

<?php $view['slots']->set('data-table-caption', '<i class="icon-settings"></i>Manual Upgrade My Member'); ?>

<?php $view['slots']->start('data-table-thead'); ?>
<div id="message_success" class="alert alert-success" style="display:none;">
    <span id="message_success"></span>
</div>

<div id="message_danger" class="alert alert-danger" style="display:none;">
    <span id="message_danger"></span>
</div>

<tr>
    <th>Leader's ID</th>
    <th>Member's ID</th>
    <th>First Name</th>
    <th>Last Name</th>
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
    <?php foreach ($member_infos as $member_info) { ?>
    <tr>
        <td><?php echo $member_info['leader_id']; ?></td>
        <td><?php echo $member_info['member_id']; ?></td>
        <td><?php echo $member_info['first_name']; ?></td>
        <td><?php echo $member_info['last_name']; ?></td>
        <td><?php echo $member_info['mobile_number']; ?></td>
        <td><?php echo $member_info['acct_exp_date']; ?></td>
        <td><?php echo $member_info['activation_level']; ?></td>
        <td><?php echo $member_info['status']; ?></td>
        <td>
            <button href="#basic" data-toggle="modal" class="btn btn-success">Upgrade</button>
        </td>
    </tr>
    <?php } ?>

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
                    <button id='cornershort-form-submit' class="btn btn-green" onClick="$('#basic').modal('hide'); requestUpgrade();"> <i class="fa fa-check" style="font-size:25px;"></i></button>
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
