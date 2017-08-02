<?php
class AdminTestimonialsController extends ModuleAdminController
{
	public $module;
	public function __construct()
	{
		$this->table = 'testimonials';
		$this->className = 'TestimonialsPost';
		$this->lang = false;
        $this->deleted = false;
		$this->bootstrap = true;
        $this->colorOnBackground = false;
        $this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
		$this->context = Context::getContext();
	    $this->fields_list = array(
				'testimonials_name' => array(
					'title' => $this->l('title'),
					'width' => 250,
					'height'=> 150,
					'type' => 'text',
				),
				'testimonials_description' => array(
					'title' => $this->l('content'),
					'width' => 250,
					'type' => 'textarea',
				),
				'date_testimonials' => array(
					'title' => $this->l('date'),
					'width' => 340,
					'height'=> 150,
					'type' => 'date',
				),

			);
		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Editer post'),
			),
			'input' => array(
				array(
				'label'=> 'titre',
				'type' => 'text',
				'name' => 'testimonials_name',

				),
				array(
				'label'=> 'Contenu',
				'type' => 'textarea',
				'name' => 'testimonials_description',

				),
				array(
				'type' => 'date',
				'name' => 'date_testimonials',

				),
			),
			'submit' => array(
				'title' => $this->l('Save'),
				'class' => 'btn btn-default pull-right'
			)

			);
		parent::__construct();
    }
}
