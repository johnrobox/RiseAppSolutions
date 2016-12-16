
<div class="modal fade" id="deleteFaqModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?php echo base_url();?>images/admin/loading/loading6.svg" class="img-responsive loading-image center-block faqLoadingImage" style="height: 30px; width: 30px;"/>
            </div>
            <div class="modal-body"> 
                <span class="glyphicon glyphicon-trash"></span>
                Are you sure want to delete this FAQ'S ?
            </div>
            <div class="modal-footer">
                <?php
                $yes_button = array(
                    'class' => 'btn btn-primary',
                    'id' => 'submitDeleteButton',
                    'content' => 'Yes'
                );
                echo form_button($yes_button);
                
                $no_button = array(
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal',
                    'content' => 'No'
                );
                echo form_input($no_button);
                ?>
            </div>
        </div>
    </div>
</div>