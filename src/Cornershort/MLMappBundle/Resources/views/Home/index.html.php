<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>

<?php $view['slots']->start('content') ?>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box red">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>For Activation</div>
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
                                    <?php if ($member_infos) { ?>
                                    <a style="font-size: 2vw; color:#d9534f;" class="btn btn-lg btn-link" href="<?php echo $view['router']->path('cornershort_mlmapp_upgrade_member_page_manual', array()) ?>" ><?php echo sizeof($member_infos); ?>  Member/s needs your approval to upgrade.</a></th>
                                    <?php } else {?>
                                    <a style="font-size: 2vw; color:#d9534f;" class="btn btn-lg btn-link">Wait For your members to request for an upgrade.</a></th>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Your Next Leader To Contact</div>
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
                                            <th style="font-size:2vw; color:#276396;">Leader's Name:&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal; color:#276396;"><?php echo $next_leader_info['first_name'] . " " . $next_leader_info['last_name']; ?></th>
                                        </tr>
                                        <tr>
                                            <th style="font-size:2vw; color:#276396;">Contact Number:&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal; color:#276396;"><?php echo $next_leader_info['mobile_number']; ?></th>
                                        </tr>
                                        <tr>
                                            <th style="font-size:2vw; color:#276396;">Address:&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal; color:#276396;"><?php echo $next_leader_info['home_addr_city'] . ", " . $next_leader_info['home_addr_province']; ?></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Your Total Cash Earnings</div>
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
                                            <th style="font-size:2vw; color:#157a98;">₱&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal; color:#157a98;"><?php echo $total_cash_earnings; ?></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Your Total Check Earnings</div>
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
                                            <th style="font-size:2vw; color:#157a98;">₱&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal; color:#157a98;"><?php echo $total_card_earnings; ?></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box yellow">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Your Level Is</div>
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
                                    <p style="font-size:2vw; font-weight:bold; color:#8c6a19;"><?php echo $my_info_level; ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $view['slots']->stop() ?>
