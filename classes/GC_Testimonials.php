<?php
class GC_Testimonials extends Module{
	public function __construct(){
	    $this->name = $this->l('gc_testimonials');
	    $this->tab = 'front_office_features';
	    $this->version = '1.0.0';
	    $this->author = 'Guillaume Chausse \'THE BEST\'';
	    $this->need_instance = 0;
	    $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
	    $this->bootstrap = true;

	    parent::__construct();

	    $this->displayName = $this->l('gc_testimonials');
	    $this->description = $this->l('module qui ne sert pas a grand chose');

	    $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

	    if (!Configuration::get('Title'))
	       $this->warning = $this->l('No name provided');
	}

	public function install(){
        if (Shop::isFeatureActive()){
        Shop::setContext(Shop::CONTEXT_ALL);
        }
        $parent_tab = new Tab();
        $parent_tab->name[$this->context->language->id] = $this->l('Testimonials tab');
        $parent_tab->class_name = 'Admintestimonials';
        $parent_tab->id_parent = 0; // Home tab
        $parent_tab->module = $this->name;
        $parent_tab->add();

        if (!parent::install()
            || !$this->registerHook('admingc')
            || !$this->registerHook('home')
            || !$this->registerHook('header')
            || !Configuration::updateValue('GC_TESTIMONIALSMODULE_NAME', 'world')
        ) {
        return false;
       }
       
    }

    public function hookadmingc(){        
        $this->smarty->assign(array(
           'ciao' => 'hola'
       ));
       return $this->display(__FILE__, 'Admin.tpl');
    }
     
	public function uninstall(){
        $tab = new Tab((int)Tab::getIdFromClassName('Admintestimonials'));
        $tab->delete();
	  if (!parent::uninstall()
        || !Configuration::deleteByName('testimonials_NAME')

      )
	    return false;
	    return true;
	}

    
   
}
?>