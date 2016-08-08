<?php

/**
 * Get all theme locals
 */
function anva_get_text_locals() {
	
	$localize = array(
		'menu'                  => __( 'Menú', 'anva-start' ),
		'menu_primary'          => __( 'Menú Primario', 'anva-start' ),
		'menu_secondary'        => __( 'Menú Secundario', 'anva-start' ),
		'menu_message'          => __( 'Por favor configura el menú en Administración _> Apariencia _> Menús', 'anva-start' ),
		'404_title'             => __( 'Whoops! página no encontrada', 'anva-start' ),
		'404_description'       => __( 'Disculpa, pero la página solicitada no se pudo encontrar. Prueba haciendo una búsqueda en el sitio o regresa a la página principal.', 'anva-start' ),
		'not_found'             => __( 'No hay publicaciones', 'anva-start' ),
		'not_found_content'     => __( 'No se encontraron publicaciones.', 'anva-start' ),
		'read_more'             => __( 'Leer Más', 'anva-start' ),
		'prev'                  => __( '&larr; Anterior', 'anva-start' ),
		'next'                  => __( 'Siguiente &rarr;', 'anva-start' ),
		'comment_prev'          => __( '&larr; Comentarios Anteriores', 'anva-start' ),
		'comment_next'          => __( 'Comentarios Siguientes &rarr;', 'anva-start' ),
		'no_comment'            => __( 'Comentarios cerrado.', 'anva-start' ),
		'search_for'            => __( 'Buscar para:', 'anva-start' ),
		'search_result'         => __( 'Resultados de búsqueda para:', 'anva-start' ),
		'search'                => __( 'Buscar', 'anva-start' ),
		'video'                 => __( 'Video', 'anva-start'),
		'page'                  => __( 'Página', 'anva-start' ),
		'page_options'          => __( 'Opciones de Pagina', 'anva-start'),
		'page_title'            => __( 'Título de Página:', 'anva-start' ),
		'page_title_show'       => __( 'Mostrar Titulo', 'anva-start' ),
		'page_title_hide'       => __( 'Ocultar Titulo', 'anva-start' ),
		'sidebar_title'         => __( 'Columna del Sidebar', 'anva-start' ),
		'sidebar_left'          => __( 'Sidebar Left', 'anva-start' ),
		'sidebar_right'         => __( 'Sidebar Right', 'anva-start' ),
		'sidebar_fullwidth'     => __( 'Sidebar Full Width', 'anva-start' ),
		'sidebar_double'        => __( 'Doble Sidebar', 'anva-start' ),
		'sidebar_double_left'   => __( 'Doble Sidebar Left', 'anva-start' ),
		'sidebar_double_right'  => __( 'Doble Sidebar Right', 'anva-start' ),
		'post_grid'             => __( 'Post Grid:', 'anva-start' ),
		'grid_2_columns'        => __( '2 Columnas', 'anva-start' ),
		'grid_3_columns'        => __( '3 Columnas', 'anva-start' ),
		'grid_4_columns'        => __( '4 Columnas', 'anva-start' ),
		'posted_on'             => __( 'Publicado en', 'anva-start' ),
		'by'                    => __( 'Por', 'anva-start' ),
		'day'                   => __( 'Día:', 'anva-start' ),
		'month'                 => __( 'Mes:', 'anva-start' ),
		'year'                  => __( 'Año:', 'anva-start' ),
		'author'                => __( 'Autor:', 'anva-start' ),
		'asides'                => __( 'Asides', 'anva-start' ),
		'galleries'             => __( 'Galerías', 'anva-start'),
		'images'                => __( 'Imágenes', 'anva-start'),
		'videos'                => __( 'Vídeos', 'anva-start' ),
		'quotes'                => __( 'Citas', 'anva-start' ),
		'links'                 => __( 'Enlaces', 'anva-start' ),
		'status'                => __( 'Estados', 'anva-start' ),
		'audios'                => __( 'Audios', 'anva-start' ),
		'chats'                 => __( 'Chats', 'anva-start' ),
		'archives'              => __( 'Archivos', 'anva-start' ),
		'name'                  => __( 'Nombre', 'anva-start' ),
		'name_place'            => __( 'Nombre Completo', 'anva-start' ),
		'name_required'         => __( 'Por favor entre su nombre.', 'anva-start' ),
		'email'                 => __( 'Email', 'anva-start' ),
		'email_place'           => __( 'Correo Electrónico', 'anva-start' ),
		'email_required'        => __( 'Por favor entre un correo electrónico válido.', 'anva-start'),
		'email_error'           => __( 'El correo electrónico debe tener un formato válido ej. nombre@email.com.', 'anva-start' ),
		'subject'               => __( 'Asunto', 'anva-start' ),
		'subject_required'      => __( 'Por favor entre un asunto.', 'anva-start' ),
		'message'               => __( 'Mensaje', 'anva-start' ),
		'message_place'         => __( 'Mensaje', 'anva-start' ),
		'message_required'      => __( 'Por favor entre un mensaje.', 'anva-start' ),
		'message_min'           => __( 'Debe introducir un mínimo de 10 caracteres.', 'anva-start' ),
		'captcha_place'         => __( 'Entre el resultado', 'anva-start' ),
		'captcha_required'      => __( 'Por favor entre el resultado.', 'anva-start' ),
		'captcha_number'        => __( 'La respuesta debe ser un numero entero.', 'anva-start' ),
		'captcha_equalto'       => __( 'No es la repuesta correcta.', 'anva-start' ),
		'submit'                => __( 'Enviar Mensaje', 'anva-start' ),
		'submit_message'        => __( 'Gracias, su email fue enviado con éxito.', 'anva-start' ),
		'submit_error'          => __( '<strong>Lo sentimos</strong>, ha ocurrido un error, verfica que no haya campos en blanco.', 'anva-start' ),
		'footer_copyright'      => __( 'Todos los Derechos Reservados.' , 'anva-start' ),
		'footer_text'           => __( 'Design by', 'anva-start' ),
		'get_in_touch'          => __( 'Ponte en Contacto', 'anva-start' ),
		'main_sidebar_title'    => __( 'Principal', 'anva-start' ),
		'main_sidebar_desc'     => __( 'Area de widgets principal. Por defecto en el lado derecho.', 'anva-start' ),
		'home_sidebar_title'    => __( 'Portada', 'anva-start' ),
		'home_sidebar_desc'     => __( 'Area de widgets en la portada.', 'anva-start' ),
		'sidebar_left_title'    => __( 'Left', 'anva-start' ),
		'sidebar_left_desc'     => __( 'Area de widgets en el lado izquierdo.', 'anva-start' ),
		'sidebar_right_title'   => __( 'Right', 'anva-start' ),
		'sidebar_right_desc'    => __( 'Area de widgets en el lado derecho.', 'anva-start' ),
		'footer_sidebar_title'  => __( 'Footer', 'anva-start' ),
		'footer_sidebar_desc'   => __( 'Area de widgets en el footer.', 'anva-start' ),
		'shop_sidebar_title'    => __( 'Tienda', 'anva-start' ),
		'shop_sidebar_desc'     => __( 'Area de widgets para la tienda de los productos de woocommerce.', 'anva-start' ),
		'product_sidebar_title' => __( 'Productos', 'anva-start' ),
		'product_sidebar_desc'  => __( 'Area de widgets para los productos individuales de woocommerce.', 'anva-start' ),
		'product_featured'      => __( 'Productos Destacados', 'anva-start' ),
		'product_latest'        => __( 'Productos Recientes', 'anva-start' ),
		'add_autop'             => __( 'A&ntilde;adir p&aacute;rrafos autom&aacute;ticamente', 'anva-start' ),
		'featured_image'        => __( 'Imagen Destacada', 'anva-start' ),
		'options'               => __( 'Opciones', 'anva-start' ),
		'browsehappy'           => __( 'Estas utilizando un navegador obsoleto. Actualiza tu navegador para <a href="%s">mejorar tu experiencia</a> en la web.', 'anva-start' ),
		'skype'                 => __( 'Skype', 'anva-start' ),
		'phone'                 => __( 'Telefono', 'anva-start' ),
		'title'                 => __( 'Título', 'anva-start' ),
		'date'                  => __( 'Fecha', 'anva-start' ),
		'order'                 => __( 'Orden', 'anva-start' ),
		'image'                 => __( 'Imagen', 'anva-start' ),
		'link'                  => __( 'Enlace', 'anva-start' ),
		'image_url'             => __( 'URL de la Imagen', 'anva-start' ),
		'url'                   => __( 'URL', 'anva-start' ),
		'slide_id'              => __( 'Slide ID', 'anva-start' ),
		'slide_area'            => __( 'Selecciona el Area del Slide', 'anva-start' ),
		'slide_content'         => __( 'Ocultar o Mostrar Contenido', 'anva-start' ),
		'slide_shortcode'       => __( 'Por favor incluye un slug como parámetro por e.j. [slideshows slug="homepage"]', 'anva-start' ),
		'slide_message'         => __( 'No se han configurado rotadores para los slideshows. Contacta con tu Desarrollador.', 'anva-start' ),
		'slide_title'           => __( 'Mostrar solo el título', 'anva-start' ),
		'slide_desc'            => __( 'Mostrar solo la descripción', 'anva-start' ),
		'slide_show'            => __( 'Mostrar título y descripción', 'anva-start' ),
		'slide_hide'            => __( 'Ocultar ambos', 'anva-start' ),
		'slide_meta'            => __( 'Opciones de Slide', 'anva-start' )
	);

	return apply_filters( 'anva_get_text_locals', $localize );

}

/**
 * Get separate local
 */
function anva_get_local( $id ) {

	$text = null;
	$localize = anva_get_text_locals();

	if ( isset( $localize[$id] ) ) {
		$text = $localize[$id];
	}

	return $text;
}

/**
 * Get all js locals
 */
function anva_get_js_locals() {

	$foodlist = 0;
	$woocommerce = 0;

	if ( defined( 'FOODLIST_VERSION' )) {
		$foodlist = 1;
	}

	if ( class_exists( 'Woocommerce' )) {
		$woocommerce = 1;
	}
	
	$localize = array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'theme_url' => get_template_directory_uri(),
		'theme_images' => get_template_directory_uri() . '/assets/images',
		'plugin_foodlist' => $foodlist,
		'plugin_woocommerce' => $woocommerce
	);

	return apply_filters( 'anva_get_js_locals', $localize );
}
