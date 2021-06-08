// görev 1
var gorev1 = document.getElementById("gorev1")
var metin = document.getElementsByTagName("h2");
gorev1.onclick = function () {
    for (var i = 0; i < 3; i++) {
        document.getElementById("gorev1").innerHTML += "<li>" + metin[i].innerHTML + "</li>"
    }
}
// görev 2
$(document).ready(function () {
    var h2 = document.getElementsByTagName("h2");
    sayac = 0;
    for (var i = 1; i < h2.length; i++) {
        sayac++;
    }
    $("#gorev2 > button").click(function () {
        $('#gorev2 > input[type=text]').val(sayac);
    });
});
// görev 3
var gorev3 = document.getElementById("gorev3");
$(document).ready(function () {
    $("#gorev3 > button").click(function () {
        var baslik = $("h1").text();
        $('#gorev3 > input[type=text]').val(baslik);
    });
});
// görev 4
var gorev4 = document.getElementById("gorev4")
var ogeler = document.querySelectorAll(".satir>.sutun>article>div>p");
var basliklar = document.querySelectorAll("h2");
gorev4.onclick = function () {
    console.log(ogeler);
    for (var i = 0; i < ogeler.length; i++) {
        var metin = ogeler[i].textContent;
        basliklar[i].textContent += " ( " + metin.length + " karakter) ";
    }
}
// görev 5
var dizi = document.querySelectorAll("h2");
console.log(dizi);
gorev5.onclick = function () {
    for (var i = 0; i < dizi.length; i++) {
        if (i % 2 == 0) {
            dizi[i].style.color = "blue"
        }
        else {
            dizi[i].style.color = "orange"
        }
    }
    var kirmizibaslik = document.querySelector("h1");
    kirmizibaslik.style.color = "red"
}
// görev 6
$(document).ready(function () {
    $("#gorev6 > button").click(function () {
        var paragraflar = Array.from($("p:lt(15)"));
        paragraflar.forEach(parag => {
            $("p:lt(1)").fadeOut();
        });
    });
});
// görev 7
$(document).ready(function(){
    $("#gorev7 > button").click(function(){
        var can = $("h2:contains(can)");
        for(var i = 0; i < can.length; i++)
        {
            document.getElementById("gorev7").innerHTML += "<li>" + can[i].innerHTML + "</li>"
        }
    });
});
// görev 8
gorev8.onclick = (function () {
    $("article>div>p").load("lorem.html");
    $.ajax({
        url: "lorem.html",
        type: "get",
    });
});
// görev 9
$("h2, h1").hover(function () {
    var fare = $(this).hover().text();
    $("#gorev9 > input[type=text]").val(fare);
});
// görev 10
$(document).ready(function () {
    $("#gorev10 > button").click(function () {
        var resim = $("<div>");
        $("footer").append(resim);
        resim.addClass("dv");
        $('.dv').prepend('<img src="img/check.png" width="100px" height="100px" style="margin-top:-1450px; position:fixed; right:250px;"/>');
    });
});