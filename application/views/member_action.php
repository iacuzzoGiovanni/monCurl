<section>
	<h2>Pas encore inscrit&nbsp;?</h2>
	<?= form_open('member/signIn', 
				  array(
				  	'method' => 'post'
				  		)); ?>
		<?=  form_fieldset() ?>
			
			<?= form_label('e-mail&nbsp;:', 'emailI') ?>
			<?= form_input(array('id' => 'emailI', 'value' => '', 'name' => 'email1')) ?>
			
			<?= form_label('confirmation de l\'e-mail&nbsp;:', 'emailI2') ?>
			<?= form_input(array('id' => 'emailI2', 'value' => '', 'name' => 'email2')) ?>
			
			<?= form_label('mot de passe&nbsp;:', 'mdpI') ?>
			<?= form_password(array('id' => 'mdpI', 'value' => '', 'name' => 'mdp1')) ?>
			
			<?= form_label('confirmation du mot de passe&nbsp;:', 'mdpI2') ?>
			<?= form_password(array('id' => 'mdpI2', 'value' => '', 'name' => 'mdp2')) ?>
			
			<?= form_submit(array('id' => 'envoyer', 'value' => 'se connecter', 'name' => 'envoyer')) ?>

		<?= form_fieldset_close() ?>
	<?= form_close() ?>
</section>
<section>
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
			
			<?= form_submit(array('id' => 'envoyer', 'value' => 'se connecter', 'name' => 'envoyer')) ?>

		<?= form_fieldset_close() ?>

	<?= form_close() ?>
</section>	