<?php 

add_action( 'customize_register', 'toko_customize_register', 10 );
/**
 * This function incorporates code from the Kirki Customizer Framework.
 * 
 * The Kirki Customizer Framework, Copyright Aristeides Stathopoulos (@aristath),
 * is licensed under the terms of the GNU GPL, Version 2 (or later).
 * 
 * @link http://kirki.org
 */
function toko_customize_register( $wp_customize ){

	if ( ! isset( $wp_customize ) ) {
		return;
	}

	class TokoPress_Customize_Slider_Control extends WP_Customize_Control {

		public $type = 'slider';

		public function enqueue() {

			wp_enqueue_script( 'jquery-ui' );
			wp_enqueue_script( 'jquery-ui-slider' );

		}

		public function render_content() { ?>
			<label>

				<span class="customize-control-title">
					<?php echo esc_attr( $this->label ); ?>
					<?php if ( ! empty( $this->description ) ) : ?>
						<?php // The description has already been sanitized in the Fields class, no need to re-sanitize it. ?>
						<span class="description customize-control-description"><?php echo $this->description; ?></span>
					<?php endif; ?>
				</span>

				<input type="text" class="" id="input_<?php echo $this->id; ?>" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?>/>

			</label>

			<div id="slider_<?php echo $this->id; ?>" class="ss-slider"></div>
			<script>
			jQuery(document).ready(function($) {
				$( '[id="slider_<?php echo $this->id; ?>"]' ).slider({
						value : <?php echo esc_attr( $this->value() ); ?>,
						min   : <?php echo $this->choices['min']; ?>,
						max   : <?php echo $this->choices['max']; ?>,
						step  : <?php echo $this->choices['step']; ?>,
						slide : function( event, ui ) { $( '[id="input_<?php echo $this->id; ?>"]' ).val(ui.value).keyup(); }
				});
				$( '[id="input_<?php echo $this->id; ?>"]' ).val( $( '[id="slider_<?php echo $this->id; ?>"]' ).slider( "value" ) );

				$( '[id="input_<?php echo $this->id; ?>"]' ).change(function() {
					$( '[id="slider_<?php echo $this->id; ?>"]' ).slider({
						value : $( this ).val()
					});
				});

			});
			</script>
			<?php

		}
	}
	
	class TokoPress_Customize_Radio_Buttonset_Control extends WP_Customize_Control {

		public $type = 'radio-buttonset';

		public function enqueue() {
			wp_enqueue_script( 'jquery-ui-button' );
		}

		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}

			$name = '_customize-radio-'.$this->id;

			?>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<?php // The description has already been sanitized in the Fields class, no need to re-sanitize it. ?>
					<span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php endif; ?>
			</span>

			<div id="input_<?php echo $this->id; ?>" class="buttonset">
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id.esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
						<label for="<?php echo $this->id.esc_attr( $value ); ?>">
							<?php echo esc_html( $label ); ?>
						</label>
					</input>
				<?php endforeach; ?>
			</div>
			<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
			<?php
		}

	}

	class TokoPress_Customize_Radio_Image_Control extends WP_Customize_Control {

		public $type = 'radio-image';

		public function enqueue() {
			wp_enqueue_script( 'jquery-ui-button' );
		}

		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}

			$name = '_customize-radio-'.$this->id;

			?>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<?php // The description has already been sanitized in the Fields class, no need to re-sanitize it. ?>
					<span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php endif; ?>
			</span>
			<div id="input_<?php echo $this->id; ?>" class="image">
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id.esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
						<label for="<?php echo $this->id.esc_attr( $value ); ?>">
							<img src="<?php echo esc_html( $label ); ?>">
						</label>
					</input>
				<?php endforeach; ?>
			</div>
			<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
			<?php
		}

	}

	$fields = apply_filters( 'toko_customize_controls', array() );

	if ( ! empty( $fields ) ) {
		foreach ( $fields as $field ) {

			$defaults = array(
				'setting'				=> '',
				'section'				=> '',
				'type'					=> '',
				'priority'				=> 10,
				'label'					=> '',
				'description'			=> '',
				'choices'				=> array(),
				'input_attrs'			=> array(),
				'default'				=> '',
				'capability'			=> 'edit_theme_options',
				'sanitize_callback'		=> '',
			);

			$field = wp_parse_args( $field, $defaults );

			if ( $field['setting'] && $field['section'] && $field['type'] ) {
				$wp_customize->add_setting(
					THEME_NAME.'['.$field['setting'].']',
					array(
						'default'			=> $field['default'],
						'type'				=> 'option',
						'capability'		=> $field['capability'],
						'sanitize_callback'	=> $field['sanitize_callback'],
					)
				);
				if ( in_array( $field['type'], array( 'checkbox', 'dropdown-pages', 'text', 'textarea', 'email', 'number', 'tel', 'url' ) ) ) {
					$wp_customize->add_control(
						THEME_NAME.'['.$field['setting'].']',
						array(
							'settings'		=> THEME_NAME.'['.$field['setting'].']',
							'section'		=> $field['section'],
							'type'			=> $field['type'],
							'priority'		=> $field['priority'],
							'label'			=> $field['label'],
							'description'	=> $field['description'],
						)
					);
				}
				elseif ( in_array( $field['type'], array( 'radio', 'select' ) ) && !empty( $field['choices'] ) ) {
					$wp_customize->add_control(
						THEME_NAME.'['.$field['setting'].']',
						array(
							'settings'		=> THEME_NAME.'['.$field['setting'].']',
							'section'		=> $field['section'],
							'type'			=> $field['type'],
							'priority'		=> $field['priority'],
							'label'			=> $field['label'],
							'description'	=> $field['description'],
							'choices'		=> $field['choices'],
						)
					);
				}
				elseif ( 'color' == $field['type'] ) {
					$wp_customize->add_control(
						new WP_Customize_Color_Control( 
							$wp_customize,
							THEME_NAME.'['.$field['setting'].']',
							array(
								'settings'		=> THEME_NAME.'['.$field['setting'].']',
								'section'		=> $field['section'],
								'priority'		=> $field['priority'],
								'label'			=> $field['label'],
								'description'	=> $field['description'],
							)
						)
					);
				}
				elseif ( 'image' == $field['type'] ) {
					$wp_customize->add_control(
						new WP_Customize_Image_Control( 
							$wp_customize,
							THEME_NAME.'['.$field['setting'].']',
							array(
								'settings'		=> THEME_NAME.'['.$field['setting'].']',
								'section'		=> $field['section'],
								'priority'		=> $field['priority'],
								'label'			=> $field['label'],
								'description'	=> $field['description'],
							)
						)
					);
				}
				elseif ( 'slider' == $field['type'] ) {
					$wp_customize->add_control(
						new TokoPress_Customize_Slider_Control( 
							$wp_customize,
							THEME_NAME.'['.$field['setting'].']',
							array(
								'settings'		=> THEME_NAME.'['.$field['setting'].']',
								'section'		=> $field['section'],
								'priority'		=> $field['priority'],
								'label'			=> $field['label'],
								'description'	=> $field['description'],
								'choices'		=> $field['choices'],
							)
						)
					);
				}
				elseif ( 'radio-buttonset' == $field['type'] ) {
					$wp_customize->add_control(
						new TokoPress_Customize_Radio_Buttonset_Control( 
							$wp_customize,
							THEME_NAME.'['.$field['setting'].']',
							array(
								'settings'		=> THEME_NAME.'['.$field['setting'].']',
								'section'		=> $field['section'],
								'priority'		=> $field['priority'],
								'label'			=> $field['label'],
								'description'	=> $field['description'],
								'choices'		=> $field['choices'],
							)
						)
					);
				}
				elseif ( 'radio-image' == $field['type'] ) {
					$wp_customize->add_control(
						new TokoPress_Customize_Radio_Image_Control( 
							$wp_customize,
							THEME_NAME.'['.$field['setting'].']',
							array(
								'settings'		=> THEME_NAME.'['.$field['setting'].']',
								'section'		=> $field['section'],
								'priority'		=> $field['priority'],
								'label'			=> $field['label'],
								'description'	=> $field['description'],
								'choices'		=> $field['choices'],
							)
						)
					);
				}
			}
		}
	}
}

add_action( 'customize_controls_print_styles', 'toko_customize_controls_print_styles' );
/**
 * This function incorporates CSS from the Kirki Customizer Framework.
 * 
 * The Kirki Customizer Framework, Copyright Aristeides Stathopoulos (@aristath),
 * is licensed under the terms of the GNU GPL, Version 2 (or later).
 * 
 * @link http://kirki.org
 */
function toko_customize_controls_print_styles() { 
?>
<style>
.customize-control-slider input[type="text"] {
	background: none;
	border: none;
	text-align: center;
	padding: 0;
	margin: 0;
	font-size: 12px;
	box-shadow: none;
	color: #333;
	width: 100%;
}
.customize-control-slider .ui-slider {
	position: relative;
	text-align: left;
	height: 7px;
	border-radius: 3px;
	background: #f7f7f7;
	border: 1px solid #ccc;
	box-shadow: 0 1px 0 #ccc;
	margin-top: 10px;
	margin-bottom: 20px; 
}
.customize-control-slider .ui-slider .ui-slider-handle {
	position: absolute;
	z-index: 2;
	width: 15px;
	height: 15px;
	top: -5px;
	border-radius: 50%;
	cursor: default;
	-ms-touch-action: none;
	touch-action: none;
	background: #555;
	border: 1px solid #555;
	margin-left: -8px;
}
.customize-control-slider .ui-slider .ui-slider-range {
	position: absolute;
	z-index: 1;
	font-size: 0.7em;
	display: block;
	border: 0;
	background-position: 0 0; 
}
.customize-control-radio-buttonset label {
	padding: 5px 10px;
	background: #f7f7f7;
	border: 1px solid #ccc;
	border-left: 0;
	line-height: 35px;
	box-shadow: 0 1px 0 #ccc;
}
.customize-control-radio-buttonset label.ui-state-active {
	background: #555;
	color: #fff;
}
.customize-control-radio-buttonset label.ui-corner-left {
	border-radius: 3px 0 0 3px;
	border-left: 1px solid #ccc;
}
.customize-control-radio-buttonset label.ui-corner-right {
	border-radius: 0 3px 3px 0;
}
.customize-control-radio-image .image.ui-buttonset input[type=radio] {
	height: auto; 
}
.customize-control-radio-image .image.ui-buttonset label {
	border: 1px solid transparent;
	display: inline-block;
	margin-right: 5px;
	margin-bottom: 5px; 
}
.customize-control-radio-image .image.ui-buttonset label.ui-state-active {
	background: none;
	border-color: #333; 
}
</style>
<?php
}
