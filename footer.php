		<div id="footer-wrapper">
        
        	<div class="top">&nbsp;</div>
        
        	<div id="footer">
            
            	<div class="inner">
            
                	<div class="left">
                    
                    	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Left') ) : else : ?>
                        
                        <?php endif; ?>
                    
                    </div>
                    
                    <div class="middle">
                    
                    	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Middle') ) : else : ?>
                        
                        <?php endif; ?>
                    
                    </div>
                    
                    <div class="right">
                    
                    	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Right') ) : else : ?>
                        
                        <?php endif; ?>
                        
                    </div>
                    
                    <br class="clearer" />
                    
                </div>
                
            </div>
            
            <div class="bottom">&nbsp;</div>
        
        </div>

	</div>

	<?php wp_footer(); ?>
	
</body>

</html>
