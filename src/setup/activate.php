<?php

namespace andyp\labs\cpt\blog\setup;

class activate
{

    public function __construct()
    {
        register_activation_hook( ANDYP_LABS_CPT_BLOG_PLUGIN_FILE, [$this, 'flush_post_types'] );
    }

    public function flush_post_types() {

        $blog = new \andyp\labs\cpt\blog\initialise;
        $blog->setup_cpt();
        $blog->register_cpt();
        $blog->run_cpt();

        global $wp_rewrite;
        $wp_rewrite->flush_rules();
    }

}