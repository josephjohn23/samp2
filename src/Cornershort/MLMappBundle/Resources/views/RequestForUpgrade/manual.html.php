<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>

<?php $view['slots']->start('content') ?>
    <div id="message_success" class="alert alert-success" style="display:none;">
        <span id="message_success"></span>
    </div>

    <div id="message_danger" class="alert alert-danger" style="display:none;">
        <span id="message_danger"></span>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Your Next Leader To Contact For Upgrade</div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                    <a href="javascript:;" class="reload"> </a>
                                    <a href="" class="fullscreen"> </a>
                                    <a href="javascript:;" class="remove"> </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="scroller" style="height:200px; display: flex; justify-content: center; align-items: center;">
                                    <table>
                                        <tr>
                                            <th style="font-size:2vw;">Leader's Name:&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal;">{{ requestUpgradeTabResults.next_leader_info['first_name'] }} {{ requestUpgradeTabResults.next_leader_info['last_name'] }}</th>
                                        </tr>
                                        <tr>
                                            <th style="font-size:2vw;">Contact Number:&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal;">{{ requestUpgradeTabResults.next_leader_info['mobile_number'] }}</th>
                                        </tr>
                                        <tr>
                                            <th style="font-size:2vw;">Address:&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal;">{{ requestUpgradeTabResults.next_leader_info['home_addr_city'] }}, {{ requestUpgradeTabResults.next_leader_info['home_addr_province'] }}</th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="scroller" style="height:200px; display: flex; justify-content: center; align-items: center;">
                                    <h2 style="font-weight:bold; color:red; font-family:Source Sans Pro; color:#d9534f" ng-if="requestUpgradeTabResults.isLevelPaid.length < 1">CLICK THE BUTTON TO REQUEST FOR AN UPGRADE</h2>
                                </div>
                                <div class="form-actions noborder" style="display:flex; justify-content:flex-end;">
                                    <button href="#basic" data-toggle="modal" type="button" id="visor-form-submit" class="btn btn-lg btn-success" ng-if="requestUpgradeTabResults.isLevelPaid.length < 1">Upgrade to Level {{ requestUpgradeTabResults.my_info['activation_level'] }}</button>
                                    <p style="font-size:1.5vw; font-weight:bold; color:#157a98;" ng-if="requestUpgradeTabResults.isLevelPaid.length > 0">You had already requested for an upgrade!</p>
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header error-dialog-type" style="background:#c9302c; color:white;">
                    <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Confirmation</h4>
                </div>
                <div class="modal-body">
                    <h3 class="modal-title">Are you sure you want to Upgrade? <span class="device-name" style="font-weight:bold;"></h3>
                </div>
                <div class="modal-footer">
                    <button id='cornershort-form-submit' class="btn btn-green" onClick="$('#basic').modal('hide');" ng-click="requestUpgradeTab_manual();"> <i class="fa fa-check" style="font-size:25px;"></i></button>
                    <a class="btn" style="background:#dddddd;" onClick="$('#basic').modal('hide');"> <i class="fa fa-times" style="font-size:25px;"></i></a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php $view['slots']->stop() ?>
