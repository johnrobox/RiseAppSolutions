
<div class="modal fade" id="showFaqModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?php echo base_url();?>images/admin/loading/loading6.svg" class="img-responsive loading-image center-block faqLoadingImage" style="height: 30px; width: 30px;"/>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Question</td>
                        <td>
                            <textarea class="form-control showQuestion" disabled=""></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Answer</td>
                        <td>
                            <textarea class="form-control showAnswer" disabled=""></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Created By</td>
                        <td>
                            <input type="text" class="form-control showCreatedBy" disabled=""/>
                        </td>
                    </tr>
                    <tr>
                        <td>Date Created</td>
                        <td>
                            <input type="text" class="form-control showDateCreated" disabled=""/>
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