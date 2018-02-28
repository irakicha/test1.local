<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 27.02.18
 * Time: 12:58
 */

class Register_Content_Type
{

    public $name='';

    public $singular_name='';

    public $args = array();

    public function __construct($name, $singular_name, $args)
    {

        $this->name = $name;
        $this->singular_name = $singular_name;
        $this->args = $args;

        add_action('init', array($this, 'register_new_post_type'));
    }

    public function register_new_post_type()
    {
        register_post_type($this->get_content_type_slug(), $this->init_args_for_new_post_type());
    }

    public function init_args_for_new_post_type(){

        $all_args = array(
            'labels' => array(
                'name' => $this->name,
                'singular_name' => $this->singular_name,
                'add_new' => 'Add '.$this->singular_name,
                'add_new_item' => 'Add new '.$this->singular_name,
                'edit_item' => 'Edit '.$this->singular_name,
                'new_item' => 'New '.$this->singular_name,
                'all_items' => 'All '.$this->name,
                'view_item' => 'View '.$this->singular_name,
                'search_items' => 'Search '.$this->singular_name,
                'not_found' => $this->name.' not found.',
                'not_found_in_trash' => $this->name.' not found in trash',
                'menu_name' => $this->name,
            ),
        );

        if($this->args){
            $all_args = array_merge_recursive($all_args, $this->args);
        }
        return $all_args;
    }

    public function get_content_type_slug(){
        return strtolower(trim(str_replace(' ', '-', $this->name)));
    }
}