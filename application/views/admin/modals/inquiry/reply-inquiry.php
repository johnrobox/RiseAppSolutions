
<div class="modal fade" id="replyInquiryModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                QUICK REPLY FORM
                <img src="<?php echo base_url();?>images/admin/loading/loading6.svg" class="img-responsive loading-image center-block inquiryLoadingImage" style="height: 30px; width: 30px;"/>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" id="replyInquirySuccessAlert"></div>
                <?php echo form_open('', 'id="replyInquiryForm" class="replyInquiryForm" method="post"'); ?>
                    <table class="table table-bordered">
                        <tr>
                            <td>From</td>
                            <td>
                                <span class="text-error" id="emailFromError"></span>
                                <?php
                                $email_from_field = array(
                                    'type' => 'text',
                                    'name' => 'email_from',
                                    'class' => 'form-control',
                                    'id' => 'emailFrom'
                                );
                                echo form_input($email_from_field);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>To</td>
                            <td>
                                <span class="text-error" id="emailToError"></span>
                                <?php
                                $email_to_field = array(
                                    'type' => 'text',
                                    'name' => 'email_to',
                                    'class' => 'form-control',
                                    'id' => 'emailTo'
                                );
                                echo form_input($email_to_field);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td>
                                <span class="text-error" id="emailSubjectError"></span>
                                <?php
                                $email_subject_field = array(
                                    'type' => 'text',
                                    'name' => 'email_subject',
                                    'class' => 'form-control',
                                    'id' => 'emailSubject'
                                );
                                echo form_input($email_subject_field);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td>
                                <span class="text-error" id="emailMessageError"></span>
                                <?php 
                                $message_field = array(
                                    'name' => 'email_message',
                                    'class' => 'form-control',
                                    'rows' => '8',
                                    'id' => 'emailMessage'
                                );
                                echo form_textarea($message_field);
                                ?>
                            </td>
                        </tr>
                    </table>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <?php 
                $send_button = array(
                    'class' => 'btn btn-primary',
                    'id' => 'submitReplyButtonInModal',
                    'content' => '<span class="glyphicon glyphicon-send"></span> Send Message'
                );
                echo form_button($send_button);
                
                $close_button = array(
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal',
                    'content' => 'Close'
                );
                echo form_button($close_button);
                ?>
            </div>
        </div>
    </div>
</div>