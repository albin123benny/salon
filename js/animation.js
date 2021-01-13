function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
async function anim(value){
    document.getElementById("dayy").value=value;
    document.getElementsByClassName("book_content")[0].style.cssText="width:300px;";
    await sleep(1000);
    change();
    document.getElementsByClassName("weekdays")[0].style.cssText="display:none";
    document.getElementsByClassName("bookdays_time")[0].style.cssText="display:block";
}

function tim(data)
{
    document.getElementById("tim").value=data;
    document.getElementsByClassName("book_btn")[0].style.cssText="opacity:1";
}

function sub(){
    if(document.getElementById("dayy").value != "" && document.getElementById("tim").value !="" )
    {
        document.getElementById("sub_values").submit();
    }
    else{
        document.getElementsByClassName("book_content")[0].style.cssText="border: 1px solid red;width:300px;";
    }
}

async function change(){
    var elem=document.getElementsByClassName("rightbox_cont");
    console.log(elem.length);
    for(i=0;i<elem.length;i++)
    {
        elem[i].style.cssText="box-shadow:none"
        elem[i].removeAttribute("onclick");
    }
    await sleep(10);
    for(j=0;j<elem.length;j++)
    {
        elem[j].style.cssText="position:relative;box-shadow:none";
        await sleep(70);
    }
}