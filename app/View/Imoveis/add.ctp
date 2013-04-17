
<div class="ym-column">
    <div class="ym-col1" >   
    
    
    <h4 class="ym-fbox-heading"><?php echo __('Incluir Imovel'); ?></h4>
    
            <div class="imoveis form ym-cbox">
        <div class="ym-form ym-inline">
        <?php echo $this->Form->create('Imovel', array(
        'inputDefaults' => array(     
            'div'   => 'ym-fbox-text',
            # define error defaults for the form
            'error' => array(
              'wrap'  => 'span',
              'class' => 'ym-error'
            )
        )
    ));?>
	        
		        <h6 class="ym-fbox-heading"><?php echo __('Dados Imovel'); ?></h6>
        	<?php
		echo $this->Form->input('preco');
		echo $this->Form->input('quartos');
		echo $this->Form->input('tipo_imovel_id');
		echo $this->Form->input('situacao_imovel_id');
		echo $this->Form->input('suites');
		echo $this->Form->input('vagas_garagem');
		echo $this->Form->input('banheiros');
		echo $this->Form->input('area_construida');
		echo $this->Form->input('bairro_id');
		echo $this->Form->input('descricao');
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
	 

        		        <?php echo $this->Html->link(__('Listar Imoveis'), array('action' => 'index'), array('class'=>'ym-button'));?>        <?php echo __('<h6>Tipo Imoveis</h6>'); ?>		<?php echo $this->Html->link(__('Listar Tipo Imoveis'), array('controller' => 'tipo_imoveis', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Tipo Imovel'), array('controller' => 'tipo_imoveis', 'action' => 'add'), array('class'=>'ym-button')); ?> 
<?php echo __('<h6>Situação Imoveis</h6>'); ?>		<?php echo $this->Html->link(__('Listar Situação Imoveis'), array('controller' => 'situacao_imoveis', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Situação Imovel'), array('controller' => 'situacao_imoveis', 'action' => 'add'), array('class'=>'ym-button')); ?> 
<?php echo __('<h6>Bairros</h6>'); ?>		<?php echo $this->Html->link(__('Listar Bairros'), array('controller' => 'bairros', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Bairro'), array('controller' => 'bairros', 'action' => 'add'), array('class'=>'ym-button')); ?> 
	 
        </div>
    
    
    
    </div>
</div>







