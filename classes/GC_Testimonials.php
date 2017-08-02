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

	    if (!Configuration::get('Title')){
	       $this->warning = $this->l('No name provided');
        }
	}

	public function install(){
        if (Shop::isFeatureActive())
        {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
        $parent_tab = new Tab();
        $parent_tab->name[$this->context->language->id] = $this->l('Testimonials tab');
        $parent_tab->class_name = 'Admintestimonials';
        $parent_tab->id_parent = 0; // Home tab
        $parent_tab->module = $this->name;
        $parent_tab->add();

        if (!parent::install()|| !$this->installDb()) 
        {
            return false;
        }
       
    }

    public  function installDb()

    {
        $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'testimonials` (
            `id_testimonials` int(11) NOT NULL AUTO_INCREMENT,
            `testimonials_name` varchar(50) NOT NULL,
            `testimonials_description` varchar(200) NOT NULL,
            `date_testimonials` date NOT NULL,
            PRIMARY KEY (`id_testimonials`))';
        return Db::getInstance()->execute($sql);
    }
     
	public function uninstall()
    {
        $tab = new Tab((int)Tab::getIdFromClassName('Admintestimonials'));
        $tab->delete();
	    if (!parent::uninstall()|| !$this->uninstallDb()){
	        return false;
        }
	    return true;
	}
    
     public function uninstallDb()
    {
        $sql = 'DROP TABLE '._DB_PREFIX_.'testimonials';
        Db::getInstance()->execute($sql);
        return true;
    }

    public function hookDisplayHome($params)
    {
        $this->context->smarty->assign(
            array(
              'my_module_link' => $this->context->link->getModuleLink('gc_testimonials', 'display'),
          )
      );

      return $this->display(_PS_MODULE_DIR_."gc_testimonials/gc_testimonials.php", 'testimonials.tpl');
    }
}
