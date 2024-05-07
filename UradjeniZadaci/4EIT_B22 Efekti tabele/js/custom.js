var a=b=c=d=e=2;
function Sortiraj()
{
    if(a%2==0)
    {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("tabela");
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length-1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[4];
                y = rows[i + 1].getElementsByTagName("TD")[4];
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }
    else location.reload();
    a++;
}

function Oboji()
{
    if(b%2==0)
    {
        var table = document.getElementById("tabela");  
        var rows = table.getElementsByTagName("tr");   
        for (i = 1; i < (rows.length); i++) {
            x = rows[i].getElementsByTagName("TD")[0];
            if (x.innerHTML.toLowerCase()%2 ==1) {
                rows[i].className="neparni";
            }
        }
    }
    else location.reload();
    b++;
}

function Polozio()
{
    if(c%2==0)
    {
        var table = document.getElementById("tabela");  
        var rows = table.getElementsByTagName("tr");   
        for (i = 1; i < (rows.length); i++) {
            x = rows[i].getElementsByTagName("TD")[4];
            if (x.innerHTML.toLowerCase()>=50) {
                rows[i].className="zeleno";
            }
        }
    }
    else location.reload();
    c++;
}

function NijePolozio()
{
    if(d%2==0)
    {
        var table = document.getElementById("tabela");  
        var rows = table.getElementsByTagName("tr");   
        for (i = 1; i < (rows.length); i++) {
            x = rows[i].getElementsByTagName("TD")[4];
            if (x.innerHTML.toLowerCase()<50) {
                rows[i].className="crveno";
            }
        }
    }
    else location.reload();
    d++;
}

function Izbaci()
{
    if(e%2==0)
    {
        var table = document.getElementById("tabela");  
        var rows = table.getElementsByTagName("tr");   
        for (i = 1; i < (rows.length); i++) {
            x = rows[i].getElementsByTagName("TD")[4];
            if (x.innerHTML.toLowerCase()<50) {
                table.deleteRow(i);
            }
        }
        Sortiraj();   
    }
    else location.reload();
    e++;                     
}

