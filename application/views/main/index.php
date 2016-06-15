<section class="container-form">
	<h1 class="text-center"><img src="<?php echo base_url(); ?>assets/front/tpl_adinspector/images/logo.png"></h1>

	<hr class="line-green" />

	<div class="login-form">
		<h2 class="text-center">Hola gracias por visitarnos en la <strong>ExpoMarketing 2015</strong>. Para verificar cual es tu premio por favor ingresa los siguientes datos.</h2>
		<form id="form-login" role="form" method="post" action="<?php echo base_url(); ?>main/register">
		  	<div class="form-group">
		    	<label for="txtName" class="sr-only">Nombre</label>
		    	<input type="text" class="form-control" id="txtName" name="txtName" value="<?php if ( isset($name) ) echo $name; ?>" placeholder="Nombre" required />
		  	</div>
		  	<div class="form-group">
		    	<label for="txtEmail" class="sr-only">Email</label>
		    	<input type="email" class="form-control" id="txtEmail" name="txtEmail" value="<?php if ( isset($email) ) echo $email; ?>" placeholder="Correo electrónico" required />
		  	</div>
		  	<div class="form-group">
		    	<label for="txtTelefono" class="sr-only">Teléfono</label>
		    	<input type="text" class="form-control" id="txtTelefono" name="txtTelefono" minlength="7" maxlength="10" placeholder="Telefono/Celular" required />
		  	</div>
		  	<div class="container-button">
		  		<button type="submit" class="btn-login">Verificar</button>
		  	</div>
		</form><!-- end form -->
	</div><!-- end login-form -->

</section><!-- end container-form -->