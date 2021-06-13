<?php

namespace andyp\cpt\blog\filters\transforms;
/**
 * Filters content for Markdown and converts it to HTML.
 */
class parsedown {

    public function __construct()
    {
        add_filter('cpt_blog_transforms', [$this, 'callback'], 10, 1 );
    }

    public function callback($text)
    {
        $Parsedown = new \ParsedownToc();
        // $html_with_toc    = $Parsedown->setBreaksEnabled(true)->text($text);
        $html_without_toc = $Parsedown->setBreaksEnabled(true)->body($text);
        // $just_toc         = $Parsedown->setBreaksEnabled(true)->toc($text);

        return $html_without_toc;
    }

}
