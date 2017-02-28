<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>

<script type="text/javascript">
    window.onload = function () {

                var chart = new CanvasJS.Chart("chartContainer", {
                    theme: "theme1",//theme1
                    title:{
                        text: "MEMBER'S SALES THRU CREDIT CARD"
                    },
                    animationEnabled: true,   // change to true
                    data: [
                    {
                        // Change type to "column", "bar", "splineArea", "area", "spline", "pie",etc.
                        type: "column",
                        dataPoints: [
                            { label: "Feb",  y: 1050000  },
            				{ label: "Mar", y: 2376649  },
            				{ label: "Apr", y: 2523942  },
            				{ label: "May",  y: 3034543  },
            				{ label: "June",  y: 4838228  }
                        ]
                    }
                    ]
                });
                chart.render();
    }
</script>

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
                                    <i class="fa fa-gift"></i>Admin Report Page - Sales Tab 1</div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                    <a href="javascript:;" class="reload"> </a>
                                    <a href="" class="fullscreen"> </a>
                                    <a href="javascript:;" class="remove"> </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="scroller" style="height:500px; display: flex; justify-content: center; align-items: center;">
                                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
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
