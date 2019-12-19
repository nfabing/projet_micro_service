$(function () {


    $("#getevent").click(function (event) {
        var email = $("#email").val();
        var fetchedevent;
        fetch("/event/fetch?email="+email)
            .then((resp)=>resp.json())
            .then((Data) => {
            console.log(Data);
             for (x in Data)
             {
                $("#demo").append("Id: "+Data[x]["id"]+"<br> Email: "+Data[x]["email"]+"<br> Label: "+Data[x]["label"]+"<br> Date: "+Data[x]["date"]+"<br> Répétition tous les "+Data[x]["repeatday"]+" jours <br> <br>");
             }
             }
            )
            .catch(error => $("#demo").append("Aucun événèment n'existe pour cet email"));

    });
    $("#addevent").click(function (event) {
        var email = $("#email").val();
        var label = $("#label").val();
        var day = $("#day").val();
        var hour = $("#hour").val();
        var min = $("#min").val();
        var sec = $("#sec").val();
        var repeat = $("#repeat").val();
        var date = $("#day").val()+" "+$("#hour").val()+":"+$("#min").val()+":"+$("#sec").val();;

        var Init =
            {
                method: 'POST'
            };

        fetch("/event/new?email="+email+"&date="+date+"&label="+label+"&repeat="+repeat,Init)
            .then((Data) => {
                    console.log(Data);
                $("#demo").append("L'événement à été ajouté");
                }
            )
            .catch(error => $("#demo").append(error));

    });


});
