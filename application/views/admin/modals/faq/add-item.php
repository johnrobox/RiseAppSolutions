
<div class="modal fade" id="addFaqModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Add FAQ'S
                <img src="<?php echo base_url();?>images/admin/loading/loading6.svg" class="img-responsive loading-image center-block faqLoadingImage" style="height: 30px; width: 30px;"/>
                <?php
                $close_button = array(
                    'type' => 'button',
                    'class' => 'close',
                    'data-dismiss' => 'modal',
                    'content' => '&times;'
                );
                echo form_button($close_button);
                ?>
            </div>
            <div class="modal-body">
                <?php echo form_open('', 'id="addFaqForm" class="addFaqForm" method="post"'); ?>
                    <div class="form-group">
                        <?php echo form_label('Questions', 'question');?>
                        <div class="questionError text-error"></div>
                        <?php
                        // question field 
                        $question_field = array(
                            'name' => 'question',
                            'class' => 'form-control question',
                            'rows' => '3'
                        );
                        echo form_textarea($question_field);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Answer', 'answer');?>
                        <div class="answerError text-error"></div>
                        <?php 
                        // answer field
                        $answer_field = array(
                            'name' => 'answer',
                            'class' => 'form-control answer',
                            'rows' => '5'
                        );
                        echo form_textarea($answer_field);
                        ?>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <?php 
                // submit button
                $submit_button =  array(
                    'id' => 'addFaqButtonInModal',
                    'class' => 'btn btn-primary',
                    'content' => "Submit"
                );
                echo form_button($submit_button);
                
                // cancel button
                $cancel_button = array(
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal',
                    'content' => 'Cancel'
                );
                echo form_button($cancel_button);
                ?>
            </div>
        </div>
    </div>
</div>