<div class="ym-column">
    <div class="ym-col1" >
        <div class="cidades index ym-cbox">
	        <h2><?php echo __('Cidades');?></h2>
	        <table cellpadding="0" cellspacing="0">
	        <tr>
	        		        <th><?php echo $this->Paginator->sort('id');?></th>
	        		        <th><?php echo $this->Paginator->sort('nome_cidade');?></th>
	        		        <th><?php echo $this->Paginator->sort('estado_id');?></th>
	        		        <th><?php echo $this->Paginator->sort('inativo');?></th>
	        		        <th class="actions"><?php echo __('Ações');?></th>
	        </tr>
	        <?php foreach ($cidades as $cidade): ?>
	<tr>
		<td><?php echo h($cidade['Cidade']['id']); ?>&nbsp;</td>
		<td><?php echo h($cidade['Cidade']['nome_cidade']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cidade['Estado']['nome_estado'], array('controller' => 'estados', 'action' => 'view', $cidade['Estado']['id'])); ?>
		</td>
		<td><?php echo h($cidade['Cidade']['inativo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $cidade['Cidade']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $cidade['Cidade']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $cidade['Cidade']['id']), null, __('Você tem certeza que deseja excluir o # %s?', $cidade['Cidade']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	        </table>
	        <p>
	        <?php
	        echo $this->Paginator->counter(array(
	        'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count}, começando no registro {:start}, e terminando no {:end}')
	        ));
	        ?>	        </p>

	        <div class="paging">
	        <?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('próxima') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	        </div>
        </div>
    </div>
    <div class="ym-col3">
        <div class="actions ym-cbox">
	        <h3><?php echo __('Ações'); ?></h3>
	        
		        <?php echo $this->Html->link(__('Novo Cidade'), array('action' => 'add'), array('class'=>'ym-button')); ?>        		<?php echo $this->Html->link(__('Listar Estados'), array('controller' => 'estados', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Estado'), array('controller' => 'estados', 'action' => 'add'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Listar Bairros'), array('controller' => 'bairros', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Bairro'), array('controller' => 'bairros', 'action' => 'add'), array('class'=>'ym-button')); ?> 
	        </ul>
        </div>
    </div>
</div>
