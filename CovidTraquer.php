<?php



include_once('DBp_db_file.php');

register_activation_hook(__FILE__,"DBP_tb_create");
 add_action('init','registre');