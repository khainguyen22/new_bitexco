<?php


// add_filter( 'wpcf7_validate_text', 'custom_text_confirmation_validation_filter', 20, 2 );
  
// function custom_email_confirmation_validation_filter( $result, $tag ) {
//   if ( 'text-620' == $tag->name ) {
// 		$regex = "/<(?:\"[^\"]*\"['\"]*|'[^']*'['\"]*|[^'\">])+>/g";
// 		$name = isset( $_POST['text-620'] ) ? trim( $_POST['text-620'] ) : '';
//     if ( !preg_match($regex, $name )) {
//       $result->invalidate( $tag, "Are you sure this is the correct address?" );
//     }
//   }
  
//   return $result;
// }