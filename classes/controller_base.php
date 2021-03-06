<?php
Abstract Class Controller_Base 
{
    protected $_registry;
    protected $_baseTemplate = null;
    protected $_session = null;
    
    function __construct($registry) 
    {
        if(!$this->_session){
            $this->_session = session_start();
        }
        $this->_registry = $registry;
        $this->_baseTemplate = $this->_registry->get('template');
    }

    
    abstract function index();

    protected function _initTemplate($title)
    {
		$this->_baseTemplate->addCss('styles/header.css');
		$this->_baseTemplate->addJs('script/index.js');
        $this->_baseTemplate->addCss('styles/index.css');
		$this->_baseTemplate->addCss('styles/registration.css');
		$this->_baseTemplate->addCss('styles/logining.css');
		$this->_baseTemplate->addCss('styles/login.css');
        $this->_baseTemplate->addCss('styles/pager.css');
        $this->_baseTemplate->addCss('styles/footer.css');
		
		
        $parentTemplate = $this->_baseTemplate;
        $parentTemplate->set('title', $title);
        return clone $this->_registry->get('template');
    }

    protected function _renderLayout($template, $usePhp = false)
    {
        $parentTemplate = $this->_baseTemplate;
        
        $headerTemplate = clone $parentTemplate;
        $headerTemplate->setFile('templates/header.phtml');
            //header child 
		$headerLogining = new Block_Logining($this->_registry);
            $headerLogining->setFile('templates/header/logining.phtml'); 
            $_htmlHeaderLogining = $headerLogining->toHtmlWithPhp();
        	$headerTemplate->set('headerLogining', $_htmlHeaderLogining);
		
            $headerMenu = new Block_Menu($this->_registry);
            $headerMenu->setFile('templates/header/menu.phtml');
                $headerMenuSmail = new Block_Menu_Smail($this->_registry);
                $headerMenuSmail->setFile('templates/header/menu/smail.phtml');
                $_htmlHeaderMenuSmail = $headerMenuSmail->toHtmlWithPhp();
            $headerMenu->set('headerMenuSmail', $_htmlHeaderMenuSmail);    
            $_htmlHeaderMenu = $headerMenu->toHtmlWithPhp();
        	$headerTemplate->set('headerMenu', $_htmlHeaderMenu);
        $_htmlheader = $headerTemplate->toHtml();
        $parentTemplate->set('header', $_htmlheader);
        
        
        $menuTemplate = clone $parentTemplate;
        $menuTemplate->setFile('templates/menu.phtml');
        $_html = $menuTemplate->toHtml();
        $parentTemplate->set('menu', $_html);
        
        if($usePhp){
            $html = $template->toHtmlWithPhp();
        } else {
            $html = $template->toHtml();
        }
        $parentTemplate->set('content', $html);
        
		$pagerTemplate = clone $parentTemplate;
        $pagerTemplate->setFile('templates/pager.phtml');
        $_htmlpager = $pagerTemplate->toHtml();
        $parentTemplate->set('pager', $_htmlpager);
		
        $footerTemplate = clone $parentTemplate;
        $footerTemplate->setFile('templates/footer.phtml');
        $_htmlfooter = $footerTemplate->toHtml();
        $parentTemplate->set('footer', $_htmlfooter);
		
        
    }
}