/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    var fnameError = $('.fname_error');
    var lnameError = $('.lname_error');
    var unameError = $('.uname_error');
    var upassError = $('.upassword_error');
    var upassConfError = $('.upasswordConf_error');
    var uemailError = $('.uemail_error');
    var ldImage = $('.loading-image');
    
    function errorCleaner() {
        fnameError.text('');
        lnameError.text('');
        unameError.text('');
        upassError.text('');
        upassConfError.text('');
        uemailError.text('');
    }
    
    $('#btnAddAdminUser').click(function(){      
        $('#AdminUserRegisterModal').modal('show');
        $(".admin_firstname1").hide();
        errorCleaner();
    });
    
    $('.btnSubmitRegister').click(function(){
        $(".admin_firstname1").show();
        errorCleaner();
        //ldImage.show();
        $(".admin_firstname1").attr('src', 'http://practice.com/riseappsolutions/images/admin/loading/loading6.svg');
        var dataString = $('#registerAdminUserForm').serialize();
        $.ajax({
            type: "POST",
            url: "register_exec",
            data: dataString,
            dataType: "json",
            success: function(data) {

                console.log(data);
                var fnNot = 0;
                var lnNot = 0;
                if (data.error){
                    
                    var msg = data.messages;
                    for(var i in msg){
                        var tx = msg[i];
                        if(i == 'admin_firstname') {
                            fnameError.text(tx);
                            fnNot = 1;
                        } 
                            
                        if(i == 'admin_lastname')
                            lnameError.text(tx);
                        if(i == 'admin_username')
                            unameError.text(tx);
                        if(i == 'admin_password')
                            upassError.text(tx);
                        if(i == 'admin_password_conf')
                            upassConfError.text(tx);
                        if(i == 'admin_email')
                            uemailError.text(tx);
                    }
                    ldImage.hide();
                } else {
                    console.log("success");
                }
                
                var fnameImage = (fnNot) ? 'http://practice.com/riseappsolutions/images/admin/check-wrong/wrong2.png' :'http://practice.com/riseappsolutions/images/admin/check-wrong/check2.png';
                $(".admin_firstname1").attr('src', fnameImage);
                
                
            },
            error: function(error) {
                console.log(error);
            }
        });
            
    });
    
    
});
