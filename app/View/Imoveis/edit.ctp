
<?php 
$this->Html->scriptStart();
    $js = $this->Js;    
            
    $cidadesUrl = $this->Html->url(
                            array(
                                'controller'=>'/cidades', 
                                'action'=>'index',                                 
                                'ext'=>'json'),
                            true
                   );
    $js->get('#ImovelEstadoId')->event(
        'change',
        "   var id = this.value;
            $.getJSON('$cidadesUrl?estado_id='+id, function(data){
                     $('#ImovelCidadeId').html('');         
                     $.each(data, function(key, val) {
                         $('#ImovelCidadeId').append('<option value='+val.Cidade.id+'>'+val.Cidade.nome_cidade+'</option>');
                     });    
                }            
            );            
        "
    );
    
    $bairrosUrl = $this->Html->url(
                            array(
                                'controller'=>'/bairros', 
                                'action'=>'index',                                 
                                'ext'=>'json'),
                            true
                   );
    $js->get('#ImovelCidadeId')->event(
        'change',
        "   var id = this.value;
            $.getJSON('$bairrosUrl?cidade_id='+id, function(data){
                     $('#ImovelBairroId').html('');         
                     $.each(data, function(key, val) {
                         $('#ImovelBairroId').append('<option value='+val.Bairro.id+'>'+val.Bairro.nome_bairro+'</option>');
                     });    
                }            
            );            
        "
     );      
$this->Html->scriptEnd();
?>

<div class="ym-column">
    <div class="ym-col1" >   
    
    
    <h4 class="ym-fbox-heading"><?php echo __('Editar Imovel'); ?></h4>
    
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
		echo $this->Form->input('id');
		echo $this->Form->input('preco', array('alt'=>'decimal', 'type' => 'text'));
		echo $this->Form->input('quartos', array('alt'=>'integer', 'type' => 'number'));
		echo $this->Form->input('tipo_imovel_id');
		echo $this->Form->input('situacao_imovel_id');
		echo $this->Form->input('suites', array('alt'=>'integer', 'type' => 'number'));
		echo $this->Form->input('vagas_garagem', array('alt'=>'integer', 'type' => 'number'));
		echo $this->Form->input('banheiros', array('alt'=>'integer', 'type' => 'number'));
		echo $this->Form->input('area_construida', array('alt'=>'integer', 'type' => 'text'));
        echo $this->Form->input('estado_id');
        echo $this->Form->input('cidade_id');
		echo $this->Form->input('bairro_id');
		echo $this->Form->input('logradouro');
		echo $this->Form->input('numero', array('alt'=>'integer', 'type' => 'text'));
		echo $this->Form->input('complemento');
		echo $this->Form->input('cep', array('alt'=>'cep', 'type' => 'text'));
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
	 

        		        <?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('Imovel.id')), array('class'=>'ym-button'), __('Você tem certeza que deseja excluir o # %s?', $this->Form->value('Imovel.id'))); ?>        		        <?php echo $this->Html->link(__('Listar Imoveis'), array('action' => 'index'), array('class'=>'ym-button'));?>        <?php echo __('<h6>Tipo Imoveis</h6>'); ?>		<?php echo $this->Html->link(__('Listar Tipo Imoveis'), array('controller' => 'tipo_imoveis', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Tipo Imovel'), array('controller' => 'tipo_imoveis', 'action' => 'add'), array('class'=>'ym-button')); ?> 
<?php echo __('<h6>Situação Imoveis</h6>'); ?>		<?php echo $this->Html->link(__('Listar Situação Imoveis'), array('controller' => 'situacao_imoveis', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Situação Imovel'), array('controller' => 'situacao_imoveis', 'action' => 'add'), array('class'=>'ym-button')); ?> 
<?php echo __('<h6>Bairros</h6>'); ?>		<?php echo $this->Html->link(__('Listar Bairros'), array('controller' => 'bairros', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Bairro'), array('controller' => 'bairros', 'action' => 'add'), array('class'=>'ym-button')); ?> 
		<?php echo __('<h6>Fotos</h6>'); ?>		
		<?php echo $this->Html->link(__('Listar Fotos'), array('controller' => 'imagens', 'action' => 'view/'.h($this->data['Imovel']['id'])), array('class'=>'ym-button')); ?> 
    
        </div>
    
    
    
    </div>
</div>







