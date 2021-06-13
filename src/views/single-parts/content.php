<?php
	$content = apply_filters('cpt_blog_transforms', $post->post_content);
?>

<div class="w-2/3">
    <?php echo $content;  ?>   
</div>