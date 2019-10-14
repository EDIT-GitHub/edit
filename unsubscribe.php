<?php
/*
 * Template Name: Unsubscribe
 * The Template for Unsubscribe
 * @package Edit
 */

global $wpdb;

$email = $_GET['n_email'];

$wpdb->delete( 'registration', array( 'email' => $email ) );



?>
<div class="block-text text">
    <h3 style="text-align:center;">O seu email foi removido com sucesso.</h3>
</div>