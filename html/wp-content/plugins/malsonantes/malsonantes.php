<?php
/*
Plugin Name: Cambiar palabrotas
Plugin URI: http://wordpress.org/plugins/malsonantes/
Description: Busca palabrotas y las modifica por otras lindas
Author: Yago Simoes
Version: 1.0
Author URI: http://ya.go/
*/

function crearDB() {
    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();

// le añado el prefijo a la tabla
    $table_name1 = $wpdb->prefix . 'palabrasMalsonantes';
    $table_name2 = $wpdb->prefix . 'palabrasBonitas';

// creamos la sentencia sql

    $sql = "CREATE TABLE $table_name1 (
id mediumint(9) NOT NULL AUTO_INCREMENT,
text text NOT NULL,
PRIMARY KEY (id)
) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);

    $sql2 = "CREATE TABLE $table_name2 (
id mediumint(9) NOT NULL AUTO_INCREMENT,
text text NOT NULL,
PRIMARY KEY (id)
) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql2);
}

add_action('plugins_loaded', 'crearDB');
function insertarMalsonantes(){
    global $wpdb;
    $table_name1=$wpdb->prefix .'palabrasMalsonantes';
    $sql1 = "INSERT INTO $table_name1 (id,text) VALUES (1,'mierda')";
    $sql2 = "INSERT INTO $table_name1(id,text) VALUES (2,'cabrón')";
    $sql3 = "INSERT INTO $table_name1 (id,text) VALUES (3,'mamón')";

    $table_name2=$wpdb->prefix.'palabrasBonitas';
    $sql4 = "INSERT INTO $table_name2 (id,text) VALUES (1,'popo')";
    $sql5 = "INSERT INTO $table_name2(id,text) VALUES (2,'malo')";
    $sql6 = "INSERT INTO $table_name2 (id,text) VALUES (3,'malisimo')";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql1);
    dbDelta($sql2);
    dbDelta($sql3);
    dbDelta( $sql4 );
    dbDelta( $sql5 );
    dbDelta( $sql6 );
}
 add_action('plugins_loaded', 'insertarMalsonantes');

function cambiarMalsonantes( $text ){
    global $wpdb;
    $table_name1 = $wpdb->prefix . 'palabrasMalsonantes';
    $table_name2= $wpdb->prefix . 'palabrasBonitas';


    /*    $malsonantes=array("mierda","cabrón","mamón");
        $correctas=array("popo","malo","malo");         */
    $qmalsonantes=$wpdb->get_results("SELECT text FROM $table_name1",OBJECT);
    $qcorrectas=$wpdb->get_results("SELECT text FROM $table_name2",OBJECT);

     $malsonantes=array();
    for ($i=0;$i<sizeof($qmalsonantes);$i++){
        $malsonantes[]=$qmalsonantes[$i]->text;
    }

    $correctas=array();
    for ($i=0;$i<sizeof($qcorrectas);$i++){
        $correctas[]=$qcorrectas[$i]->text;
    }


    return str_replace($malsonantes, $correctas, $text);
}

 add_filter( 'the_content', 'cambiarMalsonantes' );
