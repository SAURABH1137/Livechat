$( document ).ready(function() {

    $("#submit").on('click', function(event){
        var a = $("#username").val();
        var b = $("#password").val();
        console.log(a + b);
        $.ajax({
            url : hostname+"/livechat/admin/validation.php",
            type:"POST",
            data :{username:a, password:b},
            success : function(data){
               $('#show').html(data);
               $('#toast1').toast('show');
            }
        });
        event.preventDefault();
    });

    $("#sendemail").on('click',function(event){
        $('#toast1').toast('hide');
        var c = 'True';
        $.ajax({
            url : hostname+"/livechat/admin/validation.php",
            type:"POST",
            data :{valid:c},
            success : function(data){
               $('#view').html(data);
            }
        });
        event.preventDefault();
    });

    // list-profile-list

    $("#list-profile-list").on('click',function(){
        var profile = 'profile';
        $.ajax({
            url : hostname+"/livechat/admin/data.php",
            type:"POST",
            data :{list_profile:profile},
            success : function(data){
               $('#list-profile').html(data);
            }
        });
    });

    // list-messages-list

    $("#list-messages-list").on('click',function(){
        var messages = 'messages';
        $.ajax({
            url : hostname+"/livechat/admin/data.php",
            type:"POST",
            data :{list_messages:messages},
            success : function(data){
               $('#list-messages').html(data);
            }
        });
    });

    // list-group-list

    $("#list-group-list").on('click',function(){
        var group = 'group';
        $.ajax({
            url : hostname+"/livechat/admin/data.php",
            type:"POST",
            data :{list_group:group},
            success : function(data){
               $('#list-group').html(data);
            }
        });
    });

    // list-followers-list

    $("#list-followers-list").on('click',function(){
        var followers = 'followers';
        $.ajax({
            url : hostname+"/livechat/admin/data.php",
            type:"POST",
            data :{list_followers:followers},
            success : function(data){
               $('#list-followers').html(data);
            }
        });
    });

    // list-query-list

    $("#list-query-list").on('click',function(){
        var query = 'query';
        $.ajax({
            url : hostname+"/livechat/admin/data.php",
            type:"POST",
            data :{list_query:query},
            success : function(data){
               $('#list-query').html(data);
            }
        });
    });

    // list-feedback-list

    $("#list-feedback-list").on('click',function(){
        var feedback = 'feedback';
        $.ajax({
            url : hostname+"/livechat/admin/data.php",
            type:"POST",
            data :{list_feedback:feedback},
            success : function(data){
               $('#list-feedback').html(data);
            }
        });
    });

    function livetime(){
        var d = new Date();
        var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
        $('.time').text(time);
    }setInterval(livetime, 1000);
    
});

function homepage(){
    window.location.href = hostname+"/livechat/application/";
}