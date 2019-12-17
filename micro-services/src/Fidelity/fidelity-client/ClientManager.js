$(function () {

//envoi du formulaire
    $("#formulaire").submit(function (event) {

        alert('test');
        event.preventDefault();
    });

});

/*
    var email = document.forms["formulaire"]["email"].value;
    console.log(email);
    return false;
   // document.write(email);

    //var url = 'http://localhost/delivery/micro-services/public/fidelity/fetch';


        // console.log(url);

            return fetch(url)
                .then(res => res.json())
                .then(posts => console.log(posts

            /*
            fetch(url)
                .then(function (data) {
                    console.log(data.status);
                    console.log('Request success: ', data);
                    return true;
                })
                .catch(function (error) {

                    console.log('Request failure: ', error);
                    return false;
                });

}
    */