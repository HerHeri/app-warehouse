function setCookie(name,value,exp_days) {
    var d = new Date();
    d.setTime(d.getTime() + (exp_days*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(name) {
    var cname = name + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++){
        var c = ca[i];
        while(c.charAt(0) == ' '){
            c = c.substring(1);
        }
        if(c.indexOf(cname) == 0){
            return c.substring(cname.length, c.length);
        }
    }
    return "";
}

function deleteCookie(name) {
    var d = new Date();
    d.setTime(d.getTime() - (60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = name + "=;" + expires + ";path=/";
}

function getTokenAuth(){
    let token = 'Bearer '+getCookie('token')
    return token;
}

async function logout(){
    try {
        await apiCaller('/api/logout', 'GET')
        deleteCookie('token')
        window.location.href = location.origin + '/login';
    } catch (error) {
        alert(error)
    }
}

async function userAuth(req) {
    try {
        let me = await apiCaller('/api/me');
        return me
    } catch (error) {
        return 'belum login';
    }
}


function apiCaller(url, method = 'GET', data){
    return new Promise(function(resolve, reject){
        $.ajax({
            url: location.origin + url,
            method: method,
            data: data,
            headers: {
                'Authorization': getTokenAuth()
            },
            success: function(data){
                resolve(data);
            },
            error: function(response) {
                reject(response)
            }
        })
    })
}
