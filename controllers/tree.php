<?php
Class Controller_Tree Extends Controller_Base 
{
    public function index() 
    {
        $template = $this->_initTemplate();
        
        //$template->set("data", "Hello", false);
        //$template->set("name", "Vitalik", false);
        $template->setFile('templates/tree.phtml');
        
        $this->_renderLayout($template);
    }
    
    public function view() 
    {
        $template = $this->_initTemplate();
        
        //$template->set("data", "Hello", false);
        //$template->set("name", "Vitalik", false);
        $template->setFile('templates/tree/view.phtml');
        
        $this->_renderLayout($template);
    }
}
