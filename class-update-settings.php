<div class="panel panel-colorful">
                                            <div class="panel-heading ui-draggable-handle">
                                                <h3 class="panel-title">Edit Class Information</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal" method="POST" action="class-update.php">
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Class ID :</label>
                                                        <div class="col-md-6 col-xs-12">                                            
                                                            <div class="input-group">
                                                                <input type="text" name="classcode" hidden value="<?php echo $classID ?>"> 
                                                                <h2> <?php echo $classID ?></h2>
                                                                
                                                            </div>                                       
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Class Name</label>
                                                        <div class="col-md-6 col-xs-12">                                            
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                                <input name="classname" type="text" class="form-control" required="" value="<?php echo $classname ?>"> 
                                                            </div>                                            
                                                            <span class="help-block">Class Name</span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">                                        
                                                        <label class="col-md-3 col-xs-12 control-label">Subject Name</label>
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                                <input name="subject" type="text" class="form-control" required="" value="<?php echo $subject ?>">
                                                            </div>            
                                                            <span class="help-block">Subject Name</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Class Time</label>
                                                        <div class="col-md-3">
                                                            <div class="input-group bootstrap-timepicker">
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                                <input name="timestart" type="text" class="form-control timepicker" required="" value="<?php echo $classtart ?>">                                             
                                                            </div>
                                                            <span class="help-block">Time Start</span>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input-group bootstrap-timepicker">
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                                <input name="timeend" type="text" class="form-control timepicker" required="" value="<?php echo $classend ?>">                                             
                                                            </div>
                                                            <span class="help-block">Time End</span>
                                                        </div>
                                                    </div>                                    
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Class Days</label>
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                                <select class="form-control select" name="classdays" required="">
                                                                    <option></option>
                                                                            <option value="M.W.">M.W.</option>
                                                                            <option value="T.TH.">T.TH.</option>
                                                                            <option value="Friday">Friday</option>
                                                                    <option selected="" value="<?php echo $classdays; ?>"><?php echo $classdays; ?></option>
                                                                </select>
                                                            </div>    
                                                            <span class="help-block">Select Class Days</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Class Tags</label>
                                                        <div class="col-md-6 col-xs-12">                                      
                                                            <input name="classtags" type="text" class="tagsinput" value="<?php echo $classtags ?>">
                                                            <span class="help-block">Add tags</span>
                                                        </div>
                                                    </div>                           
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">About Your Class</label>
                                                        <div class="col-md-6 col-xs-12">                                            
                                                            <textarea name="description" class="form-control" rows="5"><?php echo $description ?></textarea>
                                                            <span class="help-block">Add Description to your class</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Class Room</label>
                                                        <div class="col-md-6 col-xs-12">                                                                                            
                                                            <select class="form-control select" name="classroom" required="">
                                                                <option></option>
                                                                        
                                                                        <option value="Room 1">Room 1</option>
                                                                        <option value="Room 2">Room 2</option>
                                                                        <option value="Room 3">Room 3</option>
                                                                        <option value="Room 4">Room 4</option>
                                                                        <option value="Room 5">Room 5</option>
                                                                        <option value="Room 6">Room 6</option>
                                                                        <option value="Room 7">Room 7</option>
                                                                        <option value="Room 8">Room 8</option>
                                                                        <option value="Room 9">Room 9</option>
                                                                        <option value="Room 10">Room 10</option>
                                                                        <option value="Room 11">Room 11</option>
                                                                        <option value="Room 12">Room 12</option>
                                                                        <option value="Room 13">Room 13</option>
                                                                        <option value="Lab 1">Lab 1</option>
                                                                        <option value="Lab 2">Lab 2</option>
                                                                        <option value="Lab 3">Lab 3</option>
                                                                        <option selected="" value="<?php echo $classroom ?>"><?php echo $classroom ?></option>
                                                            </select>
                                                            <span class="help-block">Select Class Room</span>
                                                        <br>
                                                            <button name="update" class="btn btn-primary pull-right" >Save Changes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>