<?php //echo $this->element('sql_dump'); ?>

<div class="ym-grid">
    <div class="ym-g33 ym-gl">
        <div class="ym-gbox">
            <?php echo $this->element('euquero', array(
                "display" => "form",
                "titulo" => "Filtro de Pesquisa"
            )); ?>
        </div>
    </div>
    <div class="ym-g66 ym-gr">
        <div class="ym-gbox">
            <?php echo $this->element('novidades', array ( "imoveis" => $imoveis,  "titulo" => "Imóveis Encontrados")); ?>            
        </div>
    </div>
</div>


				    

