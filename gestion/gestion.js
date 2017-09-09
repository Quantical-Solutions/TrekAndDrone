function li1() {
	document.getElementById('mailhead').style.display="none";
	document.getElementById('message').style.display="none";
	document.getElementById('accueil').style.display = "block";
	document.getElementById('ecrire').style.display = "none";
	document.getElementById('modifier').style.display = "none";
	document.getElementById('messages').style.display = "none";
    document.getElementById('newsletter').style.display = "none";
    document.getElementById('bdd').style.display = "none";
    document.getElementById('videos').style.display = "none";
}

function li2() {
	document.getElementById('mailhead').style.display="none";
	document.getElementById('message').style.display="none";
	document.getElementById('accueil').style.display = "none";
	document.getElementById('ecrire').style.display = "block";
	document.getElementById('modifier').style.display = "none";
	document.getElementById('messages').style.display = "none";
    document.getElementById('newsletter').style.display = "none";
    document.getElementById('bdd').style.display = "none";
    document.getElementById('videos').style.display = "none";	
}

function li3() {
	document.getElementById('mailhead').style.display="none";
	document.getElementById('message').style.display="none";
	document.getElementById('accueil').style.display = "none";
	document.getElementById('ecrire').style.display = "none";
	document.getElementById('modifier').style.display = "block";
	document.getElementById('messages').style.display = "none";
    document.getElementById('newsletter').style.display = "none";
    document.getElementById('bdd').style.display = "none";
    document.getElementById('videos').style.display = "none";
}

function li4() {
	document.getElementById('mailhead').style.display="none";
	document.getElementById('message').style.display="none";
	document.getElementById('accueil').style.display = "none";
	document.getElementById('ecrire').style.display = "none";
	document.getElementById('modifier').style.display = "none";
	document.getElementById('messages').style.display = "block";
    document.getElementById('newsletter').style.display = "none";
    document.getElementById('bdd').style.display = "none";
    document.getElementById('videos').style.display = "none";
}

function li5() {
    document.getElementById('mailhead').style.display="none";
    document.getElementById('message').style.display="none";
    document.getElementById('accueil').style.display = "none";
    document.getElementById('ecrire').style.display = "none";
    document.getElementById('modifier').style.display = "none";
    document.getElementById('messages').style.display = "none";
    document.getElementById('newsletter').style.display = "flex";
    document.getElementById('bdd').style.display = "none";
    document.getElementById('videos').style.display = "none";
}

function li6() {
    document.getElementById('mailhead').style.display="none";
    document.getElementById('message').style.display="none";
    document.getElementById('accueil').style.display = "none";
    document.getElementById('ecrire').style.display = "none";
    document.getElementById('modifier').style.display = "none";
    document.getElementById('messages').style.display = "none";
    document.getElementById('newsletter').style.display = "none";
    document.getElementById('bdd').style.display = "none";
    document.getElementById('videos').style.display = "block";
}

function li7() {
    document.getElementById('mailhead').style.display="none";
    document.getElementById('message').style.display="none";
    document.getElementById('accueil').style.display = "none";
    document.getElementById('ecrire').style.display = "none";
    document.getElementById('modifier').style.display = "none";
    document.getElementById('messages').style.display = "none";
    document.getElementById('newsletter').style.display = "none";
    document.getElementById('bdd').style.display = "flex";
    document.getElementById('videos').style.display = "none";
}

function hoverLi(x) {
    x.style.color = "orange";
    x.style.backgroundColor = "white";
    x.style.fontSize = "2.4em";
    x.style.padding = "6.1% 0%";
}

function normalLi(x) {
    x.style.color = "white";
    x.style.backgroundColor = "transparent";
    x.style.fontSize = "1.8em";
    x.style.padding = "8% 0%";
}



var item = document.querySelectorAll('#liste > ul li');
for (var i = 0; i < item.length; i++) {
	item[i].addEventListener('click', focusLi);
}

function focusLi(e) {

    var li1 = document.querySelector('#li1');
    var li2 = document.querySelector('#li2');
    var li3 = document.querySelector('#li3');
    var li4 = document.querySelector('#li4');
    var li5 = document.querySelector('#li5');
    var li6 = document.querySelector('#li6');
    var li7 = document.querySelector('#li7');

    if (e.currentTarget == li1) {
		li1.className = "liFocus";
        li2.className = "li";
        li3.className = "li";
        li4.className = "li";
        li5.className = "li";
        li6.className = "li";
        li7.className = "li";
    } else if (e.currentTarget == li2) {
        li1.className = "li";
        li2.className = "liFocus";
        li3.className = "li";
        li4.className = "li";
        li5.className = "li";
        li6.className = "li";
        li7.className = "li";
    } else if (e.currentTarget == li3) {
        li1.className = "li";
        li2.className = "li";
        li3.className = "liFocus";
        li4.className = "li";
        li5.className = "li";
        li6.className = "li";
        li7.className = "li";
    } else if (e.currentTarget == li4) {
        li1.className = "li";
        li2.className = "li";
        li3.className = "li";
        li4.className = "liFocus";
        li5.className = "li";
        li6.className = "li";
        li7.className = "li";
    } else if (e.currentTarget == li5) {
        li1.className = "li";
        li2.className = "li";
        li3.className = "li";
        li4.className = "li";
        li5.className = "liFocus";
        li6.className = "li";
        li7.className = "li";
    } else if (e.currentTarget == li6) {
        li1.className = "li";
        li2.className = "li";
        li3.className = "li";
        li4.className = "li";
        li5.className = "li";
        li6.className = "liFocus";
        li7.className = "li";
    } else if (e.currentTarget == li7) {
        li1.className = "li";
        li2.className = "li";
        li3.className = "li";
        li4.className = "li";
        li5.className = "li";
        li6.className = "li";
        li7.className = "liFocus";
    }
}

CKEDITOR.replace( 'editor1' );
CKEDITOR.replace( 'editor2' );
CKEDITOR.replace( 'editor3' );
CKEDITOR.replace( 'editor4' );
CKEDITOR.replace( 'editor5' );
CKEDITOR.replace( 'editor6' );
CKEDITOR.replace( 'editor7' );

function themeSelect() {
	var sel = document.getElementById("adminselector").value;
    if (sel == 1) {
        document.querySelector('#logoafter > h2 > span').style.color = "orange";
    	document.querySelector('header').className = "style1";
    	document.querySelector('aside').className = "style1";
    	document.querySelector('#spandate').className = "style1span";
    	document.querySelector('#themeval1').className = "style1span";
    	document.querySelector('#themeval2').className = "style1span";
        var label = document.querySelectorAll('label');
            for (var i = 0; i < label.length; i++) {
                label[i].className = "colorStd";
            }

        var button = document.querySelectorAll('button');
            for (var i = 0; i < button.length; i++) {
                button[i].className = "blackrest";
            }
        var button2 = document.querySelectorAll('button');
            for (var i = 0; i < button2.length; i++) {
                button2[i].className = "borderrest";
            }
        var bh = document.querySelectorAll('button:hover');
            for (var i = 0; i < bh.length; i++) {
                bh[i].className = "blackrest";
            }
        var a = document.querySelectorAll('a');
            for (var i = 0; i < a.length; i++) {
                a[i].className = "colorrest";
            }
        var span = document.querySelectorAll('span:not(.cke_top), span:not(#cke_1_toolbox), span:not(#cke_1_toolbox) span:not');
            for (var i = 0; i < span.length; i++) {
                span[i].className = "colorrest";
            }
    	document.getElementById('hide').value = 1;
    } else if (sel == 2) {
        document.querySelector('#logoafter > h2 > span').style.color = "orange";
    	document.querySelector('header').className = "style2";
    	document.querySelector('aside').className = "style2";
    	document.querySelector('#spandate').className = "style2span";
    	document.querySelector('#themeval1').className = "style2span";
    	document.querySelector('#themeval2').className = "style2span";
        var label = document.querySelectorAll('label');
            for (var i = 0; i < label.length; i++) {
                label[i].className = "colorStd";
            }

        var button = document.querySelectorAll('button');
            for (var i = 0; i < button.length; i++) {
                button[i].className = "blackrest";
            }
        var button2 = document.querySelectorAll('button');
            for (var i = 0; i < button2.length; i++) {
                button2[i].className = "borderrest";
            }
        var bh = document.querySelectorAll('button:hover');
            for (var i = 0; i < bh.length; i++) {
                bh[i].className = "blackrest";
            }
        var a = document.querySelectorAll('a');
            for (var i = 0; i < a.length; i++) {
                a[i].className = "colorrest";
            }
        var span = document.querySelectorAll('span:not(.cke_top), span:not(#cke_1_toolbox), span:not(#cke_1_toolbox) span:not');
            for (var i = 0; i < span.length; i++) {
                span[i].className = "colorrest";
            }
    	document.getElementById('hide').value = 2;
    	} else if (sel == 3) {
        document.querySelector('#logoafter > h2 > span').style.color = "orange";
    	document.querySelector('header').className = "style3";
    	document.querySelector('aside').className = "style3";
    	document.querySelector('#spandate').className = "style3span";
    	document.querySelector('#themeval1').className = "style3span";
    	document.querySelector('#themeval2').className = "style3span";
        var label = document.querySelectorAll('label');
            for (var i = 0; i < label.length; i++) {
                label[i].className = "colorStd";
            }

        var button = document.querySelectorAll('button');
            for (var i = 0; i < button.length; i++) {
                button[i].className = "blackrest borderrest";
            }
        var button2 = document.querySelectorAll('button');
            for (var i = 0; i < button2.length; i++) {
                button2[i].className = "borderrest";
            }
        var bh = document.querySelectorAll('button:hover');
            for (var i = 0; i < bh.length; i++) {
                bh[i].className = "blackrest";
            }
        var a = document.querySelectorAll('a');
            for (var i = 0; i < a.length; i++) {
                a[i].className = "colorrest";
            }
        var span = document.querySelectorAll('span:not(.cke_top), span:not(#cke_1_toolbox), span:not(#cke_1_toolbox) span:not');
            for (var i = 0; i < span.length; i++) {
                span[i].className = "colorrest";
            }
    	document.getElementById('hide').value = 3;
    	} else if (sel == 4) {
        document.querySelector('#logoafter > h2 > span').style.color = "orange";
    	document.querySelector('header').className = "style4";
    	document.querySelector('aside').className = "style4";
    	document.querySelector('#spandate').className = "style4span";
    	document.querySelector('#themeval1').className = "style4span";
    	document.querySelector('#themeval2').className = "style4span";
        var label = document.querySelectorAll('label');
            for (var i = 0; i < label.length; i++) {
                label[i].className = "colorStd";
            }
        var button = document.querySelectorAll('button');
            for (var i = 0; i < button.length; i++) {
                button[i].className = "borderrest";
            }
        var bh = document.querySelectorAll('button:hover');
            for (var i = 0; i < bh.length; i++) {
                bh[i].className = "blackrest";
            }
        var a = document.querySelectorAll('a');
            for (var i = 0; i < a.length; i++) {
                a[i].className = "colorrest";
            }
        var span = document.querySelectorAll('span:not(.cke_top), span:not(#cke_1_toolbox), span:not(#cke_1_toolbox) span:not');
            for (var i = 0; i < span.length; i++) {
                span[i].className = "colorrest";
            }
    	document.getElementById('hide').value = 4;
    } else {
        document.querySelector('#logoafter > h2 > span').style.color = "violet";
    	document.querySelector('header').className = "style5";
    	document.querySelector('aside').className = "style5";
    	document.querySelector('#spandate').className = "style5span";
    	document.querySelector('#themeval1').className = "style5span";
    	document.querySelector('#themeval2').className = "style5span";
        var label = document.querySelectorAll('label');
            for (var i = 0; i < label.length; i++) {
                label[i].className = "blackbg5";
            }

        var button = document.querySelectorAll('button');
            for (var i = 0; i < button.length; i++) {
                button[i].className = "blackbg5";
            }
        var button2 = document.querySelectorAll('button');
            for (var i = 0; i < button2.length; i++) {
                button2[i].className = "border5";
            }
        var bh = document.querySelectorAll('button:hover');
            for (var i = 0; i < bh.length; i++) {
                bh[i].className = "blackbg5";
            }
        var a = document.querySelectorAll('a');
            for (var i = 0; i < a.length; i++) {
                a[i].className = "color5";
            }
        var span = document.querySelectorAll('span:not(.cke_top), span:not(#cke_1_toolbox), span:not(#cke_1_toolbox) span:not');
            for (var i = 0; i < span.length; i++) {
                span[i].className = "color5";
            }
    	document.getElementById('hide').value = 5;
    }
}

document.getElementById('choixart').style.display="none";

function selectArtCat() {

    var sel = document.querySelector('#selectCat').value;

    switch (sel) {

                case "Véhicules":

                    document.getElementById('choixart').style.display="block";
                    document.getElementById('artV').style.display="initial";
                    document.getElementById('artD').style.display="none";
                    document.getElementById('artO').style.display="none";
                    document.getElementById('artT').style.display="none";
                    document.getElementById('artE').style.display="none";
                    document.getElementById('artA').style.display="none";

                break;

                case "Développement":

                    document.getElementById('choixart').style.display="block";
                    document.getElementById('artV').style.display="none";
                    document.getElementById('artD').style.display="initial";
                    document.getElementById('artO').style.display="none";
                    document.getElementById('artT').style.display="none";
                    document.getElementById('artE').style.display="none";
                    document.getElementById('artA').style.display="none";

                break;

                case "Organisation":

                    document.getElementById('choixart').style.display="block";
                    document.getElementById('artV').style.display="none";
                    document.getElementById('artD').style.display="none";
                    document.getElementById('artO').style.display="initial";
                    document.getElementById('artT').style.display="none";
                    document.getElementById('artE').style.display="none";
                    document.getElementById('artA').style.display="none";

                break;

                case "Trek":

                    document.getElementById('choixart').style.display="block";
                    document.getElementById('artV').style.display="none";
                    document.getElementById('artD').style.display="none";
                    document.getElementById('artO').style.display="none";
                    document.getElementById('artT').style.display="initial";
                    document.getElementById('artE').style.display="none";
                    document.getElementById('artA').style.display="none";

                break;

                case "Enduro":

                    document.getElementById('choixart').style.display="block";
                    document.getElementById('artV').style.display="none";
                    document.getElementById('artD').style.display="none";
                    document.getElementById('artO').style.display="none";
                    document.getElementById('artT').style.display="none";
                    document.getElementById('artE').style.display="initial";
                    document.getElementById('artA').style.display="none";

                break;

                case "Autres":

                    document.getElementById('choixart').style.display="block";
                    document.getElementById('artV').style.display="none";
                    document.getElementById('artD').style.display="none";
                    document.getElementById('artO').style.display="none";
                    document.getElementById('artT').style.display="none";
                    document.getElementById('artE').style.display="none";
                    document.getElementById('artA').style.display="initial";

                break;

                default:

                    document.getElementById('choixart').style.display="none";   
    }
}

var arts = document.querySelectorAll('.artDiv');
for (var i = 0; i < arts.length; i++) {

    var node = arts[i].children.length;

    if (node < 1) {
        
        arts[i].innerHTML = '<p id="noArtMess" style="display: flex; margin-top: 15px; color: orange!important; justify-content: center; font-style: italic; font-family: raleway, cursive;">Pas d\'article dans cette catégorie pour le moment.</p>';

    }
}

var selmod = document.querySelectorAll('.artOpt');

for (var i=0; i<selmod.length; i++) {
    selmod[i].addEventListener('click', showArtSel);
}

function resetartSel() {

    document.getElementById('titreModif').value = "";
    document.getElementById('titreModif').innerHTML = "";
    CKEDITOR.instances.editor3.setData('<p style="display:none;"></p>');
    CKEDITOR.instances.editor4.setData('<p style="display:none;"></p>');
}

function resetNl() {

    document.getElementById('titreNews').value = "";
    CKEDITOR.instances.editor5.setData('<p style="display:none;"></p>');
}

function resetVid() {

    document.getElementById('titredrone').value = "";
    document.getElementById('drone').value = "";
    document.getElementById('textvid').value = "";
    document.getElementById('textvid').innerHTML = ""; 
    CKEDITOR.instances.editor6.setData('<p style="display:none;"></p>');
    CKEDITOR.instances.editor7.setData('<p style="display:none;"></p>');
}

function showArtSel(art) {

    var id = art.currentTarget.id;

    var h1 = "h1art" + id;
    var p1 = "p1art" + id;
    var p2 = "p2art" + id;
    var cit = "citart" + id;
            
    var titre = document.getElementById(h1).value;
    var para1 = document.getElementById(p1).value;
    var para2 = document.getElementById(p2).value;
    var citation = document.getElementById(cit).value;
            
    document.getElementById('idModif').value = id;
    document.getElementById('titreModif').value = titre;

    document.getElementById('idModif').innerHTML = id;
    document.getElementById('titreModif').innerHTML = titre;

    document.querySelector('#edit1 > textarea').value = para1;
    document.querySelector('#edit2 > textarea').value = para2;
    document.querySelector('#edicit').value = citation;
            
    document.querySelector('#edit1 > textarea').innerHTML = para1;
    document.querySelector('#edit2 > textarea').innerHTML = para2;
    document.querySelector('#edicit').innerHTML = citation;

    CKEDITOR.instances.editor3.insertHtml(para1);
    CKEDITOR.instances.editor4.insertHtml(para2);  
}

var mail = document.querySelectorAll('.auteur');

for (var i=0; i<mail.length; i++) {
    mail[i].addEventListener('click', showMess);
}

function showMess(mess) {

    document.getElementById('mailhead').style.display="flex";
    document.getElementById('message').style.display="flex";
    document.getElementById('btnsMail').style.display="initial";

    var sliceId = mess.currentTarget.id.slice(10);

    var messNom = document.querySelector('#hideNom' + sliceId).textContent;
    var messDate = document.querySelector('#hideDate' + sliceId).textContent;
    var messMail = document.querySelector('#hideMail' + sliceId).textContent;
    var messMess = document.querySelector('#hideContent' + sliceId).textContent;

    document.getElementById('messNom').value = messNom;
    document.getElementById('messDate').value = messDate;
    document.getElementById('messMail').value = messMail;
    document.getElementById('messMess').innerHTML = messMess;

    document.getElementById('repondre').href = "mailto:" + messMail +"?Subject=Retour Contact Trekandrone.com"; 
}

function resetMailShown() {

    document.getElementById('message').style.display = "none";
    document.getElementById('mailhead').style.display = "none";
    document.getElementById('btnsMail').style.display = "none";     
}

var pagi = document.querySelectorAll('.pagi');

for (var i=0; i<pagi.length; i++) {
    pagi[i].addEventListener('click', changeTabClass);
    pagi[i].addEventListener('click', changeTab);
}

function changeTabClass(p) {

    for (var i=0; i<pagi.length; i++) {
        pagi[i].className = "pagi";
    }
    p.currentTarget.className = "pagi active";
}

function changeTab(c) {

    var id = parseInt(c.currentTarget.textContent);

    if (id == 1) {
        for (var i = 0; i < 6; i++) {
            
            if (document.getElementsByClassName("section1")[i]) {document.getElementsByClassName("section1")[i].style.display="table-row";}
            if (document.getElementsByClassName("section2")[i]) {document.getElementsByClassName("section2")[i].style.display="none";}
            if (document.getElementsByClassName("section3")[i]) {document.getElementsByClassName("section3")[i].style.display="none";}
            if (document.getElementsByClassName("section4")[i]) {document.getElementsByClassName("section4")[i].style.display="none";}
            if (document.getElementsByClassName("section5")[i]) {document.getElementsByClassName("section5")[i].style.display="none";}
            if (document.getElementsByClassName("section6")[i]) {document.getElementsByClassName("section6")[i].style.display="none";}
            if (document.getElementsByClassName("section7")[i]) {document.getElementsByClassName("section7")[i].style.display="none";}
            if (document.getElementsByClassName("section8")[i]) {document.getElementsByClassName("section8")[i].style.display="none";}
            if (document.getElementsByClassName("section9")[i]) {document.getElementsByClassName("section9")[i].style.display="none";}

        }
            
    }

    if (id == 2) {
        for (var i = 0; i < 6; i++) {
            
            if (document.getElementsByClassName("section1")[i]) {document.getElementsByClassName("section1")[i].style.display="none";}
            if (document.getElementsByClassName("section2")[i]) {document.getElementsByClassName("section2")[i].style.display="table-row";}
            if (document.getElementsByClassName("section3")[i]) {document.getElementsByClassName("section3")[i].style.display="none";}
            if (document.getElementsByClassName("section4")[i]) {document.getElementsByClassName("section4")[i].style.display="none";}
            if (document.getElementsByClassName("section5")[i]) {document.getElementsByClassName("section5")[i].style.display="none";}
            if (document.getElementsByClassName("section6")[i]) {document.getElementsByClassName("section6")[i].style.display="none";}
            if (document.getElementsByClassName("section7")[i]) {document.getElementsByClassName("section7")[i].style.display="none";}
            if (document.getElementsByClassName("section8")[i]) {document.getElementsByClassName("section8")[i].style.display="none";}
            if (document.getElementsByClassName("section9")[i]) {document.getElementsByClassName("section9")[i].style.display="none";}    
        }
    }

    if (id == 3) {
        for (var i = 0; i < 6; i++) {
            
            if (document.getElementsByClassName("section1")[i]) {document.getElementsByClassName("section1")[i].style.display="none";}
            if (document.getElementsByClassName("section2")[i]) {document.getElementsByClassName("section2")[i].style.display="none";}
            if (document.getElementsByClassName("section3")[i]) {document.getElementsByClassName("section3")[i].style.display="table-row";}
            if (document.getElementsByClassName("section4")[i]) {document.getElementsByClassName("section4")[i].style.display="none";}
            if (document.getElementsByClassName("section5")[i]) {document.getElementsByClassName("section5")[i].style.display="none";}
            if (document.getElementsByClassName("section6")[i]) {document.getElementsByClassName("section6")[i].style.display="none";}
            if (document.getElementsByClassName("section7")[i]) {document.getElementsByClassName("section7")[i].style.display="none";}
            if (document.getElementsByClassName("section8")[i]) {document.getElementsByClassName("section8")[i].style.display="none";}
            if (document.getElementsByClassName("section9")[i]) {document.getElementsByClassName("section9")[i].style.display="none";}    
        }    
    }

    if (id == 4) {
        for (var i = 0; i < 6; i++) {
            
            if (document.getElementsByClassName("section1")[i]) {document.getElementsByClassName("section1")[i].style.display="none";}
            if (document.getElementsByClassName("section2")[i]) {document.getElementsByClassName("section2")[i].style.display="none";}
            if (document.getElementsByClassName("section3")[i]) {document.getElementsByClassName("section3")[i].style.display="none";}
            if (document.getElementsByClassName("section4")[i]) {document.getElementsByClassName("section4")[i].style.display="table-row";}
            if (document.getElementsByClassName("section5")[i]) {document.getElementsByClassName("section5")[i].style.display="none";}
            if (document.getElementsByClassName("section6")[i]) {document.getElementsByClassName("section6")[i].style.display="none";}
            if (document.getElementsByClassName("section7")[i]) {document.getElementsByClassName("section7")[i].style.display="none";}
            if (document.getElementsByClassName("section8")[i]) {document.getElementsByClassName("section8")[i].style.display="none";}
            if (document.getElementsByClassName("section9")[i]) {document.getElementsByClassName("section9")[i].style.display="none";}    
        }    
    }

    if (id == 5) {
         for (var i = 0; i < 6; i++) {
            
            if (document.getElementsByClassName("section1")[i]) {document.getElementsByClassName("section1")[i].style.display="none";}
            if (document.getElementsByClassName("section2")[i]) {document.getElementsByClassName("section2")[i].style.display="none";}
            if (document.getElementsByClassName("section3")[i]) {document.getElementsByClassName("section3")[i].style.display="none";}
            if (document.getElementsByClassName("section4")[i]) {document.getElementsByClassName("section4")[i].style.display="none";}
            if (document.getElementsByClassName("section5")[i]) {document.getElementsByClassName("section5")[i].style.display="table-row";}
            if (document.getElementsByClassName("section6")[i]) {document.getElementsByClassName("section6")[i].style.display="none";}
            if (document.getElementsByClassName("section7")[i]) {document.getElementsByClassName("section7")[i].style.display="none";}
            if (document.getElementsByClassName("section8")[i]) {document.getElementsByClassName("section8")[i].style.display="none";}
            if (document.getElementsByClassName("section9")[i]) {document.getElementsByClassName("section9")[i].style.display="none";}    
        }   
    }

    if (id == 6) {
         for (var i = 0; i < 6; i++) {
            
            if (document.getElementsByClassName("section1")[i]) {document.getElementsByClassName("section1")[i].style.display="none";}
            if (document.getElementsByClassName("section2")[i]) {document.getElementsByClassName("section2")[i].style.display="none";}
            if (document.getElementsByClassName("section3")[i]) {document.getElementsByClassName("section3")[i].style.display="none";}
            if (document.getElementsByClassName("section4")[i]) {document.getElementsByClassName("section4")[i].style.display="none";}
            if (document.getElementsByClassName("section5")[i]) {document.getElementsByClassName("section5")[i].style.display="none";}
            if (document.getElementsByClassName("section6")[i]) {document.getElementsByClassName("section6")[i].style.display="table-row";}
            if (document.getElementsByClassName("section7")[i]) {document.getElementsByClassName("section7")[i].style.display="none";}
            if (document.getElementsByClassName("section8")[i]) {document.getElementsByClassName("section8")[i].style.display="none";}
            if (document.getElementsByClassName("section9")[i]) {document.getElementsByClassName("section9")[i].style.display="none";}    
        }   
    }

    if (id == 7) {
         for (var i = 0; i < 6; i++) {
            
            if (document.getElementsByClassName("section1")[i]) {document.getElementsByClassName("section1")[i].style.display="none";}
            if (document.getElementsByClassName("section2")[i]) {document.getElementsByClassName("section2")[i].style.display="none";}
            if (document.getElementsByClassName("section3")[i]) {document.getElementsByClassName("section3")[i].style.display="none";}
            if (document.getElementsByClassName("section4")[i]) {document.getElementsByClassName("section4")[i].style.display="none";}
            if (document.getElementsByClassName("section5")[i]) {document.getElementsByClassName("section5")[i].style.display="none";}
            if (document.getElementsByClassName("section6")[i]) {document.getElementsByClassName("section6")[i].style.display="none";}
            if (document.getElementsByClassName("section7")[i]) {document.getElementsByClassName("section7")[i].style.display="table-row";}
            if (document.getElementsByClassName("section8")[i]) {document.getElementsByClassName("section8")[i].style.display="none";}
            if (document.getElementsByClassName("section9")[i]) {document.getElementsByClassName("section9")[i].style.display="none";}    
        }   
    }

    if (id == 8) {
         for (var i = 0; i < 6; i++) {
            
            if (document.getElementsByClassName("section1")[i]) {document.getElementsByClassName("section1")[i].style.display="none";}
            if (document.getElementsByClassName("section2")[i]) {document.getElementsByClassName("section2")[i].style.display="none";}
            if (document.getElementsByClassName("section3")[i]) {document.getElementsByClassName("section3")[i].style.display="none";}
            if (document.getElementsByClassName("section4")[i]) {document.getElementsByClassName("section4")[i].style.display="none";}
            if (document.getElementsByClassName("section5")[i]) {document.getElementsByClassName("section5")[i].style.display="none";}
            if (document.getElementsByClassName("section6")[i]) {document.getElementsByClassName("section6")[i].style.display="none";}
            if (document.getElementsByClassName("section7")[i]) {document.getElementsByClassName("section7")[i].style.display="none";}
            if (document.getElementsByClassName("section8")[i]) {document.getElementsByClassName("section8")[i].style.display="table-row";}
            if (document.getElementsByClassName("section9")[i]) {document.getElementsByClassName("section9")[i].style.display="none";}    
        }   
    }

    if (id == 9) {
        for (var i = 0; i < 6; i++) {
            
            if (document.getElementsByClassName("section1")[i]) {document.getElementsByClassName("section1")[i].style.display="none";}
            if (document.getElementsByClassName("section2")[i]) {document.getElementsByClassName("section2")[i].style.display="none";}
            if (document.getElementsByClassName("section3")[i]) {document.getElementsByClassName("section3")[i].style.display="none";}
            if (document.getElementsByClassName("section4")[i]) {document.getElementsByClassName("section4")[i].style.display="none";}
            if (document.getElementsByClassName("section5")[i]) {document.getElementsByClassName("section5")[i].style.display="none";}
            if (document.getElementsByClassName("section6")[i]) {document.getElementsByClassName("section6")[i].style.display="none";}
            if (document.getElementsByClassName("section7")[i]) {document.getElementsByClassName("section7")[i].style.display="none";}
            if (document.getElementsByClassName("section8")[i]) {document.getElementsByClassName("section8")[i].style.display="none";}
            if (document.getElementsByClassName("section9")[i]) {document.getElementsByClassName("section9")[i].style.display="table-row";}    
        }    
    }

}

function showNlMod() {

    var sel = document.getElementById('modifnl');

    if (sel.style.display == "none") {

        document.getElementById('modifnl').style.display="flex";
        document.getElementById('idnlmodifsend').value = "modif";
    
    } else {

        document.getElementById('modifnl').style.display="none";
        document.getElementById('idnlmodifsend').value = "";

    }
}

var nlm = document.querySelectorAll('.nlOpt');
for (var i = 0; i < nlm.length; i++) {

    nlm[i].addEventListener('click', displayNl);
}

function displayNl(nl) {

    var dis = nl.currentTarget.id;
    var slice = dis.slice(5);

    var titre = document.getElementById('titre' + slice).textContent;
    var newtitre = titre.slice(2, -35);

    var contenu = document.getElementById('contenu' + slice).value;
    document.getElementById('idnlmodifsend').value = "modif";
    document.getElementById('idnlmodif').value = slice;
    document.getElementById('idnlmodif').innerHTML = slice;
 
    document.getElementById('titreNews').value = newtitre;
    document.getElementById('titreNews').innerHTML = newtitre;
    document.querySelector('#editNl > textarea').value = contenu;        
    document.querySelector('#editNl > textarea').innerHTML = contenu;
    CKEDITOR.instances.editor5.insertHtml(contenu);

}

function showVidMod() {

    var sel = document.getElementById('modifvid');

    if (sel.style.display == "none") {

        document.getElementById('modifvid').style.display="flex";
        document.getElementById('imgd').style.display="none";
        document.getElementById('idvidmodifsend').value = "modif";
        document.getElementById("imgdid").required = false;
    
    } else {

        document.getElementById('modifvid').style.display="none";
        document.getElementById('imgd').style.display="initial";
        document.getElementById('idvidmodifsend').value = "";
        document.getElementById("imgdid").required = true;

    }
}

var vid = document.querySelectorAll('.nlOpt');
for (var i = 0; i < vid.length; i++) {

    vid[i].addEventListener('click', displayVid);
}

function displayVid(vid) {

    var dis = vid.currentTarget.id;
    var slice = dis.slice(5);


    var titre = document.getElementById('titredrone' + slice).value;
    var drone = document.getElementById('drone' + slice).value;
    var dronecontent = document.getElementById('dronecontent' + slice).value;
    var videocode = document.getElementById('videocode' + slice).value;
    var videocontent = document.getElementById('videocontent' + slice).value;

    document.getElementById('idvidmodifsend').value = "modif";
    document.getElementById('idvidmodif').value = slice;
    document.getElementById('idvidmodif').innerHTML = slice;
 
    document.querySelector('#titredrone').value = titre;
    document.querySelector('#titredrone').textContent = titre;

    document.querySelector('#drone').value = drone;
    document.querySelector('#drone').textContent = drone;

    CKEDITOR.instances.editor6.insertHtml(dronecontent);

    document.querySelector('#textvid').value = videocode;        
    document.querySelector('#textvid').innerHTML = videocode;

    CKEDITOR.instances.editor7.insertHtml(videocontent);

}