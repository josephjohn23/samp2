<?php $view->extend('CornershortMLMappBundle:Layout:data_tables_list.html.php'); ?>

<?php $view['slots']->set('PageTitle', 'Menu'); ?>
<?php $view['slots']->set('PageTitleSmall', ''); ?>

<?php $view['slots']->set('data-table-caption', '<i class="icon-settings"></i>Menu Children'); ?>

<?php $view['slots']->start('data-table-tools'); ?>
<a href="<?php echo $view['router']->path('cornershort_menu_view_child', array('id' => -1)) ?>" class="btn default btn-sm"><i class="fa fa-plus"></i> Add New</a>
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('data-table-thead'); ?>
<tr>
    <th>Id</td>
    <th>Parent</td>
    <th>Name</td>
    <th>Route</td>
    <th>Access Level</td>
    <th>Sort Id</td>
</tr>
<?php $view['slots']->stop(); ?>

<?php
$view['slots']->start('data-table-tbody');
foreach ($menu_child_rows as $row) {
    ?>
    <tr>
        <td><a href="<?php echo $view['router']->path('visor_cloud_menu_view_child', array('id' => $row['id'])) ?>"><i class="fa fa-pencil"></i> <?php echo $row['id']; ?></a></td>
        <td><i class="<?php echo $row['parent_icon']; ?>"></i> <?php echo $row['parent_name']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['route']; ?></td>
        <td><?php echo $row['access_level']; ?></td>
        <td><?php echo $row['sort_id']; ?></td>
    </tr>
    <?php
}
$view['slots']->stop()
?>
