<?php
/**
 * 3Mentes WordPress Base Template
 *
 * @author		Anthuan Vasquez
 * @copyright	Copyright (c) 3Mentes
 * @link		http://anthuanvasquez.webcindario.com
 * @package		3Mentes WordPress Base Template
 */

// Options Array
function anva_get_options() {

	$options = array(
		// Section Tab Layout
		array(
			"type"  => "open",
			"title" => "Header",
			"tab"   => "layout"
		),

		array(
			"name" => "Logo",
			"desc" => __("Introduzca la URL del logo que desea mostrar.", 'anva-start' ),
			"id"   => "logo",
			"type" => "image",
			"std"  => get_stylesheet_directory_uri() . '/assets/images/logo.png',
			"tab"  => "layout"
		),

		array(
			"name" => "CSS Personalizado",
			"desc" => __("Si necesitas realizar algunos cambios menores con estilos CSS, puedes ponerlos aqui para anular los estilos por omision del tema. Sin embargo, si vas a hacer muchos cambios de estilos CSS, lo mejor seria crear un archivo adicional de CSS o crear un Child Theme.", 'anva-start' ),
			"id"   => "custom_css",
			"type" => "textarea",
			"std"  => "",
			"tab"  => "layout"
		),

		array(
			"type" => "close",
			"tab"  => "layout"
		),

		array(
			"type"  => "open",
			"title" => "Slider",
			"tab"   => "layout"
		),

		array(
			"name" => "Slider Speed",
			"desc" => __("Introduzca un valor en milisegundos para determinar el tiempo de cada slide.", 'anva-start' ),
			"id"   => "slider_speed",
			"type" => "text",
			"std"  => '7000',
			"tab"  => "layout"
		),

		array(
			"name"    => "Slider Control",
			"desc"    => __("Seleccione si desea ocultar la navegación manual slider.", 'anva-start' ),
			"id"      => "slider_control",
			"type"    => "radio",
			"std"     => '1',
			"options" => array(
				'1' => "Mostrar control.",
				'0' => "Ocultar control."
			),
			"tab"	  => "layout"
		),

		array(
			"name"    => "Slider Direction",
			"desc"    => __("Seleccione si desea ocultar la navegación de dirección del slider.", 'anva-start' ),
			"id"      => "slider_direction",
			"type"    => "radio",
			"std"     => '1',
			"options" => array(
				'1' => "Mostrar dirección.",
				'0' => "Ocultar dirección."
			),
			"tab"	  => "layout"
		),

		array(
			"name"    => "Slider Play",
			"desc"    => __("Seleccione si desea ocultar el botón de play y pausa.", 'anva-start' ),
			"id"      => "slider_play",
			"type"    => "radio",
			"std"     => '1',
			"options" => array(
				'1' => "Mostrar play/pausa.",
				'0' => "Ocultar play/pausa."
			),
			"tab"	  => "layout"
		),

		array(
			"name"    => "Footer Columns",
			"desc"    => __("Selecciona la cantidad de columnas que deseas mostrar en el footer.", 'anva-start' ),
			"id"      => "footer_cols",
			"type"    => "radio",
			"std"     => '4',
			"options" => array(
				'12' => "1 Columna.",
				'6'  => "2 Columnas.",
				'4'  => "3 Columnas.",
				'3'  => "4 Columnas."
			),
			"tab"	  => "layout"
		),

		array(
			"type" 		=> "close",
			"tab"			=> "layout"
		),

		array(
			"type" 		=> "open",
			"title"		=> "Social Media",
			"tab"			=> "layout"
		),

		array(
			"name" 		=> "Facebook",
			"desc" 		=> __("Introduzca la URL de su perfil o pagina de facebook.", 'anva-start' ),
			"id" 			=> "social_facebook",
			"type" 		=> "text",
			"std" 		=> "#",
			"tab"			=> "layout",
		),

		array(
			"name" 		=> "Twitter",
			"desc" 		=> __("Introduzca la URL de su perfil de twitter.", 'anva-start' ),
			"id" 			=> "social_twitter",
			"type" 		=> "text",
			"std" 		=> "#",
			"tab"			=> "layout"
		),

		array(
			"name" 		=> "Instagram",
			"desc" 		=> __("Introduzca la URL de su perfil de instagram.", 'anva-start' ),
			"id" 			=> "social_instagram",
			"type" 		=> "text",
			"std" 		=> "#",
			"tab"			=> "layout"
		),

		array(
			"name" 		=> "Google+",
			"desc" 		=> __("Introduzca la URL de su perfil de google+.", 'anva-start' ),
			"id" 			=> "social_gplus",
			"type" 		=> "text",
			"std" 		=> "#",
			"tab"			=> "layout"
		),

		array(
			"name" 		=> "LinkedIn",
			"desc" 		=> __("Introduzca la URL de su perfil de linkedin.", 'anva-start' ),
			"id" 			=> "social_linkedin",
			"type" 		=> "text",
			"std" 		=> "#",
			"tab"			=> "layout"
		),

		array(
			"name" 		=> "Youtube",
			"desc" 		=> __("Introduzca la URL de su perfil de youtube.", 'anva-start' ),
			"id" 			=> "social_youtube",
			"type" 		=> "text",
			"std" 		=> "#",
			"tab"			=> "layout"
		),

		array(
			"name" 		=> "Vimeo",
			"desc" 		=> __("Introduzca la URL de su perfil de vimeo.", 'anva-start' ),
			"id" 			=> "social_vimeo",
			"type" 		=> "text",
			"std" 		=> "#",
			"tab"			=> "layout"
		),

		array(
			"name" 		=> "Pinterest",
			"desc" 		=> __("Introduzca la URL de su perfil de pinterest.", 'anva-start' ),
			"id" 			=> "social_pinterest",
			"type" 		=> "text",
			"std" 		=> "#",
			"tab"			=> "layout"
		),

		array(
			"name" 		=> "Digg",
			"desc" 		=> __("Introduzca la URL de su perfil de digg.", 'anva-start' ),
			"id" 			=> "social_digg",
			"type" 		=> "text",
			"std" 		=> "#",
			"tab"			=> "layout"
		),

		array(
			"name" 		=> "Dribbble",
			"desc" 		=> __("Introduzca la URL de su perfil de dribbble.", 'anva-start' ),
			"id" 			=> "social_dribbble",
			"type" 		=> "text",
			"std" 		=> "#",
			"tab"			=> "layout"
		),

		array(
			"name" 		=> "RSS",
			"desc" 		=> __("Introduzca la URL de su feed.", 'anva-start' ),
			"id" 			=> "social_rss",
			"type" 		=> "text",
			"std" 		=> "#",
			"tab"			=> "layout"
		),

		array(
			"type" 		=> "close",
			"tab"			=> "layout"
		),

		// Tab Content
		// Single Post
		array(
			"type" 		=> "open",
			"title"		=> "Single Post",
			"msg"			=> __("Estos ajustes solo se aplicaran a los posts individuales. Lo que quiere decir que no afectaran a los posts que se muestran en la parte frontal del blog.", 'anva-start' ),
			"tab"			=> "content"
		),

		array(
			"name" 		=> "Mostrar informacion meta en la parte superior de los posts?",
			"desc" 		=> __("Seleccione si desea que la informacion meta (fecha de publicacion, autor, etc) se muestre en la parte superior del post.", 'anva-start' ),
			"id" 			=> "single_meta",
			"type" 		=> "radio",
			"std" 		=> "1",
			"options" => array(
				"1" => "Mostrar meta.",
				"0" => "Ocultar meta."
			),
			"tab"			=> "content"
		),

		array(
			"name" 		=> "Mostrar imagenes destacadas en la parte superior de los posts?",
			"desc" 		=> __("Elija como desea que se muestren las imagenes destacadas en la parte superior de los posts.", 'anva-start' ),
			"id" 			=> "single_thumb",
			"type" 		=> "radio",
			"std" 		=> "1",
			"options" => array(
				"0" => "Mostrar miniaturas.",
				"1" => "Mostrar miniaturas con un ancho completo.",
				"2" => "Ocultar miniaturas."
			),
			"tab"			=> "content"
		),

		array(
			"name" 		=> "Mostrar comentarios debajo de los posts?",
			"desc" 		=> __("Seleccione si desea ocultar completamente los comentarios o no debajo de los posts.", 'anva-start' ),
			"id" 			=> "single_comment",
			"type" 		=> "radio",
			"std" 		=> "1",
			"options" => array(
				"1" => "Mostrar comentarios.",
				"0" => "Ocultar comentarios."
			),
			"tab"			=> "content"
		),

		array(
			"name" 		=> "Mostrar breadcrumbs?",
			"desc" 		=> __("Seleccione si desea ocultar o mostrar los breadcrumbs.", 'anva-start' ),
			"id" 			=> "single_breadcrumb",
			"type" 		=> "radio",
			"std" 		=> "1",
			"options" => array(
				"1" => "Mostrar breadcrumbs.",
				"0" => "Ocultar breadcrumbs."
			),
			"tab"			=> "content"
		),

		array(
			"type" 		=> "close",
			"tab"			=> "content"
		),

		// Primary Posts
		array(
			"type" 		=> "open",
			"title"		=> "Primary Posts",
			"msg"			=> __("Estos ajustes solo se aplicaran a los posts que se muestran en la parte frontal del blog.", 'anva-start' ),
			"tab"			=> "content"
		),

		array(
			"name" 		=> "Mostrar informacion meta en la parte superior de los posts?",
			"desc" 		=> __("Seleccione si desea que la informacion de meta (fecha de publicacion, autor, etc) se muestre en la parte superior del post.", 'anva-start' ),
			"id" 			=> "posts_meta",
			"type" 		=> "radio",
			"std" 		=> "1",
			"options" => array(
				"1" => "Mostrar meta.",
				"0" => "Ocultar meta."
			),
			"tab"			=> "content"
		),

		array(
			"name" 		=> "Mostrar imagenes destacadas en la parte superior de los posts?",
			"desc" 		=> __("Elija como desea que muestren las imagenes destacadas en la parte superior de los posts.", 'anva-start' ),
			"id" 			=> "posts_thumb",
			"type" 		=> "radio",
			"std" 		=> "1",
			"options" => array(
				"0" => "Mostrar miniaturas.",
				"1" => "Mostrar miniaturas con un ancho completo.",
				"2" => "Ocultar miniaturas."
			),
			"tab"			=> "content"
		),

		array(
			"type" 		=> "close",
			"tab"			=> "content"
		),

		// Tab Configuration
		array(
			"type" 		=> "open",
			"title"		=> "Reponsive",
			"tab"			=> "config"
		),

		array(
			"name" 		=> "Tabletas y Moviles",
			"desc" 		=> __("Este tema viene con una hoja de estilo especial que se centrara en la resolucion de la pantalla de sus visitantes para mostrarles un diseno ligeramente modificado si su resolucion de pantalla coincide con tamanos comunes de una tableta o un dispositivo movil.", 'anva-start' ),
			"id" 			=> "responsive",
			"type" 		=> "radio",
			"std" 		=> "1",
			"options" => array(
				"1" => "Si, aplicar estilos para tabletas y dispositivos moviles.",
				"0" => "No, mostrar el sitio normal."
			),
			"tab"			=> "config"
		),

		array(
			"name" 		=> "Navegacion",
			"desc" 		=> __("Seleccione como desea mostrar la navegacion principal en los dispositivos moviles.", 'anva-start' ),
			"id" 			=> "navigation",
			"type" 		=> "radio",
			"std" 		=> "toggle_navigation",
			"options" => array(
				"toggle_navigation" => "Navegacion Toggle (Mostrar / Ocultar).",
				"off_canvas_navigation" => "Navegacion Off-Canvas."
			),
			"tab"			=> "config"
		),

		array(
			"type" 		=> "close",
			"tab"			=> "config"
		)

	);

	return $options;
}
