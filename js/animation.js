function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
async function anim(){
    document.getElementsByClassName("book_content")[0].style.cssText="width:390px;";
    await sleep(1000);
    change();
    document.getElementsByClassName("weekdays")[0].style.cssText="display:none";
    document.getElementsByClassName("bookdays_time")[0].style.cssText="display:block";
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