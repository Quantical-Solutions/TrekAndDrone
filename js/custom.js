jQuery(document).ready(function(){
    jQuery(".owl-carousel").owlCarousel({
        responsiveClass:true,
        autoHeight:false,
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        autoplaySpeed: true,
        loop: true,
        nav: true,
        rewind: true,
        navText: ["<img id='left' src='img/left.png'>","<img id='right' src='img/right.png'>"],
        animateIn: "fadeIn",
        animateOut: "fadeOut"  
    });
});

/*bandeau cookies*/

function getCookie(c_name){
	var c_value = document.cookie;
 	var c_start = c_value.indexOf(' ' + c_name + '=');
 	if (c_start == -1){
  		c_start = c_value.indexOf(c_name + '=');
 	}
 	if (c_start == -1){
  		c_value = null;
 	}else{
  		c_start = c_value.indexOf('=', c_start) + 1;
  		var c_end = c_value.indexOf(';', c_start);
  		if (c_end == -1){
   			c_end = c_value.length;
  		}
  		c_value = unescape(c_value.substring(c_start,c_end));
 	}
 	return c_value;
};

function setCookie(c_name,value,exdays){
 	var exdate = new Date();
 	exdate.setDate(exdate.getDate() + exdays);
 	var c_value = escape(value) + ((exdays == null) ? '' : '; expires=' + exdate.toUTCString());
 	document.cookie = c_name + '=' + c_value;
};

if(getCookie('aviso') != '1'){
 	document.getElementById('bandeaucookies').style.display = 'block';
};

function PonerCookie(){
 	setCookie('aviso', '1', 365);
 	document.getElementById('bandeaucookies').style.display = 'none';
};

/*fin bandeau cookies*/

$( "#header-plugin" ).load( "https://vivinantony.github.io/header-plugin/", function() {
  $("a.back-to-link").attr("href", "http://blog.thelittletechie.com/2015/05/different-social-nav-styles.html#tlt")  
});

function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      document.getElementById('errormail').style.display = "initial";
      document.getElementById('inmail').style.color= "black";
      document.getElementById('hidemail').value="";
      return false;
   }
   else
   {
      surligne(champ, false);
      document.getElementById('errormail').style.display = "none";
      document.getElementById('inmail').style.color= "black";
      document.getElementById('hidemail').value="ok";
      return true;
   }
}

function verifPseudo(champ)
{
   if(champ.value.length < 2 || champ.value.length > 25)
   {
      surligne(champ, true);
      document.getElementById('errorpseudo').style.display = "initial";
      document.getElementById('inpseudo').style.color= "black";
      document.getElementById('hidepseudo').value="";
      return false;
   }
   else
   {
      surligne(champ, false);
      document.getElementById('errorpseudo').style.display = "none";
      document.getElementById('inpseudo').style.color= "black";
      document.getElementById('hidepseudo').value="ok";
      return true;
   }
}

function surligne(champ, erreur)
{
   if(erreur)
      champ.style.borderColor = "#FF0000";

   else
      champ.style.borderColor = "";
}

var zoom = document.querySelectorAll('.zoom');

for (var i = 0; i < zoom.length; i++) {
  zoom[i].addEventListener('click', showPhoto);
}

function showPhoto(e) {
    src = e.currentTarget.src;
    document.getElementById('zoomImg').src = src;
    document.getElementById('zoomIn').style.display = "flex";
    document.getElementById('zoomIn').style.animation = "zoomIn 0.5s";
}

function closeZoom() {

    document.getElementById('zoomIn').style.animation = "zoomOut 0.5s";
    setTimeout(closeDivZoom, 400);
}

function closeDivZoom() {

    document.getElementById('zoomIn').style.display = "none";
}

$(".burger-menu").click(function () {
          $(this).toggleClass("menu-on");
  });

var crossToggle = document.getElementById('burger-menu');
crossToggle.addEventListener('click', menuResp);

function menuResp() {

  var show = document.querySelector('#menuResp');

  if (show.style.display == "flex") {

    show.style.animation = "fadeOut 0.5s";
    setTimeout(closeNavResp, 320);

  } else {

    show.style.display = "flex";
    show.style.animation ="slideInDown 0.35s"

  }

}

function closeNavResp() {

    document.querySelector('#menuResp').style.display ="none";
}

$(document).ready(function() {
    $('#cRetour').click(function() {
        $('html,body').animate({scrollTop: 0},'slow');
    }); 
});

document.addEventListener('DOMContentLoaded', function() {
  window.onscroll = function(ev) {
    document.getElementById("cRetour").className = (window.pageYOffset > 300) ? "cVisible" : "cInvisible";
  };
});


