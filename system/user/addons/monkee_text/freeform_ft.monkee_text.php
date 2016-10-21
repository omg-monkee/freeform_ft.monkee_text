<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monkee_text_freeform_ft extends Freeform_base_ft {
	public 	$info 	= array(
		'name' 			=> 'Monk-ee Text',
		'version' 		=> '3.0.0', //Modified Freeform Text 5.1.0
		'description' 		=> 'Modified version of the default Freeform Text fieldtype.'
	);

	public $default_length 	= '150';

	public $field_content_types 	= array(
		'any',
		'date',
		'decimal',
		'email',
		'emails',
		'integer',
		'ip',
		'number',
		'phone',
		'time12',
		'time24',
		'url',
		'usd',
		'zip',
	);
	
	public $javascript_events = array(
		'none',
		'onblur',
		'onchange',
		'onclick',
		'oncontextmenu',
		'ondblclick',
		'onfocus',
		'onfocusin',
		'onfocusout',
		'oninput',
		'oninvalid',
		'onkeydown',
		'onkeypress',
		'onkeyup',
		'onmousedown',
		'onmouseenter',
		'onmouseleave',
		'onmousemove',
		'onmouseover',
		'onmouseout',
		'onmouseup',
		'onreset',
		'onsearch',
		'onselect',
		'onsubmit'
	);


	// --------------------------------------------------------------------

	/**
	 * Constructor
	 *
	 * @access	public
	 * @return	null
	 */

	public function __construct () {
		parent::__construct();

		$this->info['name'] 		= lang('monktext_default_field_name');
		$this->info['description'] 	= lang('monktext_default_field_desc');
	}
	//END __construct


	// --------------------------------------------------------------------

	/**
	 * Display Entry in the CP
	 *
	 * formats data for cp entry
	 *
	 * @access	public
	 * @param 	string 	data from table for email output
	 * @return	string 	output data
	 */

	public function display_entry_cp ($data) {
		if (isset($this->settings['disallow_html_rendering']) AND
			$this->settings['disallow_html_rendering'] == 'n')
		{
			return ee()->functions->encode_ee_tags($data, TRUE);
		}
		else
		{
			return $this->form_prep_encode_ee($data);
		}
	}
	//END display_entry_cp


	// --------------------------------------------------------------------

	/**
	 * Replace Tag
	 *
	 * @access	public
	 * @param	string 	data
	 * @param 	array 	params from tag
 	 * @param 	string 	tagdata if there is a tag pair
	 * @return	string
	 */

	public function replace_tag ($data, $params = array(), $tagdata = FALSE)
	{
		if (isset($this->settings['disallow_html_rendering']) AND
			$this->settings['disallow_html_rendering'] == 'n')
		{
			return ee()->functions->encode_ee_tags($data, TRUE);
		}
		else
		{
			return $this->form_prep_encode_ee($data);
		}
	}
	//END replace_tag


	// --------------------------------------------------------------------

	/**
	 * Display Field
	 *
	 * @access	public
	 * @param	string 	saved data input
	 * @param  	array 	input params from tag
	 * @param 	array 	attribute params from tag
	 * @return	string 	display output
	 */

	public function display_field ($data = '', $params = array(), $attr = array())
	{
		$text_field = array();
		
		$maxlength = isset($this->settings['field_length']) ? $this->settings['field_length'] : $this->default_length;
		
		$text_field['name'] = $this->field_name;
		$text_field['id'] = 'freeform_' . $this->field_name;
		
		if ($data == '' and !isset($params['default_value'])) {
			$text_field['value'] = $this->settings['default_value'];
		} else {
			$text_field['value'] = $data;
		}
		
		$text_field['maxlength'] = $maxlength;
		if ($this->settings['field_title_text'] != '') { $text_field['title'] = $this->settings['field_title_text']; }
		if ($this->settings['placeholder'] != '') { $text_field['placeholder'] = $this->settings['placeholder']; }
		if ($this->settings['enable_autofocus'] == 'y') { $text_field['autofocus'] = ''; }
		
		if ($this->settings['css_content'] == "true" or $this->settings['css_name'] == "true" or $this->settings['css_type'] == "true" or $this->settings['css_custom'] != '') {
			$class = '';
			if ($this->settings['css_content'] == "true") {
				$class .= $this->settings['field_content_type']; 
			}
			if ($this->settings['css_name'] == "true") {
				if (isset($class) and $class != '') { $class .= ' '; }
				$class .= $this->field_name;
			}
			if ($this->settings['css_type'] == "true") {
				if (isset($class) and $class != '') { $class .= ' '; }
				$class .= lang('monktext_default_field_type'); 
			}
			if ($this->settings['css_custom']!= '') {
				if (isset($class) and $class != '') { $class .= ' '; }
				$class .= $this->settings['css_custom']; 
			}
			$text_field['class'] = $class;
		}
		
		if ($this->settings['custom_param_1'] != '') { $text_field[$this->settings['custom_param_1']] = $this->settings['custom_value_1']; }
		if ($this->settings['custom_param_2'] != '') { $text_field[$this->settings['custom_param_2']] = $this->settings['custom_value_2']; }
		if ($this->settings['custom_param_3'] != '') { $text_field[$this->settings['custom_param_3']] = $this->settings['custom_value_3']; }
		if ($this->settings['custom_param_4'] != '') { $text_field[$this->settings['custom_param_4']] = $this->settings['custom_value_4']; }
		if ($this->settings['custom_param_5'] != '') { $text_field[$this->settings['custom_param_5']] = $this->settings['custom_value_5']; }
		
		$output = form_input(array_merge($text_field, $attr));
		
		return $output;
	}
	//END display_field
	
	
	// --------------------------------------------------------------------

	/**
	 * Display Composer Field
	 *
	 * @access	public
	 * @param	string 	saved data input
	 * @param  	array 	input params from tag
	 * @param 	array 	attribute params from tag
	 * @return	string 	display output
	 */

	public function display_composer_field ($data = '', $params = array(), $attr = array())
	{
		return form_input(array_merge(array(
			'name'			=> $this->field_name,
			'id'			=> 'freeform_' . $this->field_name,
			'value'			=> $data,
			'maxlength'		=> isset($this->settings['field_length']) ?
								$this->settings['field_length'] :
								$this->default_length
		), $attr));$text_field = array();
	}
	//END display_composer_field



	// --------------------------------------------------------------------

	/**
	 * Display Field Settings
	 *
	 * @access	public
	 * @param	array
	 * @return	string
	 */

	public function display_settings ($data = array())
	{
		$sub_settings = array();

		$form_radios	= '';
		
		$content_type 	= isset($data['field_content_type']) ?
							$data['field_content_type'] :
							'any';
		
		//Field Content Type
		$choices = array();

		foreach ($this->field_content_types as $type)
		{
			$choices[$type] = $type;
		}
		
		$sub_settings['field_content_type'] = array(
			'title'		=> 'monktext_field_content_type',
			'desc'		=> 'monktext_field_content_type_desc',
			'attrs'		=> array('id' => 'field_content_type'),
			'fields'	=> array(
				'field_content_type'	=> array(
					'type'		=> 'inline_radio',
					'choices'	=> $choices,
					'value'		=> $content_type,
					'required'	=> true
				)
			)
		);
		
		//Field Length
		$sub_settings['field_length'] = array(
			'title'		=> 'monktext_field_length',
			'desc'		=> 'monktext_field_length_desc',
			'attrs'		=> array('id' => 'field_length'),
			'fields'	=> array(
				'field_length'	=> array(
					'type'		=> 'text',
					'value'		=> isset($data['field_length']) ?
								$data['field_length'] :
								$this->default_length,
					'required'	=> true
				)
			)
		);

		//Disallow HTML Rendering
		$disallow_html_rendering	= (
			empty($data['disallow_html_rendering']) OR
			! in_array($data['disallow_html_rendering'], array('y', 'n'))
		) ?
			'y' :
			$data['disallow_html_rendering'];

		$sub_settings['disallow_html_rendering'] = array(
			'title'		=> 'monktext_disallow_html_rendering',
			'desc'		=> 'monktext_disallow_html_rendering_desc',
			'attrs'		=> array('id' => 'disallow_html_rendering'),
			'fields'	=> array(
				'disallow_html_rendering'	=> array(
					'type'		=> 'yes_no',
					'default'	=> 'y',
					'value'		=> $disallow_html_rendering,
					'required'	=> true
				)
			)
		);
			
		//Placeholder
		$placeholder 		= ( ! isset($data['placeholder']) OR
						$data['placeholder'] == '') ?
						'' :
						$data['placeholder'];
						
		$sub_settings['placeholder'] = array(
			'title'		=> 'monktext_placeholder',
			'desc'		=> 'monktext_placeholder_desc',
			'attrs'		=> array('id' => 'placeholder'),
			'fields'	=> array(
				'placeholder'	=> array(
					'type'		=> 'text',
					'value'		=> $placeholder,
					'required'	=> false
				)
			)
		);
		
		//Default Value
		$default_value 		= ( ! isset($data['default_value']) OR
						$data['default_value'] == '') ?
						'' :
						$data['default_value'];
						
		$sub_settings['default_value'] = array(
			'title'		=> 'monktext_default_value',
			'desc'		=> 'monktext_default_value_desc',
			'attrs'		=> array('id' => 'default_value'),
			'fields'	=> array(
				'default_value'	=> array(
					'type'		=> 'text',
					'value'		=> $default_value,
					'required'	=> false
				)
			)
		);
		
		//Autofocus
		$enable_autofocus 		= ( ! isset($data['enable_autofocus']) OR
						$data['enable_autofocus'] == '') ?
							'n' :
							$data['enable_autofocus'];
							
		$sub_settings['enable_autofocus '] = array(
			'title'		=> 'monktext_enable_autofocus',
			'desc'		=> 'monktext_enable_autofocus_desc',
			'attrs'		=> array('id' => 'enable_autofocus'),
			'fields'	=> array(
				'enable_autofocus'	=> array(
					'type'		=> 'yes_no',
					'default'	=> 'n',
					'value'		=> $enable_autofocus,
					'required'	=> false
				)
			)
		);
		
		//Title Field
		$title_value 		= ( ! isset($data['field_title']) OR
						$data['field_title'] == '') ? 'field_desc' : $data['field_title'];
						
		$title_custom_value 		= ( ! isset($data['field_title_text']) OR
						$data['field_title_text'] == '' OR $title_value != 'field_custom') ?
						'' :
						$data['field_title_text'];
						
		$title_choices = array(
			'none' => 'monktext_field_none',
			'field_label' => 'monktext_field_label',
			'field_desc' => 'monktext_field_desc',
			'field_custom' => 'monktext_field_custom'
		);
		
		$sub_settings['field_title'] = array(
			'title'		=> 'monktext_field_title',
			'desc'		=> 'monktext_field_title_desc',
			'attrs'		=> array('id' => 'field_title'),
			'fields'	=> array(
				'field_title'	=> array(
					'type'		=> 'inline_radio',
					'choices'	=> $title_choices,
					'value'		=> $title_value,
					'required'	=> false
				),
				'field_title_custom'	=> array(
					'type'		=> 'text',
					'value'		=> $title_custom_value,
					'required'	=> false,
					'placeholder'	=> lang('monktext_field_title_custom')
				)
			)
		);
		
		//CSS Class
		$css_content 		= ( ! isset($data['css_content']) OR
						$data['css_content'] == '') ?
							'false' :
							$data['css_content'];
							
		$css_name 		= ( ! isset($data['css_name']) OR
						$data['css_name'] == '') ?
							'false' :
							$data['css_name'];
							
		$css_type 		= ( ! isset($data['css_type']) OR
						$data['css_type'] == '') ?
							'false' :
							$data['css_type'];
							
		$css_custom 		= ( ! isset($data['css_custom']) OR
						$data['css_custom'] == '') ?
						'' :
						$data['css_custom'];
		
		$sub_settings['css_classes'] = array(
			'title'		=> 'monktext_css_classes',
			'desc'		=> 'monktext_css_classes_desc',
			'attrs'		=> array('id' => 'css_classes'),
			'fields'	=> array(
				'css_content'	=> array(
					'type'		=> 'checkbox',
					'choices'	=> array('true' => lang('monktext_css_content')),
					'value'		=> $css_content,
					'required'	=> false
				),
				'css_name'	=> array(
					'type'		=> 'checkbox',
					'choices'	=> array('true' => lang('monktext_css_name')),
					'value'		=> $css_name,
					'required'	=> false
				),
				'css_type'	=> array(
					'type'		=> 'checkbox',
					'choices'	=> array('true' => lang('monktext_css_type')),
					'value'		=> $css_type,
					'required'	=> false
				),
				'css_custom'	=> array(
					'type'		=> 'text',
					'value'		=> $css_custom,
					'required'	=> false,
					'placeholder'	=> lang('monktext_css_custom')
				)
			)
		);
		
		//custom parameters
		$custom_param_1		= ( ! isset($data['custom_param_1']) OR
						$data['custom_param_1'] == '') ?
							'' :
							$data['custom_param_1'];
							
		$custom_value_1		= ( ! isset($data['custom_value_1']) OR
						$data['custom_value_1'] == '') ?
							'' :
							$data['custom_value_1'];					
							
		$custom_param_2		= ( ! isset($data['custom_param_2']) OR
						$data['custom_param_2'] == '') ?
							'' :
							$data['custom_param_2'];
		
		$custom_value_2		= ( ! isset($data['custom_value_2']) OR
						$data['custom_value_2'] == '') ?
							'' :
							$data['custom_value_2'];
												
		$custom_param_3		= ( ! isset($data['custom_param_3']) OR
						$data['custom_param_3'] == '') ?
							'' :
							$data['custom_param_3'];
		
		$custom_value_3		= ( ! isset($data['custom_value_3']) OR
						$data['custom_value_3'] == '') ?
							'' :
							$data['custom_value_3'];
												
		$custom_param_4		= ( ! isset($data['custom_param_4']) OR
						$data['custom_param_4'] == '') ?
							'' :
							$data['custom_param_4'];
		
		$custom_value_4		= ( ! isset($data['custom_value_4']) OR
						$data['custom_value_4'] == '') ?
							'' :
							$data['custom_value_4'];
												
		$custom_param_5		= ( ! isset($data['custom_param_5']) OR
						$data['custom_param_5'] == '') ?
							'' :
							$data['custom_param_5'];					
		
		$custom_value_5		= ( ! isset($data['custom_value_5']) OR
						$data['custom_value_5'] == '') ?
							'' :
							$data['custom_value_5'];					
		
		$sub_settings['custom_params_1'] = array(
			'title'		=> 'monktext_custom_param_1',
			'desc'		=> 'monktext_custom_params_desc',
			'attrs'		=> array('id' => 'custom_params_1'),
			'caution'	=> true,
			'fields'	=> array(
				'custom_param_1'	=> array(
					'type'		=> 'text',
					'value'		=> $custom_param_1,
					'required'	=> false,
					'placeholder'	=> lang('monktext_custom_place')
				),
				'custom_value_1'	=> array(
					'type'		=> 'text',
					'value'		=> $custom_value_1,
					'required'	=> false,
					'placeholder'	=> lang('monktext_custom_value')
				)
			)
		);
		
		$sub_settings['custom_params_2'] = array(
			'title'		=> 'monktext_custom_param_2',
			'desc'		=> 'monktext_custom_params_desc',
			'attrs'		=> array('id' => 'custom_params_2'),
			'caution'	=> true,
			'fields'	=> array(
				'custom_param_2'	=> array(
					'type'		=> 'text',
					'value'		=> $custom_param_2,
					'required'	=> false,
					'placeholder'	=> lang('monktext_custom_place')
				),
				'custom_value_2'	=> array(
					'type'		=> 'text',
					'value'		=> $custom_value_2,
					'required'	=> false,
					'placeholder'	=> lang('monktext_custom_value')
				)
			)
		);
		
		$sub_settings['custom_params_3'] = array(
			'title'		=> 'monktext_custom_param_3',
			'desc'		=> 'monktext_custom_params_desc',
			'attrs'		=> array('id' => 'custom_params_3'),
			'caution'	=> true,
			'fields'	=> array(
				'custom_param_3'	=> array(
					'type'		=> 'text',
					'value'		=> $custom_param_3,
					'required'	=> false,
					'placeholder'	=> lang('monktext_custom_place')
				),
				'custom_value_3'	=> array(
					'type'		=> 'text',
					'value'		=> $custom_value_3,
					'required'	=> false,
					'placeholder'	=> lang('monktext_custom_value')
				)
			)
		);
		
		$sub_settings['custom_params_4'] = array(
			'title'		=> 'monktext_custom_param_4',
			'desc'		=> 'monktext_custom_params_desc',
			'attrs'		=> array('id' => 'custom_params_4'),
			'caution'	=> true,
			'fields'	=> array(
				'custom_param_4'	=> array(
					'type'		=> 'text',
					'value'		=> $custom_param_4,
					'required'	=> false,
					'placeholder'	=> lang('monktext_custom_place')
				),
				'custom_value_4'	=> array(
					'type'		=> 'text',
					'value'		=> $custom_value_4,
					'required'	=> false,
					'placeholder'	=> lang('monktext_custom_value')
				)
			)
		);
		
		$sub_settings['custom_params_5'] = array(
			'title'		=> 'monktext_custom_param_5',
			'desc'		=> 'monktext_custom_params_desc',
			'attrs'		=> array('id' => 'custom_params_5'),
			'caution'	=> true,
			'fields'	=> array(
				'custom_param_5'	=> array(
					'type'		=> 'text',
					'value'		=> $custom_param_5,
					'required'	=> false,
					'placeholder'	=> lang('monktext_custom_place')
				),
				'custom_value_5'	=> array(
					'type'		=> 'text',
					'value'		=> $custom_value_5,
					'required'	=> false,
					'placeholder'	=> lang('monktext_custom_value')
				)
			)
		);
		
		//Return
		$settings = array(
			$this->field_name => array(
				'label'		=> $this->info['name'],
				'group'		=> $this->field_name,
				'settings'	=> $sub_settings
			)
		);

		return $settings;
	}
	//END display_settings


	// --------------------------------------------------------------------

	/**
	 * Save Field Settings
	 *
	 * @access	public
	 * @return	string
	 */

	public function save_settings ($data = array())
	{
		//max field length
		$field_length 	= ee()->input->get_post('field_length');

		$field_length 	= (
			is_numeric($field_length) AND
			$field_length > 0 AND
			$field_length < 9999
		) ?	$field_length : $this->default_length;

		//field content type. only valid if in the list
		$field_content_type = ee()->input->get_post('field_content_type');
		$field_content_type = in_array(
			$field_content_type,
			$this->field_content_types) ?
				$field_content_type :
				'any';
				
		$field_title = ee()->input->get_post('field_title');
		if ($field_title == 'field_label') {
			$title = ee()->input->get_post('field_label'); 
		} else if ($field_title == 'field_desc') {
			$title = ee()->input->get_post('field_description'); 
		} else if ($field_title == 'field_custom') {
			$title = ee()->input->get_post('field_title_custom');
		} else {
			$title = '';
		}

		return array(
			'field_length' 			=> $field_length,
			'field_content_type'	=> $field_content_type,
			'disallow_html_rendering'	=> (
				ee()->input->get_post('disallow_html_rendering') == 'n' ? 'n' : 'y'
			),
			'placeholder' => ee()->input->get_post('placeholder'),
			'default_value' => ee()->input->get_post('default_value'),
			'enable_autofocus'	=> (ee()->input->get_post('enable_autofocus') == 'n' ? 'n' : 'y'
			),
			'field_title' => ee()->input->get_post('field_title'),
			'field_title_text' => $title,
			'css_content'	=> (ee()->input->get_post('css_content') == '' ? 'false' : 'true'
			),
			'css_name'	=> (ee()->input->get_post('css_name') == '' ? 'false' : 'true'
			),
			'css_type'	=> (ee()->input->get_post('css_type') == '' ? 'false' : 'true'
			),
			'css_custom' => ee()->input->get_post('css_custom'),
			'custom_param_1' => ee()->input->get_post('custom_param_1'),
			'custom_value_1' => ee()->input->get_post('custom_value_1'),
			'custom_param_2' => ee()->input->get_post('custom_param_2'),
			'custom_value_2' => ee()->input->get_post('custom_value_2'),
			'custom_param_3' => ee()->input->get_post('custom_param_3'),
			'custom_value_3' => ee()->input->get_post('custom_value_3'),
			'custom_param_4' => ee()->input->get_post('custom_param_4'),
			'custom_value_4' => ee()->input->get_post('custom_value_4'),
			'custom_param_5' => ee()->input->get_post('custom_param_5'),
			'custom_value_5' => ee()->input->get_post('custom_value_5')
		);
	}
	//END save_settings


	// --------------------------------------------------------------------

	/**
	 * validate
	 *
	 * @access	public
	 * @param	string $data 	data to validate
	 * @return	bool  			validated?
	 */

	public function validate ($data)
	{
		if (is_array($data))
		{
			$data = implode("\n", $data);
		}

		$data = trim((string) $data);

		// -------------------------------------
		//	check field length
		// -------------------------------------

		if (isset($this->settings['field_length']) AND
			strlen($data) > $this->settings['field_length'])
		{
			$this->errors[] = str_replace(
				'%num%',
				$this->settings['field_length'],
				lang('monktext_max_length_exceeded')
			);

			return $this->errors;
		}

		// -------------------------------------
		//	is the data worth futher checking?
		// -------------------------------------

		if ($data == '' OR
			! isset($this->settings['field_content_type']) OR
			$this->settings['field_content_type'] == 'any')
		{
			return TRUE;
		}

		//validate individually

		$content_type = $this->settings['field_content_type'];

		//lets only validate how we can
		if (in_array($content_type, $this->field_content_types))
		{
			if ($content_type == 'decimal')
			{
				if ( ! preg_match( '/^[\-+]?[0-9]*\.?[0-9]+$/', $data))
				{
					return lang('monktext_not_a_decimal');
				}

				// Check if number exceeds mysql limits
				/*if ($data >= 999999.9999)
				{
					$this->errors[] = lang('monktext_number_exceeds_limit');
					return FALSE;
				}*/
			}
			else if ($content_type == 'integer')
			{
				//if (($data < -2147483648) OR ($data > 2147483647))
				if ( ! preg_match( '/^[\-+]?[0-9]+$/', $data))
				{
					return lang('monktext_not_an_integer');
				}
			}
			else if ($content_type == 'number')
			{
				if ( ! is_numeric($data))
				{
					return lang('monktext_not_a_number');
				}
			}
			else if ($content_type == 'email')
			{
				ee()->load->helper('email');

				if ( ! valid_email($data))
				{
					return lang('monktext_not_valid_email');
				}
			}
			else if ($content_type == 'emails')
			{
				if ( ! ee()->form_validation->valid_emails($data))
				{
					return lang('monktext_not_valid_emails');
				}
			}
			else if ($content_type == 'url')
			{
				if ( ! preg_match( '/^((https?|ftp)\:\/\/)?([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?([a-z0-9-.]*)\.([a-z]{2,3})(\:[0-9]{2,5})?(\/([a-z0-9+\$_-]\.?)+)*\/?(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?(#[a-z_.-][a-z0-9+\$_.-]*)?/', $data))
				{
					return lang('monktext_not_a_url');
				}
			}
			else if ($content_type == 'phone') {
				if ( ! preg_match( '/^(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})'.'(?:(?<=\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})'.'[. -]?(\d{4})(?: (?i:ext)\.? ?(\d{1,5}))?$/', $data))
				{
					return lang('monktext_not_a_phone');
				}
			}
			else if ($content_type == 'usd')
			{
				if ( ! preg_match( '/^\$?((\d{1,3}(,\d{3})*)|\d+)(\.(\d{2})?)?$/', $data))
				{
					return lang('monktext_not_a_usd');
				}
			}
			else if ($content_type == "zip")
			{
				if ( ! preg_match( '/^[0-9]{5,5}([- ]?[0-9]{4,4})?$/', $data))
				{
					return lang('monktext_not_a_zip');
				}
			}
			else if ($content_type == "ip")
			{
				if ( ! preg_match( '/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])'.'(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/', $data))
				{
					return lang('monktext_not_an_ip');
				}
			}
			else if ($content_type == "time12") {
				if ( ! preg_match( '/^((0?\d)|(1[012])):[0-5]\d?\s?[aApP]\.?[mM]\.?$/', $data))
				{
					return lang('monktext_not_a_time12');
				}
			}
			else if ($content_type == "time24") {
				if ( ! preg_match( '/^(20|21|22|23|[01]\d|\d)(([:][0-5]\d){1,2})$/', $data))
				{
					return lang('monktext_not_a_time24');
				}
			}
			else if ($content_type == "date") {
				if ( ! preg_match( '/^((0?\d)|(1[012]))[\/-]([012]?\d|30|31)[\/-]\d{1,4}$/', $data))
				{
					return lang('monktext_not_a_date');
				}
			}
		}

		return TRUE;
	}
	//END validate
}
//END class Monkee_text_freeform_ft
