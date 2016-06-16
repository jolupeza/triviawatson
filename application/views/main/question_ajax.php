	<div class="preload"><img src="<?php echo base_url(); ?>assets/front/tpl_adinspector/images/loader.gif" /></div>

	<script type="text/javascript">
		j('.countdown').timeTo(
			{
				seconds: 20,
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
	</script>

	<div class="container-countdown">
		<div class="countdown"></div><!-- end countdown -->
	</div>

	<header class="Header">
		<h1 class="text-center Header-logo">
			<img src="<?php echo base_url(); ?>assets/front/tpl_adinspector/images/2016/logo.png" />
		</h1>
	</header>

	<h2 class="text-center Question-title"><?php echo $question->question; ?></h2>

	<?php foreach ($alternativas as $alt) : ?>
		<article class="Question-alternative text-center">
			<button class="Question-button js-res" id="alt-<?php echo $alt->id_alternativa; ?>" data-result="<?php echo $alt->correcta; ?>"><?php echo $alt->alternativa; ?></button>
		</article>
	<?php endforeach; ?>

		<input type="hidden" name="id_question" id="id_question" data-question="<?php echo $question->id_question; ?>">