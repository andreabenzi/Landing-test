/* STEP FORM */
var stepper1;
var stepper2;
document.addEventListener('DOMContentLoaded', function () {
  stepper1 = new Stepper(document.querySelector('#stepper1'));
  stepper2 = new Stepper(document.querySelector('#stepper2'));
});

/* Validazione Form */
function validateEmail(inputText){
	var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if(inputText.match(mailformat)){
		return true;
	}else{
		/*You have entered an invalid email address!*/
		return false;
	}
}
function validateForm1() {
  if (
  	document.forms["stepper1_form"]["nome"].value === "" || 
  	document.forms["stepper1_form"]["cognome"].value === "" ||
  	validateEmail(document.forms["stepper1_form"]["email"].value) !== true ||
  	document.forms["stepper1_form"]["telefono"].value === "" ||
  	document.forms["stepper1_form"]["provincia"].value === "" ||
  	document.forms["stepper1_form"]["nmensilita"].value === "" ||
  	document.forms["stepper1_form"]["redditomensile"].value === "" ||
  	document.forms["stepper1_form"]["campo-gdpr"].checked !== true ||
  	document.forms["stepper1_form"]["campo-privacy"].checked !== true
  	) {
    alert("Attenzione, compilare tutti i campi.");
    return false;
  }
}
function validateForm2() {
  if (
  	document.forms["stepper2_form"]["nome"].value === "" || 
  	document.forms["stepper2_form"]["cognome"].value === "" ||
  	validateEmail(document.forms["stepper2_form"]["email"].value) !== true ||
  	document.forms["stepper2_form"]["telefono"].value === "" ||
  	document.forms["stepper2_form"]["provincia"].value === "" ||
  	document.forms["stepper2_form"]["nmensilita"].value === "" ||
  	document.forms["stepper2_form"]["redditomensile"].value === "" ||
  	document.forms["stepper2_form"]["campo-gdpr"].checked !== true ||
  	document.forms["stepper2_form"]["campo-privacy"].checked !== true
  	) {
    alert("Attenzione, compilare tutti i campi.");
    return false;
  }
}

/* Scroll Top */
myScrollTop = document.getElementById("scroll-top");
function scrollFunction() {
  if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
    myScrollTop.style.display = "block";
  } else {
    myScrollTop.style.display = "none";
  }
}
jQuery('#scroll-top').on('click', function(event) {
    event.preventDefault();
    jQuery('html, body').stop().animate({
        scrollTop: 0
    }, 1000);
});

/* Fixed TopBar */
var navbar = document.getElementById("topbar");
var sticky = navbar.offsetTop;
function myFixedTopbar() {
	if (window.pageYOffset > sticky) {
    	navbar.classList.add("sticky")
  	}else{
    	navbar.classList.remove("sticky");
  	}
}

/* On Scroll Function */
window.onscroll = function() { 
	myFixedTopbar();
	scrollFunction();
};

/* Menu */
jQuery('#header a[href^="#"]').on('click', function(event) {
	var target = $(this.getAttribute('href'));
    if( target.length ) {
        event.preventDefault();
        jQuery('html, body').stop().animate({
            scrollTop: target.offset().top - 100
        }, 1000);
    }
});

/* Collapse Note */
var coll = document.getElementsByClassName("collapsible");
var i;
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}

/* When document redy */
jQuery(document).ready(function() {

  /* Calendar */
  jQuery.extend(jQuery.fn.pickadate.defaults,{
    monthsFull:["gennaio","febbraio","marzo","aprile","maggio","giugno","luglio","agosto","settembre","ottobre","novembre","dicembre"],
    monthsShort:["gen","feb","mar","apr","mag","giu","lug","ago","set","ott","nov","dic"],
    weekdaysFull:["domenica","lunedì","martedì","mercoledì","giovedì","venerdì","sabato"],
    weekdaysShort:["dom","lun","mar","mer","gio","ven","sab"],
    today:"Oggi",clear:"Cancella",
    close:"Chiudi",
    firstDay:1,
    format:"dddd d mmmm yyyy",
    formatSubmit:"yyyy/mm/dd",
    labelMonthNext:"Mese successivo",
    labelMonthPrev:"Mese precedente",
    labelMonthSelect:"Seleziona un mese",
    labelYearSelect:"Seleziona un anno"
  });
  jQuery('#data-ass1').pickadate();
  jQuery('#data-ass2').pickadate();

  /* Carosello Faq */
  var swiper = new Swiper('#carosello-faq', {
      slidesPerView: 1,
      spaceBetween: 0,
      loop: true,
      breakpoints: {
      768: {
          slidesPerView: 2,
          spaceBetween: 15
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 30
       }
    },
    pagination: {
      el: '#carosello-faq .swiper-pagination',
      clickable: true,
    },
  });

  //Click collapse
  jQuery(".collapsible").click();
});