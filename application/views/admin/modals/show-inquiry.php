
<div class="modal fade" id="showInquiryModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="noDataSelected"></div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <button class="btn btn-xs btn-default" id="markInquiryButtonInModal" value="" status=""></button>
            </div>
            <div class="modal-body">
                <img src="<?php echo base_url();?>images/admin/loading/loading6.svg" class="img-responsive loading-image center-block inquiryLoadingImage" style="height: 30px; width: 30px;"/>
                <div class="alert alert-info text-center" id="infoAlertInModal"></div>
                <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" class="form-control inquiryFirstname" disabled=""/>
                </div>
                <div class="form-group">
                    <label>Lastname</label>
                    <input type="text" class="form-control inquiryLastname" disabled=""/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control inquiryEmail" disabled=""/>
                </div>
                <div class="form-group">
                    <label>Date Submitted</label>
                    <input type="text" class="form-control inquiryDate" disabled=""/>
                </div>
                <div class="form-group">
                    <label>Text</label>
                    <textarea type="text" class="form-control inquiryText" disabled=""></textarea>
                </div>
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