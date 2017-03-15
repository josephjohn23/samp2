<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>
<?php $view->extend('CornershortMLMappBundle:Layout:data_tables_list.html.php'); ?>

<?php $view['slots']->set('PageTitle', 'Show Member Payment History'); ?>
<?php $view['slots']->set('PageTitleSmall', ''); ?>

<?php $view['slots']->set('data-table-caption', '<i class="icon-settings"></i>Show Member Payment History'); ?>

<?php $view['slots']->start('data-table-thead'); ?>

<tr>
    <th>ID</th>
    <th>Leader's ID</th>
    <th>Member's ID</th>
    <th>Payment Option</th>
    <th>Level</th>
    <th>Product Amount</th>
    <th>Level Amount</th>
    <th>Requested</th>
    <th>Level Upgraded</th>
    <th>Is Level Paid</th>
    <th>Product Upgraded</th>
    <th>Is Product Paid</th>
    <th>Completed</th>
    <th>Is Level Requested</th>
</tr>
<?php $view['slots']->stop(); ?>

<?php
$view['slots']->start('data-table-tbody');
?>
<?php foreach ($member_histories as $member_history) {?>
<tr>
    <td><?php echo $member_history['id']; ?></td>
    <td><?php echo $member_history['leader_id']; ?></th>
    <td><?php echo $member_history['member_id']; ?></th>
    <td><?php echo $member_history['membership_option']; ?></th>
    <td><?php echo $member_history['activation_level']; ?></th>
    <td><?php echo $member_history['product_amount']; ?></th>
    <td><?php echo $member_history['level_amount']; ?></th>
    <td><?php echo $member_history['date_requested']; ?></th>
    <td><?php echo $member_history['date_level_upgraded']; ?></th>
    <td><?php echo $member_history['is_level_paid']; ?></th>
    <td><?php echo $member_history['date_product_upgraded']; ?></th>
    <td><?php echo $member_history['is_product_paid']; ?></th>
    <td><?php echo $member_history['date_completed']; ?></th>
    <td><?php echo $member_history['is_level_requested']; ?></th>
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
