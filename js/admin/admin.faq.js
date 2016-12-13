/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    var faq_id = '';
    var faqMessageAlert = $("#faqMessageAlert");
    faqMessageAlert.hide();
    
    var alertMessageInModal = $('.alertMessageInModal');
    alertMessageInModal.hide();
    
    // add faq properties
    var questionField = $(".question");
    var answerField = $(".answer");
    var questionError = $(".questionError");
    var answerError = $(".answerError");
    
    var loadingImage = $('.faqLoadingImage');
    loadingImage.hide();
    
    // show faq info
    var showQuestion = $('.showQuestion');
    var showAnswer = $('.showAnswer');
    var showCreatedBy = $('.showCreatedBy');
    var showDateCreated = $('.showDateCreated');
    var nextAndPrevButtonInModal = $('.nextAndPrevButtonInModal');
    
    var previousButton = $("#previousButtonInModal");
    var nextButton = $("#nextButtonInModal");
    previousButton.hide();
    nextButton.hide();
    
    /********************
     * FAQ UPDATE BUTTON
     *******************/
    $(".updateFaqButton").click(function(){
        loadingImage.show();
        faq_id = this.getAttribute("value");
        questionField.val('');
        answerField.val('');
        $("#updateFaqModal").modal("show");
        getFaqById(function(data){
            if (data.select == true) {
                var faq = data.faq[0];
                $(".faq_id").val(faq.id);
                questionField.val(faq.faq_question);
                answerField.val(faq.faq_answer);
            } else {
                alertMessageInModal.text("Cannot fetch data!");
                alertMessageInModal.addClass("alert-warning");
                alertMessageInModal.fadeIn();
                alertMessageInModal.fadeOut(4000, 'linear');
            }
            loadingImage.hide();
        },faq_id, 0);
    });
    
    /***************************
     * SUBMIT UPDATE FAQ IN MODAL
     ***************************/
    $("#updateFaqButtonInModal").click(function(){
        loadingImage.show();
        var form_data = $("#updateFaqForm").serialize();
        questionError.text("");
        answerError.text("");
        submitFaqData(function(data){
            loadingImage.hide();
                console.log(data);
                if(data.error == true) {
                    var messages = data.messages;
                    for(var item in messages) {
                        var message = messages[item];
                        if (item == 'question') 
                            questionError.text(message);
                        if (item == 'answer')
                            answerError.text(message);
                    }
                } else {
                    location.reload();
                }
        }, form_data, "update");
    });
    
    /***************************
     * REFRESH FAQ DATA IN MODAL
     **************************/
    $("#RefreshFaqButtonModal").click(function(){
        loadingImage.show();
        questionField.val('');
        answerField.val('');
        questionError.text("");
        answerError.text("");
        getFaqById(function(data){
            if (data.select == true) {
                var faq = data.faq[0];
                $(".faq_id").val(faq.id);
                questionField.val(faq.faq_question);
                answerField.val(faq.faq_answer);
            } else {
                alertMessageInModal.text("Cannot fetch data!");
                alertMessageInModal.addClass("alert-warning");
                alertMessageInModal.fadeIn();
                alertMessageInModal.fadeOut(4000, 'linear');
            }
            loadingImage.hide();
        },faq_id, 0);
    });
    
    /*************************
     * FAQ CHANGE ITEM STATUS
     ************************/
    $(".changeStatusButton").click(function(){
        faq_id = this.getAttribute("value");
        var status = this.getAttribute("status");
        var loading_image = $("#changeStatusLoading"+faq_id);
        var change_status_btn = $("#changeStatusButton"+faq_id);
        var text_container = $("#text"+faq_id);
        loading_image.show();
        changeStatusById(function(data){
            var alertMessageText = "";
            var alert_add = "";
            var alert_remove = "";
            if (data == true) {
                var tr = $("#faqTr"+faq_id);
                var tr_add = "";
                var tr_remove = "";
                var btn_add = "";
                var btn_remove = "";
                var btn_text = "";
                if (status == 0) {
                    tr_add = "white-bg";
                    tr_remove = "eee-bg";
                    btn_add = "btn-warning";
                    btn_remove = "btn-default";
                    btn_text = "Disable";
                    change_status_btn.attr("status", 1);
                    text_container.text();
                } else {
                    tr_add = "eee-bg";
                    tr_remove = "white-bg";
                    btn_add = "btn-default";
                    btn_remove = "btn-warning";
                    btn_text = "Enable";
                    change_status_btn.attr("status", 0);
                }
                tr.removeClass(tr_remove);
                tr.addClass(tr_add);
                change_status_btn.addClass(btn_add);
                change_status_btn.removeClass(btn_remove);
                text_container.text(btn_text);
                change_status_btn.attr("status", (status == 0) ? 1 : 0);
                faqMessageAlert.addClass("alert-info");
                faqMessageAlert.text("");
                alertMessageText = "Successfully change status!";
                alert_add = "alert-info";
                alert_remove = "alert-danger";
            } else {
                alertMessageText = "Unsuccessfully change status!";
                alert_add = "alert-danger";
                alert_remove = "alert-info";
            }
            faqMessageAlert.addClass(alert_add);
            faqMessageAlert.removeClass(alert_remove);
            faqMessageAlert.text(alertMessageText);
            faqMessageAlert.fadeIn();
            faqMessageAlert.fadeOut(4000, 'linear');
            loading_image.hide();
        }, faq_id, status);
    });
 
    /****************************
     * DELETE FAQ BUTTON IN VIEW
     ***************************/
    $(".deleteFaqButton").click(function(){
        faq_id = this.getAttribute("value");
        $("#deleteFaqModal").modal("show");
        console.log(faq_id);
    });
    $("#submitDeleteButton").click(function(){
        loadingImage.show();
        console.log(faq_id);
        deleteFaqById(function(data){
            var add_class = "";
            var remove_class = "";
            var message = "";
            if (data == true) {
                $("#faqTr"+faq_id).hide();
                add_class = "info";
                remove_class = "danger";
                message = "Item successfully deleted!";
            } else {
                add_class = "danger";
                remove_class = "info";
                message = "Deleting item unsuccessfull!";
            }
            faqMessageAlert.addClass('alert-'+add_class);
            faqMessageAlert.removeClass('alert-'+remove_class);
            faqMessageAlert.text(message);
            faqMessageAlert.fadeIn();
            faqMessageAlert.fadeOut(4000, 'linear');
            loadingImage.hide();
            $("#deleteFaqModal").modal("hide");
        }, faq_id);
    });
    
    /*************************************************
     *  PREVIOUS AND NEXT BUTTON SHOW FAQ SINGLE INFO
     ************************************************/
    nextAndPrevButtonInModal.click(function(){
        faq_id = this.getAttribute("value");
        var state = this.getAttribute("state");
        var request = '';
        if (state == "previous") 
            request = 1;
        else if (state == "next")
            request = 2;
        else
            request = 0;
        
        showQuestion.val('');
        showAnswer.val('');
        showCreatedBy.val('');
        showDateCreated.val('');
        
        previousButton.hide();
        nextButton.hide();
        $("#showFaqModal").modal("show");
        loadingImage.show();
        getFaqById(function(data){
            
            if (data.next == data.faq[0].id)
                nextButton.hide();
            else 
                nextButton.show();
            if (data.previous == data.faq[0].id)
                previousButton.hide();
            else 
                previousButton.show();
            
            if (data.select == true) {
                var faq = data.faq[0];
                showQuestion.val(faq.faq_question);
                showAnswer.val(faq.faq_answer);
                showCreatedBy.val(faq.created_by_firstname+' '+faq.created_by_lastname);
                showDateCreated.val(faq.date_created);
                nextAndPrevButtonInModal.attr("value", faq.id);
            }
            console.log(data);
            loadingImage.hide();
        }, faq_id, request);
        
    });
    
    
    /***************************
     * SHOW FAQ SINGLE INFO
     **************************/
    $(".showFaqInfo").click(function(){
        previousButton.hide();
        nextButton.hide();
        $("#showFaqModal").modal("show");
        loadingImage.show();
        
        showQuestion.val('');
        showAnswer.val('');
        showCreatedBy.val('');
        showDateCreated.val('');
        
        var faq_id = this.getAttribute("value");
        
        getFaqById(function(data){
            
            if (data.next == data.faq[0].id)
                nextButton.hide();
            else 
                nextButton.show();
            if (data.previous == data.faq[0].id)
                previousButton.hide();
            else 
                previousButton.show();
            
            if (data.select == true) {
                var faq = data.faq[0];
                showQuestion.val(faq.faq_question);
                showAnswer.val(faq.faq_answer);
                showCreatedBy.val(faq.created_by_firstname+' '+faq.created_by_lastname);
                showDateCreated.val(faq.date_created);
                nextAndPrevButtonInModal.attr("value", faq.id);
            }
            console.log(data);
            loadingImage.hide();
        }, faq_id, 0);
    });
    
    /***************************
     * ADD FAQ BUTTON IN VIEW
     **************************/
    $("#addFaqButton").click(function(){
        loadingImage.hide();
        questionError.text("");
        answerError.text("");
        $("#addFaqModal").modal('show');
        questionField.val("");
        answerField.val("");
    });
    
    /*************************
     * SUBMIT FORM IN ADDING FAQ ITEM
     ************************/
    $("#addFaqButtonInModal").click(function(){
        loadingImage.show();
        var form_data = $("#addFaqForm").serialize();
        questionError.text("");
        answerError.text("");
        submitFaqData(function(data){
            loadingImage.hide();
                console.log(data);
                if(data.error == true) {
                    var messages = data.messages;
                    for(var item in messages) {
                        var message = messages[item];
                        if (item == 'question') 
                            questionError.text(message);
                        if (item == 'answer')
                            answerError.text(message);
                    }
                } else {
                    location.reload();
                }
        }, form_data, "add");
    });
  
});

function submitFaqData(callback, form_data, command) {
    var target_url = "";
    if (command == "add") 
        target_url = "addFaqItem";
    else if (command == "update")
        target_url = "updateFaqItem";
    else 
        target_url = "no_url";
    
    $.ajax({
        type: "POST",
        url: target_url,
        data: form_data,
        dataType: "json",
        success: function(data) {
            callback(data);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getFaqById(callback, faq_id, request) {
    $.ajax({
        type: "POST",
        url: "selectFaqById",
        data: {
            id : faq_id,
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

function deleteFaqById(callback, faq_id) {
    $.ajax({
        type: "POST",
        url: "deleteFaq",
        data: {
            id : faq_id
        },
        dataType: "json",
        success: function(data) {
            callback(data);
        },
        error: function() {
        }
    });
}

function changeStatusById(callback, faq_id, status){
    $.ajax({
        type: "POST",
        url: "changeStatus",
        data: {
            id : faq_id,
            status : status
        },
        dataType: "json",
        success: function(data) {
            callback(data);
        },
        error: function() {
        }
    });
}