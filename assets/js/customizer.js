/**
 * Implements support for WordPress Customizer.
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

( function( $ ) {

	wp.customize( 'odwpssch_foreground_color', function( value ) {
		value.bind( function( newval ) {
            console.log( value, newval );
			$( 'body' ).css( 'color', newval + '!important' );
		} );
	} );

	wp.customize( 'odwpssch_background_color', function( value ) {
		value.bind( function( newval ) {
            console.log( value, newval );
            $( 'body' ).css( 'background-color', newval );
		} );
	} );

} )( jQuery );
