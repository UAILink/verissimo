<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>

<div class="ym-column">
  <div class="ym-col1" >
    <div class="imoveis view ym-cbox">
        <h6 class="ym-fbox-heading"><?php echo __('Manutenção de Imagens do Imóvel'); ?></h6>

        <div id="UploadForm" class="form" style="">
        <table>
        <tr>
           <th>Adicionar Imagem</th>
 
        </tr>
        <tr>
           <td>
            <?php echo $this->Form->create('Imagen', array('type' => 'file', 'action' => "upload/$imovel_id"  )); ?>        
               
               <?php echo $this->Form->file('Arquivo.file'); ?>
               
                    <input type="submit"  id="SubmitButton" value="Enviar" class="ym-button"/>
               
            <?php echo $this->Form->end();?>
            </td>
        </tr>    
        </table>    
        </div>

      <table>
      <tr>
           <th colspan="4">Imagem adicionadas</th>
        </tr>
<?php 
$i = 0;
$size = 0;
$cols = 4;
foreach($files as $value) {        
        if($i == 0) echo '<tr>';
        $i++   
        ?>
          <td> <?php echo $this->Html->image('imoveis/thumb_'.$value) ?> <br/>
              <?php echo $this->Html->link('Excluir Foto', 
                                            array(
                                                'controller' => 'imagens', 
                                                'action' => 'delete/'.$value,
                                                '?' => "id=$imovel_id"                                                
                                            ), 
                                            array(
                                                'class'=>'ym-button ym-delete'                                                
                                            ) );  ?> <br/>
              <?php echo $this->Js->link('Foto de Capa', 
                                         array(
                                            'controller' => 'imagens', 
                                            'action' => 'setCapa/'.$value
                                         ),
                                         array(
                                            'class'=>'ym-button ym-like',
                                            'success'=>  $this->Js->alert('Foto de capa configurada com sucesso!')
                                         )
                                        ); ?>  
          </td>
<?php 
       if($i == $cols){
          echo '</tr>';
          $i=0;             
       };
} 
if($i < $cols){
  for($x = $i; $x==$cols; $x++) {
    echo '<td>&nbsp;</td>';
    }
}

echo '</tr> '; 

 ?> 
  </table>

</div>

</div>
<div class="ym-col3" >
    <div class="actions ym-cbox">    
      <h6><?php echo __('Ações'); ?></h6>
	  
		<?php echo $this->Html->link(__('Voltar'), array('controller'=> 'imoveis', 'action' => 'view', $imovel_id), array('class'=>'ym-button')); ?> 

   </div>
</div>
</div>

