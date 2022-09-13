 <?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WK_Wow
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="preloader">
<div class="status"></div>
</div>
<?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wk-wow' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
    <header id="masthead" class="site-header <?php echo wk_wow_bg_class(); ?>" role="banner">
        <div class="container">
            <nav id="pageContainerMainNavMobile" class="navbar navbar-expand-xl p-0 ">
                <div class="navbar-brand">
           <?php
            the_custom_logo();
            if ( is_front_page() && is_home() ) :
                ?>
                <a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                <?php
                    else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; 

                       if ( get_theme_mod( 'show_site_description', 1 ) ) {
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description"><?php echo esc_html( $description ); ?></p>
                            <?php
                            endif;
                        }
                    ?>
                </div>       

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" href="#pageContainerMainNavMobile" aria-expanded="false" 
                 aria-label="<?php esc_attr_e( 'Toggle navigation', 'wk-wow' ); ?>">
                    <span class="my-1 mx-2 close">X</span>
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                wp_nav_menu(array(
                'theme_location'  => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-end',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 2,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>

            </nav>
        </div>
    </header><!-- #masthead -->
    <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="page-sub-header" class="page-sub-header jarallax " <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
            <div class="container">
                <h1>
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo esc_html(get_theme_mod( 'header_banner_title_setting' ));
                    }
                    ?>
                </h1>
                <p>
                    <?php
                    if(get_theme_mod( 'header_banner_tagline_setting' )){
                        echo esc_html(get_theme_mod( 'header_banner_tagline_setting' ));
                  }
                    ?>
                </p>
                <a href="#content" class="page-scroller btn-circle"><i class="fa fa-fw fa-arrow-down "></i></a>
            </div>
        </div>
    <?php endif; ?>
    <div id="content" class="site-content">
        <div class="container">
            <div class="row">
                <?php endif; ?>