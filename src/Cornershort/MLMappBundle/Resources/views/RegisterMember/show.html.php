<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>
<?php $view->extend('CornershortMLMappBundle:Layout:data_tables_list.html.php'); ?>

<?php $view['slots']->set('PageTitle', 'Add New Member'); ?>
<?php $view['slots']->set('PageTitleSmall', ''); ?>

<?php $view['slots']->set('data-table-caption', '<i class="icon-settings"></i>Show Members'); ?>

<?php $view['slots']->start('data-table-thead'); ?>
    <tr>
        <th>Leader's ID</th>
        <th>Member's ID</th>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Mobile Number</th>
        <th>Level</th>
    </tr>
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('data-table-tbody'); ?>
    <?php foreach ($memberInfos as $memberInfo) {?>
    <tr>
        <td><?php echo $memberInfo->getLeaderId(); ?></th>
        <td><?php echo $memberInfo->getMemberId(); ?></th>
        <td><?php echo $memberInfo->getEmail(); ?></th>
        <td><?php echo $memberInfo->getFirstName(); ?></th>
        <td><?php echo $memberInfo->getLastName(); ?></th>
        <td><?php echo $memberInfo->getMobileNumber(); ?></th>
        <td><?php echo $memberInfo->getActivationLevel(); ?></th>
    </tr>
    <?php } ?>
<?php $view['slots']->stop() ?>
