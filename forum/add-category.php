<?php include "include/header.php";
// this include navigation ?>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="../index.php">Dashboard</a></li>
                    <li class="active">Create</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                      <div class="col-md-2">
                        <?php
                          if (!logged_in()) {
                            echo  '<div class="alert alert-success" role="alert">
                            <strong>Hi Guest!</strong>
                        </div>';
                          }else{
                            if (isset($_SESSION['usertype'])) {
                               
                            }else{
                                echo '<a href="create.php?id='.$_GET['id'].'" class="btn btn-info active btn-block">Add New Topic</a><br><br>';
                            }
                          }
                        ?>
                        <div class="panel panel-default">
                          <div class="panel-heading ui-draggable-handle">
                              <h3 class="panel-title">Recent Post</h3>
                          </div>
                          <div class="panel-body">
                              <ul class="list-group border-bottom">
                                  <li class="list-group-item">Lorem ipsum dolor sit amet</li>
                                  <li class="list-group-item">Mauris placerat justo ut augue</li>
                                  <li class="list-group-item">Donec ac venenatis elit</li>
                                  <li class="list-group-item">Maecenas mauris diam</li>
                                  <li class="list-group-item">Curabitur porttitor massa justo</li>
                              </ul>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-8">
                            <form class="form-horizontal" method="POST" action="module/add-category.php">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Add Category</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-2 col-xs-12 control-label">Category Name *</label>
                                        <div class="col-md-8 col-xs-12">
                                           <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-xs-12 control-label">Description *</label>
                                        <div class="col-md-8 col-xs-12">
                                            <textarea class="form-control summernote_email" rows="5" name="desc"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-xs-12 control-label"></label>
                                        <div class="col-md-8 col-xs-12">
                                            <button type="submit" class="btn btn-primary btn-lg pull-right" name="create">Post</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <?php require_once 'include/footer.php'; // FOOTER INCLUDE THE MAIN SCRIPT FOR THIS PAGE. ADD CUSTOM SCRIPT BELOW THIS LINE ?>

        <script type="text/javascript" src="../js/plugins/summernote/summernote.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="../js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-select.js"></script>

    </body>
</html>
