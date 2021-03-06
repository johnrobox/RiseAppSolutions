<div class="modal fade" id="updateFaqModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                // close button
                $close_button = array(
                    'class' => 'close',
                    'data-dismiss' => 'modal',
                    'content' => '&times;'
                );
                echo form_button($close_button);
                ?>
                UPDATE FAQ'S
                <img src="<?php echo base_url();?>images/admin/loading/loading6.svg" class="img-responsive loading-image center-block faqLoadingImage" style="height: 30px; width: 30px;"/>
                <div class="alert alertMessageInModal"></div>
            </div>
            <div class="modal-body">
                <?php echo form_open('', 'id="updateFaqForm" class="updateFaqForm" method="post"'); ?>
                    <input type="hidden" name="id" class="faq_id"/>
                    <div class="form-group">
                        <?php echo form_label('Questions', 'question');?>
                        <div class="questionError text-error"></div>
                        <?php
                        // question field
                        $question_field = array(
                            'name' => 'question',
                            'class' => 'form-control question',
                            'rows' => '3',
                            'id' => 'question'
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
                            'rows' => '5',
                            'id' => 'answer'
                        );
                        echo form_textarea($answer_field);
                        ?>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <?php
                // refresh button
                $refresh_button = array(
                    'class' => 'btn btn-success',
                    'id' => 'RefreshFaqButtonModal',
                    'content' => '<span class="glyphicon glyphicon-refresh"></span> Refresh'
                );
                echo form_button($refresh_button);
                
                // update button
                $update_button = array(
                    'class' => 'btn btn-primary',
                    'id' => 'updateFaqButtonInModal',
                    'content' => '<span class="glyphicon glyphicon-pencil"></span> Update'
                );
                echo form_button($update_button);
                
                ?>
                
            </div>
        </div>
    </div>
</div>