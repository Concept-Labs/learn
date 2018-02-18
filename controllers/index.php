<?php
Class Controller_Index Extends Controller_Base 
{
    protected function _initTemplate($title)
    {
        $this->_baseTemplate->addJs('script/index.js');
        return parent::_initTemplate($title);
    }

        public function index() 
    {
        $template = $this->_initTemplate('Homepage');
        
        $template->set("data", "Hello", false);
        $template->set("name", "Vitalik", false);
        $template->setFile('templates/main.phtml');
        
        $this->_renderLayout($template);
    }
}