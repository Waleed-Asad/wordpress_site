<?php

add_action( 'customize_register', 'toko_customize_register_theme' );
function toko_customize_register_theme( $wp_customize ) {

	if ( ! isset( $wp_customize ) ) {
		return;
	}

	$wp_customize->get_section( 'background_image' )->priority = 140;
	$wp_customize->get_section( 'background_image' )->title = esc_html__( 'Background', 'bookie-wp' );
	$wp_customize->get_control( 'background_color' )->section = 'background_image';

	$wp_customize->remove_control('header_textcolor');

	$wp_customize->get_section( 'header_image' )->panel = 'toko_header_panel';
	$wp_customize->get_section( 'header_image' )->priority = 20;
}


add_action( 'customize_register', 'toko_customize_panel_section_theme' );
function toko_customize_panel_section_theme( $wp_customize ) {

	if ( ! isset( $wp_customize ) ) {
		return;
	}

	/* Header Customize */
	$wp_customize->add_panel( 'toko_header_panel', array(
		'title' 		=> 'Header',
		'description'	=> '',
		'priority'		=> 150,
	) );

	    $wp_customize->add_section( 'toko_header_top', array(
	        'title'		=> esc_html__( 'Header Top', 'bookie-wp' ),
	        'priority'	=> 10,
	        'panel'		=> 'toko_header_panel',
	    ));

	    $wp_customize->add_section( 'toko_header_title', array(
	        'title'		=> esc_html__( 'Header Page Title', 'bookie-wp' ),
	        'priority'	=> 20,
	        'panel'		=> 'toko_header_panel',
	    ));

		$wp_customize->add_section( 'toko_book_search', array(
	        'title'		=> esc_html__( 'Book Search', 'bookie-wp' ),
	        'priority'	=> 30,
	        'panel'		=> 'toko_header_panel'
	    ) );

	$wp_customize->add_panel( 'toko_footer_panel', array(
		'title'			=> esc_html__( 'Footer', 'bookie-wp' ),
		'description'	=> '',
		'priority'		=> 160,
	) );

		$wp_customize->add_section( 'toko_footer_banner', array(
	        'title'		=> esc_html__( 'Footer Banner', 'bookie-wp' ),
	        'priority'	=> 5,
	        'panel'		=> 'toko_footer_panel'
	    ) );

		$wp_customize->add_section( 'toko_footer_social', array(
	        'title'		=> esc_html__( 'Footer Social Icon', 'bookie-wp' ),
	        'priority'	=> 10,
	        'panel'		=> 'toko_footer_panel'
	    ) );

		/* Footer Credit */
	    $wp_customize->add_section( 'toko_footer_credit', array(
	        'title'		=> esc_html__( 'Footer Credit', 'bookie-wp' ),
	        'priority'	=> 100,
	        'panel'		=> 'toko_footer_panel',
	    ));

	/* Contact Setting Panel */
	$wp_customize->add_section( 'toko_contact', array(
        'title'		=> esc_html__( 'Contact Page Template', 'bookie-wp' ),
        'priority'	=> 170,
        'panel'		=> ''
    ) );

}

add_filter( 'toko_customize_controls', 'toko_customize_controls_theme' );
function toko_customize_controls_theme( $controls ) {

	$controls[] = array(
		'setting'  			=> 'colors_text',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Body Text Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> 'body { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_heading',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Heading Text Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> 'h1, h2, h3, h4, h5, h6 { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_link',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Link Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> 'a { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_link_hover',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Link Color (Hover)', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> 'a:focus, a:hover { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_input',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Input / Select / Textarea Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> 'input.form-control, textarea.form-control, select.form-control { background: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_blockquote',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Blockquote Text Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> 'blockquote { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_btn_default_bg',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Default Button Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.btn.btn-default { background: [value]; border-color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_btn_default_color',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Default Button Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.btn.btn-default { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_btn_default_bg_hover',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Default Button Background (Hover)', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.btn.btn-default:hover { background: [value]; border-color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_btn_default_color_hover',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Default Button Color (Hover)', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.btn.btn-default:hover { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_btn_primary_bg',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Primary Button Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.btn.btn-primary { background: [value]; border-color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_btn_primary_color',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Primary Button Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.btn.btn-primary { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_btn_primary_bg_hover',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Primary Button Background (Hover)', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.btn.btn-primary:hover { background: [value]; border-color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_btn_primary_color_hover',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Primary Button Color (Hover)', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.btn.btn-primary:hover { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_post_box_bg',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Post Box Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.entry, .page #content, .single #content, .error404 #content { background: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_post_title',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Post Title Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.entry .entry-title, .entry .entry-title a, .entry .entry-title a:visited { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_post_meta',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Post Meta Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.entry .entry-meta .entry-meta-item a, .entry .entry-meta .entry-meta-item a:visited, .entry .entry-meta-time a time { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_post_readmore',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Post "Read More" Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.entry .read-more-link { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_post_tag',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Post Tag Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.entry-footer .entry-meta-content a, .entry-footer .entry-meta-content a:visited { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_post_sticky_bg',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Sticky Post Label Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.entry.sticky .sticky-label { background: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_widget_box_bg',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Widget Box Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.widget { background: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'colors_widget_title',
        'section'			=> 'colors',
        'label'				=> esc_html__( 'Widget Title Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.widget .widget-title { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'header_logo_text',
	    'section'			=> 'toko_header_top',
	    'label'				=> esc_html__( 'Header Logo Text', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_nohtml',
		'type'   			=> 'text',
	);

	$controls[] = array(
		'setting'  			=> 'header_logo_image',
        'section'			=> 'toko_header_top',
        'label'				=> esc_html__( 'Header Logo Image', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_image',
		'type'   			=> 'image',
	);

	$controls[] = array(
		'setting'  			=> 'header_logo_height',
        'section'			=> 'toko_header_top',
        'label'				=> esc_html__( 'Header Logo Height', 'bookie-wp' ),
		'default'			=> '60',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> '',
		'choices'			=> array( 'min' => 40, 'max' => 120, 'step' => 5 ), 
		'type'   			=> 'slider',
		'style'    			=> '.site-header .site-logo-image img { height: [value]px }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_description_disable',
        'section'  			=> 'toko_header_top',
        'label'    			=> esc_html__( 'Disable Site Description', 'bookie-wp' ),
		'default'			=> '',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
        'type'     			=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_menu_disable',
        'section'  			=> 'toko_header_top',
        'label'    			=> esc_html__( 'Disable Site Navigation', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
        'type'     			=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_minicart_disable',
        'section'  			=> 'toko_header_top',
        'label'    			=> esc_html__( 'Disable Mini Cart', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
        'type'     			=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_bg',
        'section'			=> 'toko_header_top',
        'label'				=> esc_html__( 'Header Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.site-header { background-color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_logo_color',
        'section'			=> 'toko_header_top',
        'label'				=> esc_html__( 'Logo Text Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.site-header .site-logo-text { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_sitedesc_color',
        'section'			=> 'toko_header_top',
        'label'				=> esc_html__( 'Site Description Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.site-header .site-description { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_sitemenu_color',
        'section'			=> 'toko_header_top',
        'label'				=> esc_html__( 'Site Menu Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '@media (min-width: 992px) { .site-header div.site-menu .navbar-nav li a { color: [value] } } .site-header .site-quicknav .dropdown .dropdown-toggle { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_sitemenu_color_hover',
        'section'			=> 'toko_header_top',
        'label'				=> esc_html__( 'Site Menu Color (Hover)', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '@media (min-width: 992px) { .site-header div.site-menu .navbar-nav li a:focus,
	.site-header div.site-menu .navbar-nav li a:hover { color: [value] } }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_sitemenu_underline',
        'section'			=> 'toko_header_top',
        'label'				=> esc_html__( 'Site Menu Underline Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '@media (min-width: 992px) { .site-header div.site-menu .navbar-nav li a:after { background: [value] } }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_sitesubmenu_bg',
        'section'			=> 'toko_header_top',
        'label'				=> esc_html__( 'Site Sub Menu Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '@media (min-width: 992px) { .site-header div.site-menu .navbar-nav li .dropdown-menu { background-color: [value] } } ',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_minicart_bg',
        'section'			=> 'toko_header_top',
        'label'				=> esc_html__( 'Mini Cart Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.site-header .site-quicknav .dropdown .topnav-minicart-dropdown, .site-header .site-quicknav .dropdown .topnav-minicart-dropdown .widget_shopping_cart { background: [value] } ',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_minicart_color',
        'section'			=> 'toko_header_top',
        'label'				=> esc_html__( 'Mini Cart Text Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.site-header .site-quicknav .dropdown .topnav-minicart-dropdown .widget_shopping_cart, .site-header .site-quicknav .dropdown .topnav-minicart-dropdown .widget_shopping_cart .cart_list li a, .site-header .site-quicknav .dropdown .topnav-minicart-dropdown .widget_shopping_cart .cart_list li span.amount { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_minicart_color_total',
        'section'			=> 'toko_header_top',
        'label'				=> esc_html__( 'Mini Cart "Total" Text Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.site-header .site-quicknav .dropdown .topnav-minicart-dropdown .widget_shopping_cart .widget_shopping_cart_content .total, .site-header .site-quicknav .dropdown .topnav-minicart-dropdown .widget_shopping_cart .widget_shopping_cart_content .total .amount { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_breadcrumb_disable',
        'section'  			=> 'toko_header_title',
        'label'    			=> esc_html__( 'Disable Breadcrumb', 'bookie-wp' ),
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
        'type'     			=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_title_bg',
        'section'			=> 'toko_header_title',
        'label'				=> esc_html__( 'Page Title Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.page-title { background-color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_header_title_color',
        'section'			=> 'toko_header_title',
        'label'				=> esc_html__( 'Page Title Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.page-title h1, .page-title h2 { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_breadcrumb_color',
        'section'			=> 'toko_header_title',
        'label'				=> esc_html__( 'Breadcrumb Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.page-title .breadcrumbs, .woocommerce .page-title .woocommerce-breadcrumb, .page-title .breadcrumbs li.active span, .woocommerce .page-title .woocommerce-breadcrumb li.active span { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_breadcrumb_color_link',
        'section'			=> 'toko_header_title',
        'label'				=> esc_html__( 'Breadcrumb Link Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.page-title .breadcrumbs a, .woocommerce .page-title .woocommerce-breadcrumb a { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_breadcrumb_color_link_hover',
        'section'			=> 'toko_header_title',
        'label'				=> esc_html__( 'Breadcrumb Link Color (Hover)', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.page-title .breadcrumbs a:hover, .woocommerce .page-title .woocommerce-breadcrumb a:hover { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_book_search_disable',
        'section'  			=> 'toko_book_search',
        'label'    			=> esc_html__( 'Disable Book Search', 'bookie-wp' ),
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
        'type'     			=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'toko_book_search_title',
		'section'			=> 'toko_book_search',
		'label'				=> esc_html__( '"Book Title" text', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_nohtml',
		'type'				=> 'text',
	);

	$controls[] = array(
		'setting'  			=> 'toko_book_search_category',
		'section'			=> 'toko_book_search',
		'label'				=> esc_html__( '"Book Category" text', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_nohtml',
		'type'				=> 'text',
	);

	$controls[] = array(
		'setting'  			=> 'toko_book_search_author',
		'section'			=> 'toko_book_search',
		'label'				=> esc_html__( '"Book Author" text', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_nohtml',
		'type'				=> 'text',
	);

	$controls[] = array(
		'setting'  			=> 'toko_book_search_button',
		'section'			=> 'toko_book_search',
		'label'				=> esc_html__( '"Find Book" text', 'bookie-wp' ),
		'description'		=> '',
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_nohtml',
		'type'				=> 'text',
	);

	$controls[] = array(
		'setting'  			=> 'toko_book_search_bg',
        'section'			=> 'toko_book_search',
        'label'				=> esc_html__( 'Book Search Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.books-search { background: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_book_search_input',
        'section'			=> 'toko_book_search',
        'label'				=> esc_html__( 'Book Search Input/Select Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.books-search .form-control { background: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_book_search_arrow',
        'section'			=> 'toko_book_search',
        'label'				=> esc_html__( 'Book Search Select Arrow Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.books-search .select-arrow { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_book_search_button_bg',
        'section'			=> 'toko_book_search',
        'label'				=> esc_html__( 'Book Search Button Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.books-search .btn { background: [value]; border-color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_book_search_button_hover',
        'section'			=> 'toko_book_search',
        'label'				=> esc_html__( 'Book Search Button Background (Hover)', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.books-search .btn:hover { background: [value]; border-color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_book_search_button_color',
        'section'			=> 'toko_book_search',
        'label'				=> esc_html__( 'Book Search Button Text Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.books-search .btn { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_footer_banner_disable',
        'section'  			=> 'toko_footer_banner',
        'label'    			=> esc_html__( 'Disable Footer Banner', 'bookie-wp' ),
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
        'type'     			=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'toko_footer_banner_image',
        'section'			=> 'toko_footer_banner',
        'label'				=> esc_html__( 'Footer Banner Image', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_image',
		'type'   			=> 'image',
	);

	$controls[] = array(
		'setting'  			=> 'toko_footer_banner_title',
	    'section'			=> 'toko_footer_banner',
	    'label'				=> esc_html__( 'Footer Banner Title', 'bookie-wp' ),
	    'description'		=> '',
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_nohtml',
		'type'   			=> 'text',
	);

	$controls[] = array(
		'setting'  			=> 'toko_footer_banner_url',
	    'section'			=> 'toko_footer_banner',
	    'label'				=> esc_html__( 'Footer Banner Link URL', 'bookie-wp' ),
		'default' 			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_url',
		'type'   			=> 'text',
	);

	$controls[] = array(
		'setting'  			=> 'toko_footer_banner_link',
	    'section'			=> 'toko_footer_banner',
	    'label'				=> esc_html__( 'Footer Banner Link Text', 'bookie-wp' ),
	    'description'		=> '',
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_nohtml',
		'type'   			=> 'text',
	);

	$controls[] = array(
		'setting'  			=> 'toko_footer_social_disable',
        'section'  			=> 'toko_footer_social',
        'label'    			=> esc_html__( 'Disable Social Icons', 'bookie-wp' ),
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
        'type'     			=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'toko_footer_social_color',
        'section'			=> 'toko_footer_social',
        'label'				=> esc_html__( 'Footer Social Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.footer-social a { color: [value] }',
	);

	$socials = array( 'facebook', 'twitter', 'google-plus', 'instagram', 'rss', 'e-mail','youtube', 'flickr', 'linkedin', 'pinterest', 'dribbble', 'github', 'lastfm', 'vimeo', 'tumblr', 'soundcloud', 'behance', 'deviantart' );
	for( $scn=0;$scn<18;$scn++ ) {
		$option = 'toko_footer_social_'.$scn;
        $social = ucwords( str_replace( '-', ' ', $socials[$scn] ) );
		$controls[] = array(
			'setting'  			=> $option,
		    'section' 			=> 'toko_footer_social',
		    'label'				=> sprintf( esc_html__( '%s URL', 'bookie-wp' ), $social ),
		    'description'		=> '',
			'default'			=> '',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'toko_sanitize_url',
			'type'   			=> 'text',
		);
	}

	$controls[] = array(
		'setting'  			=> 'footer_credit',
	    'section'			=> 'toko_footer_credit',
	    'label'				=> esc_html__( 'Footer Credit Text', 'bookie-wp' ),
	    'description'		=> '',
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_html',
	    'type'				=> 'textarea',
	);

	$controls[] = array(
		'setting'  			=> 'toko_footer_credit_bg',
        'section'			=> 'toko_footer_credit',
        'label'				=> esc_html__( 'Footer Background', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.site-footer { background: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_footer_credit_color',
        'section'			=> 'toko_footer_credit',
        'label'				=> esc_html__( 'Footer Credit Text Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.footer-credit { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_footer_credit_color_link',
        'section'			=> 'toko_footer_credit',
        'label'				=> esc_html__( 'Footer Credit Link Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.footer-credit a { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_footer_menu_color',
        'section'			=> 'toko_footer_credit',
        'label'				=> esc_html__( 'Footer Menu Color', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.footer-menu-wrap ul li a { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'toko_footer_menu_color_hover',
        'section'			=> 'toko_footer_credit',
        'label'				=> esc_html__( 'Footer Menu Color (Hover)', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'type'   			=> 'color',
		'style'    			=> '.footer-menu-wrap ul li a:focus, .footer-menu-wrap ul li a:hover { color: [value] }',
	);

	$controls[] = array(
		'setting'  			=> 'contact_form_disable',
        'section'  			=> 'toko_contact',
        'label'    			=> esc_html__( 'DISABLE Contact Form', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
        'type'     			=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'contact_map_disable',
        'section'  			=> 'toko_contact',
        'label'    			=> esc_html__( 'DISABLE Google Map', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_checkbox',
        'type'     			=> 'checkbox',
	);

	$controls[] = array(
		'setting'  			=> 'contact_map_lat',
	    'section'			=> 'toko_contact',
	    'label'				=> esc_html__( 'Map Latitude', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_nohtml',
		'type'   			=> 'text',
	);

	$controls[] = array(
		'setting'  			=> 'contact_map_lng',
	    'section'			=> 'toko_contact',
	    'label'				=> esc_html__( 'Map Longitude', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_nohtml',
		'type'   			=> 'text',
	);

	$controls[] = array(
		'setting'  			=> 'contact_map_marker_title',
	    'section'			=> 'toko_contact',
	    'label'				=> esc_html__( 'Marker Title', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_nohtml',
		'type'   			=> 'text',
	);

	$controls[] = array(
		'setting'  			=> 'contact_map_marker_desc',
	    'section'			=> 'toko_contact',
	    'label'				=> esc_html__( 'Marker Description', 'bookie-wp' ),
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'toko_sanitize_html',
		'type'				=> 'textarea',
	);

	// $controls[] = array(
	// 	'setting'  			=> '',
	// 	'type'   			=> 'text',
	// );

	return $controls;
}
