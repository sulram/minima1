<?php

	add_action( 'init', 'dobem__create__custom_post_type' );
	function dobem__create__custom_post_type() {
		register_post_type('dobem_bebidas',
			array(
				'label' => 'Bebidas',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'page',
				'hierarchical' => false,
				'rewrite' => array('slug' => 'bebida'),
				'query_var' => true,
				'supports' => array('title','page-attributes'),
				'taxonomies' => array(),
				'labels' => array (
					'name' => 'Bebidas',
					'singular_name' => 'Bebida',
					'menu_name' => 'Bebidas',
					'add_new' => 'Adicionar bebida',
					'add_new_item' => 'Adicionar bebida',
					'edit' => 'Editar',
					'edit_item' => 'Editar bebida',
					'new_item' => 'Nova bebida',
					'view' => 'Ver bebida',
					'view_item' => 'Ver bebida',
					'search_items' => 'Buscar',
					'not_found' => 'Não encontrado',
					'not_found_in_trash' => 'Não encontrado no lixo',
					'parent' => 'Bebida mãe',
				),
			)
		);
		register_post_type('dobem_barrinhas',
			array(
				'label' => 'Barrinhas',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'page',
				'hierarchical' => false,
				'rewrite' => array('slug' => 'barrinha'),
				'query_var' => true,
				'supports' => array('title','page-attributes'),
				'taxonomies' => array(),
				'labels' => array (
					'name' => 'Barrinhas',
					'singular_name' => 'Barrinha',
					'menu_name' => 'Barrinhas',
					'add_new' => 'Adicionar barrinha',
					'add_new_item' => 'Adicionar barrinha',
					'edit' => 'Editar',
					'edit_item' => 'Editar barrinha',
					'new_item' => 'Nova barrinha',
					'view' => 'Ver barrinha',
					'view_item' => 'Ver barrinha',
					'search_items' => 'Buscar',
					'not_found' => 'Não encontrado',
					'not_found_in_trash' => 'Não encontrado no lixo',
					'parent' => 'Barrinha mãe',
				),
			)
		);
		function dobem__order__custom_post_types( $wp_query ) {
			if (is_admin()) {
				$post_type = $wp_query->query['post_type'];
				if ( $post_type == 'dobem_bebidas' || $post_type == 'dobem_barrinhas' ) {
					$wp_query->set('orderby', 'page_order');
					$wp_query->set('order', 'ASC');
				}
			}
		}
		add_filter('pre_get_posts', 'dobem__order__custom_post_types');
	}

?>