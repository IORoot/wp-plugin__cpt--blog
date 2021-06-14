<?php
	$content = apply_filters('cpt_blog_transforms', $post->post_content);
?>

<div class="w-full lg:w-2/3">
    <?php echo $content;  ?>   
</div>