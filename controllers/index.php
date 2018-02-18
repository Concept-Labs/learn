<?php
Class Controller_Index Extends Controller_Base 
{
    public function index() 
    {
        $template = $this->_initTemplate();
        
        $template->set("data", "Hello", false);
        $template->set("name", "Vitalik", false);
        $template->setFile('templates/main.phtml');
        
        $this->_renderLayout($template);
    }
}