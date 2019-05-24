<?php include 'include/nav.php'; ?>
<!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form" method="GET" action="index.php">
                            <input type="text" name="search" placeholder="Search..." minlength="3" required="" type="text">
                        </form>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Logout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                     <?php include 'message-notif.php'; ?>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                     
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->  