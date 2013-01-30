<div class="choicePicture">
	<div>
		<h2>
			<?= $titre ?>
		</h2>
		<span>
			<?= $site ?>
		</span>
		<p>
			<?= $description ?>
		</p>
	</div>
	<?php 
		$data = array('id' => 'choice');
		echo form_open('curl/send',$data); 
	?>	
		<?= form_fieldset('',array('class' => 'lesImages')) ?>
			<?php if(is_array($img)): ?>
				<?php foreach ($img as $key => $image): ?>
					<div class="choice">
						<?= form_label('<img src="'.$image.'"alt="impossible d\'afficher l\'image"/>', 'i'.$key) ?>
						<?php 
							if($key === 0){
								$data = array('id' => 'i'.$key, 'name' => 'imgChoice', 'value' => $image, 'class' => 'imgChoice', 'checked' => 'checked');
							}else{
								$data = array('id' => 'i'.$key, 'name' => 'imgChoice', 'value' => $image, 'class' => 'imgChoice');
							}
							echo form_radio($data);
						?>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="choice">
					<?= form_label('<img src="'.$img.'"alt="impossible d\'afficher l\'image"/>', 'myPic') ?>
					<?php 
						$data = array('id' => 'myPic', 'name' => 'imgChoice', 'value' => $img, 'class' => 'imgChoice', 'checked' => 'checked');
						echo form_radio($data);
					?>
				</div>
			<? endif; ?>
		<?= form_fieldset_close() ?>
		<?= form_fieldset() ?>
			<?php if(is_array($img)): ?>
				<?php 
					echo form_button(array('id' => 'prec', 'content' => 'précédente', 'name' => 'prec'));
					echo form_button(array('id' => 'suiv', 'content' => 'suivante', 'name' => 'prec'));  
				?>
			<? endif; ?>
			<?= form_hidden(array('description' => $description)) ?>
			<?= form_hidden(array('titre' => $titre)) ?>	
			<?= form_hidden(array('site' => $site)) ?>
		<?= form_fieldset_close() ?>
		<?= form_fieldset() ?>
			<?php 
				echo form_submit(array('id' => 'envoyer', 'name' => 'envoyer', 'value' => 'envoyer'));  
			?>
		<?= form_fieldset_close() ?>
	<?= form_close() ?>
</div>
