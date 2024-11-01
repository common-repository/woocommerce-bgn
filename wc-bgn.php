<?php
/**
 *
 * Plugin Name: WooCommerce BGN
 * Plugin URI:  http://shtrak.eu/ninio/2014/01/10/wooocommerce-bgn/
 * Description: Simply adds the BGN (bulgarian lev) to the list of the currencies in WooCommerce.
 * Version: 0.01
 * Author: Nikolay Ninarski (ninio)
 * Author URI: http://shtrak.eu/ninio
 * Text Domain:       wc_bgn
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
/*  Copyright 2014  Vladimir Vassilev  (email : vlood.vassilev@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Plugins general stuff

if ( ! defined( 'WPINC' ) ) {
	die;
}

function wc_bgn_meta_init() {
  load_plugin_textdomain( 'wc_bgn', false, dirname( plugin_basename( __FILE__ ) ) );
}
add_action('plugins_loaded', 'wc_bgn_meta_init');


// Real stuff starts here

add_filter( 'woocommerce_currencies', 'wc_bgn_add_bgn_currency' );

/**
 * Add the BGN to the array with the currencies
 * @param  Array $currencies the current state of the array with the currencies
 * @return Array             The array with the newly added BGN to it
 */
function wc_bgn_add_bgn_currency( $currencies ) {
	$currencies['BGN'] = __( 'Bulgarian Lev', 'wc_bgn' );

	return $currencies;
}

add_filter('woocommerce_currency_symbol', 'wc_bgn_add_bgn_currency_symbol', 10, 2);

/**
 * Add the currency symbol for the BGN
 * @param  String $currency_symbol the current currency symbol / default
 * @param  String $currency        the currency that is selected
 * @return String                  The modified currency symbol
 */
function wc_bgn_add_bgn_currency_symbol( $currency_symbol, $currency ) {
	switch( $currency ) {
		case 'BGN':
			$currency_symbol = __('лв.', 'wc_bgn');
			break;
	}

	return $currency_symbol;
}

?>
