<?php
Abstract Class Controller_Base 
{
    protected $registry;
    function __construct($registry) 
    {
        $this->registry = $registry;
    }

    abstract function index();

    protected function _initTemplate()
    {
        $parentTemplate = $this->registry->get('template');
        return clone $this->registry->get('template');
    }

    protected function _renderLayout($template)
    {
        $html = $template->toHtml();
        $parentTemplate = $this->registry->get('template');
        $parentTemplate->set('content', $html);
    }
}