
$(document).ready(function(){
    // inquiry id
    var inquiry_id;
    // common loading image
    var loadingImage = $('.inquiryLoadingImage');
    // alert modal 
    var alertInModal = $('#infoAlertInModal');
    // inquiry form field
    var inqFirstnameField = $('.inquiryFirstname');
    var inqLastnameField = $('.inquiryLastname');
    var inqEmailField = $('.inquiryEmail');
    var inqTextField = $('.inquiryText');
    var inqDateField = $('.inquiryDate');
    // modal declarations
    var markInquiryInModal = $('#markInquiryButtonInModal');
    var deleteInquiryInModal = $('#deleteInquiryButtonInModal');
    var replyInquiryModal = $('#replyInquiryModal');
    // next and previous button in modal
    var nextAndPrevButtonInModal = $('.nextAndPrevButtonInModal');
    // reply button in modal
    var replyInquiryButton = $('.replyInquiryButton');
    // for email 
    var emailFrom = $("#emailFrom");
    var emailTo = $("#emailTo");
    var emailSubject = $("#emailSubject");
    var emailMessage = $("#emailMessage");
    // Email error
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
        
    /**************************
     * DELETE INQUIRY BUTTON IN VIEW
     */
    $('.deleteInquiryButton').click(function(){
        
        // get the inquiry id value
        inquiry_id = this.getAttribute("value");
        
        // show the deletion confirmation modal
        deleteInquiryModal.modal('show');
        
        // hide the loading image
        loadingImage.hide();
    });
    
    /***************************
     *  REPLY BUTTON
     ***************************/
    replyInquiryButton.click(function(){
        
        // hide the loading image at first
        loadingImage.hide();
        
        // clear all error value
        emailToError.text('');
        emailFromError.text('');
        emailSubjectError.text('');
        emailMessageError.text('');
        
        // show modal
        replyInquiryModal.modal('show');
        
        // get the email value (prepare for receiver)
        var email_to = this.getAttribute("email");
        
        // set the email sender for reply
        emailFrom.val("riseappsolutions@gmail.com");
        
        // set the email receiver for reply
        emailTo.val(email_to);
        
    });
    
    /****************************
     * SUBMIT REPLY BUTTON 
     ***************************/
    $("#submitReplyButtonInModal").click(function(){
        
        // clear all error value
        emailToError.text('');
        emailFromError.text('');
        emailSubjectError.text('');
        emailMessageError.text('');
        
        // show the loading image
        loadingImage.show();
        
        // sanitize the form input 
        var dataString = $('#replyInquiryForm').serialize();
        
        // ajax request for reply
        $.ajax({
            type: "POST",
            url: "replyInquiry",
            data: dataString,
            dataType: "json",
            success: function(data) {
                
                // check if error is true
                if (data.error == true){
                    
                    // declare variable for message
                    var msg = data.messages;
                    
                    // loop the messages
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
                    
                    // if error is false
                    emailSubject.val('');
                    emailMessage.val('');
                    replyInquirySuccessAlert.text("Message successfully sent!");
                    replyInquirySuccessAlert.fadeIn();
                    replyInquirySuccessAlert.fadeOut(4000, 'linear');
                }
                
                // hide loading image
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
        
        // get the inquiry id value
        inquiry_id = this.getAttribute("value");
        
         // show inquiry modal
        $('#showInquiryModal').modal('hide');
        
        // show delete inquiry confirmation modal
        deleteInquiryModal.modal('show');
        
        // hide the loading image
        loadingImage.hide();
    });
    
    /********************************
     * CONFIRM DELETE INQUIRY BUTTON 
     ********************************/
    $('#confirmDeleteInquiryButton').click(function(){
        
        // show loading image
        loadingImage.show();
        
        // ajax request for deletion
        $.ajax({
            type: "POST",
            url: "deleteInquiry",
            data: {
                id : inquiry_id
            },
            success: function() {
                
                // hide the delete inquiry modal
                deleteInquiryModal.modal("hide");
                
                // hide the TR in view
                $("#inquiryTr"+inquiry_id).hide();
                
                // set text to alert in view the item is successfully deleted
                successAlert.text("Inquiry item successfully deleted!");
                successAlert.fadeIn('slow');
                successAlert.fadeOut(4000, 'linear');
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
        
        // hide in modal
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
                
                // show in modal ( the data is ready to )
                markInquiryInModal.show();
                deleteInquiryInModal.show();
                
                // declare variable for inquiry item
                var inq = data.inquiry[0];
                
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

                // set attributes of mark inquiry button in modal 
                markInquiryInModal.text(btnCaption);
                markInquiryInModal.removeClass(removeStyle);
                markInquiryInModal.addClass(addStyle);
                markInquiryInModal.attr("status", inq.status);
                markInquiryInModal.attr("value", inq.id);
                
                // set nex and prev buton in modal
                nextAndPrevButtonInModal.attr("value", inq.id);
                deleteInquiryInModal.attr("value", inq.id);
                
            } else {
                
                // if no data queried ( query field )
                $('.noDataSelected').html("<span style='color: red;'>Cannot load data / no data selected!</span>");
            }
        }, inquiry_id, 0);
        
    });
   
    /***********************************
     * INQUIRY NEXT AND PREVIOUS BUTTON
     **********************************/
    nextAndPrevButtonInModal.click(function(){
        
        // sanitize the inquiry id
        inquiry_id = this.getAttribute("value");
        
        // sanitize the state 
        var state = this.getAttribute("state");
        var request = '';
        
        // define request 
        switch (state) {
            case "previous":
                request = 1;
                break;
            case "next":
                request = 2;
                break;
            default:
                request = 0;
        }
        
        //empty all field
        inqFirstnameField.val('');
        inqLastnameField.val('');
        inqEmailField.val('');
        inqDateField.val('');
        inqTextField.val('');
        
        // hide button / properties in modal
        markInquiryInModal.hide();
        deleteInquiryInModal.hide();
        alertInModal.hide();
                
        // show inquiry modal
        $('#showInquiryModal').modal('show');
        
        // show image loading
        loadingImage.show();
        
        getInquiryById(function(data){
            
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

                // set attributes of mark inquiry button in modal
                markInquiryInModal.text(btnCaption);
                markInquiryInModal.removeClass(removeStyle);
                markInquiryInModal.addClass(addStyle);
                markInquiryInModal.attr("status", inq.status);
                markInquiryInModal.attr("value", inq.id);
                
                // new and prev set attribute value
                nextAndPrevButtonInModal.attr("value", inq.id);
                deleteInquiryInModal.attr("value", inq.id);
                
            } else {
                // if no data queried ( query field )
                $('.noDataSelected').html("<span style='color: red;'>Cannot load data / no data selected!</span>");
            }
        }, inquiry_id, request);
        
    });
    
    
    /************************************
     * INQUIRY MARK READ/UNREAD IN MODAL
     ***********************************/
    markInquiryInModal.click(function(){ 
        
        // sanitize inquiry id
        var inquiry_id = this.getAttribute("value");
        
        // sanitize inquiry status
        var status = this.getAttribute("status"); 
        
        // declare the current view properties of the selected item
        var selectedId = $('#markInquiry'+inquiry_id);
        var selectedTr = $('#inquiryTr'+inquiry_id);
        var markText = $('#markText'+inquiry_id);
        
        // show loading image
        loadingImage.show();
        
        // call the ajax request function for marking inquiry items
        changeInquiryStatus(function(data){
            
            // set attribute of alert in modal 
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
                
                // defind attribute / behaviours of button
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
                
                // set attribute of mark inquiry button modal
                markInquiryInModal.attr("status", addStatus);
                markInquiryInModal.text(btnCaption);
                markInquiryInModal.addClass(addStyle);
                markInquiryInModal.removeClass(removeStyle);
                
                // set attribute of selected Id in view
                selectedId.attr("status", addStatus);
                selectedId.removeClass(removeStyle);
                selectedId.addClass(addStyle);
                
                // set TR attribute in view
                selectedTr.addClass(trAddStyle);
                selectedTr.removeClass(trRemoveStyle);
                
            } else {
                //commonError.text("Cannot complete request. Please try again!. if same error occured please contact the developer person!");
            }

            // hide the loading image 
            loadingImage.hide();
            
        }, inquiry_id, status); 
        
    });
    
    /***************************
     * INQUIRY MARK READ/UNREAD
     **************************/
    $('.markInquiryButton').click(function(){      
        
        // sanitize inquiry ID
        inquiry_id = this.getAttribute("value");
        
        var commonError = $('.inquiryCommonError');
        commonError.text('');
        
        var selectedId = $('#markInquiry'+inquiry_id);
        var selectedTr = $('#inquiryTr'+inquiry_id);
        var markText = $('#markText'+inquiry_id);
        
        // sanitize inquiry status
        var status = this.getAttribute("status");  
        
        // declare loading image in mark button
        var loadingImage = $('#markLoadingImage'+inquiry_id);
        
        // show loading image
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

            // hide loading image
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

/**********************
 * get Inquiry By Id
 * @param {type} callback
 * @param {int} inquiry_id
 * @param {int} request
 * @returns {undefined}
 */
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