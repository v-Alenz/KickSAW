
function checkemail(url){

let usermail = document.getElementById("email").value;
//console.log(usermail);

return fetch(url, {
    method:"post",
    headers: { "Content-type" : "application/x-www-form-urlencoded"},
    body:"email=" + usermail,
}).then(function (response) {
    if(response.status !== 200) {
        console.log("There was a problem, status code: " + response.status);
        return;
    }

    return response.text();
}).then(function (result) {
    if(result == "Email già usata, riprova!" ){
        document.getElementById("emailerror").innerHTML = "E-mail già usata!";
    }else{
        document.getElementById("emailerror").innerHTML = "";
    }

});

}
