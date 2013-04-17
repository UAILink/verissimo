
<div class="ym-column">
    <div class="ym-col1" >   
    
    
    <h4 class="ym-fbox-heading"><?php echo __('Incluir Cidade'); ?></h4>
    
            <div class="cidades form ym-cbox">
        <div class="ym-form ym-inline">
        <?php echo $this->Form->create('Cidade', array(
        'inputDefaults' => array(     
            'div'   => 'ym-fbox-text',
            # define error defaults for the form
            'error' => array(
              'wrap'  => 'span',
              'class' => 'ym-error'
            )
        )
    ));?>
	        
		        <h6 class="ym-fbox-heading"><?php echo __('Dados Cidade'); ?></h6>
        	<?php
		echo $this->Form->input('nome_cidade');
		echo $this->Form->input('estado_id');
	?>
	    
	        <div class="ym-fbox-button">
              <input type="submit" class="ym-button" value="Enviar" id="submit" name="Enviar" />
              <input type="reset" class="ym-button" value="Limpar" id="reset" name="Limpar" />              
            </div>
	    
	    
        <?php echo $this->Form->end();?>
        </div>
        </div>
    
    
    </div>    
    <div class="ym-col3" >
    
        <div class="actions ym-cbox">
	        <h4><?php echo __('Ações'); ?></h4>
	 

        		        <?php echo $this->Html->link(__('Listar Cidades'), array('action' => 'index'), array('class'=>'ym-button'));?>        <?php echo __('<h6>Estados</h6>'); ?>		<?php echo $this->Html->link(__('Listar Estados'), array('controller' => 'estados', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Estado'), array('controller' => 'estados', 'action' => 'add'), array('class'=>'ym-button')); ?> 
<?php echo __('<h6>Bairros</h6>'); ?>		<?php echo $this->Html->link(__('Listar Bairros'), array('controller' => 'bairros', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Bairro'), array('controller' => 'bairros', 'action' => 'add'), array('class'=>'ym-button')); ?> 
	 
        </div>
    
    
    
    </div>
</div>







