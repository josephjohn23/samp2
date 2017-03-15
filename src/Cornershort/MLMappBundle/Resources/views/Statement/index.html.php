<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>
<?php $view->extend('CornershortMLMappBundle:Layout:data_tables_list.html.php'); ?>

<?php $view['slots']->set('PageTitle', 'Add New Member'); ?>
<?php $view['slots']->set('PageTitleSmall', ''); ?>

<?php $view['slots']->set('data-table-caption', '<i class="icon-settings"></i>Show Members'); ?>

<?php $view['slots']->start('data-table-thead'); ?>
    <tr>
        <th>Member's ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Level</th>
        <th style="font-weight:bold; color:red;">Amount = {{ statementTabResultsTotal[0].total ? statementTabResultsTotal[0].total : 0 }}</th>
        <th>Date</th>
    </tr>
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('data-table-tbody'); ?>
    <tr ng-repeat="statementTabResult in statementTabResults">
        <td>{{ statementTabResult.member_id }}</td>
        <td>{{ statementTabResult.first_name }}</td>
        <td>{{ statementTabResult.last_name }}</td>
        <td>{{ statementTabResult.activation_level }}</td>
        <td>{{ statementTabResult.level_amount }}</td>
        <td>{{ statementTabResult.date_completed }}</td>
    </tr>

    <div>
        <select style="width: 50%; margin-bottom: 2px;" class="form-control col-md-6" id="month" name="month" >
          <option value="01">January</option>
          <option value="02">February</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
        <select style="width: 50%; margin-bottom: 2px;" class="form-control col-md-6" id="year" name="month" >
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
        </select>
    </div>

<?php $view['slots']->stop() ?>
