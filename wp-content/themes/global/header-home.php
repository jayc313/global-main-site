<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/main.css">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header" class="abs pt-4" >
    <div class="container">
        <div class="row">
            <div class="col-12 header__column">

                <a href="<?php echo home_url(); ?>">
                    <?php media_output(carbon_get_theme_option('site-logo'), 'full', array('class' => 'logo')) ; ?>
                </a>

            </div>

    </div>
</header>

<div class="gbc-banner full-screen" style="background-color: #ED4F39;">
    <img width="2560" height="1442" src="http://192.168.0.124:8666/glo/wp-content/uploads/2023/02/Mask-Group-49.jpg" class="multiply bg-media " alt="" decoding="async" autoplay="1" muted="1" playsinline="1" loop="1">    <div class="container">
        <div class="row">
            <div class="col-12"></div>
        </div>
    </div>
</div>

<div class="nav-menu sticky pv-1">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <a href="<?php echo home_url(); ?>">
                    <img src="http://192.168.0.124:8666/glo/wp-content/uploads/2023/02/Logo-1-2.png" class="logo" alt="">
                </a>
            </div>
            <div class="offset-1 col-6">

                <p class="para-sm">
                <span>
                    <span class="mr-1 c-secondary--red">What are you looking for?</span>
                    
                    <div class="dn db-lg">
                        <a href="#overview" class="btn no-style rounded c-primary--black btn-sm active">Overview</a>
                        <a href="#film" class="btn no-style rounded c-primary--black btn-sm">Film</a>
                        <a href="#brand" class="btn no-style rounded c-primary--black btn-sm">Brand</a>
                        <a href="#digital" class="btn no-style rounded c-primary--black btn-sm">Digital</a>
                    </div>
                </span>

                </p>
            </div>
            <div class="col-3 tar fdir-rr ">
                <div class="dn db-lg"><a href="" class="btn no-style rounded btn-sm bg-primary--black c-primary--white">01202 727070</a></div>
            </div>
        </div>
    </div>
</div>