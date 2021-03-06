<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>

<?php $view['slots']->start('content') ?>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="message_success" class="alert alert-success" style="display:none;">
                            <span id="message_success"></span>
                        </div>

                        <div id="message_danger" class="alert alert-danger" style="display:none;">
                            <span id="message_danger"></span>
                        </div>

                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Search Member's ID to Upgrade</div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                    <a href="javascript:;" class="reload"> </a>
                                    <a href="" class="fullscreen"> </a>
                                    <a href="javascript:;" class="remove"> </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:flex; justify-content:center;">
                                        <div class="form-group form-md-line-input" >
                                            <input type="text" class="form-control" id="member_id" name="member_id" value="" placeholder="Member's ID">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="display:flex; justify-content:center;">
                                    <div class="form-actions noborder col-lg-4 col-md-4 col-sm-4 col-xs-4" style="display:flex; justify-content:center;">
                                        <button type="button" id="visor-form-submit" class="btn btn-lg btn-success" ng-Click="adminToolsTab_searchMember();">Search</button>
                                    </div>
                                </div>

                                <div class="scroller" ng-if="memberInfo">
                                    <div class="scroller" style="height:500px; display: flex; justify-content: center; align-items: center;">
                                        <table>
                                            <tr>
                                                <th style="font-size:2vw;">Leader's ID:&nbsp</th>
                                                <th style="font-size:2vw; font-weight: normal;">{{ memberInfo.leader_id }}</th>
                                            </tr>
                                            <tr>
                                                <th style="font-size:2vw;">Member's ID:&nbsp</th>
                                                <th style="font-size:2vw; font-weight: normal;">{{ memberInfo.member_id }}</th>
                                            </tr>
                                            <tr>
                                                <th style="font-size:2vw;">Name:&nbsp</th>
                                                <th style="font-size:2vw; font-weight: normal;">{{ memberInfo.first_name }}&nbsp{{ memberInfo.last_name }}</th>
                                            </tr>
                                            <tr>
                                                <th style="font-size:2vw;">Contact Number:&nbsp</th>
                                                <th style="font-size:2vw; font-weight: normal;">{{ memberInfo.mobile_number }}</th>
                                            </tr>
                                            <tr>
                                                <th style="font-size:2vw;">Level:&nbsp</th>
                                                <th style="font-size:2vw; font-weight: normal;">{{ memberInfo.activation_level }}</th>
                                            </tr>
                                            <tr>
                                                <th style="font-size:2vw;">Address:&nbsp</th>
                                                <th style="font-size:2vw; font-weight: normal;">{{ memberInfo.home_addr_city }}&nbsp{{ memberInfo.home_addr_province }}</th>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="form-actions noborder" style="display:flex; justify-content:flex-end;">
                                        <button href="#basic" data-toggle="modal" type="button" id="visor-form-submit" class="btn btn-lg btn-success">Upgrade to Level {{ memberInfo.activation_level + 1 }}</button>
                                    </div>
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
                    <button id='cornershort-form-submit' class="btn btn-green" onClick="$('#basic').modal('hide');" ng-Click="adminToolsTab_updateProductMember();"> <i class="fa fa-check" style="font-size:25px;"></i></button>
                    <a class="btn" style="background:#dddddd;" onClick="$('#basic').modal('hide');"> <i class="fa fa-times" style="font-size:25px;"></i></a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php $view['slots']->stop() ?>
