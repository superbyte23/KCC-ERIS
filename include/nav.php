<script type="text/javascript">
			     var page = document.URL;

                    // ##################### INDEX PAGE #################### //

                    if (page === "http://localhost/eris/index.php") {
                        
                    var nav1 = document.getElementById('indexpage');
                    var show = nav1.getAttribute('class');
                    nav1.setAttribute("class", "active");

                    }else if (page === "http://localhost/eris/profile.php" || page === "http://localhost/eris/profile-update.php" || page === "http://localhost/eris/profile-update.php#") {

                     // ##################### PROFILE PAGE #################### //

                    var nav2 = document.getElementById('usermenu');
                    var show = nav2.getAttribute('class');
                    nav2.setAttribute("class", "xn-openable active");


                    var nav3 = document.getElementById('nav');
                    var show = nav3.getAttribute('class');
                    nav3.setAttribute("class", "page-container page-navigation-toggled");

                    var nav1 = document.getElementById('profilestatus');
                    var show = nav1.getAttribute('class');
                    nav1.setAttribute("class", "active");

                	}else if (page === "http://localhost/eris/message.php") {

                    // ##################### MESSAGE PAGE #################### //   

                    var nav2 = document.getElementById('usermenu');
                    var show = nav2.getAttribute('class');
                    nav2.setAttribute("class", "xn-openable active");
    
                    var nav1 = document.getElementById('messagestatus');
                    var show = nav1.getAttribute('class');
                    nav1.setAttribute("class", "active");

                    }else if (page === "http://localhost/eris/manage-class.php") {

                    // ##################### CLASS MANAGEMENT PAGE #################### //  

                    var nav2 = document.getElementById('classmenu');
                    var show = nav2.getAttribute('class');
                    nav2.setAttribute("class", "xn-openable active");
                      
                    var nav1 = document.getElementById('manageclassstatus');
                    var show = nav1.getAttribute('class');
                    nav1.setAttribute("class", "active");
                   }else if (page === "http://localhost/eris/create-class.php") {

                    // ##################### CLASS MANAGEMENT PAGE #################### //   

                    var nav2 = document.getElementById('classmenu');
                    var show = nav2.getAttribute('class');
                    nav2.setAttribute("class", "xn-openable active");
                     
                    var nav1 = document.getElementById('manageclassstatus');
                    var show = nav1.getAttribute('class');
                    nav1.setAttribute("class", "active");
                   }else if (page === "http://localhost/eris/class-request.php") {

                    // ##################### CLASS MANAGEMENT PAGE #################### //   
                                     
                    var nav2 = document.getElementById('classmenu');
                    var show = nav2.getAttribute('class');
                    nav2.setAttribute("class", "xn-openable active");
    
                    var nav1 = document.getElementById('manageclassstatus');
                    var show = nav1.getAttribute('class');
                    nav1.setAttribute("class", "active");

                   }else if (page === "http://localhost/eris/email-sent.php") {

                    // ##################### email PAGE #################### //   
                                     
                    var nav2 = document.getElementById('usermenu');
                    var show = nav2.getAttribute('class');
                    nav2.setAttribute("class", "xn-openable active");
                    

                    var nav3 = document.getElementById('mailboxnav');
                    var show = nav3.getAttribute('class');
                    nav3.setAttribute("class", "xn-openable active");

                    var nav1 = document.getElementById('mailsent');
                    var show = nav1.getAttribute('class');
                    nav1.setAttribute("class", "active");

                   }else if (page === "http://localhost/eris/email-inbox.php") {

                    // ##################### email PAGE #################### //   
                                     
                    var nav2 = document.getElementById('usermenu');
                    var show = nav2.getAttribute('class');
                    nav2.setAttribute("class", "xn-openable active");

                    var nav3 = document.getElementById('mailboxnav');
                    var show = nav3.getAttribute('class');
                    nav3.setAttribute("class", "xn-openable active");
    
                    var nav1 = document.getElementById('mailinbox');
                    var show = nav1.getAttribute('class');
                    nav1.setAttribute("class", "active");

                   }else if (page === "http://localhost/eris/email-compose.php") {

                    // ##################### email PAGE #################### //   
                                     
                    var nav2 = document.getElementById('usermenu');
                    var show = nav2.getAttribute('class');
                    nav2.setAttribute("class", "xn-openable active");

                    var nav3 = document.getElementById('mailboxnav');
                    var show = nav3.getAttribute('class');
                    nav3.setAttribute("class", "xn-openable active");
    
                    var nav1 = document.getElementById('mailcompose');
                    var show = nav1.getAttribute('class');
                    nav1.setAttribute("class", "active");
                   }
</script>