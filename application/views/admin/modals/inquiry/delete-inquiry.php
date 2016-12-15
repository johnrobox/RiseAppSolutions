
<div class="modal fade" id="deleteInquiryModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?php echo base_url();?>images/admin/loading/loading6.svg" class="img-responsive loading-image center-block inquiryLoadingImage" style="height: 30px; width: 30px;"/>
            </div>
            <div class="modal-body">
                <span class="glyphicon glyphicon-trash"></span>
                Delete this item ?
            </div>
            <div class="modal-footer">
                <?php 
                // close button
                $close_button = array(
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal',
                    'content' => 'Close'
                );
                echo form_button($close_button);
                
                // submit button
                $confirm_deletion_button = array(
                    'class' => 'btn btn-primary',
                    'id' => 'confirmDeleteInquiryButton',
                    'content' => 'Delete'
                );
                echo form_button($confirm_deletion_button);
                ?>
            </div>
        </div>
    </div>
</div>