<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 27.02.18
 * Time: 14:47
 */

class Register_Taxonomy
{

    public $name='';

    public $singular_name='';

    public $args = array();

    public $content_types = array();


    public function __construct($name, $singular_name, $content_types, $args)
    {
        $this->name = $name;
        $this->singular_name = $singular_name;
        $this->content_types = $content_types;
        $this->args = $args;

        add_action('init', array($this, 'new_taxonomy'));


    }

    public function new_taxonomy()
    {
        register_taxonomy($this->get_taxonomy_slug(), $this->content_types, $this->init_args_for_new_taxonomy());
    }

    public function init_args_for_new_taxonomy(){
        $all_args = array(
            'label'  => '',
            'labels' => array(
                'name' => $this->name,
                'singular_name' => $this->singular_name,
                'add_new_item' => 'Add '.$this->singular_name,
                'new_item_name' => 'New '.$this->singular_name,
                'all_items' => 'All'.$this->name,
                'edit_item' => 'Edit '.$this->singular_name,
                'update_item' => 'Update '.$this->singular_name,
                'view_items' => 'View '.$this->singular_name,
                'search_items' => 'Search '.$this->singular_name,
                'parent_item' => 'Parent '.$this->singular_name,
                'parent_item_colon' => 'Parent '.$this->singular_name.':',
            ),
        );

        if($this->args){
            $all_args = array_merge_recursive($all_args, $this->args);
        }
        return $all_args;
    }

    public function get_taxonomy_slug(){

        return strtolower(trim(str_replace(' ', '-', $this->name)));

    }
}