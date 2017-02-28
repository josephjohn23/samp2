<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>
<?php $view->extend('CornershortMLMappBundle:Layout:data_tables_list.html.php'); ?>

<?php $view['slots']->set('PageTitle', 'Show Bank Withdrawal'); ?>
<?php $view['slots']->set('PageTitleSmall', ''); ?>

<?php $view['slots']->set('data-table-caption', '<i class="icon-settings"></i>Show Bank Withdrawal'); ?>

<?php $view['slots']->start('data-table-tools'); ?>
<a href="<?php echo $view['router']->path('cornershort_mlmapp_report_page_bank_withdraw_add', array()) ?>"><i class="fa fa-plus"></i>Add New</a>
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('data-table-thead'); ?>
<tr>
    <th>ID</th>
    <th>Description</th>
    <th>Transfer To Name</th>
    <th>Amount</th>
    <th>Payment Option</th>
    <th>Transfer By</th>
    <th>Date Transfered</th>
</tr>
<?php $view['slots']->stop(); ?>

<?php
$view['slots']->start('data-table-tbody');
?>
    <tr>
        <td><a href="<?php echo $view['router']->path('cornershort_mlmapp_report_page_bank_withdraw_edit', array('id' => 1)) ?>"><i class="fa fa-pencil"></i>1</a></td>
        <td>For June Sales</th>
        <td>Paulo Miguel</td>
        <td>6,235,343</td>
        <td>Cash</td>
        <td>Joseph Hilario</td>
        <td>Feb 30, 2017</td>
    </tr>
<?php
$view['slots']->stop()
?>
