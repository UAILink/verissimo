<div class="users ym-grid">
<div class="ym-g33 ym-gl">&nbsp;</div>
<div class="ym-g33 ym-gl">

<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array(
		'inputDefaults' => array(
				'div'   => 'ym-fbox-text',
				# define error defaults for the form
				'error' => array(
						'wrap'  => 'span',
						'class' => 'ym-error'
				)
		),		
		'class'=> 'ym-form ym-columnar')); ?>
    <fieldset>
        <legend><?php echo __('Favor informar o usuário e senha'); ?></legend>
        <?php 
        echo $this->Form->input('username');
        echo $this->Form->input('password');        
    ?>
    </fieldset>
    <div class="ym-fbox-button center">
	  <input type="submit" class="ym-button" value="Login" id="submit" name="submit" />	  
	</div>
<?php echo $this->Form->end(); ?>

</div>
<div class="ym-g33 ym-gl">&nbsp;</div>

</div>
