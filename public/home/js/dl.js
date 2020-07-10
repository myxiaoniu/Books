$('#note_code').click( function () {
    var  code = $('#code').val();
    alert('你好吗？');
    // $.post('/home/note',{'code':code},function (data) {
    //     if(data.status == 200){
    //         layer.msg(data.message,{icon: 5,time:5000})
    //     }else{
    //         layer.msg(data.message,{icon: 5,time:5000})
    //     }

    // })


})
var user_name = $('#user_name').value();
var user_phone = $('#user_phone').value();
var user_pwd = $('#user_user_pass2').value();
$.post('home/doregister', {'user_name':user_name, 'user_phone':user_phone, 'user_pwd':user_pwd} ,function (data) {
    if(data.status == 0){
        layer.msg(data.message, {icon:5 , time:5000});
    }
});


$('#user_name').blur(function(){
    var user_name = $('#user_name').val();
    if(length(user_name) > 18 || length(user_name) < 3){
        $('#s_name').html('用户名要小于18 或是 大于3个字母').css('color','red');
    }

})



