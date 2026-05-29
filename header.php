<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php //get theme options
global $con_front, $con_layout, $con_feed, $con_reviews, $con_ads, $con_misc;
$con_front   = get_option( 'con_front', $con_front );
$con_layout  = get_option( 'con_layout', $con_layout );
$con_feed    = get_option( 'con_feed', $con_feed );
$con_misc    = get_option( 'con_misc', $con_misc );
$con_ads     = get_option( 'con_ads', $con_ads );

// Unpack con_misc options used in header
$con_background_fixed = !empty($con_misc['background_fixed']) ? $con_misc['background_fixed'] : false;
$con_breaking_hidden  = !empty($con_misc['breaking_hidden'])  ? $con_misc['breaking_hidden']  : false;
$con_fancy_tooltips   = !empty($con_misc['fancy_tooltips'])   ? $con_misc['fancy_tooltips']   : false;
$con_colorbox         = !empty($con_misc['colorbox'])         ? $con_misc['colorbox']         : false;
$con_search_show      = isset($con_misc['search_show'])       ? $con_misc['search_show']      : true;
$con_smallmenu_show   = isset($con_misc['smallmenu_show'])    ? $con_misc['smallmenu_show']   : true;
$con_background       = !empty($con_misc['background'])       ? $con_misc['background']       : '';
$con_color            = !empty($con_misc['color'])            ? $con_misc['color']            : '';
$con_logo             = !empty($con_misc['logo'])             ? $con_misc['logo']             : '';
?>

<?php if ( ! isset( $content_width ) ) $content_width = 960; ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="description" content="Roots Music and Meaningful Matters."/>
	<meta name="googlebot-news" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
	<meta property="og:title" content="Deep Roots Magazine - Roots Music and Meaningful Matters" />
	<meta charset="UTF-8">
	
	<?php if (is_search()) { ?>
	   <meta name="robots" /> 
	<?php } ?>
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" /> <!-- the main structure and main page elements style -->  
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/components.css" type="text/css" /> <!-- included components and additional style -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/js.css" type="text/css" media="screen" /> <!-- styles for the various jquery plugins -->
    <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css" />
    <![endif]-->
    
    <!--[if gte IE 8]>
            <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" />
    <![endif]-->
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom.css" type="text/css" /> <!-- custom css for users to edit instead of build-in stylesheets -->
    
    <?php if (get_header_image()) : ?>
    <div id="custom-header" style="text-align: center;">
        <img src="<?php echo esc_url(get_header_image()); ?>" alt="<?php bloginfo('name'); ?>">
    </div>
    <?php endif; ?>
    
    <?php if($con_background_fixed) { ?>
    
    	<style type="text/css">
		
			body { background-attachment:fixed !important; }
		
		</style>
    
    <?php } ?>
    
    <?php if($con_breaking_hidden) { ?>
    
    	<style type="text/css">
		
			#breaking-wrapper {display:none;}
		
		</style>
    
    <?php } ?>
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    
    <?php wp_enqueue_script("jquery"); //load jquery ?>
    
	<?php wp_head(); ?>
    
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script> <!-- continuum js -->
    
    <?php if($con_fancy_tooltips) { ?>
    
    <?php } ?>
    
    <?php if($con_colorbox) { ?>
    
    <?php } ?>    

    <!--[if gte IE 9]> <script type="text/javascript"> Cufon.set('engine', 'canvas'); </script> <![endif]--> 
	
</head>

<body <?php body_class($con_background.' '.$con_color); ?>>

	<div id="page-menu-wrapper">
    
    	<div id="page-menu">
            
            <div class="container<?php if(!$con_search_show) { ?> wide<?php } ?>">
            
				<?php //title attribute gets in the way - remove it
                $menu = wp_nav_menu( array( 'theme_location' => 'top-menu', 'container' => 'div', 'fallback_cb' => 'wp_page_menu', 'container_class' => 'menu', 'echo' => '0' ) );
                $menu = preg_replace('/title=\"(.*?)\"/','',$menu);
                echo $menu;
                ?>
                
            </div>
            
            <?php if($con_search_show) { ?>
            
                <div id="search">
                
                    <div class="wrapper">
                    
                        <div class="inner">
                
                            <!-- SEARCH -->  
                            <form method="get" id="searchform" action="<?php echo home_url(); ?>/">                             
                                <input type="text" value="<?php _e( 'search', 'continuum' ); ?>" onfocus="if (this.value == '<?php _e( 'search', 'continuum' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'search', 'continuum' ); ?>';}" name="s" id="s" />          
                            </form>                       
                            
                        </div>
                        
                    </div>
                
                </div>
                
            <?php } ?>
            
            <br class="clearer" />
        
        </div>
    
    </div>
	
	<div id="page-wrap"> <!-- everything below the top menu should be inside the page wrap div -->
    
		<div id="logo-bar">
        
        	<div class="floatleft">
        
				<?php if($con_logo != "") { ?>
                    <a href="<?php echo home_url(); ?>/">
                        <img alt="<?php bloginfo('name'); ?>" src="<?php echo $con_logo; ?>" />
                    </a>
                <?php } else { ?>     
                    <h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
                <?php } ?>
                
                <div class="subtitle gentesque<?php echo $subtitleclass; ?>"><?php bloginfo('description'); ?></div>
                
            </div>
            
            <br class="clearer" />
            
		</div>
        
        <?php if($con_smallmenu_show) { ?>
        
            <div id="small-menu-wrapper">
            
                <div id="small-menu">
                
                    <div class="left-cap">&nbsp;</div>
                    
                    <?php //title attribute gets in the way - remove it
                    $menu = wp_nav_menu( array( 'theme_location' => 'small-menu', 'container' => '0', 'fallback_cb' => 'wp_page_menu', 'echo' => '0' ) );
                    $menu = preg_replace('/title=\"(.*?)\"/','',$menu);
                    echo $menu;
                    ?>

                </div>
                
                <br class="clearer" />
                
            </div>
            
        <?php } ?>
        
        <div id="main-menu-wrapper">
        
            <div id="main-menu">
            
            	<div class="container">
                
					<?php //title attribute gets in the way - remove it
                    $menu = wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '0', 'fallback_cb' => 'fallback_categories', 'echo' => '0' ) );
                    $menu = preg_replace('/title=\"(.*?)\"/','',$menu);
                    echo $menu;
                    ?>
                    
                </div>
				
            </div>
            
            <br class="clearer" />
            
        </div>