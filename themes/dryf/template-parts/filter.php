<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
	<?php
		if( $terms = get_terms( array( 'taxonomy' => 'animal_category', 'orderby' => 'name' ) ) ) : 
	
			echo '<select name="categoryfilter"><option value="">Select category...</option>';
			foreach ( $terms as $term ) :
				echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
			endforeach;
			echo '</select>';
		endif;
	?>
    <?php
		if( $terms = get_terms( array( 'taxonomy' => 'animal_category_new', 'orderby' => 'name' ) ) ) : 
	
			echo '<select name="categoryfilternew"><option value="">Select category...</option>';
			foreach ( $terms as $term ) :
				echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
			endforeach;
			echo '</select>';
		endif;
	?>
	<input type="text" name="price_min" placeholder="Min price" />
	<input type="text" name="price_max" placeholder="Max price" />
	<label>
		<input type="radio" name="date" value="ASC" /> Date: Ascending
	</label>
	<label>
		<input type="radio" name="date" value="DESC" selected="selected" /> Date: Descending
	</label>
	<label>
		<input type="checkbox" name="featured_image" /> Only posts with featured images
	</label>
	<button>Apply filter</button>
	<input type="hidden" name="action" value="myfilter">
</form>
<div id="response">
<?php
            $posts = get_posts(array(
                'numberposts' => 20,
                'post_type'   => 'services',
                'suppress_filters' => true,
            ));

            foreach ($posts as $post) {
                setup_postdata($post);
            ?>
                <div class="animal-item wow animate__fadeInUp">
                    <div class="animal-image">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail() ?></a>
                    </div>
                    <div class="animal-caption">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
                        <div><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></div>
                        <a class="animal-btn" href="<?php the_permalink(); ?>">
                            <?php
                            if (get_locale() == 'uk') {
                                esc_html_e('Читати більше');
                            }
                            if (get_locale() == 'en_GB') {
                                esc_html_e('Read');
                            }
                            ?>
                        </a>
                    </div>
                </div>
            <?php }
            wp_reset_postdata(); ?>
</div>


<script>
    jQuery(function($){
	$('#filter').submit(function(){
		var filter = $('#filter');
		$.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Processing...'); // changing the button label
			},
			success:function(data){
				filter.find('button').text('Apply filter'); // changing the button label back
				$('#response').html(data); // insert data
			}
		});
		return false;
	});
});
</script>