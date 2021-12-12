<?php

require_once SYSPATH . 'ee/legacy/fieldtypes/OptionFieldtype.php';
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Datalist_ft extends OptionFieldtype
{
    public $has_array_data = true;

    public $size = 'small';

    public $info = array(
        'name'      => 'DataList',
        'version'   => '0.0.1',
    );

    public function install()
    {
        return [];
    }

    public function display_global_settings()
    {
        $val = array_merge($this->settings, $_POST);

        $form = '';

        return $form;
    }

    public function save_global_settings()
    {
        return array_merge($this->settings, $_POST);
    }

    public function display_settings($data)
    {
        $settings = $this->getSettingsForm(
            'datalist',
            $data,
            'select_options',
            lang('options_field_desc') . lang('select_options_desc')
        );

        return array('field_options_datalist' => array(
            'label' => 'field_options',
            'group' => 'datalist',
            'settings' => $settings
        ));
    }

    public function save_settings($data)
    {
        return [];
    }

    public function display_field($data)
    {
        return form_input(array(
            'name'  => $this->field_name,
            'id'    => $this->field_id,
            'value' => $data
        ));
    }

    public function grid_display_field($data)
    {
        return $this->display_field($data);
    }

    public function replace_tag($data, $params = array(), $tagdata = false)
    {
        return 'Magic!';
    }

    function form_datalist($name = '', $options = array(), $selected = array(), $extra = '', $form_prep = true)
    {
        $defaults = array('list' => '__'.$name, 'name' => $name, 'value' => $selected);
        $input = "<input " . _parse_form_attributes($defaults) . $extra . " />";
    }

    /**
     * Accept all content types.
     *
     * @param string  The name of the content type
     * @return bool   Accepts all content types
     */
    public function accepts_content_type($name)
    {
        return true;
    }

    /**
     * Update the fieldtype
     *
     * @param string $version The version being updated to
     * @return boolean TRUE if successful, FALSE otherwise
     */
    public function update($version)
    {
        return true;
    }
}
