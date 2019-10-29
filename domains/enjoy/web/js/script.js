window.onload = function() {

    $('#addUser-form').on('beforeSubmit', function (e) {
        addUser()
        return false;
    });

    $('#delUser-form').on('beforeSubmit', function (e) {
        delUser()
        return false;
    });

    $('#userFeed').click(function() {
        getFeed()
    });

};

function delUser() {
    let userName = $('.inpitUserDel').val() ;
    let id = randomString(32)
    $.getJSON( "/web/server/getsecretkey", { userName: userName, id: id } )
        .done(function( data ) {
            if(data.status == 'success'){
                sha1 = data.data.sha
                deleteUserDb(id,userName,sha1)
            }else{
                renderError(data)
            }
        }).fail(function(data) {
        if(data.status!=200){renderError(data)}
    })
}

function addUser() {
        let userName = $('.inpitUserAdd').val() ;
        let id = randomString(32)
        $.getJSON( "/web/server/getsecretkey", { userName: userName, id: id } )
            .done(function( data ) {
                if(data.status == 'success'){
                    sha1 = data.data.sha
                    insertUserToDb(id,userName,sha1)
                }else{
                    renderError(data)
                }
            }).fail(function(data) {
            if(data.status!=200){renderError(data)}
        })
}

function insertUserToDb(id,userName,sha1) {
    $.getJSON( "/web/server/add", { id: id, userName: userName, secret:sha1 } )
        .done(function( data ) {
            console.log(data);
        }).fail(function(data) {
        if(data.status!=200){renderError(data)}
    });
}

function  deleteUserDb(id,userName,sha1) {
    $.getJSON( "/web/server/remove", { id: id, userName: userName, secret:sha1 } )
        .done(function( data ) {
            console.log(data);
        }).fail(function(data) {
        if(data.status!=200){renderError(data)}
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

function getFeed() {
    let id = randomString(32)
    $.getJSON( "/web/server/getsecretkey", { userName: 1,id: id } )
        .done(function( data ) {
            if(data.status == 'success'){
                sha1 = data.data.sha
                getDataFeed(id,sha1)
            }else{
                renderError(data)
            }
        }).fail(function(data) {
        if(data.status!=200){renderError(data)}
    })
}

function  getDataFeed(id,sha1) {
    $.getJSON( "/web/server/getfeed", { id: id, secret:sha1 } )
        .done(function( data ) {
           // console.log(data)
            renderTwits(data)
        }).fail(function(data) {
        console.log(data);
        if(data.status!=200){renderError(data)}
    });
}

function renderError(data) {
    var source   = $("#error-template").html();
    var template = Handlebars.compile(source);
    var html    = template(data);
    $('.systemMessages').prepend(html);
}


function renderTwits(data) {
    console.log(data)
    var source   = $("#render-twits-template").html();
    var template = Handlebars.compile(source);
    var html    = template(data);
    $('.getFeedButton').prepend(html);
}