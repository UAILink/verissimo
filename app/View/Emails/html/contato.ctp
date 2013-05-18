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
 * @package       Cake.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<h1>Veríssimo Imobiliária</h1>

<p>O usuário abaixo lhe enviou essa mensagem pelo site da Imobiliária Veríssimo.</p>
<p>Sugerimos que você responda imediatamente este email informando que a mensagem já está sendo analisada pelo setor responsável.</p>

<p>Usuário........................: <?php echo $nome ?></p>
<p>Telefone.......................: <?php echo $telefone ?></p>
<p>Email..........................: <?php echo $email ?></p>
<p>Receber NewsLetter?............: <?php echo $newsletter ?></p>

Mensagem

<p><?php echo $mensagem ?></p>


