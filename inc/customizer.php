<?php

class Hookah_Customize {


   public static function register ( $wp_customize ) {
      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

      // Add setting for the sticky logo
      $wp_customize->add_setting('hookah_sticky_logo', array(
         'default' => '', // Default value for the sticky logo
         'sanitize_callback' => 'esc_url_raw', // Sanitization callback for the URL
      ));
      // Add control for the sticky logo, using WP_Customize_Image_Control
      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hookah_sticky_logo', array(
         'label' => __('Sticky Logo', 'hookah'), // Label displayed in the Customizer
         'section' => 'title_tagline', // Section in which the control will be placed
         'settings' => 'hookah_sticky_logo', // Setting to which this control is linked
      )));

      // Add a new panel for theme options
      $wp_customize->add_panel( 'hookah_theme_options_panel',
         array(
            'title'       => __( 'Theme Options', 'hookah' ),
            'capability'  => 'edit_theme_options',
            'priority'    => 0,
         )
      );

      // Section for Typography Settings
      $wp_customize->add_section( 'hookah_typography_settings',
         array(
            'title'       => __( 'Typography', 'hookah' ),
            'capability'  => 'edit_theme_options',
            'panel'       => 'hookah_theme_options_panel',
         )
      );
      // Body Font Size Setting
      $wp_customize->add_setting( 'body_font_size_setting',
         array(
            'default'           => '16px',
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

      $wp_customize->add_control( 'body_font_size_control',
         array(
            'label'       => __( 'Body Font Size (px)', 'hookah' ),
            'section'     => 'hookah_typography_settings',
            'settings'    => 'body_font_size_setting',
            'type'        => 'text',
            'description' => __( 'Enter a value in px units, e.g., 16px', 'hookah' ),
         )
      );
      // H1 Font Size Setting
      $wp_customize->add_setting( 'h1_font_size_setting',
         array(
            'default'           => '3.815em',
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

      $wp_customize->add_control( 'h1_font_size_control',
         array(
            'label'       => __( 'H1 Font Size (em)', 'hookah' ),
            'section'     => 'hookah_typography_settings',
            'settings'    => 'h1_font_size_setting',
            'type'        => 'text',
            'description' => __( 'Enter a value in em units, e.g., 3.815em', 'hookah' ),
         )
      );

      // H2 Font Size Setting
      $wp_customize->add_setting( 'h2_font_size_setting',
         array(
            'default'           => '3.052em',
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

      $wp_customize->add_control( 'h2_font_size_control',
         array(
            'label'       => __( 'H2 Font Size (em)', 'hookah' ),
            'section'     => 'hookah_typography_settings',
            'settings'    => 'h2_font_size_setting',
            'type'        => 'text',
            'description' => __( 'Enter a value in em units, e.g., 3.052em', 'hookah' ),
         )
      );

      // H3 Font Size Setting
      $wp_customize->add_setting( 'h3_font_size_setting',
         array(
            'default'           => '2.441em',
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

      $wp_customize->add_control( 'h3_font_size_control',
         array(
            'label'       => __( 'H3 Font Size (em)', 'hookah' ),
            'section'     => 'hookah_typography_settings',
            'settings'    => 'h3_font_size_setting',
            'type'        => 'text',
            'description' => __( 'Enter a value in em units, e.g., 2.441em', 'hookah' ),
         )
      );

      // H4 Font Size Setting
      $wp_customize->add_setting( 'h4_font_size_setting',
         array(
            'default'           => '1.953em',
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

      $wp_customize->add_control( 'h4_font_size_control',
         array(
            'label'       => __( 'H4 Font Size (em)', 'hookah' ),
            'section'     => 'hookah_typography_settings',
            'settings'    => 'h4_font_size_setting',
            'type'        => 'text',
            'description' => __( 'Enter a value in em units, e.g., 1.953em', 'hookah' ),
         )
      );

      // H5 Font Size Setting
      $wp_customize->add_setting( 'h5_font_size_setting',
         array(
            'default'           => '1.563em',
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

      $wp_customize->add_control( 'h5_font_size_control',
         array(
            'label'       => __( 'H5 Font Size (em)', 'hookah' ),
            'section'     => 'hookah_typography_settings',
            'settings'    => 'h5_font_size_setting',
            'type'        => 'text',
            'description' => __( 'Enter a value in em units, e.g., 1.563em', 'hookah' ),
         )
      );

      // H6 Font Size Setting
      $wp_customize->add_setting( 'h6_font_size_setting',
         array(
            'default'           => '1.25em',
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

      $wp_customize->add_control( 'h6_font_size_control',
         array(
            'label'       => __( 'H6 Font Size (em)', 'hookah' ),
            'section'     => 'hookah_typography_settings',
            'settings'    => 'h6_font_size_setting',
            'type'        => 'text',
            'description' => __( 'Enter a value in em units, e.g., 1.25em', 'hookah' ),
         )
      );

      $wp_customize->add_setting( 'small_font_size_setting',
         array(
            'default'           => '0.75em',
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

      $wp_customize->add_control( 'small_font_size_control',
         array(
            'label'       => __( 'Small Font Size (em)', 'hookah' ),
            'section'     => 'hookah_typography_settings',
            'settings'    => 'small_font_size_setting',
            'type'        => 'text',
            'description' => __( 'Enter a value in em units, e.g., 0.75em', 'hookah' ),
         )
      );

      $wp_customize->add_setting( 'sup_sub_font_size_setting',
         array(
            'default'           => '0.563em',
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

      $wp_customize->add_control( 'sup_sub_font_size_control',
         array(
            'label'       => __( 'Superscript/Subscript Font Size (em)', 'hookah' ),
            'section'     => 'hookah_typography_settings',
            'settings'    => 'sup_sub_font_size_setting',
            'type'        => 'text',
            'description' => __( 'Enter a value in em units, e.g., 0.563em', 'hookah' ),
         )
      );


      

      // Section for General Settings
      $wp_customize->add_section( 'hookah_color_settings',
         array(
            'title'       => __( 'Color scheme', 'hookah' ),
            'capability'  => 'edit_theme_options',
            'panel'       => 'hookah_theme_options_panel',
         )
      );

      // Theme Mode Selector Setting
      $wp_customize->add_setting( 'theme_mode_setting',
         array(
            'default'           => 'light',
            'sanitize_callback' => 'sanitize_key', // Use sanitize_key for a select control
         )
      );

      $wp_customize->add_control( 'theme_mode_control',
         array(
            'label'      => __( 'Select Theme Mode', 'hookah' ),
            'settings'   => 'theme_mode_setting',
            'section'    => 'hookah_color_settings',
            'type'       => 'select',
            'choices'    => array(
                  'light'           => __( 'Light Mode', 'hookah' ),
                  'dark'            => __( 'Dark Mode', 'hookah' ),
            ),
            'description' => __( 'Choose between Light Mode and Dark Mode for the theme appearance.', 'hookah' ),
         )
      );



      $wp_customize->add_setting( 'accent_color',
         array(
            'default'    => '#386EEF',
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'hookah_accent_color',
         array(
            'label'      => __( 'Accent Color', 'hookah' ),
            'settings'   => 'accent_color',
            'section'    => 'hookah_color_settings',
         ) 
      ) );
      $wp_customize->add_setting( 'primary_color',
         array(
            'default'    => '#131313',
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
         ) 
      );    
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'hookah_primary_color',
         array(
            'label'      => __( 'Primary Color', 'hookah' ),
            'settings'   => 'primary_color',
            'section'    => 'hookah_color_settings',
         ) 
      ) );
      $wp_customize->add_setting( 'secondary_color',
         array(
            'default'    => '#fff5f2',
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
         ) 
      );    
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'hookah_secondary_color',
         array(
            'label'      => __( 'Secondary Color', 'hookah' ),
            'settings'   => 'secondary_color',
            'section'    => 'hookah_color_settings',
         ) 
      ) );
      $wp_customize->add_setting( 'text_color',
         array(
            'default'    => '#505050',
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'hookah_text_color',
         array(
            'label'      => __( 'Text Color', 'hookah' ),
            'settings'   => 'text_color',
            'section'    => 'hookah_color_settings',
         ) 
      ) );
      
      $wp_customize->add_setting( 'border_color',
         array(
            'default'    => '#ededed',
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
         ) 
      );      
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'hookah_border_color',
         array(
            'label'      => __( 'Border Color', 'hookah' ),
            'settings'   => 'border_color',
            'section'    => 'hookah_color_settings',
         ) 
      ) );



      // Add a new section for Navbar Settings
      $wp_customize->add_section( 'hookah_navbar_settings',
         array(
            'title'       => __( 'Navbar', 'hookah' ),
            'capability'  => 'edit_theme_options',
            'panel'       => 'hookah_theme_options_panel',
         )
      );


      if ( is_plugin_active( 'elementor/elementor.php' ) ) {
         // Add control for Elementor Template
         $wp_customize->add_setting( 'navbar_elementor_template_setting',
            array(
               'default'           => 'default',
               'sanitize_callback' => 'sanitize_text_field',
            )
         );

         $wp_customize->add_control( 'navbar_elementor_template_control',
            array(
               'label'      => __( 'Elementor Template for Navbar', 'hookah' ),
               'settings'   => 'navbar_elementor_template_setting',
               'section'    => 'hookah_navbar_settings',
               'type'       => 'select',
               'choices'    => hookah_get_post_title('elementor_library'), // Call this function to get Elementor library templates
               'description' => __( 'Select an Elementor template for your Navbar.', 'hookah' ),
            )
         );
      }

      // Transparent Menu Style Selector Setting
      $wp_customize->add_setting( 'transparent_menu_setting',
         array(
            'default'           => 'default',
            'sanitize_callback' => 'sanitize_key', // Use sanitize_key for a select control
         )
      );

      $wp_customize->add_control( 'transparent_menu_control',
         array(
            'label'      => __( 'Transparent Menu Style', 'hookah' ),
            'settings'   => 'transparent_menu_setting',
            'section'    => 'hookah_navbar_settings',
            'type'       => 'select',
            'choices'    => array(
                  'default'           => __( 'Default', 'hookah' ),
                  'static'            => __( 'Static', 'hookah' ),
                  'transparent_light' => __( 'Transparent Light', 'hookah' ),
                  'transparent_dark'  => __( 'Transparent Dark', 'hookah' ),
            ),
            'description' => __( 'Select the style for your website\'s menu.', 'hookah' ),
         )
      );

        
        // Sticky Menu Setting
        $wp_customize->add_setting( 'sticky_menu_setting',
            array(
                'default'           => 'enable',
                'sanitize_callback' => 'sanitize_key', // Use sanitize_key for a select control
            )
        );

        $wp_customize->add_control( 'sticky_menu_control',
            array(
                'label'      => __( 'Sticky Menu', 'hookah' ),
                'settings'   => 'sticky_menu_setting',
                'section'    => 'hookah_navbar_settings',
                'type'       => 'select',
                'choices'    => array(
                    'enable'  => __( 'Enable', 'hookah' ),
                    'disable' => __( 'Disable', 'hookah' ),
                ),
                'description' => __( 'Select to enable or disable the sticky menu.', 'hookah' ),
            )
        );

        // Sticky Offset Setting
        $wp_customize->add_setting( 'sticky_offset_setting',
            array(
                'default'           => 100, // Set default value as needed
                'sanitize_callback' => 'absint', // Use absint to ensure the value is a positive integer
            )
        );

        $wp_customize->add_control( 'sticky_offset_control',
            array(
                'label'      => __( 'Sticky Offset', 'hookah' ),
                'settings'   => 'sticky_offset_setting',
                'section'    => 'hookah_navbar_settings',
                'type'       => 'number',
                'input_type' => 'text', // Use 'text' to allow entering numeric values
                'description' => __( 'Enter the sticky offset in pixels.', 'hookah' ),
            )
        );

        // Navbar Height Setting
        $wp_customize->add_setting( 'navbar_height_setting',
            array(
                'default'           => 100, // Set default value as needed
                'sanitize_callback' => 'absint', // Use absint to ensure the value is a positive integer
            )
        );

        $wp_customize->add_control( 'navbar_height_control',
            array(
                'label'      => __( 'Navbar Height', 'hookah' ),
                'settings'   => 'navbar_height_setting',
                'section'    => 'hookah_navbar_settings',
                'type'       => 'number',
                'input_type' => 'text', // Use 'text' to allow entering numeric values
                'description' => __( 'Enter the navbar height in pixels.', 'hookah' ),
            )
        );

         // Navbar Background Color Setting
         $wp_customize->add_setting( 'navbar_bg_color_setting',
            array(
               'default'           => '#ffffff', // Set default value as needed
               'sanitize_callback' => 'sanitize_text_field',
            )
         );

         $wp_customize->add_control( 'navbar_background_color_control',
         array(
            'label'      => __( 'Navbar Background Color', 'hookah' ),
            'type'       => 'text',
            'settings'   => 'navbar_bg_color_setting',
            'section'    => 'hookah_navbar_settings',
            'description' => __( 'Enter a color code in HEX or RGB format.', 'hookah' ),
         )
         );

         // Sticky Background Color Setting
         $wp_customize->add_setting( 'sticky_bg_color_setting',
         array(
            'default'           => '#f8f8f8', // Set default value as needed
            'sanitize_callback' => 'sanitize_text_field',
         )
         );

         $wp_customize->add_control( 'sticky_background_color_control',
            array(
               'label'      => __( 'Sticky Background Color', 'hookah' ),
               'type'       => 'text',
               'settings'   => 'sticky_bg_color_setting',
               'section'    => 'hookah_navbar_settings',
               'description' => __( 'Enter a color code in HEX or RGB format.', 'hookah' ),
            )
         );

         // Add a new section for Navbar Settings
         $wp_customize->add_section( 'hookah_header_settings',
            array(
               'title'       => __( 'Header', 'hookah' ),
               'capability'  => 'edit_theme_options',
               'panel'       => 'hookah_theme_options_panel',
            )
         );

      if ( is_plugin_active( 'elementor/elementor.php' ) ) {
         // Add control for Elementor Template
         $wp_customize->add_setting( 'header_elementor_template_setting',
            array(
               'default'           => 'default',
               'sanitize_callback' => 'sanitize_text_field',
            )
         );

         $wp_customize->add_control( 'header_elementor_template_control',
            array(
               'label'      => __( 'Elementor Template for Header', 'hookah' ),
               'settings'   => 'header_elementor_template_setting',
               'section'    => 'hookah_header_settings',
               'type'       => 'select',
               'choices'    => hookah_get_post_title('elementor_library'), // Call this function to get Elementor library templates
               'description' => __( 'Select an Elementor template for your Header.', 'hookah' ),
            )
         );
      }
      
      // Add Background Image control
      $wp_customize->add_setting('header_bg_image', array(
         'default'           => '',
         'sanitize_callback' => 'esc_url_raw',
      ));

      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_bg_image', array(
         'label'    => __('Header Background Image', 'hookah'),
         'section'  => 'hookah_header_settings',
         'settings' => 'header_bg_image',
      )));

      // Navbar Background Color Setting
      $wp_customize->add_setting('header_bg_color', array(
         'default'           => '#fff5f2', // Set default value as needed
         'sanitize_callback' => 'sanitize_hex_color',
      ));

      $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color_control', array(
         'label'      => __('Header Background Color', 'hookah'),
         'section'    => 'hookah_header_settings',
         'settings'   => 'header_bg_color',
         'description' => __('Choose a color for the header background.', 'hookah'),
      )));
      
      
      // Control for Preloader Width
      $wp_customize->add_setting('header_bgcolor_alpha', array(
         'default'           => 20, // Set default width in percentage
         'sanitize_callback' => 'sanitize_text_field',
      ));

      $wp_customize->add_control('header_bgcolor_alpha', array(
         'label'       => __('Background Color alpha', 'hookah'),
         'description' => __('Set the opacity of the Background Color in percentage.', 'hookah'),
         'section'     => 'hookah_header_settings',
         'type'        => 'range',
         'input_attrs' => array(
            'min'  => 1,
            'max'  => 99,
            'step' => 1,
         ),
      ));
      
      
      // Navbar Background Color Setting
      $wp_customize->add_setting('header_text_color', array(
         'default'           => '#ffffff', // Set default value as needed
         'sanitize_callback' => 'sanitize_hex_color',
      ));

      $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color_control', array(
         'label'      => __('Header Text Color', 'hookah'),
         'section'    => 'hookah_header_settings',
         'settings'   => 'header_text_color',
         'description' => __('Choose a color for the header text.', 'hookah'),
      )));
      
      
    $wp_customize->add_setting('header_text_align', array(
        'default'           => 'center',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('header_text_align', array(
        'label'         => __('Text Align', 'hookah'),
        'settings'      => 'header_text_align',
        'section'       => 'hookah_header_settings',
        'type'          => 'select',
        'choices'       => array(
            'left'   => __('Left', 'hookah'),
            'center' => __('Center', 'hookah'),
            'right'  => __('Right', 'hookah')
        ),
        'description'   => __('Change the alignment of the header text and title.', 'hookah'),
    ));


      
      


      $wp_customize->add_section('hookah_footer_settings', array(
         'title'       => __('Footer', 'hookah'),
         'capability'  => 'edit_theme_options',
         'panel'       => 'hookah_theme_options_panel',
     ));    

      if (is_plugin_active('elementor/elementor.php')) {
         // Add control for Elementor Template
         $wp_customize->add_setting('footer_elementor_template_setting', array(
            'default'           => 'default',
            'sanitize_callback' => 'sanitize_text_field',
         ));
         $wp_customize->add_control('footer_elementor_template_control', array(
            'label'         => __('Elementor Template for Footer', 'hookah'),
            'settings'      => 'footer_elementor_template_setting',
            'section'       => 'hookah_footer_settings',
            'type'          => 'select',
            'choices'       => hookah_get_post_title('elementor_library'), // Ensure this function is defined to get Elementor library templates
            'description'   => __('Select an Elementor template for your footer.', 'hookah'),
         ));
      }
  
      // Add a text control for copyrights text in the Footer section
      $wp_customize->add_setting( 'hookah_copyrights_text',
         array(
            'default'           => __('&copy;2024 All rights reserved. Powered by <b>Themectg</b>','hookah'),
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

      $wp_customize->add_control( 'hookah_copyrights_text',
         array(
            'label'    => __( 'Copyrights Text', 'hookah' ),
            'section'  => 'hookah_footer_settings',
            'type'     => 'textarea',
         )
      );

      // Add controls for 404 page settings
      $wp_customize->add_section('hookah_404_settings', array(
         'title'      => __('404 Page', 'hookah'),
         'capability' => 'edit_theme_options',
         'panel'      => 'hookah_theme_options_panel',
      ));

      if ( is_plugin_active( 'elementor/elementor.php' ) ) {
         // Add control for Elementor Template
         $wp_customize->add_setting( '404_elementor_template_setting',
            array(
               'default'           => 'default',
               'sanitize_callback' => 'sanitize_text_field',
            )
         );

         $wp_customize->add_control( '404_elementor_template_control',
            array(
               'label'      => __( 'Elementor Template for 404', 'hookah' ),
               'settings'   => '404_elementor_template_setting',
               'section'    => 'hookah_404_settings',
               'type'       => 'select',
               'choices'    => hookah_get_post_title('elementor_library'), // Call this function to get Elementor library templates
               'description' => __( 'Select an Elementor template for your 404 page.', 'hookah' ),
            )
         );
      }

      // Control for 404 Image
      $wp_customize->add_setting('hookah_404_image', array(
         'default'           => get_theme_file_uri('assets/images/404.png'),
         'sanitize_callback' => 'esc_url_raw',
      ));

      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hookah_404_image', array(
         'label'    => __('404 Image', 'hookah'),
         'section'  => 'hookah_404_settings',
         'settings' => 'hookah_404_image',
      )));

      // Control for Page Title
      $wp_customize->add_setting('hookah_404_title', array(
         'default'           => __('Oops... Page Not Found!', 'hookah'),
         'sanitize_callback' => 'sanitize_text_field',
      ));

      $wp_customize->add_control('hookah_404_title', array(
         'label'    => __('Page Title', 'hookah'),
         'section'  => 'hookah_404_settings',
         'type'     => 'text',
      ));

      // Control for Page Description
      $wp_customize->add_setting('hookah_404_description', array(
         'default'           => __('Please return to the site\'s homepage. It looks like nothing was found at this location. Get in touch to discuss your employee needs today. Please give us a call, drop us an email.', 'hookah'),
         'sanitize_callback' => 'sanitize_textarea_field',
      ));

      $wp_customize->add_control('hookah_404_description', array(
         'label'    => __('Page Description', 'hookah'),
         'section'  => 'hookah_404_settings',
         'type'     => 'textarea',
      ));

      // Control for Page Title
      $wp_customize->add_setting('hookah_404_button_text', array(
         'default'           => __('Back to Home', 'hookah'),
         'sanitize_callback' => 'sanitize_text_field',
      ));

      $wp_customize->add_control('hookah_404_button_text', array(
         'label'    => __('Button Text', 'hookah'),
         'section'  => 'hookah_404_settings',
         'type'     => 'text',
      ));

      // Add controls for preloader settings
      $wp_customize->add_section('hookah_preloader_settings', array(
         'title'      => __('Preloader', 'hookah'),
         'capability' => 'edit_theme_options',
         'panel'      => 'hookah_theme_options_panel',
      ));

      // Control for Preloader Status (Enable/Disable)
      $wp_customize->add_setting('hookah_preloader_status', array(
         'default'           => 'enable', // Set default to enable
         'sanitize_callback' => 'sanitize_key',
      ));

      $wp_customize->add_control('hookah_preloader_status', array(
         'label'    => __('Preloader Status', 'hookah'),
         'section'  => 'hookah_preloader_settings',
         'type'     => 'select',
         'choices'  => array(
            'enable'  => __('Enable', 'hookah'),
            'disable' => __('Disable', 'hookah'),
         ),
      ));

      // Control for Preloader Image
      $wp_customize->add_setting('hookah_preloader_image', array(
         'default'           => get_theme_file_uri('assets/images/preloader.gif'),
         'sanitize_callback' => 'esc_url_raw',
      ));

      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hookah_preloader_image', array(
         'label'    => __('Preloader Image', 'hookah'),
         'section'  => 'hookah_preloader_settings',
         'settings' => 'hookah_preloader_image',
      )));

      // Control for Preloader Width
      $wp_customize->add_setting('preloader_width', array(
         'default'           => 20, // Set default width in percentage
         'sanitize_callback' => 'sanitize_text_field',
      ));

      $wp_customize->add_control('preloader_width', array(
         'label'       => __('Preloader Width', 'hookah'),
         'description' => __('Set the width of the preloader in percentage.', 'hookah'),
         'section'     => 'hookah_preloader_settings',
         'type'        => 'range',
         'input_attrs' => array(
            'min'  => 1,
            'max'  => 100,
            'step' => 1,
         ),
      ));
   }
      
   public static function live_preview() {
      wp_enqueue_script( 
           'hookah-themecustomizer',
           get_template_directory_uri() . '/assets/js/customizer.js',
           array(  'jquery', 'customize-preview' ),
           '',
           true
      );
   }

   public static function generate_css( $selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true ) {
      $return = '';
      $mod = get_theme_mod( $mod_name );
      if ( isset( $mod ) && '' !== $mod ) {
          $return = sprintf( '%s { %s:%s; }',
              $selector,
              $style,
              $prefix . $mod . $postfix
          );
          if ( $echo ) {
              echo $return;
          }
      }
      return $return;
  } 
  
    public static function generate_custom_property($property, $mod_name, $postfix='', $echo=true) {
      $return = '';
      $mod    = get_theme_mod($mod_name);
      if (!empty($mod)) {
          $return = sprintf('%s:%s%s;',
              $property,
              $mod,
              $postfix
          );
          if ($echo) {
              echo $return;
          }
      }
      return $return;
  }

   public static function header_output() {
      ?>
      <!--Customizer CSS--> 
      <style type="text/css">
         :root {
            <?php self::generate_custom_property('--navbar-height', 'navbar_height_setting', 'px'); ?>
            <?php self::generate_custom_property('--primary-color', 'primary_color'); ?>
            <?php self::generate_custom_property('--secondary-color', 'secondary_color'); ?>
            <?php self::generate_custom_property('--text-color', 'text_color'); ?>
            <?php self::generate_custom_property('--accent-color', 'accent_color'); ?>
            <?php self::generate_custom_property('--border-color', 'border_color'); ?>
         }
         <?php self::generate_css('body', 'font-size', 'body_font_size_setting'); ?>
         <?php self::generate_css('h1', 'font-size', 'h1_font_size_setting'); ?>
         <?php self::generate_css('h2', 'font-size', 'h2_font_size_setting'); ?>
         <?php self::generate_css('h3', 'font-size', 'h3_font_size_setting'); ?>
         <?php self::generate_css('h4', 'font-size', 'h4_font_size_setting'); ?>
         <?php self::generate_css('h5', 'font-size', 'h5_font_size_setting'); ?>
         <?php self::generate_css('h6', 'font-size', 'h6_font_size_setting'); ?>
         <?php self::generate_css('small', 'font-size', 'small_font_size_setting'); ?>
         <?php self::generate_css('sup, sub', 'font-size', 'sup_sub_font_size_setting'); ?>
         <?php self::generate_css('body .navbar__area', 'background-color', 'navbar_bg_color_setting'); ?>
         <?php self::generate_css('body.sticky .navbar__area', 'background-color', 'sticky_bg_color_setting'); ?>
         <?php self::generate_css('.header__area', 'background-image', 'header_bg_image', 'url("', '")' ); ?>
         <?php self::generate_css('.header__area:before', 'background-color', 'header_bg_color' ); ?>
         <?php self::generate_css('.header__area:before', 'opacity', 'header_bgcolor_alpha', '.', '' ); ?>
         <?php self::generate_css('.header__area .page_title,.header__area .sub__title', 'color', 'header_text_color' ); ?>
         <?php self::generate_css('.header__area', 'text-align', 'header_text_align' ); ?>
         <?php self::generate_css('.preloader .loader__image img', 'width', 'preloader_width', '', '%' ); ?>
      </style> 
      <!--/Customizer CSS-->
      <?php
   }

  
}

add_action( 'customize_register' , array( 'Hookah_Customize' , 'register' ) );
add_action( 'wp_head' , array( 'Hookah_Customize' , 'header_output' ) );
add_action( 'customize_preview_init' , array( 'Hookah_Customize' , 'live_preview' ) );
