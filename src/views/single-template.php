<?php 


get_header();

while ( have_posts() ) :

	the_post();

	// Used in multiple places. - word count & printing out below.
	$content = apply_filters('cpt_blog_transforms', $post->post_content);

	// -------------------------- TEMPLATE START ------------------------------
	?>

	<article class="bg-black text-halo">
		
	<?php include( __DIR__ . '/template-parts/title_description.php');  ?>  

		<?php include( __DIR__ . '/template-parts/youtube_lite.php');  ?>  

		<div class="flex py-3"> 

			<div class="md:w-1/5 w-24"></div>

			<div class="md:w-3/5 overflow-hidden">

				<?php include( __DIR__ . '/template-parts/back_to_top.php');  ?>  

				<?php echo $content;  ?>   

			</div>

			<div class="md:w-1/5 w-24"></div>

		</div>

	</article>


	<?php
	// -------------------------- TEMPLATE END --------------------------------


endwhile;

get_footer();