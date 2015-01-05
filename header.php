<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title('-','true','right'); ?><?php bloginfo('name'); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <?php wp_head(); ?>
    </head>
	<body <?php body_class(); ?>>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <header id="header">
            <div id="header-top">
                <div class="container">
                    <nav>
                        <?php 
                            $args = array('theme_location' => 'header_top', 'menu' => '', 'container' => '');
                            wp_nav_menu( $args ); 
                        ?>                    
                    </nav>                    
                </div>
            </div><!-- .header-top -->

            <div id="header-main">
                <div class="container">
                    <div class="logo">
                        <a href="<?php echo bloginfo('url'); ?> ">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="">
                        </a>
                    </div>

                    <button id="js-menu" class="btn valign">
                        Menu
                        <i class="icon-menu"></i>
                    </button><!-- js-menu-toggle -->

                    <nav>  
                    <?php 
                        $args = array('theme_location' => 'header_main', 'menu' => '', 'container' => '');
                        wp_nav_menu( $args ); 
                    ?>
                    </nav>                       
                </div>
            </div><!-- .header-main -->

        </header><!-- #header -->

        <main id="joebudden" class="site-main" role="main">