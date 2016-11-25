/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    $('#btnAddAdminUser').click(function(){
        
        $('#AdminUserRegisterModal').modal('show');
        
        var fnameError = $('.fname_error');
        var lnameError = $('.lname_error');
        var unameError = $('.uname_error');
        var upassError = $('.upassword_error');
        var upassConfError = $('.upasswordConf_error');
        var uemailError = $('.uemail_error');
        var ldImage = $('.loading-image');
        
        fnameError.text('');
        lnameError.text('');
        unameError.text('');
        upassError.text('');
        upassConfError.text('');
        uemailError.text('');
        
        $('.btnSubmitRegister').click(function(){
            fnameError.text('');
            lnameError.text('');
            unameError.text('');
            upassError.text('');
            upassConfError.text('');
            uemailError.text('');
            ldImage.show();
            
            var dataString = $('#registerAdminUserForm').serialize();
            $.ajax({
                type: "POST",
                url: "register_execs",
                data: dataString,
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data.error){
                        var msg = data.messages;
                        for(var i in msg){
                            var tx = msg[i];
                            if(i == 'admin_firstname') 
                                fnameError.text(tx);
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
                    
                },
                error: function(error) {
                    console.log(error);
                }
            });
            //console.log("hello");
        });
        
    });
});
