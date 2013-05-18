
<div class="ym-column">
  <div class="ym-col1" >
    <div class="estados view ym-cbox">
      <h2><?php  echo __('Estado');?></h2>
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
			<?php echo h($estado['Estado']['id']); ?>
			&nbsp;
		</td>
		</tr>		
		<tr>			<td><?php echo __('Nome Estado'); ?></td>
			<td>
			<?php echo h($estado['Estado']['nome_estado']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
			<td><?php echo __('Sigla'); ?></td>
			<td>
			<?php echo h($estado['Estado']['sigla']); ?>
			&nbsp;
			</td>
		</tr>
				<tr>			<td><?php echo __('Inativo'); ?></td>
			<td>
			<?php echo h($estado['Estado']['inativo']); ?>
			&nbsp;
		</td>
		</tr>        </tbody>	
	</table>	
</div>




<!-- inicio -->
	
    <div class="related ym-cbox">
	<h3><?php echo __('Cidades relacionados');?></h3>
	<?php if (!empty($estado['Cidade'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome Cidade'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th class="actions"><?php echo __('Ações');?></th>
	</tr>
	<?php
		foreach ($estado['Cidade'] as $cidade): ?>
		<tr>
			<td><?php echo $cidade['id'];?></td>
			<td><?php echo $cidade['nome_cidade'];?></td>
			<td><?php echo $cidade['estado_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'cidades', 'action' => 'view', $cidade['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'cidades', 'action' => 'edit', $cidade['id'])); ?>
				<?php echo $this->Form->postLink(__('Excluir'), array('controller' => 'cidades', 'action' => 'delete', $cidade['id']), null, __('Você tem certeza que deseja excluir o # %s?', $cidade['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	
	<?php echo $this->Html->link(__('Novo Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('class'=>'ym-button'));?> 
	
	<?php endif; ?>

	
	</div>
	
	

<!-- fim -->















</div>
<div class="ym-col3" >
    <div class="actions ym-cbox">    
      <h6><?php echo __('Ações'); ?></h6>
	  
		<?php echo $this->Html->link(__('Editar Estado'), array('action' => 'edit', $estado['Estado']['id']), array('class'=>'ym-button')); ?> 
		<?php echo $this->Form->postLink(__('Excluir Estado'), array('action' => 'delete', $estado['Estado']['id']), array('class'=>'ym-button'), __('Você tem certeza que deseja excluir o # %s?', $estado['Estado']['id'])); ?> 
		<?php echo $this->Html->link(__('Listar Estados'), array('action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Estado'), array('action' => 'add'), array('class'=>'ym-button')); ?> 
<?php echo __('<h6>Cidades</h6>'); ?>		<?php echo $this->Html->link(__('Listar Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('class'=>'ym-button')); ?> 
   </div>
</div>
</div>








