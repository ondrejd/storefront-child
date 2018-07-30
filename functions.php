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

include( plugin_dir_path( __FILE__ ) . 'includes/setup_theme.php' );
include( plugin_dir_path( __FILE__ ) . 'includes/class-customizer_support.php' );

/**
 * Adds some styles to the WordPress Customizer.
 * @return void
 * @since 1.0
 * @todo Move into own CSS file!
 */
function odwpsfch_customizer_styles() {
?>
<style>
#input_storefront_layout { min-height: 100px; }
</style>
<?php
}
add_action( 'customize_controls_print_styles', 'odwpsfch_customizer_styles', 999 );


/**
 * Register our custom menus.
 * @return void
 * @since 1.0
 * @uses register_nav_menus()
 */
function odwpsfch_custom_menus() {
    register_nav_menus( array(
        'odwpsfch-top-menu' => __( 'Horní menu', 'odwp-storefront-child')
    ) );
}
add_action( 'init', 'odwpsfch_custom_menus' );


/**
 * Adds a top bar with "Horní menu".
 * @return void
 * @since 1.0
 * @todo Use template PHTML file.
 */
function odwpsfch_storefront_before_header() {
?>
<div id="odwpsfch-topbar">
    <div class="col-full">
        <?php wp_nav_menu( array( 'theme_location' => 'odwpsfch-top-menu' ) ); ?>
    </div>
</div>
<?php
}
add_action( 'storefront_before_header', 'odwpsfch_storefront_before_header' );


/**
 * Removes StoreFront original header hooks and makes it own way.
 * @return void
 * @since 1.0
 * @uses add_action()
 * @uses remove_action()
 */
function odwpsfch_update_storefront_header() {

    // Removes current actions
    remove_action( 'storefront_header', 'storefront_header_container', 0 );
    remove_action( 'storefront_header', 'storefront_skip_links', 5 );
    remove_action( 'storefront_header', 'storefront_social_icons', 10 );
    remove_action( 'storefront_header', 'storefront_site_branding', 20 );
    remove_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
    remove_action( 'storefront_header', 'storefront_product_search', 40 );
    remove_action( 'storefront_header', 'storefront_header_container_close', 41 );
    remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 42 );
    remove_action( 'storefront_header', 'storefront_primary_navigation', 50 );
    remove_action( 'storefront_header', 'storefront_header_cart', 60 );
    remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 68 );

    // Add ours
    add_action( 'storefront_header', 'storefront_header_container', 0 );
    add_action( 'storefront_header', 'storefront_skip_links', 5 );
    add_action( 'storefront_header', 'storefront_site_branding', 10 );
    add_action( 'storefront_header', 'storefront_product_search', 20 );
    add_action( 'storefront_header', 'storefront_header_cart', 30 );
    add_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 40 );
    add_action( 'storefront_header', 'storefront_primary_navigation', 41 );
    add_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 42 );
    add_action( 'storefront_header', 'storefront_header_container_close', 50 );
}
add_action( 'init', 'odwpsfch_update_storefront_header', 10 );


/**
 * Removes StoreFront original footer credits and add ours.
 * @return void
 * @see odwpsfch_custom_credit()
 * @since 1.0
 * @uses add_action()
 * @uses remove_action()
 */
function odwpsfch_remove_footer_credits() {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer', 'odwpsfch_custom_credits', 20 );
}
add_action( 'init', 'odwpsfch_remove_footer_credits', 10 );

/**
 * Updates footer credits.
 * @return void
 * @since 1.0
 * @uses get_bloginfo()
 * @uses get_the_date()
 */
function odwpsfch_custom_credits() {
?>
<div class="site-info">
    &copy; <?php echo get_bloginfo( 'name' ) . ' ' . get_the_date( 'Y' ) . ' ' . __( 'Všechna práva vyhrazena', 'odwp-storefront-child' ); ?>
</div><!-- .site-info -->
<script type="text/javascript">
/* <![CDATA[ */
var seznam_retargeting_id = 31095;
/* ]]> */
</script>
<script type="text/javascript" src="//c.imedia.cz/js/retargeting.js"></script>
<?php
}