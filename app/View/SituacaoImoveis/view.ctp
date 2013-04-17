
<div class="ym-column">
  <div class="ym-col1" >
    <div class="situacaoImoveis view ym-cbox">
      <h2><?php  echo __('Situação Imovel');?></h2>
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
			<?php echo h($situacaoImovel['SituacaoImovel']['id']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Descrição'); ?></td>
			<td>
			<?php echo h($situacaoImovel['SituacaoImovel']['descricao']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Inativo'); ?></td>
			<td>
			<?php echo h($situacaoImovel['SituacaoImovel']['inativo']); ?>
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
	  
		<?php echo $this->Html->link(__('Editar Situação Imovel'), array('action' => 'edit', $situacaoImovel['SituacaoImovel']['id']), array('class'=>'ym-button')); ?> 
		<?php echo $this->Form->postLink(__('Excluir Situação Imovel'), array('action' => 'delete', $situacaoImovel['SituacaoImovel']['id']), array('class'=>'ym-button'), __('Você tem certeza que deseja excluir o # %s?', $situacaoImovel['SituacaoImovel']['id'])); ?> 
		<?php echo $this->Html->link(__('Listar Situação Imoveis'), array('action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Situação Imovel'), array('action' => 'add'), array('class'=>'ym-button')); ?> 
   </div>
</div>
</div>








