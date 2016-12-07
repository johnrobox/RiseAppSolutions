/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    var inquiry_id;
    var loadingImage = $('.inquiryLoadingImage');
    var alertInModal = $('#infoAlertInModal');
    
    var inqFirstnameField = $('.inquiryFirstname');
    var inqLastnameField = $('.inquiryLastname');
    var inqEmailField = $('.inquiryEmail');
    var inqTextField = $('.inquiryText');
    var inqDateField = $('.inquiryDate');
    
    var markInquiryInModal = $('#markInquiryButtonInModal');
    var deleteInquiryInModal = $('#deleteInquiryButtonInModal');
    var replyInquiryModal = $('#replyInquiryModal');
    
    var nextAndPrevButtonInModal = $('.nextAndPrevButtonInModal');
    
    
    var replyInquiryButton = $('.replyInquiryButton');
    
    // for email
    var emailFrom = $("#emailFrom");
    var emailTo = $("#emailTo");
    var emailSubject = $("#emailSubject");
    var emailMessage = $("#emailMessage");
    
    var emailToError = $("#emailToError");
    var emailFromError = $("#emailFromError");
    var emailSubjectError = $("#emailSubjectError");
    var emailMessageError = $("#emailMessageError");
    
    var successAlert = $('#successAlert');
    successAlert.hide();
    
    var replyInquirySuccessAlert = $("#replyInquirySuccessAlert");
    replyInquirySuccessAlert.hide();
    
    // Delete Modal 
    var deleteInquiryModal = $("#deleteInquiryModal");
    
    $('.deleteInquiryButton').click(function(){
        inquiry_id = this.getAttribute("value");
        deleteInquiryModal.modal('show');
        loadingImage.hide();
    });
    
    /***************************
     *  REPLY BUTTON
     ***************************/
    replyInquiryButton.click(function(){
        loadingImage.hide();
        emailToError.text('');
        emailFromError.text('');
        emailSubjectError.text('');
        emailMessageError.text('');
        
        replyInquiryModal.modal('show');
        
        var email_to = this.getAttribute("email");
        
        emailFrom.val("riseappsolutions@gmail.com");
        emailTo.val(email_to);
        
    });
    
    
    /****************************
     * SUBMIT REPLY BUTTON 
     ***************************/
    $("#submitReplyButtonInModal").click(function(){
        loadingImage.hide();
        emailToError.text('');
        emailFromError.text('');
        emailSubjectError.text('');
        emailMessageError.text('');
        
        loadingImage.show();
        var dataString = $('#replyInquiryForm').serialize();
        $.ajax({
            type: "POST",
            url: "replyInquiry",
            data: dataString,
            dataType: "json",
            success: function(data) {
                if (data.error == true){
                    var msg = data.messages;
                    for(var i in msg){
                        var tx = msg[i];
                        if(i == 'email_to') 
                            emailToError.text(tx);
                        if(i == 'email_from')
                            emailFromError.text(tx);
                        if(i == 'email_subject')
                            emailSubjectError.text(tx);
                        if(i == 'email_message')
                            emailMessageError.text(tx);
                    }
                } else {
                    emailSubject.val('');
                    emailMessage.val('');
                    replyInquirySuccessAlert.text("Message successfully sent!");
                    replyInquirySuccessAlert.fadeIn();
                    replyInquirySuccessAlert.fadeOut(4000, 'linear');
                }
                loadingImage.hide();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
    
    /***************************
     * DELETE INQUIRY IN MODAL
     ***************************/
    deleteInquiryInModal.click(function(){
        inquiry_id = this.getAttribute("value");
         // show inquiry modal
        $('#showInquiryModal').modal('hide');
        deleteInquiryModal.modal('show');
        loadingImage.hide();
    });
    
    $('#confirmDeleteInquiryButton').click(function(){
        loadingImage.show();
        $.ajax({
            type: "POST",
            url: "deleteInquiry",
            data: {
                id : inquiry_id
            },
            success: function() {
                deleteInquiryModal.modal("hide");
                $("#inquiryTr"+inquiry_id).hide();
                successAlert.text("Inquiry item successfully deleted!");
                successAlert.fadeIn('slow');
                successAlert.fadeOut(4000, 'linear');
                //location.reload();
            },
            error: function() {
            }
        });
    });
    
    
    /****************************
     *SHOW INQUIRY MODAL 
     ****************************/
    $('.showInquiryButton').click(function(){
        
        //empty all field
        inqFirstnameField.val('');
        inqLastnameField.val('');
        inqEmailField.val('');
        inqDateField.val('');
        inqTextField.val('');
        
        markInquiryInModal.hide();
        deleteInquiryInModal.hide();
        alertInModal.hide();
        
        // sanitize inquiry ID
        inquiry_id = this.getAttribute("value");
        
        // show inquiry modal
        $('#showInquiryModal').modal('show');
        
        // show image loading
        loadingImage.show();
        
        getInquiryById(function(data){
            console.log(data);
            // hide image loading 
            loadingImage.hide();
            
            if (data.next == data.inquiry[0].id)
                $("#nextButtonInModal").hide();
            else 
                $("#nextButtonInModal").show();
            
            if (data.previous == data.inquiry[0].id) 
                $("#previousButtonInModal").hide();
            else 
                $("#previousButtonInModal").show();

            // check if data is successfully queried
            if (data.select){
                
                markInquiryInModal.show();
                deleteInquiryInModal.show();
                var inq = data.inquiry[0];
                //console.log(inq);
                // assign value to the field (ready to show data)
                inqFirstnameField.val(inq.inquiry_firstname);
                inqLastnameField.val(inq.inquiry_lastname);
                inqEmailField.val(inq.inquiry_email);
                inqTextField.val(inq.inquiry_content);
                inqDateField.val(inq.inquiry_date_submitted);

                var btnCaption = '';
                var removeStyle = '';
                var addStyle = '';
                if(inq.status == 1) {
                    btnCaption = 'Mark as Unread';
                    addStyle = 'btn-success';
                    removeStyle = 'btn-warning';
                } else {
                    btnCaption = 'Mark as Read';
                    addStyle = 'btn-warning';
                    removeStyle = 'btn-success';
                }


                markInquiryInModal.text(btnCaption);
                markInquiryInModal.removeClass(removeStyle);
                markInquiryInModal.addClass(addStyle);

                markInquiryInModal.attr("status", inq.status);
                markInquiryInModal.attr("value", inq.id);
                nextAndPrevButtonInModal.attr("value", inq.id);
                deleteInquiryInModal.attr("value", inq.id);
            } else {
                // if no data queried ( query field )
                $('.noDataSelected').html("<span style='color: red;'>Cannot load data / no data selected!</span>");
            }
        }, inquiry_id, 0);
        
    });
    
    
    
    /**********************
     * INQUIRY NEXT AND PREVIOUS BUTTON
     **********************/
    nextAndPrevButtonInModal.click(function(){
        inquiry_id = this.getAttribute("value");
        var state = this.getAttribute("state");
        var request = '';
        if (state == "previous") 
            request = 1;
        else if (state == "next")
            request = 2;
        else
            request = 0;
        
        //empty all field
        inqFirstnameField.val('');
        inqLastnameField.val('');
        inqEmailField.val('');
        inqDateField.val('');
        inqTextField.val('');
        
        markInquiryInModal.hide();
        deleteInquiryInModal.hide();
        alertInModal.hide();
                
        // show inquiry modal
        $('#showInquiryModal').modal('show');
        
        // show image loading
        loadingImage.show();
        
        getInquiryById(function(data){
            console.log(data);
            // hide image loading 
            loadingImage.hide();
            
            if (data.next == data.inquiry[0].id)
                $("#nextButtonInModal").hide();
            else 
                $("#nextButtonInModal").show();
            
            if (data.previous == data.inquiry[0].id) 
                $("#previousButtonInModal").hide();
            else 
                $("#previousButtonInModal").show();
            
            // check if data is successfully queried
            if (data.select){
                markInquiryInModal.show();
                deleteInquiryInModal.show();
                var inq = data.inquiry[0];
                console.log(inq);
                // assign value to the field (ready to show data)
                inqFirstnameField.val(inq.inquiry_firstname);
                inqLastnameField.val(inq.inquiry_lastname);
                inqEmailField.val(inq.inquiry_email);
                inqTextField.val(inq.inquiry_content);
                inqDateField.val(inq.inquiry_date_submitted);

                var btnCaption = '';
                var removeStyle = '';
                var addStyle = '';
                if(inq.status == 1) {
                    btnCaption = 'Mark as Unread';
                    addStyle = 'btn-success';
                    removeStyle = 'btn-warning';
                } else {
                    btnCaption = 'Mark as Read';
                    addStyle = 'btn-warning';
                    removeStyle = 'btn-success';
                }


                markInquiryInModal.text(btnCaption);
                markInquiryInModal.removeClass(removeStyle);
                markInquiryInModal.addClass(addStyle);

                markInquiryInModal.attr("status", inq.status);
                markInquiryInModal.attr("value", inq.id);
                nextAndPrevButtonInModal.attr("value", inq.id);
                deleteInquiryInModal.attr("value", inq.id);
            } else {
                // if no data queried ( query field )
                $('.noDataSelected').html("<span style='color: red;'>Cannot load data / no data selected!</span>");
            }
        }, inquiry_id, request);
        
    });
    
    
    /**********************
     * INQUIRY MARK READ/UNREAD IN MODAL
     **********************/
    markInquiryInModal.click(function(){ 
        var inquiry_id = this.getAttribute("value");
        var status = this.getAttribute("status"); 
        
        var selectedId = $('#markInquiry'+inquiry_id);
        var selectedTr = $('#inquiryTr'+inquiry_id);
        var markText = $('#markText'+inquiry_id);
        
        loadingImage.show();
        changeInquiryStatus(function(data){
            alertInModal.text("Inquiry change status successfully!");
            alertInModal.fadeIn('slow');
            alertInModal.fadeOut(4000, 'linear');
            if (data) {
                var btnCaption = '';
                var removeStyle = '';
                var addStyle = '';
                var addStatus = '';
                var trAddStyle = '';
                var trRemoveStyle = '';
                if (status == 1) {
                    btnCaption = "Mark as Read";
                    addStatus = "0";
                    removeStyle = "btn-success";
                    addStyle = "btn-warning";
                    trAddStyle = "eee-bg";
                    trRemoveStyle = "white-bg"
                } else {
                    btnCaption = "Mark as Unread";
                    addStatus = "1";
                    removeStyle = "btn-warning";
                    addStyle = "btn-success";
                    trAddStyle = "white-bg";
                    trRemoveStyle = "eee-bg"
                }
                markText.text(btnCaption);
                
                markInquiryInModal.attr("status", addStatus);
                markInquiryInModal.text(btnCaption);
                markInquiryInModal.addClass(addStyle);
                markInquiryInModal.removeClass(removeStyle);
                
                selectedId.attr("status", addStatus);
                selectedId.removeClass(removeStyle);
                selectedId.addClass(addStyle);
                
                selectedTr.addClass(trAddStyle);
                selectedTr.removeClass(trRemoveStyle);
                
            } else {
                //commonError.text("Cannot complete request. Please try again!. if same error occured please contact the developer person!");
            }

            loadingImage.hide();
        }, inquiry_id, status); 
        
    });
    
    
    /*************
     * INQUIRY MARK READ/UNREAD
     **************/
    $('.markInquiryButton').click(function(){
        
        // sanitize inquiry ID
        inquiry_id = this.getAttribute("value");
        
        var commonError = $('.inquiryCommonError');
        commonError.text('');
        
        var selectedId = $('#markInquiry'+inquiry_id);
        var selectedTr = $('#inquiryTr'+inquiry_id);
        var markText = $('#markText'+inquiry_id);
        
        var status = this.getAttribute("status");
        
        var loadingImage = $('#markLoadingImage'+inquiry_id);
        
        loadingImage.show();
        
        changeInquiryStatus(function(data){
            if (data) {
                if (status == 1) {
                    selectedId.attr("status", "0");
                    selectedId.removeClass("btn-success");
                    selectedId.addClass("btn-warning");
                    markText.text("Mark as Read");
                    selectedTr.addClass("eee-bg");
                    selectedTr.removeClass("white-bg");
                } else {
                    selectedId.attr("status", "1");
                    selectedId.removeClass("btn-warning");
                    selectedId.addClass("btn-success");
                    markText.text("Mark as Unread");
                    selectedTr.addClass("white-bg");
                    selectedTr.removeClass("eee-bg");
                }
            } else {
                commonError.text("Cannot complete request. Please try again!. if same error occured please contact the developer person!");
            }

            loadingImage.hide();
        }, inquiry_id, status);  
        
        
    });
    
    
});


/******************
 * Change inquiry status request
 * @param {type} callback
 * @param {int} id
 * @param {int} status
 * @returns {undefined}
 */
function changeInquiryStatus(callback, id, status) {
    $.ajax({
        type: "POST",
        url: "changeStatus",
        data: {
            id : id,
            status : status
        },
        dataType: "json",
        success: function(data) {
            callback(data);
        },
        error: function(error) {
            console.log("Error in request URI");
        }
    });
}


function getInquiryById(callback, inquiry_id, request) {
    $.ajax({
        type: "POST",
        url: "showInquiry",
        data: {
            id : inquiry_id,
            state : request
        },
        dataType: "json",
        success: function(data) {
            callback(data);
        },
        error: function() {
        }
    });
}