<?php

    $post_items = get_posts([
        'post_type' => $post_type,
        'exclude'  => $post->ID,
        'numberposts' => 2,
        'orderby' => 'rand',
        'order'    => 'ASC'
    ]);

    foreach ($post_items as $loop_post)
    {

        /**
         * Get the term permalink
         */
        $loop_post->url = get_term_link($loop_post);
        $loop_post->image = get_the_post_thumbnail_url($loop_post);


        /**
         * Template of Related Series.
         */
        $html[] = '<a href="'.$loop_post->url.'" class="flex flex-col relative w-1/2 p-4 bg-yellow-500 text-white fill-white rounded-2xl overflow-hidden hover:fill-yellow-500 hover:text-black hover:bg-gray-200" >';
        
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                                   IMG                                   │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            $html[] = '<img class="z-40 h-60 object-cover" src="'.$loop_post->image.'"/>';
            
            $html[] = '<div class="z-30 flex justify-items-stretch mt-4 ">';

                // ┌─────────────────────────────────────────────────────────────────────────┐
                // │                                                                         │
                // │                                   TEXT                                  │
                // │                                                                         │
                // └─────────────────────────────────────────────────────────────────────────┘
                $html[] = '<div class="z-30 border-t-2 border-gray-900 pt-2 mt-2 ">';

                    // ┌─────────────────────────────────────────────────────────────────────────┐
                    // │                                                                         │
                    // │                                   TITLE                                 │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    $html[] = '<h2 class="font-semibold text-2xl">'.$loop_post->post_title.'</h2>';

                    // ┌─────────────────────────────────────────────────────────────────────────┐
                    // │                                                                         │
                    // │                                   EXCERPT                               │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    $html[] = '<p class="font-light">'.$loop_post->post_excerpt.'</p>';
                $html[] = '</div>';


                // ┌─────────────────────────────────────────────────────────────────────────┐
                // │                                                                         │
                // │                                   NOISE                                 │
                // │                                                                         │
                // └─────────────────────────────────────────────────────────────────────────┘
                $html[] = '<svg class="z-0 w-full h-full absolute left-0 top-0 "><use xlink:href="#noise"></use></svg>';

            $html[] = '</div>';

        $html[] = '</a>';
    }

    echo implode('', $html);


?>
