/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    var inquiry_id;
    var loadingImage = $('.inquiryLoadingImage');
    
    $('.deleteInquiryButton').click(function(){
        inquiry_id = this.getAttribute("value");
        $('#deleteInquiryModal').modal('show');
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
                    location.reload();
                },
                error: function() {
                }
        });
    });
    
    
    $('.showInquiryButton').click(function(){
        inquiry_id = this.getAttribute("value");
        $('#showInquiryModal').modal('show');
        loadingImage.show();
        $.ajax({
                type: "POST",
                url: "showInquiry",
                data: {
                    id : inquiry_id
                },
                dataType: "json",
                success: function(data) {
                    loadingImage.hide();
                    if (data.select){
                        $('.inquiryFirstname').val(data.inquiry[0].inquiry_firstname);
                    } else {
                        $('.noDataSelected').html("<span style='color: red;'>Cannot load data / no data selected!</span>");
                    }
                },
                error: function() {
                }
        });
    });
    
    
});