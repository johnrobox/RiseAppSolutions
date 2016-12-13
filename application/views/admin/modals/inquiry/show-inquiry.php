
<div class="modal fade" id="showInquiryModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="noDataSelected"></div>
                <?php
                // close button
                $close_button = array(
                    'class' => 'close',
                    'data-dismiss' => 'modal',
                    'content' => '&times;'
                );
                echo form_button($close_button);
                
                // mark inquiry button
                $mark_inquiry_button = array(
                    'class' => 'btn btn-xs btn-default',
                    'id' => 'markInquiryButtonInModal',
                    'value' => '',
                    'status' => ''
                );
                echo form_button($mark_inquiry_button);
                
                // delete inquiry button
                $delete_button = array(
                    'class' => 'btn btn-xs btn-danger',
                    'id' => 'deleteInquiryButtonInModal',
                    'value' => '',
                    'content' => '<span class="glyphicon glyphicon-trash"></span> Delete'
                );
                echo form_button($delete_button);
                ?>
                
            </div>
            <div class="modal-body">
                <img src="<?php echo base_url();?>images/admin/loading/loading6.svg" class="img-responsive loading-image center-block inquiryLoadingImage" style="height: 30px; width: 30px;"/>
                <div class="alert alert-info text-center" id="infoAlertInModal"></div>
                <div class="form-group">
                    <?php
                    echo form_label('Firstname', 'firstname');
                    $firstname_field = array(
                        'type' => 'text',
                        'class' => 'form-control inquiryFirstname',
                        'disabled' => ''
                    );
                    echo form_input($firstname_field);
                    ?>
                </div>
                <div class="form-group">
                    <label>Lastname</label>
                    <?php
                    echo form_label('Lastname', 'lastname');
                    $lastname_field = array(
                        'type' => 'text',
                        'class' => 'form-control inquiryLastname',
                        'disabled' => ''
                    );
                    echo form_input($lastname_field);
                    ?>
                </div>
                <div class="form-group">
                    <?php 
                    echo form_label('Email', 'email'); 
                    $email_field = array(
                        'type' => 'email',
                        'class' => 'form-control inquiryEmail',
                        'disabled' => ''
                    );
                    echo form_input($email_field);
                    ?>
                </div>
                <div class="form-group">
                    <?php 
                    echo form_label('Date Submitted', 'date_submited'); 
                    $email_field = array(
                        'type' => 'text',
                        'class' => 'form-control inquiryDate',
                        'disabled' => ''
                    );
                    echo form_input($email_field);
                    ?>
                </div>
                <div class="form-group">
                    <?php 
                    echo form_label('Text', 'text'); 
                    $text_field = array(
                        'class' => 'form-control inquiryText',
                        'rows' => '8',
                        'disabled' => ''
                    );
                    echo form_textarea($text_field);
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <ul class="pager">
                    <li class="previous nextAndPrevButtonInModal" id="previousButtonInModal" state="previous" value="">
                        <a href="#">
                            <span class="glyphicon glyphicon-arrow-left"></span> Previous
                        </a>
                    </li>
                    <li class="next nextAndPrevButtonInModal"  id="nextButtonInModal" state="next" value="">
                        <a href="#">
                            Next <span class="glyphicon glyphicon-arrow-right"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>