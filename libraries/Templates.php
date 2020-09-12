<?php
/**
* CodeIgniter framework package
*
* How to use this Libraries
* You have to create a templates folder in the Views folder, and also the Layouts folder in the Templates folder
*
* @copyright	Copyright (c) 2021 - 2022, RandsX.
* @copyright	Copyright (c) 2019 - 2022, 22XploiterCrew (https://22xploitercrew.com)
* @license		https://opensource.org/licenses/MIT
*/
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Template class
*
* @package		22XploiterCrew
* @subpackage	Libraries
* @category		Templating
* @author		RandsX
*/
class Template {
	/**
	* Directory views
	*
	* @var string
	*/
	protected $views = APPPATH . 'views';

	/**
	* Layouts the templates
	*
	* @var array
	*/
	protected $layouts = array();

	/**
	* Data file
	*
	* @var string
	*/
	protected $data;

	// --------------------------------------------------------------------

	/**
	* Set the template layouts
	*
	* @param string
	* @param string
	*
	* @return layouts
	**/
	private function setLayouts($name, $value) {
		$this->layouts[$name] = $value;
	}

	// --------------------------------------------------------------------

	/**
	* Replace the filename layouts
	*
	* @params string
	*/
	private function replace($file) {
		$this->data = str_replace('.php', '', $file);
	}

	// --------------------------------------------------------------------

	/**
	* Get the file layouts
	*/
	protected function scan() {
		$scan = scandir($this->views.'/templates/layouts');
		$scan = array_diff($scan, array('.', '..'));
		return $scan;
	}

	// --------------------------------------------------------------------

	/**
	* Render the templates views
	*
	* @params string
	* @params string
	* @params string
	*/
	public function view($template, $page, $data = array()) {
		foreach ($this->scan() as $value) {
			$this->replace($value);
			$this->setLayouts($this->data, $this->load->view('templates/layouts/'.$this->data, $data, true));
		}
		// Setting the content page
		$this->setLayouts('content', $this->load->view('pages/'.$page, $data, true));
		$render = $this->load->view('templates/'.$template, $this->layouts, false);

		return $render;
	}
}