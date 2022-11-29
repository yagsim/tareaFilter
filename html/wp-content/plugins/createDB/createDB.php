<?php
/*
Plugin Name: Create Table
Plugin URI: http://wordpress.org/plugins/malsonantes/
Description: Crea una tabla en la base de datos wordpress
Author: Yago Simoes
Version: 1.0
Author URI: http://ya.go/
*/
function createDB() {
    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();

// le añado el prefijo a la tabla
    $table_name = $wpdb->prefix . 'dam22';

// creamos la sentencia sql

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        name tinytext NOT NULL,
        text text NOT NULL,
        url varchar(55) DEFAULT '' NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}


add_action('plugins_loaded', 'createDB');
