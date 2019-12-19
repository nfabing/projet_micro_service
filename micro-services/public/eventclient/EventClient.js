function ListEvents() {
    var email = $("#email").val();
    $("#demo").html("");
    fetch("/event/fetch?email="+email)
        .then((resp)=>resp.json())
        .then((Data) => {
                console.log(Data);
            $("#demo").append("<br>");
                for (x in Data)
                {
                    var jour_input = $("#jour_input").val();
                    var jour_event = Data[x]["date"].slice(0,10);
                    if (jour_event==jour_input)
                    {
                        if( Data[x]["repeatday"]!="0")
                        {
                        $("#demo").append("Id: "+Data[x]["id"]+"<br> Email: "+Data[x]["email"]+"<br> Label: "+Data[x]["label"]+"<br> Date: "+Data[x]["date"]+"<br> Répétition tous les "+Data[x]["repeatday"]+" jours <br> <br>");
                        }
                        else
                        {
                            $("#demo").append("Id: "+Data[x]["id"]+"<br> Email: "+Data[x]["email"]+"<br> Label: "+Data[x]["label"]+"<br> Date: "+Data[x]["date"]+"<br> Aucune répétition <br> <br>");
                        }
                    }
                }
            }
        )
        .catch(error => alert("Aucun événèment n'existe pour cet email"));

}
function AddNewEvent(){
    var email = $("#email").val();
    var email_n = $("#email_n").val();
    var label = $("#label_n").val();
    var day = $("#day_n").val();
    var hour = $("#hour_n").val();
    var min = $("#min_n").val();
    var sec = $("#sec_n").val();
    var repeat = $("#repeat_n").val();
    var date = day+" "+hour+":"+min+":"+sec;

    var Init =
        {
            method: 'POST'
        };

    fetch("/event/new?email="+email+"&date="+date+"&label="+label+"&repeat="+repeat,Init)
        .then((Data) => {
                console.log(Data);
                alert("L'événement à été ajouté");
            }
        )
        .catch(error => $("#demo").append(error));
    ListEvents();
}
function RemoveEvent(){
    var id = $("#id_d").val();

    var Init =
        {
            method: 'POST'
        };

    fetch("/event/remove?id="+id,Init)
        .then((Data) => {
            alert("L'événement à été supprimé");
            }
        )
        .catch(error => alert("Erreur: "+error));
    ListEvents();
}
function UpdateEvent(){
    var id = $("#id_u").val();
    var label = $("#label").val();
    var day = $("#day").val();
    var hour = $("#hour").val();
    var min = $("#min").val();
    var sec = $("#sec").val();
    var repeat = $("#repeat").val();
    var date = day+" "+hour+":"+min+":"+sec;
    var Init =
        {
            method: 'POST'
        };

    fetch("/event/update?id="+id+"&email="+email+"&date="+date+"&label="+label+"&repeat="+repeat,Init)
        .then((Data) => {
                alert("L'événement à été modifié");
            }
        )
        .catch(error => alert("Erreur: "+error));

    ListEvents();
}
function UpdateWindow()
{
    $("#updatewindow").css("display","block");
    $("#deletewindow").css("display","none");
    $("#addwindow").css("display","none");
}
function DeleteWindow()
{
    $("#updatewindow").css("display","none");
    $("#deletewindow").css("display","block");
    $("#addwindow").css("display","none");
}
function AddWindow()
{
    $("#updatewindow").css("display","none");
    $("#deletewindow").css("display","none");
    $("#addwindow").css("display","block");
}