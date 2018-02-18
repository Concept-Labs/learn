<?php
Class Controller_Index Extends Controller_Base 
{
    protected function _initTemplate($title)
    {
        //єто файл templates/index.phtml
        return parent::_initTemplate($title);
    }

    public function index() 
    {
        $template = $this->_initTemplate('Homepage');
        
        $template->set("data", "Hello", false);
        $template->set("name", "Vitalik", false);
        $template->set("test", "<a href='tree'>Go to tree</a>", true);
        $template->setFile('templates/main.phtml');
        
        $this->_renderLayout($template);
    }
}