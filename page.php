<?php //get theme options
global $con_front, $con_layout, $con_feed, $con_reviews, $con_ads, $con_misc;
$con_front = get_option( 'con_front', $con_front );
$con_layout = get_option( 'con_layout', $con_layout );
$con_feed = get_option( 'con_feed', $con_feed );
?>

<?php //set theme options
$con_page_feed_show = $con_layout['page_feed_show'];
$con_page_unique_sidebar = $con_layout['page_unique_sidebar'];
$con_featuredimage_size = $con_layout['featuredimage_size'];
?>

<?php // use variables from page custom fields instead of continuum options page (if they exist)
$override = get_post_meta($post->ID, "Show Feed", $single = true);
if($override!="") {
	$con_page_feed_show=$override;
	if($con_page_feed_show=="false") {
		$con_page_feed_show=false;	
	} else {
		$con_page_feed_show=true;
	}
}
$override = get_post_meta($post->ID, "Featured Image Size", $single = true);
if($override!="") $con_featuredimage_size=$override;
$override = get_post_meta($post->ID, "Show Ad Below Post", $single = true);
if($override!="") {
	$con_page_ad_post_show=$override;
	if($con_page_ad_post_show=="false") {
		$con_page_ad_post_show=false;	
	} else {
		$con_page_ad_post_show=true;
	}
}

<?php

$sidebar="Sidebar Default";
if($con_page_unique_sidebar) $sidebar="Sidebar Page"; ?>

<?php get_header(); // show header ?>

<div id="page-content">

    <div class="left-panel">
    
        <div class="content">
        
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>            
            
                <h2 class="title adelle"><?php the_title(); ?></h2>
                
                <?php if($con_featuredimage_size=="full" && has_post_thumbnail()) { ?>
                
                	<div class="article-image">
                
                		<?php the_post_thumbnail('single', array( 'title' => '' )); ?>
                        
                    </div>
                    
                <?php } elseif($con_featuredimage_size=="medium" && has_post_thumbnail()) { ?>
                
                    <div class="article-image">
                
                        <?php the_post_thumbnail('single-medium', array( 'title' => '' )); ?>
                        
                    </div>
                                    
                <?php } elseif($con_featuredimage_size=="small" && has_post_thumbnail()) { ?>
                
                	<div class="article-image">
                
                        <?php the_post_thumbnail('single-small', array( 'title' => '' )); ?>
                        
                    </div>
                	
                <?php } ?>
                
                <div class="post-content">
            
                    <?php the_content(); ?>
                    
                </div>
            
			<?php endwhile;
            endif; ?>
            
            <br class="clearer" />
        
        </div>
        
    </div>
    
	<div class="right-panel sidebar">
    
        <div class="inner"> 
            
            <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar) ) : else : ?>
                
                <div class="widget">
                            
                    <div class="header-left">&nbsp;</div>
                    
                    <div class="header-middle">
                
                        <h2 class="gentesque"><?php _e(' About Continuum ', 'continuum' ); ?></h2>
                        
                    </div>
                    
                    <div class="header-right">&nbsp;</div>
                    
                    <br class="clearer" />
                    
                    <div class="content-wrapper">
                    
                        <div class="content">
                    
                        </div>
                        
                    </div>
                
                </div>
            
            <?php endif; ?>
            
        </div>
    
    </div>
    
    <br class="clearer" />

</div>

<?php if($con_page_feed_show) { // show Feed ?>
	<?php con_get_feed(); ?>    
<?php } ?>

<?php get_footer(); // show footer ?>