$(function () {


    $("#getevent").click(function (event) {
        var email = $("#email_for_fetch").val();
        var fixedemail = email.replace(".","|");
        fetch("/event/fetch/"+fixedemail)
            .then(resp=>resp.json())
            .then(resp => alert(JSON.stringify(resp)))
            .catch(error => alert("Erreur"+error));
    })


});
