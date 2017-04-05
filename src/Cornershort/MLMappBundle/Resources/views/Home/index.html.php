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
    </div>
<?php $view['slots']->stop() ?>
