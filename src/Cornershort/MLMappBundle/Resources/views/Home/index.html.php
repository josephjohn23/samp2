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
                                    <table>
                                        <tr>
                                            <th style="font-size:2vw;">3&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal;"><a href="<?php echo $view['router']->path('cornershort_mlmapp_upgrade_member_page_manual', array()) ?>" >Members Needs Your Approval to Upgrade.</a></th>
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
                                            <th style="font-size:2vw;">Leader's ID:&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal;">PH000002</th>
                                        </tr>
                                        <tr>
                                            <th style="font-size:2vw;">Contact Number:&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal;">0925 123 4567</th>
                                        </tr>
                                        <tr>
                                            <th style="font-size:2vw;">Address:&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal;">Clark, Pampanga</th>
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
                                    <i class="fa fa-gift"></i>Your Total Earnings</div>
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
                                            <th style="font-size:2vw;">₱&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal;">53,500,798.00</th>
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
                                    <p style="font-size:2vw; font-weight:bold;">7</p>
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
