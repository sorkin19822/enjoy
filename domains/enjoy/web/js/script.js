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
                    renderSuccess(data)
                    sha1 = data.data.sha
                    insertUserToDb(id,userName,sha1)
                }else{
                    renderError(data)
                }
            }).fail(function(data) {
            renderError(data)
        })
}

function insertUserToDb(id,userName,sha1) {
    $.getJSON( "/web/server/insertuser", { id: id, userName: userName, secret:sha1 } )
        .done(function( data ) {
            console.log(data);
        }).fail(function(data) {
        if(data.responseText.length>0){renderError(data)}
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
    var source   = $("#error-template").html();
    var template = Handlebars.compile(source);
    var html    = template(data);
    $('.systemMessages').append(html);
}

function renderSuccess(data) {
    var source   = $("#success-template").html();
    var template = Handlebars.compile(source);
    var html    = template(data);
    $('.systemMessages').append(html);
}