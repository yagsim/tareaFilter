<?php
/*
Plugin Name: Shortcode
Plugin URI: http://wordpress.org/plugins/malsonantes/
Description: Añade una tabla de horario
Author: Yago Simoes
Version: 1.0
Author URI: http://ya.go/
*/
function dam22_shortcodes_init(){
    function dam22_shortcode($atts = [], $content = null){   //atts =atributos
        // do something to $content
        $content = "<table>
		<caption><em>HORARIO CLASE</em></caption>
        <tr>
        	<th>Horas</th>
        	<th>Lunes</th>
        	<th>Martes</th>
        	<th>Miercoles</th>
        	<th>Jueves</th>
        	<th>Viernes</th>
        </tr>
        <tr>
        	<td>8;30/9;20</td>
        	<td>PMDM</td>
        	<td></td>
        	<td></td>
        	<td></td>
        	<td>PSP</td>
        </tr>
        <tr>
            <td>9;20/10;10</td>
        	<td>PMDM</td>
        	<td>SXE</td>
        	<td></td>
        	<td>AD</td>
        	<td>PSP</td>
        </tr>
        <tr>
        	<td>10;10/11;00</td>
        	<td>PMDM</td>
        	<td>SXE</td>
        	<td>DI</td>
        	<td>AD</td>
        	<td>PSP</td>
        </tr>
        <tr>
        	<td>11;00/11;50</td>
        	<td>EIE</td>
        	<td>EIE</td>
        	<td>DI</td>
        	<td>PMDM</td>
        	<td>SXE</td>
        <tr>
        	<td>11;50/12;20</td><th colspan='5'>RECREO</th>
        </tr>
        <tr>
        	<td>12;20/13;10</td>
        	<td>DI</td>
        	<td>AD</td>
        	<td>AD</td>
        	<td>PMDM</td>
        	<td>SXE</td>
        </tr>
        <tr>
        	<td>13;10/14;00</td>
        	<td>DI</td>
        	<td>AD</td>
        	<td>AD</td>
        	<td>PMDM</td>
        	<td>DI</td>
        </tr>
        <tr>
        	<td>14;00/14;50</td>
        	<td>DI</td>
        	<td>AD</td>
        	<td>AD</td>
        	<td></td>
        	<td>DI</td>
	</table>";  //Mostrar hola,alert es una ventana
        // always return
        return $content;
    }
    add_shortcode('dam22', 'dam22_shortcode');
}


add_action('init', 'dam22_shortcodes_init');
