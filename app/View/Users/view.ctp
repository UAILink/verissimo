
<div class="ym-column">
  <div class="ym-col1" >
    <div class="useres view ym-cbox">
      <h2><?php  echo __('User');?></h2>
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
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Username'); ?></td>
			<td>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Password'); ?></td>
			<td>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Role'); ?></td>
			<td>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Nome'); ?></td>
			<td>
			<?php echo h($user['User']['nome']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Email'); ?></td>
			<td>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Created'); ?></td>
			<td>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</td>
		</tr>		<tr>			<td><?php echo __('Modified'); ?></td>
			<td>
			<?php echo h($user['User']['modified']); ?>
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
	  
		<?php echo $this->Html->link(__('Editar User'), array('action' => 'edit', $user['User']['id']), array('class'=>'ym-button')); ?> 
		<?php echo $this->Form->postLink(__('Excluir User'), array('action' => 'delete', $user['User']['id']), array('class'=>'ym-button'), __('Você tem certeza que deseja excluir o # %s?', $user['User']['id'])); ?> 
		<?php echo $this->Html->link(__('Listar Useres'), array('action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo User'), array('action' => 'add'), array('class'=>'ym-button')); ?> 
   </div>
</div>
</div>








