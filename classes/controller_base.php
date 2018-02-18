<?php
Abstract Class Controller_Base 
{
    protected $_registry;
    protected $_baseTemplate = null;
    function __construct($registry) 
    {
        $this->_registry = $registry;
        $this->_baseTemplate = $this->_registry->get('template');
    }

    
    abstract function index();

    protected function _initTemplate($title)
    {
        $parentTemplate = $this->_baseTemplate;
        $parentTemplate->set('title', $title);
        return clone $this->_registry->get('template');
    }

    protected function _renderLayout($template)
    {
        $html = $template->toHtml();
        $parentTemplate = $this->_baseTemplate;
        $parentTemplate->set('content', $html);
    }
}