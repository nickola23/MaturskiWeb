function promeni(i)
{
    if(i=="1")
    {
        document.getElementById("engleski").disabled = true;
        document.getElementById("srpski").disabled = false;
    }
    else if(i=="2")
    {
        document.getElementById("engleski").disabled = false;
        document.getElementById("srpski").disabled = true;
    }
}