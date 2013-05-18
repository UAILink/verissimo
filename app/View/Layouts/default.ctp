<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 
 $cakeDescription = __d('cake_dev', "Imobiliária Veríssimo: O imóvel dos seus sonhos a um clique de distância");

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('site');
		echo $this->Html->css('flexible-columns');
		echo $this->Html->css('TableCSSCode');
		echo $this->Html->css('flexslider');
		echo $this->Html->css('reveal');
		
		echo $this->Html->script('jquery-1.8.1.min');
		echo $this->Html->script('jquery.form');
		echo $this->Html->script('jquery.flexslider-min');
		echo $this->Html->script('jquery.meio.mask.min');
		echo $this->Html->script('jquery.reveal');		
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
		
	?>

	<!-- Mobile viewport optimisation -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- (en) Add your meta data here -->
	<!-- (de) Fuegen Sie hier ihre Meta-Daten ein -->
	
	<!--[if lte IE 7]>
	<link href="../yaml/core/iehacks.css" rel="stylesheet" type="text/css" />
	<![endif]-->

	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
    <script type="text/javascript">
          // call setMask function on the document.ready event
          jQuery(function($) {
            $('input[type="text"]').setMask();
            $('input[type="number"]').setMask();   

            $(document).on({
                ajaxStart: function() { 
                    $(this).addClass("loading"); 
                },
                ajaxStop: function() { 
                    $(this).removeClass("loading"); 
                }    
            });

            
          });
    </script>
    
    <!-- Cached scripts block -->

    <?php echo $this->Js->writeBuffer(array('cache'=>'true')); // Write cached scripts ?>
    
   
	
</head>
<body>

<ul class="ym-skiplinks">
	<li><a class="ym-skip" href="#nav">Skip to navigation (Press Enter)</a></li>
	<li><a class="ym-skip" href="#main">Skip to main content (Press Enter)</a></li>
</ul>

<header class="topo">
	<div class="ym-wrapper">
		<div class="ym-wbox">
			<h1>Imobiliária Veríssimo</h1>
		</div>
	</div>
</header>
<nav id="nav">
	<div class="ym-wrapper">
		<div class="ym-hlist">
			<?php echo $this->element('menu'); ?>
			<form class="ym-searchform">
				<input class="ym-searchfield" type="search" placeholder="Search..." />
				<input class="ym-searchbutton" type="submit" value="Search" />
			</form>
		</div>
	</div>
</nav>
<div id="main">
	<div class="ym-wrapper">
		<div class="ym-wbox">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</div>
<footer>
	<div class="ym-wrapper">
		<div class="ym-wbox">
			<p>© Company 2012 &ndash; Layout based on <a href="http://www.yaml.de">YAML</a></p>
		</div>
	</div>
</footer>

<div class="modal"><!-- Place at bottom of page --></div>

<!-- full skip link functionality in webkit browsers -->

<?php echo $this->Html->script('yaml-focusfix.js'); ?>

</body>

</html>
