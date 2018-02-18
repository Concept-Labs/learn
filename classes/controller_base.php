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
        $parentTemplate = $this->_baseTemplate;
        
        $headerTemplate = clone $parentTemplate;
        $headerTemplate->setFile('templates/header.phtml');
        $_htmlheader = $headerTemplate->toHtml();
        $parentTemplate->set('header', $_htmlheader);
        
        $menuTemplate = clone $parentTemplate;
        $menuTemplate->setFile('templates/menu.phtml');
        $_html = $menuTemplate->toHtml();
        $parentTemplate->set('menu', $_html);
        
        $html = $template->toHtml();
        $parentTemplate->set('content', $html);
        
        $footerTemplate = clone $parentTemplate;
        $footerTemplate->setFile('templates/footer.phtml');
        $_htmlfooter = $footerTemplate->toHtml();
        $parentTemplate->set('footer', $_htmlfooter);
    }
}