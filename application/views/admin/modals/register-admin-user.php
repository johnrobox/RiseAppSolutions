

<div class="modal fade" id="AdminUserRegisterModal"role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body">
                <img src="<?php echo base_url();?>images/admin/loading/loading6.svg" class="img-responsive loading-image center-block" style="height: 30px; width: 30px; display: none"/>
                <form id="registerAdminUserForm" class="registerAdminUserForm" method="post">
                    <?php
                    $fname_field = array(
                        'type' => 'text',
                        'name' => 'admin_firstname',
                        'class' => 'form-control admin_firstname',
                        'placeholder' => 'Firstname',
                        'autofocus' => ''
                    );?>
                    <div class="form-group">
                        <div style="color: red" class="fname_error"></div>
                        <?php echo form_input($fname_field);?>
                    </div>

                    <?php
                    $lname_field = array(
                        'type' => 'text',
                        'name' => 'admin_lastname',
                        'class' => 'form-control admin_lastname',
                        'placeholder' => 'Lastname'
                    );
                    ?>
                    <div class="form-group">
                        <div style="color: red" class="lname_error"></div>
                        <?php echo form_input($lname_field); ?>
                    </div>

                    <?php
                    $uname_field = array(
                        'type' => 'text',
                        'name' => 'admin_username',
                        'class' => 'form-control admin_username',
                        'placeholder' => 'Username'
                    );
                    ?>
                    <div class="form-group">
                        <div style="color: red" class="uname_error"></div>
                        <?php echo form_input($uname_field);?>
                    </div>

                    <?php
                    $upassword_field = array(
                        'type' => 'password',
                        'name' => 'admin_password',
                        'class' => 'form-control admin_password',
                        'placeholder' => 'Password'
                    );
                    ?>
                    <div class="form-group">
                        <div style="color: red" class="upassword_error"></div>
                        <?php echo form_input($upassword_field);?>
                    </div>

                    <?php 
                    $upasswordConf_field = array(
                        'type' => 'password',
                        'name' => 'admin_password_conf',
                        'class' => 'form-control admin_password_conf',
                        'placeholder' => 'Password Confirm'
                    );
                    ?>
                    <div class="form-group">
                        <div style="color: red" class="upasswordConf_error"></div>
                        <?php echo form_input($upasswordConf_field);?>
                    </div>

                    <?php
                    $uemail_field = array(
                        'type' => 'text',
                        'name' => 'admin_email',
                        'class' => 'form-control admin_email',
                        'placeholder' => 'Email'
                    );
                    ?>
                    <div class="form-group">
                        <div style="color: red" class="uemail_error"></div>
                        <?php echo form_input($uemail_field);?>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btnSubmitRegister">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>