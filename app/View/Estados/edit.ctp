
<div class="ym-column">
    <div class="ym-col1" >   
    
    
    <h4 class="ym-fbox-heading"><?php echo __('Editar Estado'); ?></h4>
    
            <div class="estados form ym-cbox">
        <div class="ym-form ym-inline">
        <?php echo $this->Form->create('Estado', array(
        'inputDefaults' => array(     
            'div'   => 'ym-fbox-text',
            # define error defaults for the form
            'error' => array(
              'wrap'  => 'span',
              'class' => 'ym-error'
            )
        )
    ));?>
	        
		        <h6 class="ym-fbox-heading"><?php echo __('Dados Estado'); ?></h6>
        	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome_estado');
		echo $this->Form->input('sigla');
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
	 

        		        <?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('Estado.id')), array('class'=>'ym-button'), __('Você tem certeza que deseja excluir o # %s?', $this->Form->value('Estado.id'))); ?>        		        <?php echo $this->Html->link(__('Listar Estados'), array('action' => 'index'), array('class'=>'ym-button'));?>        <?php echo __('<h6>Cidades</h6>'); ?>		<?php echo $this->Html->link(__('Listar Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('class'=>'ym-button')); ?> 
	 
        </div>
    
    
    
    </div>
</div>







