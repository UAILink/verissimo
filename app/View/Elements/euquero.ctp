
<?php 
$this->Html->scriptStart();
    $js = $this->Js;    
            
    $cidadesUrl = $this->Html->url(
                            array(
                                'controller'=>'/cidades', 
                                'action'=>'listar',                                 
                                'ext'=>'json'),
                            true
                   );
    $js->get('#Estado')->event(
        'change',
        "   var id = this.value;
            $.getJSON('$cidadesUrl?estado_id='+id, function(data){
                     $('#Cidade').html('');         
                     $.each(data, function(key, val) {
                         $('#Cidade').append('<option value='+val.Cidade.id+'>'+val.Cidade.nome_cidade+'</option>');
                     });    
                }            
            );            
        "
    );
    
    $bairrosUrl = $this->Html->url(
                            array(
                                'controller'=>'/bairros', 
                                'action'=>'listar',                                 
                                'ext'=>'json'),
                            true
                   );
    $js->get('#Cidade')->event(
        'change',
        "   var id = this.value;
            $.getJSON('$bairrosUrl?cidade_id='+id, function(data){
                     $('#Bairro').html('');         
                     $.each(data, function(key, val) {
                         $('#Bairro').append('<option value='+val.Bairro.id+'>'+val.Bairro.nome_bairro+'</option>');
                     });    
                }            
            );            
        "
     );   
$this->Html->scriptEnd();

$tipos = $this->requestAction('tipo_imoveis/listar/sort:created/direction:asc/limit:20');
$situacoes = $this->requestAction('situacao_imoveis/listar/sort:created/direction:asc/limit:20'); 
$estados = $this->requestAction('estados/listar/sort:created/direction:asc/limit:20');
$estadoPadrao = $this->requestAction('estados/getEstadoPadrao/sort:created/direction:asc/limit:20');  
$cidades = $this->requestAction('cidades/listar/sort:created/direction:asc/limit:20?estado_id='.$estadoPadrao['Estado']['id']);
$bairros = $this->requestAction('bairros/listar/sort:created/direction:asc/limit:20');    

$pesquisarUrl = $this->Html->url(
            array(
                'controller'=>'/imoveis', 
                'action'=>'pesquisar'
            ),
            true
   );

?>


<article class="ym-box">
    <h3><?php echo $titulo ?></h3>		
    			        
    <form name="frmPesquisa" action="<?php echo $pesquisarUrl ?>" method="POST" class="ym-form ym-full linearize-form box">
    
    <h5>Encontre o imóvel dos seus sonhos, faça uma pesquisa!</h5>
    
    <?php if(isset($display) && $display == "form" ): ?>
    
    
                <div class=" ym-fbox-select">
                  <label for="TipoImovel">Tipo:</label>                                    
                  <select id="TipoImovel" name="tipo_imovel_id" id="combotipoimovel" >
                    <option value="0" selected="selected" disabled="disabled">Indiferente</option>
                    <?php foreach($tipos as $key => $value) echo '<option value="'.$key.'">'.$value.'</option>';  ?>
                  </select>  
                </div>

                <div class=" ym-fbox-select">
                  <label for="SituacaoImovel">Situação:</label>
                  <select name="situacao_imovel_id" id="combotipoimovel" size="1">
                    <option value="0" selected="selected" disabled="disabled">Indiferente</option>
                    <?php foreach($situacoes as $key => $value) echo '<option value="'.$key.'">'.$value.'</option>';  ?>
                  </select>  
                </div>
            
                <div class=" ym-fbox-select">
                  <label for="Estado">Estado:</label>
                  <select id="Estado" name="estado_id" size="1">
                  <option value="0" selected="selected" disabled="disabled">Indiferente</option>
                  <?php foreach($estados as $key => $value) echo '<option value="'.$key.'">'.$value.'</option>';  ?>
                  </select>  
                </div>
           
                <div class=" ym-fbox-select">
                  <label for="Cidade">Cidade:</label>
                  <select name="cidade_id" id="Cidade" size="1">
                    <option value="0" selected="selected" disabled="disabled">Indiferente</option>
                    <?php foreach($cidades as $key => $value) echo '<option value="'.$key.'">'.$value.'</option>';  ?>
                  </select>  
                </div>
           
 
                <div class=" ym-fbox-select">
                  <label for="Bairro">Bairro:</label>
                  <select id="Bairro" name="bairro_id" size="1">
                    <option value="0" selected="selected" disabled="disabled">Indiferente</option>
                    <?php foreach($bairros as $key => $value) echo '<option value="'.$key.'">'.$value.'</option>';  ?>
                  </select>  
                </div>             	
        
    <?php else: ?>
       <div class="ym-grid">
            <div class="ym-g20 ym-gl">
                <div class="ym-gbox ym-fbox-select">
                  <label for="TipoImovel">Tipo:</label>                                    
                  <select id="TipoImovel" name="tipo_imovel_id" id="combotipoimovel" >
                    <option value="0" selected="selected" disabled="disabled">Indiferente</option>
                    <?php foreach($tipos as $key => $value) echo '<option value="'.$key.'">'.$value.'</option>';  ?>
                  </select>  
                </div>
            </div>
            <div class="ym-g20 ym-gl">
                <div class="ym-gbox ym-fbox-select">
                  <label for="SituacaoImovel">Situação:</label>
                  <select name="situacao_imovel_id" id="combotipoimovel" size="1">
                    <option value="0" selected="selected" disabled="disabled">Indiferente</option>
                    <?php foreach($situacoes as $key => $value) echo '<option value="'.$key.'">'.$value.'</option>';  ?>
                  </select>  
                </div>
            </div>
            <div class="ym-g20 ym-gl">
                <div class="ym-gbox ym-fbox-select">
                  <label for="Estado">Estado:</label>
                  <select id="Estado" name="estado_id" size="1">
                  <option value="0" selected="selected" disabled="disabled">Indiferente</option>
                  <?php foreach($estados as $key => $value) echo '<option value="'.$key.'">'.$value.'</option>';  ?>
                  </select>  
                </div>
            </div>
            <div class="ym-g20 ym-gl">
                <div class="ym-gbox ym-fbox-select">
                  <label for="Cidade">Cidade:</label>
                  <select name="cidade_id" id="Cidade" size="1">
                    <option value="0" selected="selected" disabled="disabled">Indiferente</option>
                    <?php foreach($cidades as $key => $value) echo '<option value="'.$key.'">'.$value.'</option>';  ?>
                  </select>  
                </div>
            </div>
            <div class="ym-g20 ym-gr">
                <div class="ym-gbox ym-fbox-select">
                  <label for="Bairro">Bairro:</label>
                  <select id="Bairro" name="bairro_id" size="1">
                    <option value="0" selected="selected" disabled="disabled">Indiferente</option>
                    <?php foreach($bairros as $key => $value) echo '<option value="'.$key.'">'.$value.'</option>';  ?>
                  </select>  
                </div>      
            </div>				
        </div>	
        
        <?php endif; ?>    
        
        <input type="submit" class="ym-button ym-add" value="Ver Imóveis" id="submit" style="width: 10em" />          
        
    </form>
</article> 



