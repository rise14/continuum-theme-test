<?php get_header(); // show header ?>

<div id="page-content" class="single-post">

    <div class="left-panel">
    
        <div class="content">
        
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
               
                <link rel="image_src" href="<?php echo $image_url; ?>" />
                
                <h1 class="title adelle"><?php the_title(); ?></h1>
                
                <?php if($con_featuredimage_size=="full" && has_post_thumbnail()) { ?>
                
                	<div class="article-image full">
                
                		 <?php 
						 if ( has_post_thumbnail()) {
						   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
						   echo '<a class="darken tooltip" href="' . $large_image_url[0] . '" title="Click to expand this image" >';
						   the_post_thumbnail('single');
						   echo '</a>';
						 }
						 ?>
                        
                    </div>
                    
                <?php } elseif($con_featuredimage_size=="medium" && has_post_thumbnail()) { ?>
                
                    <div class="article-image">
                
                         <?php 
						 if ( has_post_thumbnail()) {
						   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
						   echo '<a class="darken tooltip" href="' . $large_image_url[0] . '" title="Click to expand this image" >';
						   the_post_thumbnail('single-medium');
						   echo '</a>';
						 }
						 ?>
                        
                    </div>
                                    
                <?php } elseif($con_featuredimage_size=="small" && has_post_thumbnail()) { ?>
                	
                <?php } ?>
                
                <div class="post-content">
                
                	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
                    	<?php the_content(); ?>
                    
                    </div>

				<?php endwhile;
                endif; ?>
                
                <br class="clearer" /> 
                
                <?php if(comments_open()) { ?> 
                    
                <?php } ?>
            
            </div>
        
        </div>
        
    </div>

<?php get_footer(); // show footer ?>