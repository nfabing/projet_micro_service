class EventClient
{
AddingNewEvent(email,date,label,repeat)
{
fetch("localhost:8000/event/"+email+"_"+date+"_"+label+"_"+repeat)
    .then(function(response) {
        return response.blob();
    })
}

FetchEvents()
{

}

}