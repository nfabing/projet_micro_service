$(function () {

    //URL DE BASE
    baseUrl = '/delivery/micro-services/public/fidelity';

    $("#addPoints").click(function (event) {

        var url = baseUrl + '/add';
        var email = '?email=' + $('#emailClient').text();

        //alert($("#emailClient").text());
        fetch(url + email + '&number=100',
            {
                method: "GET",
            })
            .then((response) => response.json())
            .then((Data) => {
                console.log(Data);
                var points = Data;

                $("#pointsClient").html(points);
                $("button[name='buttonProduct']").each(function () {

                    var number = $(this).val();
                    if (points >= number) {
                        $(this).removeClass("grise");
                        $(this).prop('disabled', false);
                    }
                });
                /*
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
                                */
                //return responseData;
            })
            .catch(error => console.error(error))
    });
});

function substractpoint(point){

    var url = baseUrl + '/substract';
    var email = '?email=' + $('#emailClient').text();
    var subpoint = '&number='+point;
    console.log(subpoint);

    fetch(url + email + subpoint,
        {
            method: "GET",
        })
        .then((response) => response.json())
        .then((Data) => {
            console.log(Data.number);
            console.log(Data.result);
            var points = Data.number

            if (Data.result === 'true') {

                $("#pointsClient").html(points);

                $("button[name='buttonProduct']").each(function () {

                    var number = $(this).val();
                    if (points < number) {
                        $(this).addClass("grise");
                        $(this).prop('disabled', true);
                    }
                });

            } else {
                alert('Impossible');
            }


            /*
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

             */
            //return responseData;
        })
        .catch(error => console.error(error))


}
