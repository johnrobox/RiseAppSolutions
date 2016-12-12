/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    // add faq properties
    var questionField = $("#question");
    var answerField = $("#answer");
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
    
    /*************************************************
     *  PREVIOUS AND NEXT BUTTON SHOW FAQ SINGLE INFO
     ************************************************/
    nextAndPrevButtonInModal.click(function(){
        var faq_id = this.getAttribute("value");
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
        $.ajax({
            type: "POST",
            url: "addFaqItem",
            data: form_data,
            dataType: "json",
            success: function(data) {
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
            },
            error: function(error) {
                console.log(error);
            }
        });
        
    });
  
});


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