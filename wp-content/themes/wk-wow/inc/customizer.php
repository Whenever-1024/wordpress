<?php
/**
 * WK_Wow Theme Customizer
 *
 * @package WK_Wow
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wk_wow_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

//select sanitization function
function wk_wow_sanitize_select($input, $setting) {
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control($setting->id)->choices;
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}

function wk_wow_customize_register( $wp_customize ) {

    //Style Preset
    $wp_customize->add_section(
        'typography',
        array(
            'title' => __( 'Preset Styles', 'wk-wow' ),
            //'description' => __( 'This is a section for the typography', 'wk-wow' ),
            'priority' => 20,
        )
    );

    $wp_customize->add_setting( 'preset_style_setting', array(
        'default'   => 'default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wk_wow_sanitize_select',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'preset_style_setting', array(
        'label' => __( 'Typography', 'wk-wow' ),
        'section'    => 'typography',
        'settings'   => 'preset_style_setting',
        'type'    => 'select',
        'choices' => array(
            'default' => 'Default',
            'arbutusslab-opensans' => 'Arbutus Slab / Opensans',
            'montserrat-merriweather' => 'Montserrat / Merriweather',
            'montserrat-opensans' => 'Montserrat / Opensans',
            'oswald-muli' => 'Oswald / Muli',
            'poppins-lora' => 'Poppins / Lora',
            'poppins-poppins' => 'Poppins / Poppins',
            'roboto-roboto' => 'Roboto / Roboto',
            'robotoslab-roboto' => 'Roboto Slab / Roboto',
        )
    ) ) );

    /*Banner*/
    $wp_customize->add_section(
        'header_image',
        array(
            'title' => __( 'Header Banner', 'wk-wow' ),
            'priority' => 30,
        )
    );


    $wp_customize->add_control(
        'header_img',
        array(
            'label' => __( 'Header Image', 'wk-wow' ),
            'section' => 'header_images',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'header_bg_color_setting',
        array(
            'default'     => '#000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color',
            array(
                'label'      => __( 'Header Banner Background Color', 'wk-wow' ),
                'section'    => 'main_color_section',
                'settings'   => 'header_bg_color_setting',
            ) )
    );

    $wp_customize->add_setting( 'header_banner_title_setting', array(
        'default' => __( 'Start Blogging in Style', 'wk-wow' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_title_setting', array(
        'label' => __( 'Banner Title', 'wk-wow' ),
        'section'    => 'header_image',
        'settings'   => 'header_banner_title_setting',
        'type' => 'text'
    ) ) );

    $wp_customize->add_setting( 'header_banner_tagline_setting', array(
        'default' => __( 'Build a Website For Free','wk-wow' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_tagline_setting', array(
        'label' => __( 'Banner Tagline', 'wk-wow' ),
        'section'    => 'header_image',
        'settings'   => 'header_banner_tagline_setting',
        'type' => 'text'
    ) ) );
    $wp_customize->add_setting( 'header_banner_visibility', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wk_wow_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_visibility', array(
        'settings' => 'header_banner_visibility',
        'label'    => __('Remove Header Banner', 'wk-wow'),
        'section'    => 'header_image',
        'type'     => 'checkbox',
    ) ) );

    //Site Name Text Color
   $wp_customize->add_section(
        'site_name_text_color',
        array(
            'title' => __( 'Other Customizations', 'wk-wow' ),
            //'description' => __( 'This is a section for the header banner Image.', 'wk-wow' ),
            'priority' => 60,
        )
    );

    $wp_customize->add_section(
        'colors',
        array(
            'title' => __( 'Background Color', 'wk-wow' ),
            //'description' => __( 'This is a section for the header banner Image.', 'wk-wow' ),
            'priority' => 50,
            'panel' => 'styling_option_panel',
        )
    );

    // Bootstrap and Fontawesome Option
    $wp_customize->add_setting( 'cdn_assets_setting', array(
        'default' => __( 'no','wk-wow' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 
        'cdn_assets',
        array(
            'label' => __( 'Use CDN for Assets', 'wk-wow' ),
            'description' => __( 'All Bootstrap Assets and FontAwesome will be loaded in CDN.', 'wk-wow' ),
            'section' => 'site_name_text_color',
            'settings' => 'cdn_assets_setting',
	        'type'    => 'select',
	        'choices' => array(
	            'yes' => __( 'Yes', 'wk-wow' ),
	            'no' => __( 'No', 'wk-wow' ),
        	)
        )
    );

    //Colors
  $wp_customize->add_section(
    'main_color_section',
     array (
    'title' => __( 'Colors', 'wk-wow' ), //Label of your section
    'priority' => 40 //Position in customizer menu
   )
 );

    //Create a setting to database called main_color
  $wp_customize->add_setting(
    'main_color',
     array(
    'default' => '#CA4E07', //default value
    'transport' => 'refresh',//tells customizer to refresh page after change
    'sanitize_callback' => 'sanitize_hex_color'
   ));

    //Create input field and save value to previosly created DB col
 $wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
    'main_color',
     array (
    'label'     =>  __( 'Main color', 'wk-wow' ), 
    'section'   => 'main_color_section', //your section ID
    'settings'  => 'main_color' //your database ID
   ) )
    
    );
  
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
    $wp_customize->get_control( 'header_textcolor'  )->section = 'main_color_section';
    $wp_customize->get_control( 'background_color'  )->section = 'main_color_section';

}
add_action( 'customize_register', 'wk_wow_customize_register' );
add_action( 'wp_head', 'wk_wow_customizer_css');
function wk_wow_customizer_css()
{
    ?>
<style type="text/css">
#page-sub-header { background: <?php echo esc_html(get_theme_mod('header_bg_color_setting', '#000')); ?>; }

.topbutton, .dropdown-item:hover, .dropdown-item:focus, .btn-primary, #footer-widget .widget-title:after, .single-contact i.fa, .newsletter-subcribe .form-group .subcribe-submit, .woocommerce nav.woocommerce-pagination ul li a:focus, 
.woocommerce nav.woocommerce-pagination ul li a:hover, 
.woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce span.onsale, .woocommerce div.product form.cart .button, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, #secondary .widget-title:after, .woocommerce #review_form #respond .form-submit input, .woocommerce button.button, .woocommerce-info, .woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt,.single-service:before, .single-service:after, .single-service:hover i.fa, .section-title h4:after, .single-service:hover i.fab, .bg-primary, #wp-calendar #today, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_shopping_cart .buttons a, .woocommerce.widget_shopping_cart .buttons a, .woocommerce #respond input#submit:hover, 
.woocommerce button.button:hover, 
.woocommerce input.button:hover, .nav-link:before   {
  background: <?php echo esc_html(get_theme_mod('main_color'));?> !important;
}

 .btn-circle, .widget_tag_cloud .tagcloud a, .single-service:hover i.fa, .single-service:hover i.fab  {
   border-color: <?php echo esc_html(get_theme_mod('main_color'));?> !important;
}
.preloader div{
   border-top-color: <?php echo esc_html(get_theme_mod('main_color'));?> !important;
}

.dropdown-menu{
   border-bottom-color: <?php echo esc_html(get_theme_mod('main_color'));?> !important;
}

 a:hover, a:focus, a:active, #secondary ul li a[aria-current=page], #secondary ul a:hover, #secondary ul a:focus,.btn-circle:hover, .btn-circle:focus, .woocommerce-Price-amount, a {
  color: <?php echo esc_html(get_theme_mod('main_color'));?>;
}

.text-primary, a.text-primary:focus, a.text-primary:hover   {
  color: <?php echo esc_html(get_theme_mod('main_color'));?>!important;
}

</style>
 <?php
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wk_wow_customize_preview_js() {
    wp_enqueue_script( 'wk_wow_customizer', get_template_directory_uri() . '/inc/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wk_wow_customize_preview_js' );
