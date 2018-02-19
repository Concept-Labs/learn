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
		$this->_baseTemplate->addCss('styles/header.css');
		$this->_baseTemplate->addJs('script/index.js');
        $this->_baseTemplate->addCss('styles/index.css');
        
        $this->_baseTemplate->addCss('styles/footer.css');
        $parentTemplate = $this->_baseTemplate;
        $parentTemplate->set('title', $title);
        return clone $this->_registry->get('template');
    }

    protected function _renderLayout($template)
    {
        $parentTemplate = $this->_baseTemplate;
        
        $headerTemplate = clone $parentTemplate;
        $headerTemplate->setFile('templates/header.phtml');
            //header child     
            $headerMenu = new Block_Menu($this->_registry);
            $headerMenu->setFile('templates/header/menu.phtml');
            $_htmlHeaderMenu = $headerMenu->toHtmlWithPhp();
            $headerTemplate->set('headerMenu', $_htmlHeaderMenu);
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