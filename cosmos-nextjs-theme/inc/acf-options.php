<?php

// Add a custom options page to associate ACF fields with
if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( [
        'page_title' => 'Website Settings',
        'menu_title' => 'Website Settings',
        'menu_slug'  => 'website-settings',
        'capability' => 'manage_options',
        'post_id'    => 'website-settings',
        'redirect'   => false,
    ] );
}
