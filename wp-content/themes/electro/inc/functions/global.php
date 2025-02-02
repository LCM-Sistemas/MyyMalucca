<?php
/**
 * Functions used globally across the theme.
 */

 /**
  * Clean variables using sanitize_text_field. Arrays are cleaned recursively.
  * Non-scalar values are ignored.
  *
  * @param string|array $var Data to sanitize.
  * @return string|array
  */
function ec_clean( $var ) {
	if ( is_array( $var ) ) {
		return array_map( 'ec_clean', $var );
	} else {
		return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
	}
}
