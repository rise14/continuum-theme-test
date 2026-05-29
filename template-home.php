<?php
/*
Template Name: Home Layout
*/
?>

<?php //get theme options
global $con_front, $con_layout, $con_feed, $con_reviews, $con_ads, $con_misc;
$con_front = get_option( 'con_front', $con_front );
$con_layout = get_option( 'con_layout', $con_layout );
$con_feed = get_option( 'con_feed', $con_feed );
?>

<?php //set theme options
$con_home_latest_show = $con_front['home_latest_show'];
$con_home_feed_show = $con_front['home_feed_show'];
$con_home_latest_position = $con_front['home_latest_position'];
?>

<?php // use variables from page custom fields instead of continuum options page (if they exist)
$override = get_post_meta($post->ID, "Show Feed", $single = true);
if($override!="") {
	$con_home_feed_show=$override;
	if($con_home_feed_show=="false") {
		$con_home_feed_show=false;	
	} else {
		$con_home_feed_show=true;
	}
}
?>

<?php get_header(); // show header ?>

<?php // if this is not the front page, check if user has input any content, and if so display it
if(get_the_content()!="") { ?>

	<div id="page-content" class="post-content">
	
        <div class="page-template content">
        
        	<?php the_content();  ?>
            
        </div>
    
    </div>

<?php } ?>

<?php } ?>

<?php if($con_home_feed_show) { // show Feed ?>
	<?php con_get_feed(); ?>    
<?php } ?>

<?php } ?>

<?php get_footer(); // show footer ?>