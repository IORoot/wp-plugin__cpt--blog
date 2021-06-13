<?php

    $published = human_time_diff( get_the_time( 'U', $post ), current_time( 'timestamp' ) ) . ' ago.';
    $tags      = get_the_terms($post, 'blog_tags');
    $category  = get_the_terms($post, 'blog_category');

?>

<div class="flex flex-wrap text-white gap-4">

    <div class="w-full flex gap-4">
        <div class="w-1/2 bg-gray-100 text-gray-600 rounded-2xl p-4">
            <?php include( __DIR__ . '/meta_published_date.php'); ?>
        </div>


        <div class="w-1/2 bg-gray-100 text-gray-600 rounded-2xl p-4">
            <?php include( __DIR__ . '/meta_category.php'); ?>
        </div>
    </div>

    <div class="w-full flex gap-4">
        <div class="w-1/2 bg-gray-100 text-gray-600 rounded-2xl p-4">
            <?php include( __DIR__ . '/meta_tags.php'); ?>
        </div>


        <div class="w-1/2 bg-gray-100 text-gray-600 rounded-2xl p-4">
            <?php include( __DIR__ . '/meta_reading_time.php'); ?>
        </div>
    </div>

</div>
