<?php
class GC_TestimonialsdisplayModuleFrontController extends ModuleFrontController
{

  public function initContent()
  {
    parent::initContent();
    
    $this->context->smarty->assign(
            array(
              'testimonials' => $this->getTestimonials(),
              'testimonials_link' => $this->context->link->getModuleLink('gc_testimonials', 'detail'),
          )
      );
    $this->setTemplate('display.tpl');
  }
  public function getTestimonials()
  {
    $sql = new DbQuery();
    $sql->select('*');
    $sql->from('testimonials');
    $testimonials = Db::getInstance()->executeS($sql);
    return $testimonials;
  }

}
?>