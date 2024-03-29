<?php

namespace andyp\cpt\blog\filters\transforms;

/**
 * After content has been filtered for markdown, add custom tailwind classes
 */
class tailwind {

    public $text;
    public $matches;

    public function __construct()
    {
        // apply to content
        add_filter('cpt_blog_transforms', [$this, 'callback'], 20, 1 );
    }

    public function callback($text)
    {
        $this->text = $text;
        $this->match_open_tag();
        $this->array_unique();
        $this->loop_matches();
        
        return $this->text;
    }

    public function match_open_tag()
    {
        preg_match_all('/<([\w]+)/i', $this->text, $this->matches);
    }

    public function array_unique()
    {
        $this->matches[1] = array_unique($this->matches[1]);
    }

    public function loop_matches()
    {
        foreach ($this->matches[1] as $key => $match)
        {
            if (!method_exists($this, $match)){ continue; }

            $tailwind_classes = $this->$match();

            $transform = $this->matches[0][$key] . ' class="'.$tailwind_classes.'" ';

            $this->text = str_replace($this->matches[0][$key], $transform, $this->text);
        }
    }


    public function h2()
    {
        return 'text-6xl my-20';
    }

    public function h3()
    {
        return 'text-5xl my-20';
    }

    public function h4()
    {
        return 'text-4xl my-20 font-thin';
    }

    public function p()
    {
        return 'text-2xl mb-4 leading-relaxed';
    }



    public function ul()
    {
        return 'text-xl list-outside list-disc mb-12 px-12 pt-12 pb-8 w-full';
    }

    public function ol()
    {
        return 'text-xl list-outside list-decimal mb-12 px-12 pt-12 pb-8 w-full';
    }

    public function li()
    {
        return 'pb-4 leading-relaxed';
    }



    public function blockquote()
    {
        return 'bg-CoolGrey100 p-12 my-12 w-full';
    }


    public function a()
    {
        return 'underline hover:bg-Amber500 hover:bg-yellow-800 hover:text-white';
    }


    public function hr()
    {
        return 'border-yellow-800 my-24 border-4 w-full';
    }
}
