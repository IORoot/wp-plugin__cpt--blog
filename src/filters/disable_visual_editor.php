<?php

namespace andyp\cpt\blog\filters;

class disable_visual_editor
{

	public function __construct($page_type)
	{
        $this->page_type = $page_type;

        add_filter( 'user_can_richedit', [$this,'disable_wysiwyg'] );
	}


    public function disable_wysiwyg() {

        global $post;

        if ($this->page_type == get_post_type($post)){
            return false;
        }
        return $default;
        
    }

}