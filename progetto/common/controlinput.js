document.getElementById("form").addEventListener("submit", function(event) {
    var error = 0;
    // check email
        var err = document.getElementById("emailerror");
        var elm = document.getElementById("email");
            if(elm.value == ""){
                err.innerHTML = "Inserisci una E-mail";
                error +=1;
            }else{
                err.innerHTML = "";
            }
    // check password
    err = document.getElementById("passerror");
    elm = document.getElementById("pass");

    if((elm.value == "") || (elm.value.length < 8)){
        err.innerHTML = "Inserisci una password di almeno 8 caratteri";
        error += 1;
    }else{
        err.innerHTML = "";
    }

    if (error) event.preventDefault();
});