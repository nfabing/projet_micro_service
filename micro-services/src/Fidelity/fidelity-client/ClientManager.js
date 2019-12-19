$(function () {

    //URL DE BASE
    baseUrl = '/delivery/micro-services/public/fidelity';


    var pointsClient = parseInt($("#pointsClient").text());

    $("button[name='buttonProduct']").each(function () {

        var pointsProduct = $(this).val();

        if (pointsClient >= pointsProduct) {
            $(this).removeClass("grise");
            $(this).prop('disabled', false);
        }
        if (pointsClient < pointsProduct) {
            $(this).addClass("grise");
            $(this).prop('disabled', true);

        }
    });


    $("#addPoints").click(function () {

        var url = baseUrl + '/add';
        var email = '?email=' + $('#emailClient').text();

        fetch(url + email + '&number=100',
            {
                method: "GET",
            })
            .then((response) => response.json())
            .then((Data) => {
                //console.log(Data);
                var points = Data;

                $("#pointsClient").html(points);
                $("button[name='buttonProduct']").each(function () {

                    var number = $(this).val();
                    if (points >= number) {
                        $(this).removeClass("grise");
                        $(this).prop('disabled', false);
                    }
                });

            })
            .catch(error => console.error(error))
    });


    $("button[name='buttonProduct']").click(function () {
        var url = baseUrl + '/substract';
        var email = '?email=' + $('#emailClient').text();
        var subpoint = '&number=' + $(this).val();

        //console.log(subpoint);

        fetch(url + email + subpoint,
            {
                method: "GET",
            })
            .then((response) => response.json())
            .then((Data) => {
                //console.log(Data.number);
                //console.log(Data.result);
                var points = Data.number;

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

            })
            .catch(error => console.error(error))

    });

});





