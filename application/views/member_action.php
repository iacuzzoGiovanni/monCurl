<div>
	<?= form_open('member/login', 
				  array(
				  	'method' => 'post'
				  		)); ?>

	<fieldset>
		<?= form_label('e-mail', 'email') ?>
		<?= form_input(array('id' => 'email', 'value' => '', 'name' => 'email')) ?>
	</fieldset>
	<fieldset>
		<?= form_label('pass', 'pass') ?>
		<?= form_password(array('id' => 'mdp', 'value' => '', 'name' => 'mdp')) ?>
	</fieldset>
	<fieldset>
		<?= form_submit(array('id' => 'envoyer', 'value' => 'se connecter', 'name' => 'envoyer')) ?>
	</fieldset>
	<?= form_close() ?>
</div>	