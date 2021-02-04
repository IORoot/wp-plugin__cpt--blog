<?php

    $published = human_time_diff( get_the_time( 'U', $post ), current_time( 'timestamp' ) ) . ' ago.';
    $tags      = get_the_terms($post, 'blog_tags');
    $category  = get_the_terms($post, 'blog_category');

    $backlink = '/blogs'; 
    $backname = 'Blog'; 
    // if (!empty($category)){ 
    //     $backlink = get_term_link( $category[0]->slug, 'blog_category');
    //     $backname = $category[0]->name;
    // }
    

?>

<div class="">
    <?php 
        $back = '<a href="' .$backlink. '" rel="tag" class="border-2 border-white text-halo px-10 py-6 ml-10 mt-10 rounded-xl inline-block fill-white hover:bg-white hover:text-night hover:fill-night">';
        $back .= '<svg class="w-4 h-6 inline-block align-top mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"/></svg>';
        $back .= 'Back to ' . $backname;
        $back .= '</a>';
        echo $back; 
    ?>
</div>



<h1 class="text-3xl lg:text-8xl mt-24 mx-10 mb-12 text-white w-3/5 capitalize"><?php the_title(); ?></h1>



<div class="flex flex-col mx-10 text-2xl mb-10">

    <div class="lg:w-3/5 flex-1 flex mb-6">
        <div class="w-1/2">
            <div class="font-semibold text-white">Published</div>
            <div class="font-thin"><?php echo $published; ?></div>
        </div>

        <div class="w-1/2">
            <div class="font-semibold text-white">Category</div>
            <div class="font-thin capitalize underline">
                <?php 
                if (!empty($category)) {
                    echo '<a class="hover:text-goo" href="'.get_term_link($category[0]).'" title="'.$category[0]->name.'">';
                    echo $category[0]->name;
                    echo '</a>';
                } else {
                    echo '<div class="mr-2">Uncategorised</div>';
                }
                ?>
            </div>
        </div>
    </div>


    <div class="lg:w-3/5 flex-1 flex mb-6">
        <div class="w-1/2">
            <div class="font-semibold text-white">Tags</div>
            <div class="font-thin capitalize underline"><?php 

                if (!empty($tags)) {
                    foreach ($tags as $tag) {
                        echo '<a class="mr-2 hover:text-goo" href="'.get_term_link($tag).'" title="'.$tag->name.'">';
                        echo $tag->name;
                        echo '</a>';
                    }
                } else {
                    echo '<div class="mr-2">No Tags</div>';
                }

            ?></div>
        </div>

        <div class="w-1/2">
            <div class="font-semibold text-white">Reading Time</div>
            <div class="font-thin"><?php 
                include( __DIR__ . '/reading_time.php');
                echo $reading_time;
            ?></div>
        </div>
    </div>

</div>