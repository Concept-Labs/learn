<?php
Class Controller_About Extends Controller_Base 
{
    protected function _initTemplate($title)
    {
        //єто файл templates/index.phtml
        return parent::_initTemplate($title);
    }

    public function index() 
    {
        $template = $this->_initTemplate('О нас');
        
        $template->set("data", "О нас", false);
        $template->setFile('templates/about.phtml');
        
        $this->_renderLayout($template);
    }
}