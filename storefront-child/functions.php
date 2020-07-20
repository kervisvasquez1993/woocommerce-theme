<?php
//remove_action( do_action, hoot,10);
// get_styleshett_direcrory_uri() para llamar los script del hijo 


function script_hijos(){
    wp_enqueue_script( 'script-hijo', get_stylesheet_directory_uri().'/script_children.js', array(), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'script_hijos');

// cambiar a pesos mexicanos
add_filter( 'woocommerce_currency_symbol', 'carolinaspan_mx',10, 2);


function carolinaspan_mx($simbolo,$moneda){
    $simbolo = 'MXN $';
    return $simbolo;

}
//cambiar texto a filtro 
add_filter( 'woocommerce_catalog_orden_by', 'cambiar_sort',40);
function cambiar_sort($filtro){
    echo "<pre>";
     var_dump($filtro);
    echo "<pre>";
}

// modificamos el footer texto
function creditos(){
    remove_action( 'storefront_footer','storefront_credit',20 );
    add_action( 'storefront_after_footer', 'nuevo_footer' );
}

add_action( 'init','creditos' );
function nuevo_footer(){
    echo "<div class='reservados'>";
    echo 'Derecho Reservado &copy '. get_bloginfo('name')." ".get_the_date('Y');
    echo "</div>";
}

// crear nueva seccion en el home 

add_action( 'homepage', 'nueva_section_home', 30 );
function nueva_section_home(){
    echo "<div class='spa-en-casa'>";
        echo "<div class='imagen-categoria'>";
            $imagen = get_woocommerce_term_meta(17, 'thumbnail_id', true);
            $imagen_categoria = wp_get_attachment_image_src($imagen,'full');
            
            if($imagen_categoria){
                echo "<div class='imagen-destacada' style='background-image:url(".$imagen_categoria[0].")'></div>";
                echo "<h1>producto destacado<h1>";
                echo "</div>";
            }
    
            echo "<div class='productos'>";
            echo do_shortcode( '[product_category columns="3" category="accesorio-y-herramientas"]' );
            echo "</div>";
    echo "</div>";
    
    
}
//agregar imagen al homepage
function descuento(){
        $imagen = '<div class="destacada">';
        $imagen.='<img src="'.get_stylesheet_directory_uri().'/img/cupon.jpg">';
        $imagen .='</div>';
        echo $imagen;
}

add_action( 'homepage', 'descuento',5);


//filtrar 4 categoria en el front page

function categoria_frontpage($args){

$args['limit'] = 4;
$args['columns'] = 4;
return $args;
}

add_filter( 'storefront_product_categories_args', 'categoria_frontpage',100 );

add_filter( 'loop_shop_per_page', 'productos_por_pagina', 20);

function productos_por_pagina($productos){
    $productos = 6;
    return $productos;

}

// columna por paginas 

add_filter( 'loop_shop_columns', 'columnas_productos', 20 );

function columnas_productos($columna){
    return 4;
}


// Cambiar texto a filtro

add_filter( 'woocommerce_catalog_orderby', 'cambiar_sort2',40 );

function cambiar_sort2($filtro){
  $filtro['date'] = __('Nuevos productos', 'woocommerce');
  return $filtro;
}


// remover tags
/*
add_filter( 'woocommerce_product_tabs', 'remover_tabs', 11 );

function remover_tabs($tabs){
   
    unset($tabs['description']);
}

*/

// camviar descripcion del producto

add_filter( 'woocommerce_product_tabs', 'titulo_tabs_description',10,1 );

function titulo_tabs_description($tabs){
    global $post;
    if(isset($tabs['description']['title'])){
        $tabs['description']['title'] = $post->post_title;

    }
    return $tabs;
}

add_filter( 'woocommerce_product_description_heading', 'titulo_contenido_tab', 10 , 1 );

function titulo_contenido_tab($titulo){
    global $post;
    return $post->post_title;
}

//retornar ahorro 

add_filter( 'woocommerce_get_price_html', 'cantidad_ahorrada',10,2 );

function cantidad_ahorrada($precio, $producto){
    echo 'hola';
}