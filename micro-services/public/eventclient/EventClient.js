function ListEvents() {
    var email = $("#email").val();
    $("#demo").html("");
    fetch("/delivery/micro-services/public/event/fetch?email=" + email)
        .then((resp)=>resp.json())
        .then((Data) => {
                console.log(Data);
            $("#demo").append("<br>");
                for (x in Data)
                {
                    var jour_input = $("#jour_input").val();
                    var jour_event = Data[x]["date"].slice(0,10);
                    var repeat =  Data[x]["repeatday"];
                    if (HandleRepeat(jour_input,jour_event,repeat))
                    {
                        if(repeat!="0")
                        {
                        $("#demo").append("<p class='event'>Id: "+Data[x]["id"]+"<br> Email: "+Data[x]["email"]+"<br> Label: "+Data[x]["label"]+"<br> Date: "+Data[x]["date"]+"<br> Répétition tous les "+Data[x]["repeatday"]+" jours <br></p><br>");
                        }
                        else
                        {
                            $("#demo").append("<p class='event'>Id: "+Data[x]["id"]+"<br> Email: "+Data[x]["email"]+"<br> Label: "+Data[x]["label"]+"<br> Date: "+Data[x]["date"]+"<br> Aucune répétition <br></p><br>");
                        }
                    }
                }
            }
        )
        .catch(error => alert("Aucun événèment n'existe pour cet email"));

}
function AddNewEvent(){
    var email = $("#email").val();
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

    fetch("/delivery/micro-services/public/event/new?email=" + email + "&date=" + date + "&label=" + label + "&repeat=" + repeat, Init)
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

    fetch("/delivery/micro-services/public/event/remove?id=" + id, Init)
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

    fetch("/delivery/micro-services/public/event/update?id=" + id + "&email=" + email + "&date=" + date + "&label=" + label + "&repeat=" + repeat, Init)
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

function HandleRepeat(input,event,repeatday)
{
var event_year = Number(event.slice(0,4));
var event_month = Number(event.slice(5,7));
var event_day = Number(event.slice(8,10));
var input_year = Number(input.slice(0,4));
var input_month = Number(input.slice(5,7));
var input_day = Number(input.slice(8,10));
var repeat = Number(repeatday);
var canRepeat = false;
var equaldays = false;
if(input_day==event_day && input_month==event_month && input_year==event_year)
{
        equaldays=true;
        canRepeat=true;
}
while(event_day<input_day && event_month<=input_month && event_year<=input_year && equaldays==false){
if(event_month==1 || event_month==3 || event_month==5 || event_month==7 || event_month==8 || event_month==10 || event_month==12)
{
    if(event_day+repeat>31)
    {
        event_month++;
        event_day=(event_day+repeat)-31;
    }
    else
    {
        event_day=event_day+repeat;
    }
}
else
{
    if(event_month==4 || event_month==6 || event_month==9 || event_month==11)
    {
        if(event_day+repeat>30)
        {
            event_month++;
            event_day=(event_day+repeat)-30;
        }
        else
        {
            event_day=event_day+repeat;
        }
    }
    else
    {
        if(event_day+repeat>29)
        {
            event_month++;
            event_day=(event_day+repeat)-29;
        }
        else
        {
            event_day=event_day+repeat;
        }
    }
}
if (event_month==13)
{
    event_month=1;
    event_day++;
}
if(input_day==event_day && input_month==event_month && input_year==event_year)
{
    canRepeat = true;
}
else
{
    canRepeat = false;
}
}
return canRepeat;
}

