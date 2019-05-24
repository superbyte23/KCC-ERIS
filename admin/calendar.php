<?php
include 'include/header.php';
?>
            <?php
            include 'include/sidebar.php';
            ?>
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <?php
                        include 'include/topbar.php';
                        ?>                      

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li class="active"><a href="index.php">Dashboard</a></li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
               <!-- START CONTENT FRAME -->
                <div class="content-frame">            
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-calendar"></span> Calendar</h2>
                        </div>  
                        <div class="pull-right">
                            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                        </div>                                                                                
                    </div>
                    <!-- END CONTENT FRAME TOP -->
                    
                    <div class="row">
                            <div class="col-md-12">
                                <div id="alert_holder"></div>
                                <div id='calendar'></div>
                            </div>
                        </div>
                </div>               
                <!-- END CONTENT FRAME -->                              
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

       <?php include 'include/footer.php'; ?>

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->          
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <!-- <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script> -->
        <script type="text/javascript" src="mod-calendar/jquery.min.js"></script>
        <script type="text/javascript" src="mod-calendar/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <!-- <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/fullcalendar/fullcalendar.min.js"></script> -->

        <script type="text/javascript" src="mod-calendar/moment.min.js"></script>
        <script type="text/javascript" src="mod-calendar/fullcalendar.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <script>


 $(document).ready(function() {

  var date = new Date();

  var d = date.getDate();

  var m = date.getMonth();

  var y = date.getFullYear();


  var calendar = $('#calendar').fullCalendar({

   editable: true,

   header: {

    left: 'prev,next today',

    center: 'title',

    right: 'month,agendaWeek,agendaDay'

   },


   events: "mod-calendar/events.php",


   eventRender: function(event, element, view) {

    if (event.allDay === 'true') {

     event.allDay = true;

    } else {

     event.allDay = false;

    }

   },

   selectable: true,

   selectHelper: true,

   select: function(start, end, allDay) {

   var title = prompt('Event Title:');


   if (title) {

   var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");

   var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

   $.ajax({

       url: 'mod-calendar/add_events.php',

       data: 'title='+ title+'&start='+ start +'&end='+ end,

       type: "POST",

       success: function(json) {

       alert('Added Successfully');

       }

   });

   calendar.fullCalendar('renderEvent',

   {

       title: title,

       start: start,

       end: end,

       allDay: allDay

   },

   true

   );

   }

   calendar.fullCalendar('unselect');

   },


   editable: true,

   eventDrop: function(event, delta) {

   var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");

   var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

   $.ajax({

       url: 'mod-calendar/update_events.php',

       data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,

       type: "POST",

       success: function(json) {

        alert("Updated Successfully");

       }

   });

   },

   eventClick: function(event) {

    var decision = confirm("Do you really want to do that?"); 

    if (decision) {

    $.ajax({

        type: "POST",

        url: "mod-calendar/delete_event.php",

        data: "&id=" + event.id,

         success: function(json) {

             $('#calendar').fullCalendar('removeEvents', event.id);

              alert("Updated Successfully");}

    });

    }

    },

   eventResize: function(event) {

       var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");

       var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");

       $.ajax({

        url: 'mod-calendar/update_events.php',

        data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,

        type: "POST",

        success: function(json) {

         alert("Updated Successfully");

        }

       });

    }

   

  });

  

 });


</script>

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->

    <!-- END SCRIPTS -->         
    </body>
</html>



