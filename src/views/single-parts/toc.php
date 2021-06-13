<?php
    $toc = apply_filters('cpt_blog_toc', $post->post_content);
?>


<div class="w-1/3 sticky top-10 font-thin text-sm" style="height: calc(100vh - 5rem);">

    <div class="font-semi-bold text-lg w-full border-b-2 p-2 absolute top-0 h-10">Article Content</div>

    <div class="toc w-full overflow-y-scroll absolute top-14" style="height: calc(100% - 7rem);">

        <div class="relative">
            <?php echo $toc; ?>
            <svg class="toc-marker z-50 absolute top-0 left-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">        
                <path stroke="#F59E0B" stroke-width="3" fill="transparent" stroke-dasharray="0, 0, 0, 1000" stroke-linecap="round" stroke-linejoin="round" transform="translate(-0.5, -0.5)" />
            </svg>
        </div>

    </div>  

    <div class="font-semi-bold text-lg w-full p-2 absolute bottom-0 h-10 border-t-2 flex">
        <div class="flex-1 text-yellow-500 text-sm font-light">Time to read: <?php echo $reading_time; ?></div>
        <?php include( __DIR__ . '/back_to_top.php');  ?>  
    </div>

</div>


<?php

include( ANDYP_CPT_BLOG_PATH . '/src/css/toc.php');
include( ANDYP_CPT_BLOG_PATH . '/src/js/toc.php');

