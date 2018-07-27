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

if ( ! class_exists( 'Odwp_SuperStore_Customizer_Support' ) ) :

/**
 * Customizer support.
 * @since 1.0
 */
class Odwp_SuperStore_Customizer_Support {
    const THEME_PANEL_ID = 'odwpssch_theme_panel';

    /**
     * Register our add-ons to WordPress Customizer.
     * @param \WP_Customize_Manager $wp_customize
     * @return void
     * @since 1.0.0
     */
    public static function register( \WP_Customize_Manager $wp_customize ) {

        // Panels
        $wp_customize->add_panel( self::THEME_PANEL_ID, array(
            'title' => __( 'HlavněZdravě.cz', 'odwp-superstore-child' ),
            'description' => __( 'Sdružuje nastavení vzhledu tématu pro web <strong>HlavněZdravě.cz</strong>', 'odwp-superstore-child' ),
            'priority' => 15,
        ) );

        // Sections
        $wp_customize->add_section( 'odwpssch_color_section', 
            array(
                'title'       => __( 'Barvy', 'odwp-superstore-child' ),
                'priority'    => 10,
                'capability'  => 'edit_theme_options',
                'description' => __( 'Nastavení základních barev webu.', 'odwp-superstore-child' ),
                'panel'       => self::THEME_PANEL_ID,
            )
        );

        // Settings
        $wp_customize->add_setting( 'odwpssch_background_color' , array(
            'capability' => 'edit_theme_options',
            'default'    => '#e8e8e8',
            'type'       => 'option',
        ) );
        $wp_customize->add_setting( 'odwpssch_foreground_color' , array(
            'capability' => 'edit_theme_options',
            'default'    => '#544b2b',
            'type'       => 'option',
        ) );

        // Controls
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'cnt_odwpssch_background_color', array(
                'label'    => __( 'Barva pozadí', 'odwp-superstore-child' ),
                'section'  => 'odwpssch_color_section',
                'settings' => 'odwpssch_background_color',
            )
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'cnt_odwpssch_foreground_color', array(
                'label'    => __( 'Barva textu', 'odwp-superstore-child' ),
                'section'  => 'odwpssch_color_section',
                'settings' => 'odwpssch_foreground_color',
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
add_action( 'customize_register' , array( 'Odwp_SuperStore_Customizer_Support' , 'register' ), 999 );
add_action( 'wp_head' , array( 'Odwp_SuperStore_Customizer_Support' , 'header_output' ), 999 );
add_action( 'customize_preview_init' , array( 'Odwp_SuperStore_Customizer_Support' , 'live_preview' ), 999 );

