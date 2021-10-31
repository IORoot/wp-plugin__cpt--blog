<?php

namespace andyp\cpt\blog\filters\transforms;

/**
 * Filters content for Markdown and converts it to HTML.
 */
class parsedown_toc {

    public $text;
    public $toc;

    public function __construct()
    {
        add_filter('cpt_blog_toc', [$this, 'callback'], 10, 1 );
    }

    public function callback($text)
    {
        $this->text = $text;
        $this->strip_h4_h5_h6_out();
        // $this->add_timestamps();
        $this->parsedown_toc();
        $this->check_toc_exists();
        $this->style_toc();
        // $this->replace_timestamps();

        return $this->toc;
    }


    public function parsedown_toc()
    {
        $Parsedown = new \ParsedownToc();
        $Parsedown->setBreaksEnabled(true)->text($this->text);
        $this->toc = $Parsedown->contentsList();
    }

    public function check_toc_exists()
    {
        if (!$this->toc){
            exit();
        }
    }

    public function strip_h4_h5_h6_out()
    {
        $this->text = preg_replace('/#{4,6}.*/','',$this->text);
        return;
    }

    public function style_toc()
    {
        $this->toc = str_replace('<li>', '<li class="pl-10 hover:bg-CoolGrey100 leading-7 ">', $this->toc);
        $this->toc = str_replace('<a', '<a class="hover:underline"', $this->toc);
    }


}
