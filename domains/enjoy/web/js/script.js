window.onload = function() {

    $('#addUser-form').on('beforeSubmit', function (e) {
        addUser()
        return false;
    });

};

function addUser() {
        let userName = $('.inpitUserAdd').val() ;
        let id = randomString(32)
        $.getJSON( "/web/server/getsecretkey", { userName: userName, id: id } )
            .done(function( data ) {
                if(data.status == 'success'){
                    console.log(data);
                }else{
                    $('.systemMessages').html(data.status);
                }
            });
}





function randomString(len, charSet) {
    charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var randomString = '';
    for (var i = 0; i < len; i++) {
        var randomPoz = Math.floor(Math.random() * charSet.length);
        randomString += charSet.substring(randomPoz,randomPoz+1);
    }
    return randomString;
}

function renderError(data) {

}