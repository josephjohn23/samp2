<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>

<?php $view['slots']->start('content') ?>
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
                                <div class="scroller" style="height:200px; display: flex; justify-content: center; align-items: center;">
                                    <h2 style="font-weight:bold; color:red; font-family:Source Sans Pro;">CLICK THE BUTTON TO REQUEST FOR AN UPGRADE</h2>
                                </div>
                                <div class="form-actions noborder" style="display:flex; justify-content:flex-end;">
                                    <button type="button" id="visor-form-submit" class="btn green">Upgrade Now</button>
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
