<ul>
	<?php
	
	    $page = ($this->name != 'Pages')? $this->view : $this->getVar('page');
	    
	    $homelink = ($page == 'home')? "<strong>Home</strong>" : $this->Html->link('<span>Home</span>', $this->SiteURL->home(),array('escape' => false));
	    $sobrelink = ($page == 'sobre')? "<strong>Quem Somos?</strong>" :$this->Html->link('<span>Quem Somos?</span>', $this->SiteURL->sobre(),array('escape' => false));
	    $pesquisarlink = ($page == 'pesquisar')? "<strong>Imóveis</strong>" :$this->Html->link('<span>Imóveis</span>', $this->SiteURL->pesquisarImoveis(),array('escape' => false));
	    $contatolink = ($page == 'contato')? "<strong>Contato</strong>" :$this->Html->link('<span>Contato</span>', $this->SiteURL->contato(),array('escape' => false));
	    
	 ?>
	
	<li <?php if($page == 'home') echo 'class="active"' ?> > <?php echo $homelink ?> </li>	
	<li <?php if($page == 'sobre') echo 'class="active"' ?> > <?php echo $sobrelink?> </li>
	<li <?php if($page == 'pesquisar') echo 'class="active"'?> > <?php echo $pesquisarlink?></li>
	<li <?php if($page == 'contato') echo 'class="active"' ?> > <?php echo $contatolink?></li>
</ul>
