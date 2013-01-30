<section class="membersAction">
	<div>
		<div>
			<div class="icon-vcard">
				<span>inscription</span>
			</div>
			<div class="membersInformation">
				<h2>Pas encore inscrit&nbsp;?</h2>
				<?= form_open('member/signIn', 
							  array(
							  	'method' => 'post',
							  	'id' => 'connexion'
							  		)); ?>
					<?=  form_fieldset() ?>
						
						<?= form_label('e-mail&nbsp;:', 'emailI') ?>
						<?= form_input(array('id' => 'emailI', 'value' => '', 'name' => 'email1')) ?>
						
						<?= form_label('mot de passe&nbsp;:', 'mdpI') ?>
						<?= form_password(array('id' => 'mdpI', 'value' => '', 'name' => 'mdp1')) ?>
						
						<?= form_label('confirmation du mot de passe&nbsp;:', 'mdpI2') ?>
						<?= form_password(array('id' => 'mdpI2', 'value' => '', 'name' => 'mdp2')) ?>
						
						<?= form_submit(array('id' => 'register', 'value' => 's\'inscrire', 'name' => 'register')) ?>
						<div id="loadingSignIn">
							<img width="100" height="100" src="<?= base_url() ?>web/img/loading.gif" alt="ajaxLoader" />
							<p>
								En cours...
							</p>
						</div>
					<?= form_fieldset_close() ?>
				<?= form_close() ?>
			</div>
		</div>
		<div>	
			<div class="icon-login">
				<span>connexion</span>
			</div>
			<div class="membersInformation">
				<h2>Connectez-vous</h2>
				<?= form_open('member/login', 
							  array(
							  	'method' => 'post'
							  		)); ?>
					
					<?=  form_fieldset() ?>

						<?= form_label('e-mail&nbsp;:', 'emailC') ?>
						<?= form_input(array('id' => 'emailC', 'value' => '', 'name' => 'email')) ?>
						
						<?= form_label('pass&nbsp;:', 'mdpC') ?>
						<?= form_password(array('id' => 'mdpC', 'value' => '', 'name' => 'mdp')) ?>
						
						<?= form_submit(array('id' => 'connect', 'value' => 'se connecter', 'name' => 'connect')) ?>

					<?= form_fieldset_close() ?>

				<?= form_close() ?>
			</div>
		</div>
	</div>
</section>	