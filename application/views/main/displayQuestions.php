<section class="content-questions">
	<div class="preload"><img src="<?php echo base_url(); ?>assets/front/tpl_adinspector/images/loader.gif" /></div>

	<!--div class="progress">
		<div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" aria-valuetransitiongoal="100" style="width: 0%">
  		</div>
	</div-->

	<div class="container-countdown">
		<div class="countdown"></div><!-- end countdown -->
	</div>

	<div class="meter"></div>

	<header>
		<h1 class="text-center"><img src="<?php echo base_url(); ?>assets/front/tpl_adinspector/images/logo2.png" /></h1>
		<h2 class="text-center"><?php echo $question->question; ?></h2>
	</header>

	<form id="frm-questions" action="<?php echo base_url(); ?>main/displayQuestions" method="post" role="form">

	<?php foreach ($alternativas as $alt) : ?>
		<article>
			<div class="radio-container">
    			<input type="radio" name="txtResp" class="txtResp" id="alt-<?php echo $alt->id_alternativa; ?>" value="<?php echo $alt->id_alternativa; ?>" data-result="<?php echo $alt->correcta; ?>" />
  				<label for="alt-<?php echo $alt->id_alternativa; ?>"><span></span><?php echo $alt->alternativa; ?></label>

  				<span class="glyphicon glyphicon-remove"></span>
			</div>
		</article>
	<?php endforeach; ?>

		<input type="hidden" name="id_question" id="id_question" data-question="<?php echo $question->id_question; ?>">

		<!-- <button id="otherQuestion" type="submit" class="btn-next text-hide" data-toogle="tooltip" data-placement="left" title="">Siguiente</button> -->

	</form><!-- end form -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-10 sponsor">
					<h4>Auspiciados por: </h4>
					<ul class="list-inline">
						<li><img src="<?php echo base_url(); ?>assets/front/tpl_adinspector/images/cayetano.jpg" /></li>
					</ul>
				</div>
				<div class="col-xs-2">
					<aside class="logo-footer">
						<img src="<?php echo base_url(); ?>assets/front/tpl_adinspector/images/logo-footer.png" />
					</aside>
				</div>
			</div>
		</div>
	</footer>
</section><!-- end content-questions -->