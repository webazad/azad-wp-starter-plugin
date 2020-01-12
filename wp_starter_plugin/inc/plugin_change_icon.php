<?php

function my_change_icon($args){
	$args['menu_icon'] = 'dashicons-vault';
	return $args;
}
add-filter('asdfasdfasdf','my_change_icon');
function my_change_label($plural){
	$plural = 'Bfasdfasdf';
	return $plural;
}
add-filter('asdfasdfasdf','my_change_label');

?>
