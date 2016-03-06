<?php

	add_action( 'init', 'create_taxonomies' );
	function create_taxonomies() {
		register_taxonomy('dobem_cat_bebidas',
			array( 'dobem_bebidas' ),
			array(
				'hierarchical' => true,
				'label' => 'Categorias',
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array('slug' => 'bebidas'),
				'singular_label' => 'Categoria'
			)
		);
	}

?>