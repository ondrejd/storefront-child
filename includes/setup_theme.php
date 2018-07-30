<?php
/**
 * Child theme "StoreFront Child Theme" for WordPress.
 * 
 * Copyright (C) 2018 Ondřej Doněk
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Ondřej Doněk <ondrejd@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License 3.0
 * @link https://github.com/ondrejd/storefront-child for the canonical source repository
 * @package storefront-child
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit();
}

if ( ! function_exists( 'odwpsfch_after_setup_theme' ) ) :

/**
 * Setup theme.
 * @return void
 * @since 1.0
 * @uses add_option()
 * @uses add_image_size()
 * @uses add_theme_support()
 * @uses get_stylesheet_directory()
 * @uses register_nav_menus()
 * @uses update_option()
 */
function odwpsfch_after_setup_theme() {

    // Starter content
    add_theme_support( 'starter-content', array(
        //'widgets' => array(),
        'attachments' => array(
            'web-logo' => array(
                'post_title' => _x( 'Web logo title', 'Child theme starter content', 'odwp-superstore-child' ),
                'post_content' => _x( 'Web logo description', 'Child theme starter content', 'odwp-superstore-child' ),
                'post_excerpt' => _x( 'Web logo caption', 'Child theme starter content', 'odwp-superstore-child' ),
                'file' => 'assets/images/logo-hlavnezdravecz.jpg'
            )
        ),
        //'posts' => array(),
        //'options' => array(),
        //'theme_mods' => array(),
        //'nav_menus' => array(),
    ) );
}

endif;
// Setup up theme
add_action( 'after_setup_theme', 'odwpsfch_after_setup_theme', 101 );



add_action( 'wp', function() {
    echo '<!-- ';
    print_r($GLOBALS['wp_filter']);
    echo ' -->';
    exit;
} );
