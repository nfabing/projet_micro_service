$(function () {

    /*
        $("#formulaire").submit(function (event) {

            alert('test');
            event.preventDefault();
        });

     */

    $("#addPoints").click(function(event) {

        var url = '/TESTProjet/Microservice/public/fidelity/add';
        var email = '?email=' + $('#emailClient').text();


        //alert($("#emailClient").text());
        fetch(url + email + '&number=100',
            {
                method: "GET",
            })
            .then((response) => response.json())
            .then((Data) => {
                console.log(Data);
                $("#pointsClient").html(Data);
                if(Data >= 50){
                    $("#substractpoint50").removeClass("grise");
                    $("#substractpoint50").attr('disabled', 'false');
                }
                if(Data >= 150){
                    $("#substractpoint150").removeClass("grise");
                    $("#substractpoint150").attr('disabled', 'false');
                }
                if(Data >= 200){
                    $("#substractpoint200").removeClass("grise");
                    $("#substractpoint200").attr('disabled', 'false');
                }
                if(Data >= 500){
                    $("#substractpoint500").removeClass("grise");
                    $("#substractpoint500").attr('disabled', 'false');
                }
                //return responseData;
            })
            .catch(error => console.error(error))
    });

});

function substractpoint(point){

    var url = '/TESTProjet/Microservice/public/fidelity/substract';
    var email = '?email=' + $('#emailClient').text();
    var subpoint = '&number='+point;
    console.log(subpoint);

    fetch(url + email + subpoint,
        {
            method: "GET",
        })
        .then((response) => response.json())
        .then((Data) => {
            console.log(Data);
            $("#pointsClient").html(Data);
            if(Data < 50){
                $("#substractpoint50").addClass("grise");
                $("#substractpoint50").attr('disabled', 'true');
            }
            if(Data < 150){
                $("#substractpoint150").addClass("grise");
                $("#substractpoint150").attr('disabled', 'true');
            }
            if(Data < 200){
                $("#substractpoint200").addClass("grise");
                $("#substractpoint200").attr('disabled', 'true');
            }
            if(Data < 500){
                $("#substractpoint500").addClass("grise");
                $("#substractpoint500").attr('disabled', 'true');
            }
            //return responseData;
        })
        .catch(error => console.error(error))


}

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