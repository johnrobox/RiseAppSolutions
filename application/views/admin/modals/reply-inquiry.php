
<div class="modal fade" id="replyInquiryModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?php echo base_url();?>images/admin/loading/loading6.svg" class="img-responsive loading-image center-block inquiryLoadingImage" style="height: 30px; width: 30px;"/>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" id="replyInquirySuccessAlert"></div>
                <form id="replyInquiryForm" class="replyInquiryForm" method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td>From</td>
                            <td>
                                <span class="text-error" id="emailFromError"></span>
                                <input type="text" name="email_from" class="form-control" id="emailFrom" >
                            </td>
                        </tr>
                        <tr>
                            <td>To</td>
                            <td>
                                <span class="text-error" id="emailToError"></span>
                                <input type="text" name="email_to" class="form-control" id="emailTo" >
                            </td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td>
                                <span class="text-error" id="emailSubjectError"></span>
                                <input type="text" name="email_subject" class="form-control" id="emailSubject">
                            </td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td>
                                <span class="text-error" id="emailMessageError"></span>
                                <textarea name="email_message" class="form-control" rows="8" id="emailMessage"></textarea>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="submitReplyButtonInModal">Send Message</button>
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>