<?php 
/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

class SWE_Controls_Class {
	private $general_setting_options;
	private $slider_controls_options;
	private $style_controls_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'swe_logo_carousel_menus_func' ) );
		add_action( 'admin_init', array( $this, 'general_setting_page_init' ) );
		add_action( 'admin_init', array( $this, 'slider_controls_page_init' ) );
		add_action( 'admin_init', array( $this, 'style_controls_page_init' ) );
	}
	
	
	public function swe_logo_carousel_menus_func() {
		add_submenu_page( 'edit.php?post_type=swelogocarousel', __('Controls', SWELC_TEXTDOMAIN), __('Carousel Controls', SWELC_TEXTDOMAIN), 'manage_options', 'swe_carousel_controls', array($this, 'swe_carousel_controls') );
	}

	public function swe_carousel_controls() {
		$this->general_setting_options = get_option( 'general_setting_option_name' ); 
		$this->slider_controls_options = get_option( 'slider_controls_option_name' ); 
		$this->style_controls_options = get_option( 'style_controls_option_name' ); 
		
		?>
		

		<div class="wrap swe_logo_controls_wraper">
			<h2 class="heading_tab">Swe Logo Carousel Controls</h2>
			<?php settings_errors(); ?>
			<div id="tabs">
				  <ul>
					<li><a href="#swe-general-1">General Setting</a></li>
					<li><a href="#swe-slider-2">Slider Setting</a></li>
					<li><a href="#swe-style-3">Style Setting</a></li>
				  </ul>
			    <!--- Tab 1--->
			    <div id="swe-general-1">
					<form method="post" action="options.php">
						<?php
							settings_fields( 'general_setting_option_group' );
							do_settings_sections( 'general-setting-admin' );
							submit_button('Save General Controls');
						?>
					</form>
				</div>
				<!--- Tab 1--->
				
				<!--- Tab 2--->
			    <div id="swe-slider-2">
					<form method="post" action="options.php">
						<?php
							settings_fields( 'slider_controls_option_group' );
							do_settings_sections( 'slider-controls-admin' );
							submit_button(' Save Slider Controls ');
						?>
					</form>
				</div>
				<!--- Tab 2--->
				
				<!--- Tab 3--->
			    <div id="swe-style-3">
					<form method="post" action="options.php">
						<?php
							settings_fields( 'style_controls_option_group' );
							do_settings_sections( 'style-controls-admin' );
							submit_button( 'Save Style Controls' );
						?>
					</form>
				</div>
			</div><!---Tabs End here---->
		</div>
	<?php }

	/* General Control page */
	public function general_setting_page_init() {
		register_setting(
			'general_setting_option_group', // option_group
			'general_setting_option_name', // option_name
			array( $this, 'general_setting_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'general_setting_setting_section', // id
			'General Controls', // title
			array( $this, 'general_setting_section_info' ), // callback
			'general-setting-admin' // page
		);

		add_settings_field(
			'show_logo_title_0', // id
			'Show Logo Title', // title
			array( $this, 'show_logo_title_0_callback' ), // callback
			'general-setting-admin', // page
			'general_setting_setting_section' // section
		);

		add_settings_field(
			'show_navigation_arrows_1', // id
			'Show Navigation Arrows', // title
			array( $this, 'show_navigation_arrows_1_callback' ), // callback
			'general-setting-admin', // page
			'general_setting_setting_section' // section
		);

		/* add_settings_field(
			'navigation_arrows_position_2', // id
			'Navigation Arrows Position', // title
			array( $this, 'navigation_arrows_position_2_callback' ), // callback
			'general-setting-admin', // page
			'general_setting_setting_section' // section
		); */

		add_settings_field(
			'navigation_arrows_position_3', // id
			'Navigation Arrows Position', // title
			array( $this, 'navigation_arrows_position_3_callback' ), // callback
			'general-setting-admin', // page
			'general_setting_setting_section' // section
		);

		add_settings_field(
			'logo_display_order_4', // id
			'Logo Display Order', // title
			array( $this, 'logo_display_order_4_callback' ), // callback
			'general-setting-admin', // page
			'general_setting_setting_section' // section
		);

		add_settings_field(
			'display_logo_with_border_5', // id
			'Display Logo with Border', // title
			array( $this, 'display_logo_with_border_5_callback' ), // callback
			'general-setting-admin', // page
			'general_setting_setting_section' // section
		);

		add_settings_field(
			'hover_effect_on_logo_6', // id
			'Hover Effect on logo', // title
			array( $this, 'hover_effect_on_logo_6_callback' ), // callback
			'general-setting-admin', // page
			'general_setting_setting_section' // section
		);

		add_settings_field(
			'hover_effect_type_logo_7', // id
			'Hover Effect Type logo', // title
			array( $this, 'hover_effect_type_logo_7_callback' ), // callback
			'general-setting-admin', // page
			'general_setting_setting_section' // section
		);
	}

	/* Slider Control Page */
	public function slider_controls_page_init() {
		register_setting(
			'slider_controls_option_group', // option_group
			'slider_controls_option_name', // option_name
			array( $this, 'slider_controls_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'slider_controls_setting_section', // id
			'Style Controls', // title
			array( $this, 'slider_controls_section_info' ), // callback
			'slider-controls-admin' // page
		);

		add_settings_field(
			'logo_carousel_loop_0', // id
			'Logo Carousel loop', // title
			array( $this, 'logo_carousel_loop_0_callback' ), // callback
			'slider-controls-admin', // page
			'slider_controls_setting_section' // section
		);

		add_settings_field(
			'logo_carousel_transition_speed_1', // id
			'Logo Carousel transition Speed', // title
			array( $this, 'logo_carousel_transition_speed_1_callback' ), // callback
			'slider-controls-admin', // page
			'slider_controls_setting_section' // section
		);

		add_settings_field(
			'logo_carousel_auto_play_2', // id
			'Logo Carousel Auto-play', // title
			array( $this, 'logo_carousel_auto_play_2_callback' ), // callback
			'slider-controls-admin', // page
			'slider_controls_setting_section' // section
		);

		add_settings_field(
			'logo_carousel_pagination_3', // id
			'Logo Carousel Pagination', // title
			array( $this, 'logo_carousel_pagination_3_callback' ), // callback
			'slider-controls-admin', // page
			'slider_controls_setting_section' // section
		);
		
		add_settings_field(
			'items_on_desktop_laptop_4', // id
			'Items on Desktop/Laptop', // title
			array( $this, 'items_on_desktop_laptop_4_callback' ), // callback
			'slider-controls-admin', // page
			'slider_controls_setting_section' // section
		);

		add_settings_field(
			'items_on_tablet_5', // id
			'Items on Tablet', // title
			array( $this, 'items_on_tablet_5_callback' ), // callback
			'slider-controls-admin', // page
			'slider_controls_setting_section' // section
		);

		add_settings_field(
			'items_on_mobile_6', // id
			'Items on Mobile', // title
			array( $this, 'items_on_mobile_6_callback' ), // callback
			'slider-controls-admin', // page
			'slider_controls_setting_section' // section
		);

		add_settings_field(
			'margin_between_logos_7', // id
			'Margin between Logos', // title
			array( $this, 'margin_between_logos_7_callback' ), // callback
			'slider-controls-admin', // page
			'slider_controls_setting_section' // section
		);
	}

	/* Style Controls */
	public function style_controls_page_init() {
		register_setting(
			'style_controls_option_group', // option_group
			'style_controls_option_name', // option_name
			array( $this, 'style_controls_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'style_controls_setting_section', // id
			'Settings', // title
			array( $this, 'style_controls_section_info' ), // callback
			'style-controls-admin' // page
		);

		add_settings_field(
			'logo_title_form_size_0', // id
			'Logo Title form size', // title
			array( $this, 'logo_title_form_size_0_callback' ), // callback
			'style-controls-admin', // page
			'style_controls_setting_section' // section
		);

		add_settings_field(
			'logo_carousel_theme_color_1', // id
			'Logo Carousel Theme Color', // title
			array( $this, 'logo_carousel_theme_color_1_callback' ), // callback
			'style-controls-admin', // page
			'style_controls_setting_section' // section
		);
	}
	
	/* General Control Sanitizer */
	public function general_setting_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['show_logo_title_0'] ) ) {
			$sanitary_values['show_logo_title_0'] = $input['show_logo_title_0'];
		}

		if ( isset( $input['show_navigation_arrows_1'] ) ) {
			$sanitary_values['show_navigation_arrows_1'] = $input['show_navigation_arrows_1'];
		}

		if ( isset( $input['navigation_arrows_position_2'] ) ) {
			$sanitary_values['navigation_arrows_position_2'] = $input['navigation_arrows_position_2'];
		}

		if ( isset( $input['navigation_arrows_position_3'] ) ) {
			$sanitary_values['navigation_arrows_position_3'] = $input['navigation_arrows_position_3'];
		}

		if ( isset( $input['logo_display_order_4'] ) ) {
			$sanitary_values['logo_display_order_4'] = $input['logo_display_order_4'];
		}

		if ( isset( $input['display_logo_with_border_5'] ) ) {
			$sanitary_values['display_logo_with_border_5'] = $input['display_logo_with_border_5'];
		}

		if ( isset( $input['hover_effect_on_logo_6'] ) ) {
			$sanitary_values['hover_effect_on_logo_6'] = $input['hover_effect_on_logo_6'];
		}

		if ( isset( $input['hover_effect_type_logo_7'] ) ) {
			$sanitary_values['hover_effect_type_logo_7'] = $input['hover_effect_type_logo_7'];
		}

		return $sanitary_values;
	}

	/* Slider Control Sanitizer */
		public function slider_controls_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['logo_carousel_loop_0'] ) ) {
			$sanitary_values['logo_carousel_loop_0'] = $input['logo_carousel_loop_0'];
		}

		if ( isset( $input['logo_carousel_transition_speed_1'] ) ) {
			$sanitary_values['logo_carousel_transition_speed_1'] = $input['logo_carousel_transition_speed_1'];
		}

		if ( isset( $input['logo_carousel_auto_play_2'] ) ) {
			$sanitary_values['logo_carousel_auto_play_2'] = $input['logo_carousel_auto_play_2'];
		}

		if ( isset( $input['logo_carousel_pagination_3'] ) ) {
			$sanitary_values['logo_carousel_pagination_3'] = $input['logo_carousel_pagination_3'];
		}
		
		if ( isset( $input['items_on_desktop_laptop_4'] ) ) {
			$sanitary_values['items_on_desktop_laptop_4'] = sanitize_text_field( $input['items_on_desktop_laptop_4'] );
		}

		if ( isset( $input['items_on_tablet_5'] ) ) {
			$sanitary_values['items_on_tablet_5'] = sanitize_text_field( $input['items_on_tablet_5'] );
		}

		if ( isset( $input['items_on_mobile_6'] ) ) {
			$sanitary_values['items_on_mobile_6'] = sanitize_text_field( $input['items_on_mobile_6'] );
		}

		if ( isset( $input['margin_between_logos_7'] ) ) {
			$sanitary_values['margin_between_logos_7'] = sanitize_text_field( $input['margin_between_logos_7'] );
		}

		return $sanitary_values;
	}
	
	/* Style Controls Sanitize */
	public function style_controls_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['logo_title_form_size_0'] ) ) {
			$sanitary_values['logo_title_form_size_0'] = sanitize_text_field( $input['logo_title_form_size_0'] );
		}

		if ( isset( $input['logo_carousel_theme_color_1'] ) ) {
			$sanitary_values['logo_carousel_theme_color_1'] = sanitize_text_field( $input['logo_carousel_theme_color_1'] );
		}

		return $sanitary_values;
	}
	
	public function general_setting_section_info() {
	}
    public function slider_controls_section_info() {	
	}
	public function style_controls_section_info() {
	}

	/* General Controls Fields */
	
	public function show_logo_title_0_callback() {
		?> <fieldset><?php $checked = ( isset( $this->general_setting_options['show_logo_title_0'] ) && $this->general_setting_options['show_logo_title_0'] === 'Yes' ) ? 'checked' : '' ; ?>
		<label for="show_logo_title_0-0"><input type="radio" name="general_setting_option_name[show_logo_title_0]" id="show_logo_title_0-0" value="Yes" <?php echo $checked; ?>> Yes</label><br>
		<?php $checked = ( isset( $this->general_setting_options['show_logo_title_0'] ) && $this->general_setting_options['show_logo_title_0'] === 'No' ) ? 'checked' : '' ; ?>
		<label for="show_logo_title_0-1"><input type="radio" name="general_setting_option_name[show_logo_title_0]" id="show_logo_title_0-1" value="No" <?php echo $checked; ?>> No</label></fieldset> <?php
	}

	public function show_navigation_arrows_1_callback() {
		?> <fieldset><label for="show_navigation_arrows_1-0"><mark>To show navigation, the number of slides must be greater than setted number in desktop, tablet or Mobile ( Check Items on Desktop/Laptop under slider setting  )</mark></label><?php $checked = ( isset( $this->general_setting_options['show_navigation_arrows_1'] ) && $this->general_setting_options['show_navigation_arrows_1'] === 'Yes' ) ? 'checked' : '' ; ?>
		<label for="show_navigation_arrows_1-0"><input type="radio" name="general_setting_option_name[show_navigation_arrows_1]" id="show_navigation_arrows_1-0" value="Yes" <?php echo $checked; ?>> Yes</label><br>
		<?php $checked = ( isset( $this->general_setting_options['show_navigation_arrows_1'] ) && $this->general_setting_options['show_navigation_arrows_1'] === 'No' ) ? 'checked' : '' ; ?>
		<label for="show_navigation_arrows_1-1"><input type="radio" name="general_setting_option_name[show_navigation_arrows_1]" id="show_navigation_arrows_1-1" value="No" <?php echo $checked; ?>> No</label></fieldset> <?php
	}

	public function navigation_arrows_position_3_callback() {
		?> <fieldset><?php $checked = ( isset( $this->general_setting_options['navigation_arrows_position_3'] ) && $this->general_setting_options['navigation_arrows_position_3'] === 'Top Right' ) ? 'checked' : '' ; ?>
		<label for="navigation_arrows_position_3-0"><input type="radio" name="general_setting_option_name[navigation_arrows_position_3]" id="navigation_arrows_position_3-0" value="Top Right" <?php echo $checked; ?>> Top Right</label><br>
		<?php $checked = ( isset( $this->general_setting_options['navigation_arrows_position_3'] ) && $this->general_setting_options['navigation_arrows_position_3'] === 'Top Middle' ) ? 'checked' : '' ; ?>
		<label for="navigation_arrows_position_3-1"><input type="radio" name="general_setting_option_name[navigation_arrows_position_3]" id="navigation_arrows_position_3-1" value="Top Middle" <?php echo $checked; ?>> Top Center</label><br>
		<?php $checked = ( isset( $this->general_setting_options['navigation_arrows_position_3'] ) && $this->general_setting_options['navigation_arrows_position_3'] === 'Top Left' ) ? 'checked' : '' ; ?>
		<label for="navigation_arrows_position_3-2"><input type="radio" name="general_setting_option_name[navigation_arrows_position_3]" id="navigation_arrows_position_3-2" value="Top Left" <?php echo $checked; ?>> Top Left</label><br>
		<?php $checked = ( isset( $this->general_setting_options['navigation_arrows_position_3'] ) && $this->general_setting_options['navigation_arrows_position_3'] === 'Bottom Right' ) ? 'checked' : '' ; ?>
		<label for="navigation_arrows_position_3-3"><input type="radio" name="general_setting_option_name[navigation_arrows_position_3]" id="navigation_arrows_position_3-3" value="Bottom Right" <?php echo $checked; ?>> Bottom Right</label><br>
		<?php $checked = ( isset( $this->general_setting_options['navigation_arrows_position_3'] ) && $this->general_setting_options['navigation_arrows_position_3'] === 'Bottom Middle' ) ? 'checked' : '' ; ?>
		<label for="navigation_arrows_position_3-4"><input type="radio" name="general_setting_option_name[navigation_arrows_position_3]" id="navigation_arrows_position_3-4" value="Bottom Middle" <?php echo $checked; ?>> Bottom Center</label><br>
		<?php $checked = ( isset( $this->general_setting_options['navigation_arrows_position_3'] ) && $this->general_setting_options['navigation_arrows_position_3'] === 'Bottom Left' ) ? 'checked' : '' ; ?>
		<label for="navigation_arrows_position_3-5"><input type="radio" name="general_setting_option_name[navigation_arrows_position_3]" id="navigation_arrows_position_3-5" value="Bottom Left" <?php echo $checked; ?>> Bottom Left</label> <?php
	}

	public function logo_display_order_4_callback() {
		?> <fieldset><?php $checked = ( isset( $this->general_setting_options['logo_display_order_4'] ) && $this->general_setting_options['logo_display_order_4'] === 'Descending' ) ? 'checked' : '' ; ?>
		<label for="logo_display_order_4-0"><input type="radio" name="general_setting_option_name[logo_display_order_4]" id="logo_display_order_4-0" value="Descending" <?php echo $checked; ?>> Descending</label><br>
		<?php $checked = ( isset( $this->general_setting_options['logo_display_order_4'] ) && $this->general_setting_options['logo_display_order_4'] === 'Ascending' ) ? 'checked' : '' ; ?>
		<label for="logo_display_order_4-1"><input type="radio" name="general_setting_option_name[logo_display_order_4]" id="logo_display_order_4-1" value="Ascending" <?php echo $checked; ?>> Ascending</label><br>
		<?php $checked = ( isset( $this->general_setting_options['logo_display_order_4'] ) && $this->general_setting_options['logo_display_order_4'] === 'Randomly' ) ? 'checked' : '' ; ?>
		<label for="logo_display_order_4-2"><input type="radio" name="general_setting_option_name[logo_display_order_4]" id="logo_display_order_4-2" value="Randomly" <?php echo $checked; ?>> Randomly</label></fieldset> <?php
	}

	public function display_logo_with_border_5_callback() {
		?> <fieldset><?php $checked = ( isset( $this->general_setting_options['display_logo_with_border_5'] ) && $this->general_setting_options['display_logo_with_border_5'] === 'Yes' ) ? 'checked' : '' ; ?>
		<label for="display_logo_with_border_5-0"><input type="radio" name="general_setting_option_name[display_logo_with_border_5]" id="display_logo_with_border_5-0" value="Yes" <?php echo $checked; ?>> Yes</label><br>
		<?php $checked = ( isset( $this->general_setting_options['display_logo_with_border_5'] ) && $this->general_setting_options['display_logo_with_border_5'] === 'No' ) ? 'checked' : '' ; ?>
		<label for="display_logo_with_border_5-1"><input type="radio" name="general_setting_option_name[display_logo_with_border_5]" id="display_logo_with_border_5-1" value="No" <?php echo $checked; ?>> No</label></fieldset> <?php
	}

	public function hover_effect_on_logo_6_callback() {
		?> <fieldset><?php $checked = ( isset( $this->general_setting_options['hover_effect_on_logo_6'] ) && $this->general_setting_options['hover_effect_on_logo_6'] === 'Yes' ) ? 'checked' : '' ; ?>
		<label for="hover_effect_on_logo_6-0"><input type="radio" name="general_setting_option_name[hover_effect_on_logo_6]" id="hover_effect_on_logo_6-0" value="Yes" <?php echo $checked; ?>> Yes</label><br>
		<?php $checked = ( isset( $this->general_setting_options['hover_effect_on_logo_6'] ) && $this->general_setting_options['hover_effect_on_logo_6'] === 'No' ) ? 'checked' : '' ; ?>
		<label for="hover_effect_on_logo_6-1"><input type="radio" name="general_setting_option_name[hover_effect_on_logo_6]" id="hover_effect_on_logo_6-1" value="No" <?php echo $checked; ?>> No</label></fieldset> <?php
	}

	public function hover_effect_type_logo_7_callback() {
		?> <select name="general_setting_option_name[hover_effect_type_logo_7]" class="swe-select" id="hover_effect_type_logo_7">
			<?php $selected = (isset( $this->general_setting_options['hover_effect_type_logo_7'] ) && $this->general_setting_options['hover_effect_type_logo_7'] === 'Zoom') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>Zoom</option>
			<?php $selected = (isset( $this->general_setting_options['hover_effect_type_logo_7'] ) && $this->general_setting_options['hover_effect_type_logo_7'] === 'Grayscale') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>Grayscale</option>
			<?php $selected = (isset( $this->general_setting_options['hover_effect_type_logo_7'] ) && $this->general_setting_options['hover_effect_type_logo_7'] === 'Blur') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>Blur</option>
		</select> <?php
	}
	
	
	/* Slider Controls Fields */
	public function logo_carousel_loop_0_callback() {
		?> <fieldset><?php $checked = ( isset( $this->slider_controls_options['logo_carousel_loop_0'] ) && $this->slider_controls_options['logo_carousel_loop_0'] === 'Yes' ) ? 'checked' : '' ; ?>
		<label for="logo_carousel_loop_0-0"><input type="radio" name="slider_controls_option_name[logo_carousel_loop_0]" id="logo_carousel_loop_0-0" value="Yes" <?php echo $checked; ?>> Yes</label><br>
		<?php $checked = ( isset( $this->slider_controls_options['logo_carousel_loop_0'] ) && $this->slider_controls_options['logo_carousel_loop_0'] === 'No' ) ? 'checked' : '' ; ?>
		<label for="logo_carousel_loop_0-1"><input type="radio" name="slider_controls_option_name[logo_carousel_loop_0]" id="logo_carousel_loop_0-1" value="No" <?php echo $checked; ?>> No</label></fieldset> <?php
	}

	public function logo_carousel_transition_speed_1_callback() {
		
		printf(
			'<input class="mini-text" type="number" name="slider_controls_option_name[logo_carousel_transition_speed_1]" id="logo_carousel_transition_speed_1" value="%s">',
			isset( $this->slider_controls_options['logo_carousel_transition_speed_1'] ) ? esc_attr( $this->slider_controls_options['logo_carousel_transition_speed_1']) : ''
		);
		
	}

	public function logo_carousel_auto_play_2_callback() {
		?> <fieldset><?php $checked = ( isset( $this->slider_controls_options['logo_carousel_auto_play_2'] ) && $this->slider_controls_options['logo_carousel_auto_play_2'] === 'Yes' ) ? 'checked' : '' ; ?>
		<label for="logo_carousel_auto_play_2-0"><input type="radio" name="slider_controls_option_name[logo_carousel_auto_play_2]" id="logo_carousel_auto_play_2-0" value="Yes" <?php echo $checked; ?>> Yes</label><br>
		<?php $checked = ( isset( $this->slider_controls_options['logo_carousel_auto_play_2'] ) && $this->slider_controls_options['logo_carousel_auto_play_2'] === 'No' ) ? 'checked' : '' ; ?>
		<label for="logo_carousel_auto_play_2-1"><input type="radio" name="slider_controls_option_name[logo_carousel_auto_play_2]" id="logo_carousel_auto_play_2-1" value="No" <?php echo $checked; ?>> No</label></fieldset> <?php
	}

	public function logo_carousel_pagination_3_callback() {
		?> <fieldset><?php $checked = ( isset( $this->slider_controls_options['logo_carousel_pagination_3'] ) && $this->slider_controls_options['logo_carousel_pagination_3'] === 'Yes' ) ? 'checked' : '' ; ?>
		<label for="logo_carousel_pagination_3-0"><input type="radio" name="slider_controls_option_name[logo_carousel_pagination_3]" id="logo_carousel_pagination_3-0" value="Yes" <?php echo $checked; ?>> Yes</label><br>
		<?php $checked = ( isset( $this->slider_controls_options['logo_carousel_pagination_3'] ) && $this->slider_controls_options['logo_carousel_pagination_3'] === 'No' ) ? 'checked' : '' ; ?>
		<label for="logo_carousel_pagination_3-1"><input type="radio" name="slider_controls_option_name[logo_carousel_pagination_3]" id="logo_carousel_pagination_3-1" value="No" <?php echo $checked; ?>> No</label></fieldset> <?php
	}

	public function items_on_desktop_laptop_4_callback() {
		printf(
			'<input class="mini-text" type="number" name="slider_controls_option_name[items_on_desktop_laptop_4]" id="items_on_desktop_laptop_4" value="%s">',
			isset( $this->slider_controls_options['items_on_desktop_laptop_4'] ) ? esc_attr( $this->slider_controls_options['items_on_desktop_laptop_4']) : ''
		);
	}

	public function items_on_tablet_5_callback() {
		printf(
			'<input class="mini-text" type="number" name="slider_controls_option_name[items_on_tablet_5]" id="items_on_tablet_5" value="%s">',
			isset( $this->slider_controls_options['items_on_tablet_5'] ) ? esc_attr( $this->slider_controls_options['items_on_tablet_5']) : ''
		);
	}

	public function items_on_mobile_6_callback() {
		printf(
			'<input class="mini-text" type="number" name="slider_controls_option_name[items_on_mobile_6]" id="items_on_mobile_6" value="%s">',
			isset( $this->slider_controls_options['items_on_mobile_6'] ) ? esc_attr( $this->slider_controls_options['items_on_mobile_6']) : ''
		);
	}

	public function margin_between_logos_7_callback() {
		printf(
			'<input class="mini-text" type="number" name="slider_controls_option_name[margin_between_logos_7]" id="margin_between_logos_7" value="%s"><span style="color:##969696">px</span>',
			isset( $this->slider_controls_options['margin_between_logos_7'] ) ? esc_attr( $this->slider_controls_options['margin_between_logos_7']) : ''
		);
	}
	
	/* Style Control Fields */
	public function logo_title_form_size_0_callback() {
		printf(
			'<input class="mini-text" type="text" name="style_controls_option_name[logo_title_form_size_0]" id="logo_title_form_size_0" value="%s"><span style="color:##969696">px</span>',
			isset( $this->style_controls_options['logo_title_form_size_0'] ) ? esc_attr( $this->style_controls_options['logo_title_form_size_0']) : ''
		);
	}

	public function logo_carousel_theme_color_1_callback() {
		printf(
			'<input class="mini-text" type="text" name="style_controls_option_name[logo_carousel_theme_color_1]" id="logo_carousel_theme_color_1" value="%s">',
			isset( $this->style_controls_options['logo_carousel_theme_color_1'] ) ? esc_attr( $this->style_controls_options['logo_carousel_theme_color_1']) : ''
		);
	}
}


/* 
 * Retrieve this value with:
 * $general_setting_options = get_option( 'general_setting_option_name' ); // Array of All Options
 * $show_logo_title_0 = $general_setting_options['show_logo_title_0']; // Show Logo Title
 * $show_navigation_arrows_1 = $general_setting_options['show_navigation_arrows_1']; // Show Navigation Arrows
 * $navigation_arrows_position_2 = $general_setting_options['navigation_arrows_position_2']; // Navigation Arrows Position
 * $navigation_arrows_position_3 = $general_setting_options['navigation_arrows_position_3']; // Navigation Arrows Position
 * $logo_display_order_4 = $general_setting_options['logo_display_order_4']; // Logo Display Order
 * $display_logo_with_border_5 = $general_setting_options['display_logo_with_border_5']; // Display Logo with Border
 * $hover_effect_on_logo_6 = $general_setting_options['hover_effect_on_logo_6']; // Hover Effect on logo
 * $hover_effect_type_logo_7 = $general_setting_options['hover_effect_type_logo_7']; // Hover Effect Type logo
 */
