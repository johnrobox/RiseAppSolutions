
<div class="modal fade" id="addFaqModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Add FAQ'S
                <img src="<?php echo base_url();?>images/admin/loading/loading6.svg" class="img-responsive loading-image center-block faqLoadingImage" style="height: 30px; width: 30px;"/>
            </div>
            <div class="modal-body">
                <form id="addFaqForm" class="addFaqForm" method="post">
                    <div class="form-group">
                        <label for="question">Questions</label>
                        <div class="questionError text-error"></div>
                        <textarea name="question" class="form-control" rows="3" id="question"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="answer">Answer</label>
                        <div class="answerError text-error"></div>
                        <textarea name="answer" class="form-control" rows="5" id="answer"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="addFaqButtonInModal">Submit</button>
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>