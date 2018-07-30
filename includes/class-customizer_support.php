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

if ( ! class_exists( 'Odwpsfch_Customizer_Support' ) ) :

/**
 * Customizer support.
 * @since 1.0
 */
class Odwpsfch_Customizer_Support {
    const THEME_PANEL_ID = 'odwpsfch_theme_panel';

    /**
     * Register our add-ons to WordPress Customizer.
     * @param \WP_Customize_Manager $wp_customize
     * @return void
     * @since 1.0.0
     */
    public static function register( \WP_Customize_Manager $wp_customize ) {

        // Panels
        $wp_customize->add_panel( self::THEME_PANEL_ID, array(
            'title' => __( 'HlavněZdravě.cz', 'odwp-storefront-child' ),
            'description' => __( 'Sdružuje nastavení vzhledu tématu pro web <strong>HlavněZdravě.cz</strong>', 'odwp-storefront-child' ),
            'priority' => 15,
        ) );

        // Sections
        $wp_customize->add_section( 'odwpsfch_color_section', 
            array(
                'title'       => __( 'Barvy', 'odwp-storefront-child' ),
                'priority'    => 10,
                'capability'  => 'edit_theme_options',
                'description' => __( 'Nastavení základních barev webu.', 'odwp-storefront-child' ),
                'panel'       => self::THEME_PANEL_ID,
            )
        );

        // Settings
        $wp_customize->add_setting( 'odwpsfch_background_color' , array(
            'capability' => 'edit_theme_options',
            'default'    => '#e8e8e8',
            'type'       => 'option',
        ) );
        $wp_customize->add_setting( 'odwpsfch_foreground_color' , array(
            'capability' => 'edit_theme_options',
            'default'    => '#544b2b',
            'type'       => 'option',
        ) );

        // Controls
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'cnt_odwpsfch_background_color', array(
                'label'    => __( 'Barva pozadí', 'odwp-storefront-child' ),
                'section'  => 'odwpsfch_color_section',
                'settings' => 'odwpsfch_background_color',
            )
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'cnt_odwpsfch_foreground_color', array(
                'label'    => __( 'Barva textu', 'odwp-storefront-child' ),
                'section'  => 'odwpsfch_color_section',
                'settings' => 'odwpsfch_foreground_color',
            )
        ) );

        // Other customizations
        $wp_customize->remove_section( 'static_front_page' );
    }

    /**
     * Hook for `wp_head` action.
     * @return void
     * @since 1.0.0
     */
    public static function header_output() {
?>
<style type="text/css">
/* ... */
</style>
<?php
    }
   
    /**
     * Hook for `customize_preview_init` action.
     * @return void
     * @since 1.0.0
     */
    public static function live_preview() {
	    wp_enqueue_script(
		      'odwp-superstore-child-customizer',
		      get_template_directory_uri() . '/assets/js/customizer.js',
		      array( 'jquery', 'customize-preview' ),
		      '',
		      true
        );
    }
}

endif;

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Odwpsfch_Customizer_Support' , 'register' ), 999 );
add_action( 'wp_head' , array( 'Odwpsfch_Customizer_Support' , 'header_output' ), 999 );
add_action( 'customize_preview_init' , array( 'Odwpsfch_Customizer_Support' , 'live_preview' ), 999 );

