<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>

<script type="text/javascript">
    window.onload = function () {

                var chart = new CanvasJS.Chart("chartContainer", {
                    theme: "theme1",//theme1
                    title:{
                        text: "ADMIN'S BANK WITHDRAWAL THRU CREDIT CARD"
                    },
                    animationEnabled: true,   // change to true
                    data: [
                    {
                        // Change type to "column", "bar", "splineArea", "area", "spline", "pie",etc.
                        type: "spline",
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

                var chart2 = new CanvasJS.Chart("chartContainer2", {
                    theme: "theme1",//theme1
                    title:{
                        text: "ADMIN'S BANK WITHDRAWAL THRU CASH"
                    },
                    animationEnabled: true,   // change to true
                    data: [
                    {
                        // Change type to "column", "bar", "splineArea", "area", "spline", "pie",etc.
                        type: "spline",
                        dataPoints: [
                            { label: "Feb",  y: 3050000  },
            				{ label: "Mar", y: 5376649  },
            				{ label: "Apr", y: 6523942  },
            				{ label: "May",  y: 7034543  },
            				{ label: "June",  y: 13838228  }
                        ]
                    }
                    ]
                });

                chart.render();
                chart2.render();
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
                                    <i class="fa fa-gift"></i>Admin Report Page - Sales Tab 3</div>
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
                                <div class="scroller" style="height:500px; display: flex; justify-content: center; align-items: center;">
                                    <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
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
