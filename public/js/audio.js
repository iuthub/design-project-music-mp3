/**
 * Created by Jey on 5/1/2018.
 */


function play($path) {
    $("audio").show();
    document.getElementById("audio").src=$path;
}

function changeImg(el,elid,path)
{
    var image =  document.getElementById(elid);
    image.src = el.getAttribute("src");
    $("audio").show();
    document.getElementById("audio").src=path;
}





