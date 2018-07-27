<?php
/**
 * Child theme "SuperStore Child Theme" for WordPress.
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
 * @link https://github.com/ondrejd/superstore-child for the canonical source repository
 * @package superstore-child
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit();
}

if ( ! function_exists( 'odwp_superstore_after_setup_theme' ) ) :

/**
 * Setup theme.
 * @return void
 * @since 1.0.0
 * @uses add_option()
 * @uses add_image_size()
 * @uses add_theme_support()
 * @uses get_stylesheet_directory()
 * @uses register_nav_menus()
 * @uses update_option()
 */
function odwp_superstore_after_setup_theme() {

    // Theme child options
    add_option( 'odwpssch_foreground_color', '#544b2b' );
    add_option( 'odwpssch_background_color', '#e8e8e8' );

    // Site title & description & logo
    add_theme_support( 'site-title' );
    add_theme_support( 'site-description' );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // Site title
    add_theme_support( 'title-tag' );

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
add_action( 'after_setup_theme', 'odwp_superstore_after_setup_theme', 101 );