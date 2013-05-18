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
 * @package       Cake.View.Emails.text
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
Veríssimo Imobiliária
O usuário abaixo lhe enviou essa mensagem pelo site da Imobiliária Veríssimo.
Sugerimos que você responda imediatamente este email informando que a mensagem já está sendo analisada pelo setor responsável.

Usuário........................: <?php echo $nome ?>
Telefone.......................: <?php echo $telefone ?>
Email..........................: <?php echo $email ?>
Receber NewsLetter?............: <?php echo $newsletter ?>

Mensagem

<?php echo $mensagem ?>


