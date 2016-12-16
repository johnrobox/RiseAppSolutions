
<div class="modal fade" id="showFaqModal" role="dialog">
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
                <img src="<?php echo base_url();?>images/admin/loading/loading6.svg" class="img-responsive loading-image center-block faqLoadingImage" style="height: 30px; width: 30px;"/>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Question</td>
                        <td>
                            <?php echo form_textarea(array('class' => 'form-control showQuestion', 'rows' => '4', 'disabled' => '')); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Answer</td>
                        <td>
                            <?php echo form_textarea(array('class' => 'form-control showAnswer', 'rows' => '4', 'disabled' => '')); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Created By</td>
                        <td>
                            <?php echo form_input(array('type' => 'text', 'class' => 'form-control showCreatedBy', 'disabled' => ''));?>
                        </td>
                    </tr>
                    <tr>
                        <td>Date Created</td>
                        <td>
                            <?php echo form_input(array('type' => 'text', 'class' => 'form-control  showDateCreated', 'disabled' => ''));?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <ul class="pager">
                    <li class="previous nextAndPrevButtonInModal" id="previousButtonInModal" state="previous" value=""><a href="#">Previous</a></li>
                    <li class="next nextAndPrevButtonInModal"  id="nextButtonInModal" state="next" value=""><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>