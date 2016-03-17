<?php
	
/* This will add the Options page in our dashboard. */
function red_add_submenu() {
		add_submenu_page( 'themes.php',
		'Options Page',
		'Change the look',
		'manage_options',
		'theme_options',
		'my_options_page');
	}
add_action( 'admin_menu', 'red_add_submenu' );



/* We create and add 1 settings section. It will contain our 3 customization options. */
function red_settings_init() { 
	register_setting( 'theme_options', 'red_options_settings' );
	
	add_settings_section(
		'red_options_page_section', 
		'Change the Look and Feel of the site.', 
		'red_options_page_section_callback', 
		'theme_options'
	);
	
	function red_options_page_section_callback() { 
		echo ''; // The Description of the section. Which we don't need.
	}

	/* We create and add our first option. A custom message that will display in the header of the site. */
	add_settings_field( 
		'red_text_field', 
		'Short Custom Greeting', 
		'red_text_field_render', 
		'theme_options', 
		'red_options_page_section' 
	);
	function red_text_field_render() { 
		$options = get_option( 'red_options_settings' );
		?>
		<input type="text" name="red_options_settings[red_text_field]"
			value="<?php if (isset($options['red_text_field'])) echo $options['red_text_field']; ?>" />
		<?php
	}

	/* We create and add our second option. Page background color. */
	add_settings_field( 
		'red_radio_field', 
		'Page Background', 
		'red_radio_field_render', 
		'theme_options', 
		'red_options_page_section'  
	);
	function red_radio_field_render() { 
		$options = get_option( 'red_options_settings' );
		?>
		<!-- We have 4 possible choices for page background color. White, Grey, Red and Green. -->
		<input type="radio" name="red_options_settings[red_radio_field]" <?php if (isset($options['red_radio_field']))
		checked( $options['red_radio_field'], white ); ?> value="white" /> <label>White</label><br />
		<input type="radio" name="red_options_settings[red_radio_field]" <?php if (isset($options['red_radio_field']))
		checked( $options['red_radio_field'], grey ); ?> value="grey" /> <label>Grey</label><br />
		<input type="radio" name="red_options_settings[red_radio_field]" <?php if (isset($options['red_radio_field']))
		checked( $options['red_radio_field'], red ); ?> value="red" /> <label>Red</label><br />
		<input type="radio" name="red_options_settings[red_radio_field]" <?php if (isset($options['red_radio_field']))
		checked( $options['red_radio_field'], green ); ?> value="green" /> <label>Green</label><br />
		<?php
	}
	
	/* We add our third option. The Menu Size. */
	add_settings_field( 
		'red_radio_menuSize', 
		'Menu Size', 
		'red_radio_menuSize_render', 
		'theme_options', 
		'red_options_page_section'  
	);
	function red_radio_menuSize_render() { 
		$options = get_option( 'red_options_settings' );
		?>
		<!-- We have 4 possible choices for page background color. White, Grey, Red and Green. -->
		<input type="radio" name="red_options_settings[red_radio_menuSize]" 
		<?php if (isset($options['red_radio_menuSize']))
		checked( $options['red_radio_menuSize'], small ); ?> value="small" /> <label>Small</label><br />
		<input type="radio" name="red_options_settings[red_radio_menuSize]" 
		<?php if (isset($options['red_radio_menuSize']))
		checked( $options['red_radio_menuSize'], large ); ?> value="large" /> <label>Large</label>
		<?php
	}


	function my_options_page(){ 
			/* This is to show feedback that the options were saved, or an error occured.*/
			settings_errors(); 
		?>
		
		<!-- This builds the form that collects the user's input on what options he wants. -->
		<form action="options.php" method="post">
			<h2>OPTIONS PAGE</h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}
add_action( 'admin_init', 'red_settings_init' );