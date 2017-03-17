<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>

<?php $view['slots']->start('content') ?>
    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green-sharp" href="#">
                <div class="visual">
                    <i class="fa fa-money"></i>
                </div>
                <div class="details">
                    <div class="number">
                        ₱&nbsp <span data-counter="counterup" data-value="{{ homeTabResults.total_cash_earnings }}">{{ homeTabResults.total_cash_earnings }}</span>
                    </div>
                    <div class="desc"> Total Cash Earnings </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green-sharp" href="#">
                <div class="visual">
                    <i class="fa fa-credit-card"></i>
                </div>
                <div class="details">
                    <div class="number">
                        ₱&nbsp <span data-counter="counterup" data-value="{{ homeTabResults.total_card_earnings }}">{{ homeTabResults.total_card_earnings }}</span>
                    </div>
                    <div class="desc"> Total Check Earnings </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                <div class="visual">
                    <i class="fa fa-user"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ homeTabResults.my_info_level }}">{{ homeTabResults.my_info_level }}</span>
                    </div>
                    <div class="desc"> Current Level </div>
                </div>
            </a>
        </div>

        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet-body">
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
                                            <th style="font-size:2vw; font-weight: normal; color:#276396;">{{ homeTabResults.next_leader_info.first_name }} {{ homeTabResults.next_leader_info.last_name }}</th>
                                        </tr>
                                        <tr>
                                            <th style="font-size:2vw; color:#276396;">Contact Number:&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal; color:#276396;">{{ homeTabResults.next_leader_info.mobile_number }}</th>
                                        </tr>
                                        <tr>
                                            <th style="font-size:2vw; color:#276396;">Address:&nbsp</th>
                                            <th style="font-size:2vw; font-weight: normal; color:#276396;">{{ homeTabResults.next_leader_info.home_addr_city }}, {{ homeTabResults.next_leader_info.home_addr_province }}</th>
                                        </tr>
                                    </table>
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
