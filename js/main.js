// jQuery pour la Map avec un peu de SVG

$("path, id").hover(function (e) {
  $('#info-box').css('display', 'block');
  $('#info-box').html($(this).data('name'));
});

$("path, id").mouseleave(function (e) {
  $('#info-box').css('display', 'none');
});

$(document).mousemove(function (e) {
  $('#info-box').css('top', e.pageY - $('#info-box').height() - 30);
  $('#info-box').css('left', e.pageX - ($('#info-box').width()) / 2);
}).mouseover();







// ************************************************************
// formulaire de contact 
function validateForm() {
  var name = document.getElementById('name').value;
  if (name == "") {
    document.getElementById('status').innerHTML = "Name cannot be empty";
    return false;
  }
  var email = document.getElementById('email').value;
  if (email == "") {
    document.getElementById('status').innerHTML = "Email cannot be empty";
    return false;
  } else {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(email)) {
      document.getElementById('status').innerHTML = "Email format invalide";
      return false;
    }
  }
  var subject = document.getElementById('subject').value;
  if (subject == "") {
    document.getElementById('status').innerHTML = "Subject ne peut être vide";
    return false;
  }
  var message = document.getElementById('message').value;
  if (message == "") {
    document.getElementById('status').innerHTML = "Message ne peut être vide";
    return false;
  }
  document.getElementById('status').innerHTML = "Sending...";
  document.getElementById('contact-form').submit();

}

$(function () {

	'use strict';

// Masquer le PlaceHolder quand la zone reçoie le focus

		$('[placeholder]').focus(function () {
			$(this).attr('data-text', $(this).attr('placeholder'));

			$(this).attr('placeholder', '');

		}).blur(function () {

			$(this).attr('placeholder', $(this).attr('data-text'));

		});

// Afficher l'étoile rouge dans les champs obligatoires

		$('input').each(function () {
			if ($(this).attr('required') === 'required') {
				$(this).after('<span class="etoile">*</span>');
			}
		});
	
//Afficher le mot de passe au passage de la souris sur l'icone de la zone oldpwd
		
	 var oldpwdField=$('.oldpwd');
	    $('.show-oldpwd').hover(
	        function () { oldpwdField.attr('type', 'text'); },
	        function () { oldpwdField.attr('type', 'password'); }
	    );
	  
//Afficher le mot de passe au passage de la souris sur l'icone  de la zone newpwd
		
	 var newpwdField=$('.newpwd');
	    $('.show-newpwd').hover(
	        function () { newpwdField.attr('type', 'text'); },
	        function () { newpwdField.attr('type', 'password'); }
	    );

// Afficher la boite du dialogue confirm
		$('.confirm').click(function () {
			return confirm("Etes Vous sûr?")
		});
});
