<?php

namespace andyp\cpt\blog\setup;

class activate
{

    public function __construct()
    {
        register_activation_hook( ANDYP_CPT_BLOG_FILE, [$this, 'flush_post_types'] );
    }

    public function flush_post_types() {

        $blog = new \andyp\cpt\blog\initialise;
        $blog->setup_cpt();
        $blog->register_cpt();
        $blog->run_cpt();

        global $wp_rewrite;
        $wp_rewrite->flush_rules();
    }

}