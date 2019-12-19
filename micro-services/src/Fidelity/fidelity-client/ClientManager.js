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


}
