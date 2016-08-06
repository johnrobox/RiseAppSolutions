<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Admin Registration</h1>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>User Information</h3>
                            </div>
                            <?php echo $this->session->flashdata('success'); ?>
                            <?php echo $this->session->flashdata('error'); ?>
                            
                            <div class="panel-body">
                                <?php
                                echo form_open(base_url().'admin/admin-register-exec');
                                //Admin firstname
                                
                                    ?>
                                        <div class="form-group">
                                        <label>Firstname: </label>
                                    <?php
                                    
                                        echo form_error('admin_firstname', '<span class="text-error">', '</span>');
                                        echo form_input($fields['firstname']);
                                    ?>
                                        </div>
                                    <?php
                                    //Admin lastname
                                    ?>
                                        <div class="form-group">
                                        <label>Lastname: </label>
                                    <?php
                                    
                                        echo form_error('Lastname', '<span class="text-error">', '</span>');
                                        echo form_input($fields['lastname']);
                                    ?>
                                        </div>
                                    <?php
                                    //Admin username
                                    ?>
                                        <div class="form-group">
                                        <label>Username: </label>
                                    <?php
                                    
                                        echo form_error('Username', '<span class="text-error">', '</span>');
                                        echo form_input($fields['username']);
                                    ?>
                                        </div>
                                    <?php
                                    //Admin password
                                    ?>
                                        <div class="form-group">
                                        <label>Password: </label>
                                    <?php
                                    
                                        echo form_error('Password', '<span class="text-error">', '</span>');
                                        echo form_input($fields['password']);
                                    ?>
                                        </div>
                                        <!--Gender-->
                                        <div class="form-group">
                                        <label for="admin_gender">Gender</label>
                                    <?php
                                        echo form_error('Gender', '<span class="text-red">', '</span>');
                                        echo form_dropdown('admin_gender', $select['gender'], 0, 'class="form-control" name="admin_gender"');
                                    ?>
                                        </div>
                                    <?php
                                        // submit button
                                        echo form_submit($button['submit']);
                                        
                                        // reset button
                                        echo form_reset($button['reset']);

                                echo form_close();

                                 ?>
                            </div>
                            <div class="panel-footer">
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->