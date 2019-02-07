<?php

if ( !class_exists( 'woocommerce' ) ) {
	return;
}

if ( toko_get_option( 'toko_book_search_disable' ) ) {
	return;
}

$tp_booksearch_title = toko_get_option( 'toko_book_search_title' );
if ( !$tp_booksearch_title ) $tp_booksearch_title = __( 'Book Title', 'bookie-wp' ); 

$tp_booksearch_category = toko_get_option( 'toko_book_search_category' );
if ( !$tp_booksearch_category ) $tp_booksearch_category = __( 'Book Category', 'bookie-wp' ); 

$tp_booksearch_author = toko_get_option( 'toko_book_search_author' );
if ( !$tp_booksearch_author ) $tp_booksearch_author = __( 'Book Author', 'bookie-wp' ); 

$tp_booksearch_button = toko_get_option( 'toko_book_search_button' );
if ( !$tp_booksearch_button ) $tp_booksearch_button = __( 'Find Book', 'bookie-wp' ); 

?>

<div class="books-search">
	<div class="container">
	    <form class="" method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	        <div class="row">
            	<div class="<?php echo ( class_exists( 'Bookie_Author_tax' ) ? 'col-sm-6 col-md-3' : 'col-sm-12 col-md-6' ); ?>">
	            	<div class="form-group">
	                    <input name="s" value="<?php echo get_search_query(); ?>" type="text" class="form-control" id="keyword" placeholder="<?php echo esc_attr( $tp_booksearch_title ); ?>">
	                </div>
	            </div>
	            <div class="col-sm-6 col-md-3">
	                <div class="form-group">
						<?php
						wp_dropdown_categories(
							array(
								'name' => 'product_cat',
								'taxonomy' => 'product_cat',
								'value_field' => 'slug',
								'hierarchical' => 1, 
								'show_option_all' => esc_attr( $tp_booksearch_category ),
								'selected' => ( isset($_GET['product_cat']) ? esc_attr( $_GET['product_cat'] ) : '' ),
								'class' => 'form-control',
							)
						);
						?>
						<i class='select-arrow fa fa-angle-down'></i>
	                </div>
	            </div>

		        <?php if( class_exists( 'Bookie_Author_tax' ) ) : ?>
	            <div class="col-sm-6 col-md-3">
	                <div class="form-group">
						<?php
						wp_dropdown_categories(
							array(
								'name' => 'book_author',
								'taxonomy' => 'book_author',
								'value_field' => 'slug',
								'hierarchical' => 1, 
								'show_option_all' => esc_attr( $tp_booksearch_author ),
								'selected' => ( isset($_GET['book_author']) ? esc_attr( $_GET['book_author'] ) : '' ),
								'class' => 'form-control',
							)
						);
						?>
						<i class='select-arrow fa fa-angle-down'></i>
	                </div>
	            </div>
		        <?php endif; ?>
	
	            <div class="col-sm-6 col-md-3">
	                <div class="form-group">
			            <input type="hidden" name="post_type" value="product" />
		                <button type="submit" class="btn btn-primary btn-block">
			            	<i class="simple-icon-magnifier"></i> &nbsp; 
			            	<?php echo esc_attr( $tp_booksearch_button ); ?>
			            </button>
			        </div>
	            </div>

	        </div>
	    </form>
	</div>
</div>