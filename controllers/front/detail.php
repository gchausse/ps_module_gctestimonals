<?php
class GC_TestimonialsDetailModuleFrontController extends ModuleFrontController
{
  public function initContent()
  {
    $id = Tools::getValue('id');
    $sql = new DbQuery();
    $sql->select('*');
    $sql->from('testimonials');
    $sql->where('id_testimonials='.$id);
    $testimonial = Db::getInstance()->executeS($sql);
    
    $this->context->smarty->assign(
            array(
              'testimonial' => $testimonial,
          )
      );
    parent::initContent();
    $this->setTemplate('detail.tpl');
  }
    

}
?>