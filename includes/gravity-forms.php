<?php

// Load Gravity Forms script in footer
add_filter( 'gform_init_scripts_footer', 'gf_inv_init_scripts' );
function gf_inv_init_scripts() {
	return true;
}
