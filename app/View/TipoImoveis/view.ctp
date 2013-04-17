
<div class="ym-column">
  <div class="ym-col1" >
    <div class="tipoImoveis view ym-cbox">
      <h2><?php  echo __('Tipo Imovel');?></h2>
      <table>
	     <thead>
	        <tr>
	          <td width="20%">Campo</td>
	          <td width="80%">Descrição</td>
	        </tr>
	      </thead>
	      <tbody>
			<tr>			<td><?php echo __('Id'); ?></td>
			<td>
			<?php echo h($tipoImovel['TipoImovel']['id']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Descrição'); ?></td>
			<td>
			<?php echo h($tipoImovel['TipoImovel']['descricao']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Inativo'); ?></td>
			<td>
			<?php echo h($tipoImovel['TipoImovel']['inativo']); ?>
			&nbsp;
		</td>
		</tr>        </tbody>	
	</table>	
</div>




<!-- inicio -->
<!-- fim -->















</div>
<div class="ym-col3" >
    <div class="actions ym-cbox">    
      <h6><?php echo __('Ações'); ?></h6>
	  
		<?php echo $this->Html->link(__('Editar Tipo Imovel'), array('action' => 'edit', $tipoImovel['TipoImovel']['id']), array('class'=>'ym-button')); ?> 
		<?php echo $this->Form->postLink(__('Excluir Tipo Imovel'), array('action' => 'delete', $tipoImovel['TipoImovel']['id']), array('class'=>'ym-button'), __('Você tem certeza que deseja excluir o # %s?', $tipoImovel['TipoImovel']['id'])); ?> 
		<?php echo $this->Html->link(__('Listar Tipo Imoveis'), array('action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Tipo Imovel'), array('action' => 'add'), array('class'=>'ym-button')); ?> 
   </div>
</div>
</div>








