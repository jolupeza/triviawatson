var j = jQuery.noConflict();

(function($){
	j(document).on("ready", function(){

		j('#form-login').formValidation({
			// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			live: 'enabled',
			fields: {
				txtName: {
				  validators: {
				    notEmpty: {
				        message: 'Campo requerido'
				    },
				    regexp: {
				        regexp: /^[a-zA-ZñÑ\s\W]/,
				        message: 'Sólo puede contener caracteres alfabeticos'
				    }
				  }
				},
				txtEmail: {
				  validators: {
				    notEmpty: {
				        message: 'Campo equerido'
				    },
				    emailAddress: {
				        message: 'Email no es válido'
				    }
				  }
				},
			},
		})
		.on('error.field.fv', function(e, data) {
			var field = e.target;
			j('small.help-block[data-bv-result="INVALID"]').addClass('hide');
		});
		/*.on('success.form.fv', function(e){
			e.preventDefault();

			j('#js-loader-contact').removeClass('hidden').addClass('show');

			var $this = j(this);
			$this.find('p').remove();

			var $form = j(e.target);
			var dataArray = $form.serializeArray();

			var name = dataArray[0].value;
			var email = dataArray[1].value;
			var dni = dataArray[2].value;
			var phone = dataArray[3].value;
			var dpto = dataArray[4].value;
			var asunto = dataArray[5].value;
			var message = dataArray[6].value;

			j.post(MyAjax.url, {
			nonce   : MyAjax.nonce,
			action  : 'send_email',
			name    : name,
			email   : email,
			dni     : dni,
			phone   : phone,
			dpto    : dpto,
			asunto  : asunto,
			message : message,
			}, function(data) {
			j('#js-loader-contact').removeClass('show').addClass('hidden');
			$this.data('formValidation').resetForm();

			var text = j('#js-frm-text');
			text.text('');

			if (data.result)
			{
			  text.addClass('text-success').text('Has enviado con éxito el mensaje. Nos pondremos en contacto con usted tan pronto como sea posible.');
			  document.getElementById("js-frm-contact").reset();
			}
			else
			{
			  text.addClass('text-danger').text('No podemos enviar el correo electrónico en este momento. Por favor, vuelva a intentarlo.');
			}
			}, 'json');
		});*/

		j('input:radio').prop('checked', false);

		j('body').on('click', '#otherQuestion', function(ev){
			ev.preventDefault();

			nextQuestion();
		});

		j('body').on('click', 'input:radio', function() {
			j('#otherQuestion').tooltip('destroy');

			j('#frm-questions article').removeClass('bg-green');

			j(this).parent().parent().addClass('bg-green');

			if (j(this).data('result') == '0') {
				j(this).next().next().css('display', 'block');
				j('#frm-questions article').each(function(){
					var radio = j(this).find('input:radio');
					if ( radio.data('result') == '1') {
						radio.next().next().removeClass('glyphicon-remove').addClass('glyphicon-ok').css({'display' : 'block', 'color' : 'green'});
					}
				});
			} else {
				j(this).next().next().removeClass('glyphicon-remove').addClass('glyphicon-ok').css({'display' : 'block', 'color' : 'green'});
			}

			setTimeout(function() {
				nextQuestion();
			}, 2000);
		});

		j('.countdown').timeTo(
			{
				seconds: 15,
				displayHours: false,
				fontSize: 48
			}, function(){
				j('.preload').css('display', 'block');

				j.post(_root_ + 'main/displayOtherQuestion', {
					'id_pregunta' : j('#id_question').data('question')
				}, function(data){
					if (data) {
						j('.content-questions').html('');
						j('.content-questions').html(data);
						j('.preload').css('display', 'none');
					}
				});
				//location.href='http://localhost/feria/main/displayQuestions';
			}
		);
	});

	function nextQuestion()
	{
		if (j('input:radio').is(':checked')) {
			j(this).tooltip('hide');
		} else {
			j(this).attr('title', 'Debes seleccionar una alternativa');
			j(this).tooltip('show');
			return;
		}

		j('.preload').css('display', 'block');

		j.post(_root_ + 'main/displayOtherQuestion', {
			'id_pregunta' : j('#id_question').data('question')
		}, function(data){
			if (data) {
				j('.content-questions').html('');
				j('.content-questions').html(data);
				j('.preload').css('display', 'none');
			}
		});
	}
})(jQuery);