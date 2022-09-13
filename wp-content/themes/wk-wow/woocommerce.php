<?php
/**
 * The template for displaying Woocommerce Product
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WK_Wow
 */

get_header(); ?>

    <section id="primary" class="content-area col-sm-12 col-md-12 col-lg-9">
        <main id="main" class="site-main" role="main">

            <?php woocommerce_content(); ?>

        </main><!-- #main -->

    </section><!-- #primary -->

<aside id="secondary" class="widget-area col-sm-12 col-lg-3" role="complementary">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</aside><!-- #secondary -->

<?php

get_footer();
