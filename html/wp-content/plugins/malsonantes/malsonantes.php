<?php
/*
Plugin Name: Cambiar palabrotas
Plugin URI: http://wordpress.org/plugins/malsonantes/
Description: Busca palabrotas y las modifica por otras lindas
Author: Yago Simoes
Version: 1.0
Author URI: http://ya.go/
*/
//Reemplaza palabras

/*function palabrasMalsonantes( $content ) {
    $vulgar_words = array( $vulgar_word1, $vulgar_word2, $vulgar_word3, $vulgar_word4 );

    foreach ( $vulgar_words as $word ) {
        $hashed_word = substr( $word, 0, 1 ) . str_repeat( '*', strlen( $word ) - 1 );
        $content = str_replace( $word, $hashed_word, $content );
    }

    return $content;
}

*/
function cambiarMalsonantes( $text ){
        $malsonantes=array("mierda","cabrón","mamón");
        $correctas=array("popo","malo","malo");
    return str_replace($malsonantes, $correctas, $text);
}

add_filter( 'the_content', 'cambiarMalsonantes' );
