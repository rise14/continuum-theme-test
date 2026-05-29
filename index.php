<?php //get theme options
global $con_front, $con_layout, $con_feed;
$con_front = get_option( 'con_front', $con_front );
$con_layout = get_option( 'con_layout', $con_layout );
$con_feed = get_option( 'con_feed', $con_feed );
?>

<?php //set theme options
$con_home_feed_show = $con_front['home_feed_show'];
?>

<?php get_header(); // show header ?>

<!-- spotlight hidden start, remove double slash to appear again-->
<?php  //con_get_spotlight(); ?>

<?php echo do_shortcode('[metaslider id="22721"]'); ?>

<?php if($con_home_feed_show) { // show Feed ?>
	<?php con_get_feed(); ?>    
<?php } ?>

<?php get_footer(); // show footer ?>