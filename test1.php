<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Print</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/print.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <style type="text/css">
        img{
            width: 70%;
           
        }
        @media print{

            a[href]:after{
                content: none !important;
            }
            .theme-settings{
                display: none;
            }
        }
            
    </style>
    <body class="page-container-boxed">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- PAGE CONTENT -->
            <div class="page-content">
                <div class="row">
    <div class="col-sm-6">
        <label class="control-label">Start date:<em style="color:red">*</em></label>
        <div class="form-group">
            <div class="input-group date" id="startDatepicker">
                <input type="text" class="form-control" placeholder="MM/DD/YYYY" ng-model="defaultStartDate" name="startDate">
                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <label class="control-label">End date:<em style="color:red">*</em></label>
        <div class="form-group">
            <div class="input-group date" id="endDatepicker">
                <input type="text" class="form-control" placeholder="MM/DD/YYYY" ng-model="defaultEndDate" name="endDate">
                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>

    <!--/col-->
    <div class="col-sm-6">
        <label class="control-label">Start Time:<em style="color:red">*</em></label>
        <div class="form-group">
            <div class="input-group" id="startTimepicker">
                <input type="text" class="form-control" placeholder="00:00 AM/PM" ng-model="defaultStartTime" name="startTime">
                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <label class="control-label">End Time:<em style="color:red">*</em></label>
        <div class="form-group">
            <div class="input-group" id="endTimepicker">
                <input type="text" class="form-control" placeholder="00:00 AM/PM" ng-model="defaultEndTime" name="endTime">
                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>

                </span>
            </div>
        </div>

    </div>
</div>
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

       <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->
        
        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

        <script type="text/javascript" src="js/plugins/fileinput/fileinput.min.js"></script>
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="controller.js"></script>
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>  
    <!-- END SCRIPTS -->            
    </body>
</html>






