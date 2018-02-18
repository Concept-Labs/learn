<?php
Class Controller_Tree Extends Controller_Base 
{
    protected function _initTemplate($title)
    {
        //єто файл templates/index.phtml
        return parent::_initTemplate($title);
    }
    
    public function index() 
    {
        $template = $this->_initTemplate('tree');
        
        //$template->set("data", "Hello", false);
        //$template->set("name", "Vitalik", false);
        $template->setFile('templates/tree.phtml');
        
        $this->_renderLayout($template);
    }
    
    public function view() 
    {
        $template = $this->_initTemplate('this is view');
        
        //$template->set("data", "Hello", false);
        $template->set("name", "Vitalik", false);
        $template->setFile('templates/tree/view.phtml');
        
        $this->_renderLayout($template);
    }
    
    public function add() 
    {
        $template = $this->_initTemplate('Добавте что-то в каталог');
        
        $template->setFile('templates/tree/add.phtml');
        
        $this->_renderLayout($template);
    }
}
