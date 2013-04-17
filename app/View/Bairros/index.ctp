<div class="ym-column">
    <div class="ym-col1" >
        <div class="bairros index ym-cbox">
	        <h2><?php echo __('Bairros');?></h2>
	        <table cellpadding="0" cellspacing="0">
	        <tr>
	        		        <th><?php echo $this->Paginator->sort('id');?></th>
	        		        <th><?php echo $this->Paginator->sort('nome_bairro');?></th>
	        		        <th><?php echo $this->Paginator->sort('cidade_id');?></th>
	        		        <th><?php echo $this->Paginator->sort('inativo');?></th>
	        		        <th class="actions"><?php echo __('Ações');?></th>
	        </tr>
	        <?php foreach ($bairros as $bairro): ?>
	<tr>
		<td><?php echo h($bairro['Bairro']['id']); ?>&nbsp;</td>
		<td><?php echo h($bairro['Bairro']['nome_bairro']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bairro['Cidade']['nome_cidade'], array('controller' => 'cidades', 'action' => 'view', $bairro['Cidade']['id'])); ?>
		</td>
		<td><?php echo h($bairro['Bairro']['inativo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $bairro['Bairro']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $bairro['Bairro']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $bairro['Bairro']['id']), null, __('Você tem certeza que deseja excluir o # %s?', $bairro['Bairro']['id'])); ?>
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
	        
		        <?php echo $this->Html->link(__('Novo Bairro'), array('action' => 'add'), array('class'=>'ym-button')); ?>        		<?php echo $this->Html->link(__('Listar Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('class'=>'ym-button')); ?> 
	        </ul>
        </div>
    </div>
</div>
