<?php

add_action( 'customize_register', 'toko_customize_panel_section_wc' );
function toko_customize_panel_section_wc( $wp_customize ) {

	if ( ! isset( $wp_customize ) ) {
		return;
	}

	$wp_customize->add_panel(
		'toko_woocommerce',
		array(
			'priority' 			=> 180,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> esc_html__( 'WooCommerce', 'bookie-wp' ),
			'description' 		=> '',
		)
	);

		$wp_customize->add_section(
			'toko_woocommerce_shop',
			array(
				'priority' 			=> 10,
				'title'				=> esc_html__( 'Shop (Product Grid)', 'bookie-wp' ),
				'description'		=> '',
				'panel'				=> 'toko_woocommerce',
			)
		);

		$wp_customize->add_section(
			'toko_woocommerce_product',
			array(
				'priority' 			=> 20,
				'title'				=> esc_html__( 'Single Product', 'bookie-wp' ),
				'description'		=> '',
				'panel'				=> 'toko_woocommerce',
			)
		);

		$wp_customize->add_section(
			'toko_woocommerce_cart',
			array(
				'priority' 			=> 40,
				'title'				=> esc_html__( 'Cart', 'bookie-wp' ),
				'description'		=> '',
				'panel'				=> 'toko_woocommerce',
			)
		);

		$wp_customize->add_section(
			'toko_woocommerce_myaccount',
			array(
				'priority' 			=> 40,
				'title'				=> esc_html__( 'My Account', 'bookie-wp' ),
				'description'		=> '',
				'panel'				=> 'toko_woocommerce',
			)
		);

		/* woocommerce_enable_myaccount_registration */
		$wp_customize->add_setting(
			'woocommerce_enable_myaccount_registration',
			array(
				'default'			=> false,
				'type'				=> 'option',
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'toko_sanitize_checkbox',
			)
		);
		$wp_customize->add_control(
			'woocommerce_enable_myaccount_registration',
			array(
				'settings'		=> 'woocommerce_enable_myaccount_registration',
				'section'		=> 'toko_woocommerce_myaccount',
				'type'			=> 'checkbox',
				'label'			=> esc_html__( 'ENABLE registration on "My Account" page', 'bookie-wp' ),
				'description'	=> '',
			)
		);

}


add_filter( 'toko_customize_controls', 'toko_customize_controls_wc' );
function toko_customize_controls_wc( $controls ) {

	$controls[] = array(
		'setting'  			=> 'wc_shop_layout',
		'section'			=> 'toko_woocommerce_shop',
		'label'				=> esc_html__( 'Shop Page Layout', 'bookie-wp' ),
		'description'		=> '',
		'choices'			=> array( 'has_sidebar' => 'With Sidebar', 'no_sidebar' => 'No Sidebar' ),
		'default'			=> 'has_sidebar',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_select',
		'type'				=> 'select',
	);

	$controls[] = array(
		'setting'  			=> 'wc_shop_number',
		'section'			=> 'toko_woocommerce_shop',
		'label'				=> esc_html__( 'Number of products per page', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> '12',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_nohtml',
		'type'				=> 'number',
	);

	$controls[] = array(
		'setting'  			=> 'wc_shop_columns',
		'section'			=> 'toko_woocommerce_shop',
		'label'				=> esc_html__( 'Number of columns per row', 'bookie-wp' ),
		'description'		=> '',
		'choices'			=> array( '4' => '4', '3' => '3', '2' => '2', '1' => '1' ),
		'default'			=> '3',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_select',
		'type'				=> 'select',
	);

	$controls[] = array(
		'setting'  			=> 'wc_shop_result_count_disable',
		'section'			=> 'toko_woocommerce_shop',
		'label'				=> esc_html__( 'DISABLE result count', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> true,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_shop_catalog_ordering_disable',
		'section'			=> 'toko_woocommerce_shop',
		'label'				=> esc_html__( 'DISABLE catalog ordering', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> true,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_shop_saleflash_disable',
		'section'			=> 'toko_woocommerce_shop',
		'label'				=> esc_html__( 'DISABLE product sale flash', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_shop_title_disable',
		'section'			=> 'toko_woocommerce_shop',
		'label'				=> esc_html__( 'DISABLE product title', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_shop_price_disable',
		'section'			=> 'toko_woocommerce_shop',
		'label'				=> esc_html__( 'DISABLE product price', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_shop_rating',
		'section'			=> 'toko_woocommerce_shop',
		'label'				=> esc_html__( 'ENABLE product rating', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	// $controls[] = array(
	// 	'setting'  			=> 'wc_shop_addtocart',
	// 	'section'			=> 'toko_woocommerce_shop',
	// 	'label'				=> esc_html__( 'ENABLE "add to cart" button', 'bookie-wp' ),
	// 	'description'		=> '',
	// 	'default'			=> true,
	// 	'capability'		=> 'edit_theme_options',
	// 	'sanitize_callback'	=> 'toko_sanitize_checkbox',
	// 	'type'				=> 'checkbox',
	// );

	$controls[] = array(
		'setting'  			=> 'wc_shop_button_detailbuy_disable',
		'section'			=> 'toko_woocommerce_shop',
		'label'				=> esc_html__( 'DISABLE "Detail" and "Buy" button', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_shop_button_detail_text',
		'section'			=> 'toko_woocommerce_shop',
		'label'				=> esc_html__( '"Detail" button text', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_nohtml',
		'type'				=> 'text',
	);

	$controls[] = array(
		'setting'  			=> 'wc_shop_button_buy_text',
		'section'			=> 'toko_woocommerce_shop',
		'label'				=> esc_html__( '"Buy" button text', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_nohtml',
		'type'				=> 'text',
	);

	$controls[] = array(
		'setting'  			=> 'wc_shop_product_box_bg',
        'section'			=> 'toko_woocommerce_shop',
        'label'				=> esc_html__( 'Product List Box Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.woocommerce ul.products li.product .product-inner, .woocommerce-page ul.products li.product .product-inner { background: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'wc_product_saleflash_disable',
		'section'			=> 'toko_woocommerce_product',
		'label'				=> esc_html__( 'DISABLE product sale flash', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_product_rating_disable',
		'section'			=> 'toko_woocommerce_product',
		'label'				=> esc_html__( 'DISABLE product rating', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> true,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_product_price_disable',
		'section'			=> 'toko_woocommerce_product',
		'label'				=> esc_html__( 'DISABLE product price', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_product_excerpt_disable',
		'section'			=> 'toko_woocommerce_product',
		'label'				=> esc_html__( 'DISABLE product short description', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_product_addtocart_disable',
		'section'			=> 'toko_woocommerce_product',
		'label'				=> esc_html__( 'DISABLE "add to cart" button', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_product_meta_disable',
		'section'			=> 'toko_woocommerce_product',
		'label'				=> esc_html__( 'DISABLE product meta (sku, category, tag)', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_product_description_disable',
		'section'			=> 'toko_woocommerce_product',
		'label'				=> esc_html__( 'DISABLE product description', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_product_attributes_disable',
		'section'			=> 'toko_woocommerce_product',
		'label'				=> esc_html__( 'DISABLE product attributes (additional information)', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_product_reviews_disable',
		'section'			=> 'toko_woocommerce_product',
		'label'				=> esc_html__( 'DISABLE product review', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_product_upsells_disable',
		'section'			=> 'toko_woocommerce_product',
		'label'				=> esc_html__( 'DISABLE upsells products', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_product_related_disable',
		'section'			=> 'toko_woocommerce_product',
		'label'				=> esc_html__( 'DISABLE related products', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_product_cross_sells_disable',
		'section'			=> 'toko_woocommerce_cart',
		'label'				=> esc_html__( 'DISABLE cross-sells products', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
		'type'				=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'wc_redirect_after_login',
		'section'			=> 'toko_woocommerce_myaccount',
		'label'				=> esc_html__( 'Redirect URL After Customer Login', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_url',
		'type'				=> 'url',
	);

	// $controls[] = array(
	// 	'setting'  			=> '',
	// 	'type'   			=> 'text',
	// );

	return $controls;
}
