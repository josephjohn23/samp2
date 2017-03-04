<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>
<?php $view->extend('CornershortMLMappBundle:Layout:data_tables_list.html.php'); ?>

<?php $view['slots']->set('PageTitle', 'Add New Member'); ?>
<?php $view['slots']->set('PageTitleSmall', ''); ?>

<?php $view['slots']->set('data-table-caption', '<i class="icon-settings"></i>Show Members'); ?>

<?php $view['slots']->start('data-table-thead'); ?>
<tr>
    <th>ID</th>
    <th>Leader's ID</th>
    <th>Member's ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Mobile Number</th>
    <th>Acct Exp Date</th>
    <th>Level</th>
    <th>Status</th>
</tr>
<?php $view['slots']->stop(); ?>

<?php
$view['slots']->start('data-table-tbody');
?>
    <?php foreach ($member_infos as $member_info) {?>
    <tr>
        <td><?php echo $member_info['id']; ?></td>
        <td><?php echo $member_info['leader_id']; ?></th>
        <td><?php echo $member_info['member_id']; ?></th>
        <td><?php echo $member_info['first_name']; ?></th>
        <td><?php echo $member_info['last_name']; ?></th>
        <td><?php echo $member_info['mobile_number']; ?></th>
        <td><?php echo $member_info['acct_exp_date']; ?></th>
        <td><?php echo $member_info['activation_level']; ?></th>
        <td><?php echo $member_info['status']; ?></th>
    </tr>
    <?php } ?>
<?php
$view['slots']->stop()
?>
