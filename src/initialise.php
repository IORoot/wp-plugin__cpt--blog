<?php

namespace andyp\labs\cpt\blog;

class initialise
{

    public $singular = 'blog'; //lowercase
    public $svgdata_icon = 'data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMjQgMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTE1LjU0LDMuNUwyMC41LDguNDdMMTkuMDcsOS44OEwxNC4xMiw0LjkzTDE1LjU0LDMuNU0zLjUsMTkuNzhMMTAsMTMuMzFDOS45LDEzIDkuOTcsMTIuNjEgMTAuMjMsMTIuMzVDMTAuNjIsMTEuOTYgMTEuMjYsMTEuOTYgMTEuNjUsMTIuMzVDMTIuMDQsMTIuNzUgMTIuMDQsMTMuMzggMTEuNjUsMTMuNzdDMTEuMzksMTQuMDMgMTEsMTQuMSAxMC42OSwxNEw0LjIyLDIwLjVMMTQuODMsMTYuOTVMMTguMzYsMTAuNTlMMTMuNDIsNS42NEw3LjA1LDkuMTdMMy41LDE5Ljc4WiIvPjwvc3ZnPg==';


    public function run()
    {
        $this->setup_cpt();
        $this->register_cpt();
        $this->switch_on_metaboxes();
        $this->register_template_folder();
        $this->register_sidebar();
        $this->isotope_filters();
        $this->enqueue_css();
        $this->register_transform_filters();
        $this->register_REST_metadata();
    }

    public function setup_cpt()
    {
        $this->cpt = new cpt\create_cpt;
        $this->cpt->set_singular(ucfirst($this->singular));
        $this->cpt->set_icon($this->svgdata_icon);
    }
    
    public function register_cpt()
    {
        $this->cpt->register();
    }

    /**
     * This is only for activation.
     * Otherwise it runs on an init filter
     */
    public function run_cpt()
    {
        $this->cpt->run_cpt();
    }

    public function switch_on_metaboxes()
    {
        new acf\switch_on_metaboxes;
    }

    public function register_template_folder()
    {
        new filters\register_template_folder($this->singular);
    }

    public function register_sidebar()
    {
        new register\sidebar(ucfirst($this->singular));
    }

    public function isotope_filters()
    {
        new filters\isotope_filters;
    }

    public function enqueue_css()
    {
        new filters\enqueue_css_in_footer($this->singular);
    }

    public function register_transform_filters()
    {
        new filters\transforms\parsedown;
        new filters\transforms\tailwind;
        new filters\transforms\p_1;
        new filters\transforms\tag_hide;
        new filters\transforms\youtube_links_to_embeds;
    }

    public function register_REST_metadata()
    {
        new REST\metadata;
    }
}