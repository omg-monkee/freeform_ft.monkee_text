<?php

/**
 * Monk-ee Text - Language
 */

$lang = array(
//Field Info
'monktext_default_field_name' => "Monk-ee Text",
'monktext_default_field_desc' => "Modified version of the default Freeform Text fieldtype.",
'monktext_default_field_type' => "monkee_text",

//Settings
'monktext_field_content_type' => "Field Content Type",
'monktext_field_content_type_desc' => "Allows you to set a validation type for this text area. NOTE: Email validates only a single email address, Emails will validate one or multiple, comma-separated emails.",
'monktext_field_length' => "Field Length",
'monktext_field_length_desc' => "Maximum length of inputed data.",
'monktext_disallow_html_rendering' => "Prevent User HTML Rendering",
'monktext_disallow_html_rendering_desc' => "By default, HTML tags will be encoded so that they will not render on output. This prevents users from inputting HTML and showing images or their own custom output on your pages.",
'monktext_placeholder' => "Placeholder",
'monktext_placeholder_desc' => "The value in this field will be inserted into the text box as temporary, placeholder text. Can be used as a way to label the field or provide instructions on the type of data or format expected.",
'monktext_default_value' => "Default Value",
'monktext_default_value_desc' => "If form data is not being edited, this will be the default entry value in the text field. NOTE: Setting the inline 'default_value' parameter will override these settings.",
'monktext_enable_autofocus' => "Enable Autofocus",
'monktext_enable_autofocus_desc' => "Field will automatically be selected on page load. If multiple fields on a form have this property enabled, the field loaded first will claim control.",
'monktext_enable' => "Enable",
'monktext_field_title' => "Populate Title Parameter",
'monktext_field_title_desc' => "Select if and how you want to populate the title field in the input tag. This is useful for displaying tooltips. NOTE: Setting the inline 'attr:title' parameter will override these settings.",
'monktext_field_none' => "None",
'monktext_field_label' => "Field Label",
'monktext_field_desc' => "Field Description",
'monktext_field_custom' => "Custom",
'monktext_field_title_custom' => "Enter custom title here",
'monktext_css_classes' => "CSS Classes",
'monktext_css_classes_desc' => "Output as many classes as you like. The checkboxes will add dynamic information as classes. Enter any custom classes in the text box. NOTE: Setting the inline 'attr:class' parameter will override these settings. For Field Content Type, Any -> any, Date -> date, Decimal -> decimal, Email -> email, Integer -> integer, IP Address -> ip, Number -> number, Phone -> phone, Time (12-hour) -> time12, Time (24-hour) -> time24, URL -> url, US Dollar Amount -> usd, Zip Code -> zip. Field Name pulls from the Field Name value shown above. Freeform Field Type will output 'monkee_text'",
'monktext_css_content' => "Field Content Type",
'monktext_css_name' => "Field Name",
'monktext_css_type' => "Freeform Field Type",
'monktext_css_custom' => "Enter custom css styles here",
'monktext_custom_param_1' => "Custom Parameter 1",
'monktext_custom_param_2' => "Custom Parameter 2",
'monktext_custom_param_3' => "Custom Parameter 3",
'monktext_custom_param_4' => "Custom Parameter 4",
'monktext_custom_param_5' => "Custom Parameter 5",
'monktext_custom_params_desc' => "Enter a custom parameter and value here. Value is not required. These will be added to the field tag.",
'monktext_custom_place' => "Parameter",
'monktext_custom_value' => "Value",
'monktext_js_event' => "Custom Javascript/jQuery Event",
'monktext_js_event_desc' => "For advanced users only. Select a javascript event from the dropdown box. Then, in the textbox, enter the javascript (or jQuery) you would like to attach to this event. <b>PLEASE NOTE: Because of the way Freeform handles field entry on this page, you must escape parentheses with a backslash. Failing to do this will result in this form not saving. Also, DO NOT USE DOUBLE QUOTES, only single quotes. Ex: alert&#92;('test'&#92;);.</b> <a href='http://www.w3schools.com/jsref/dom_obj_event.asp' target='_blank'>Click here to view a list of javascript events and descriptions.</a> NOTE: Setting the inline 'attr:onclick' parameter will override an onclick action setup here.",
'monktext_js_action' => "Enter JavaScript/jQuery action here",
'monktext_js_confirm' => "I confirm that I am an advanced user and have read the instructions.",
'monktext_jquery_date' => "Enable jQuery Datepicker",
'monktext_jquery_date_desc' => "Only for fields with Date or Any content type selected. This will enable this field as a jQuery UI Datepicker field. This requires that jQuery and jQuery UI scripts and stylesheet have already been called on the form page.",

//Content Types
'integer' => "Integer",
'decimal' => "Decimal",
'number' => "Number",
'email' => "Email",
'emails' => "Emails",
'any' => "Any",
'zip' => "Zip Code",
'phone' => "Phone",
'url' => "URL",
'usd' => "US Dollar Amount",
'ip' => "IP Address",
'time12' => "Time (12-hour)",
'time24' => "Time (24-hour)",
'date' => "Date",

//Errors
'monktext_max_length_exceeded' => "Maximum field length of %num% exceeded.",
'monktext_not_a_decimal' => "Not a decimal",
'monktext_not_a_number' => "Not a number",
'monktext_not_an_integer' => "Not an integer",
'monktext_not_valid_email' => "Not a valid email",
'monktext_not_valid_emails' => "Not a valid email or emails",
'monktext_not_a_url' => "Not a valid URL or Website Address",
'monktext_not_a_phone' => "Not a valid US Phone Number",
'monktext_not_a_usd' => "Not a valid US dollar amount",
'monktext_not_a_zip' => "Not a valid Zip Code",
'monktext_not_an_ip' => "Not a valid IP Address",
'monktext_not_a_time12' => "Not a valid 12-hour time format",
'monktext_not_a_time24' => "Not a valid 24-hour time format",
'monktext_not_a_date' => "Not a valid date format",

//END
'' => ''
);
