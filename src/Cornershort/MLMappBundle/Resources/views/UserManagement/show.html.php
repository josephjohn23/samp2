<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>
<?php $view->extend('CornershortMLMappBundle:Layout:data_tables_list.html.php'); ?>

<?php $view['slots']->set('PageTitle', 'Show Users'); ?>
<?php $view['slots']->set('PageTitleSmall', ''); ?>

<?php $view['slots']->set('data-table-caption', '<i class="icon-settings"></i>Show Users'); ?>

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
         <td><a href="<?php echo $view['router']->path('cornershort_mlmapp_user_management_page_edit', array('id' => 1)) ?>"><i class="fa fa-pencil"></i> <?php echo 1; ?></a></td>
        <td>PH0001</th>
        <td>PH0002</td>
        <td>Dela Cruz</td>
        <td>Juan</td>
        <td>Manalo</td>
        <td>09251234567</td>
        <td>Feb 30, 2017</td>
        <td>1</td>
        <td>Active</td>
        <td>Upgrade</td>
    </tr>
<?php
$view['slots']->stop()
?>
