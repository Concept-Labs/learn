<?php
Class Controller_User Extends Controller_Base 
{
    protected function _initTemplate($title)
    {
        //єто файл templates/index.phtml
        return parent::_initTemplate($title);
    }

    public function index() 
    {
        $template = $this->_initTemplate('Користувач');
        
        $template->set("data", "Вход", false);
        $template->setFile('templates/user.phtml');
        
        $this->_renderLayout($template);
    }

	public function login() 
    {
        $template = $this->_initTemplate('Вход');
        
        
        $template->setFile('templates/user/login.phtml');
        
        $this->_renderLayout($template);
    }

	public function registration() 
    {
        $template = $this->_initTemplate('Регистрация');
        
       
        $template->setFile('templates/user/registration.phtml');
        
        $this->_renderLayout($template);
    }
}