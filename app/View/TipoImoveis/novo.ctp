<h4>Cadastro de Tipo de Imóvel</h4>



<div class="ym-form ym-full">

<?php echo $this->Form->create('TipoImovel', array(
	    'inputDefaults' => array(
		
		'div' => false
	     )
     ));
?>


<div class="ym-fbox-text">  
  <?php echo $this->Form->input('descricao'); ?>
</div>	

<div class="ym-fbox-button">
  <input type="submit" class="ym-button" value="Salvar" id="salvarbtn" name="userAction" />  
  <input type="submit" class="ym-button" value="Fechar" id="fecharbtn" name="userAction" onclick="history.go(-1);"/>
</div>

<?php echo $this->Form->end(); ?>

</div>
