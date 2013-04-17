
<div class="ym-column">
  <div class="ym-col1" >
    <div class="cidades view ym-cbox">
      <h2><?php  echo __('Cidade');?></h2>
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
			<?php echo h($cidade['Cidade']['id']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Nome Cidade'); ?></td>
			<td>
			<?php echo h($cidade['Cidade']['nome_cidade']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Estado'); ?></td>
			<td>
			<?php echo $this->Html->link($cidade['Estado']['nome_estado'], array('controller' => 'estados', 'action' => 'view', $cidade['Estado']['id'])); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Inativo'); ?></td>
			<td>
			<?php echo h($cidade['Cidade']['inativo']); ?>
			&nbsp;
		</td>
		</tr>        </tbody>	
	</table>	
</div>




<!-- inicio -->
	
    <div class="related ym-cbox">
	<h3><?php echo __('Bairros relacionados');?></h3>
	<?php if (!empty($cidade['Bairro'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome Bairro'); ?></th>
		<th><?php echo __('Cidade Id'); ?></th>
		<th class="actions"><?php echo __('Ações');?></th>
	</tr>
	<?php
		foreach ($cidade['Bairro'] as $bairro): ?>
		<tr>
			<td><?php echo $bairro['id'];?></td>
			<td><?php echo $bairro['nome_bairro'];?></td>
			<td><?php echo $bairro['cidade_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'bairros', 'action' => 'view', $bairro['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'bairros', 'action' => 'edit', $bairro['id'])); ?>
				<?php echo $this->Form->postLink(__('Excluir'), array('controller' => 'bairros', 'action' => 'delete', $bairro['id']), null, __('Você tem certeza que deseja excluir o # %s?', $bairro['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	
	<?php echo $this->Html->link(__('Novo Bairro'), array('controller' => 'bairros', 'action' => 'add'), array('class'=>'ym-button'));?> 
	
	<?php endif; ?>

	
	</div>
	
	

<!-- fim -->















</div>
<div class="ym-col3" >
    <div class="actions ym-cbox">    
      <h6><?php echo __('Ações'); ?></h6>
	  
		<?php echo $this->Html->link(__('Editar Cidade'), array('action' => 'edit', $cidade['Cidade']['id']), array('class'=>'ym-button')); ?> 
		<?php echo $this->Form->postLink(__('Excluir Cidade'), array('action' => 'delete', $cidade['Cidade']['id']), array('class'=>'ym-button'), __('Você tem certeza que deseja excluir o # %s?', $cidade['Cidade']['id'])); ?> 
		<?php echo $this->Html->link(__('Listar Cidades'), array('action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Cidade'), array('action' => 'add'), array('class'=>'ym-button')); ?> 
<?php echo __('<h6>Estados</h6>'); ?>		<?php echo $this->Html->link(__('Listar Estados'), array('controller' => 'estados', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Estado'), array('controller' => 'estados', 'action' => 'add'), array('class'=>'ym-button')); ?> 
<?php echo __('<h6>Bairros</h6>'); ?>		<?php echo $this->Html->link(__('Listar Bairros'), array('controller' => 'bairros', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Bairro'), array('controller' => 'bairros', 'action' => 'add'), array('class'=>'ym-button')); ?> 
   </div>
</div>
</div>








