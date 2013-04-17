
<div class="ym-column">
  <div class="ym-col1" >
    <div class="bairros view ym-cbox">
      <h2><?php  echo __('Bairro');?></h2>
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
			<?php echo h($bairro['Bairro']['id']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Nome Bairro'); ?></td>
			<td>
			<?php echo h($bairro['Bairro']['nome_bairro']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Cidade'); ?></td>
			<td>
			<?php echo $this->Html->link($bairro['Cidade']['nome_cidade'], array('controller' => 'cidades', 'action' => 'view', $bairro['Cidade']['id'])); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Inativo'); ?></td>
			<td>
			<?php echo h($bairro['Bairro']['inativo']); ?>
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
	  
		<?php echo $this->Html->link(__('Editar Bairro'), array('action' => 'edit', $bairro['Bairro']['id']), array('class'=>'ym-button')); ?> 
		<?php echo $this->Form->postLink(__('Excluir Bairro'), array('action' => 'delete', $bairro['Bairro']['id']), array('class'=>'ym-button'), __('Você tem certeza que deseja excluir o # %s?', $bairro['Bairro']['id'])); ?> 
		<?php echo $this->Html->link(__('Listar Bairros'), array('action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Bairro'), array('action' => 'add'), array('class'=>'ym-button')); ?> 
<?php echo __('<h6>Cidades</h6>'); ?>		<?php echo $this->Html->link(__('Listar Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('class'=>'ym-button')); ?> 
   </div>
</div>
</div>








