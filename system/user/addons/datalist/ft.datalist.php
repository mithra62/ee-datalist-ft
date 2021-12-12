<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once SYSPATH . 'ee/legacy/fieldtypes/OptionFieldtype.php';

class Datalist_ft extends OptionFieldtype
{
    /**
     * @var string[]
     */
    public $info = [
        'name'      => 'DataList',
        'version'   => '0.0.1',
    ];

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

    /**
     * Sets up the Settings for the specific Field implementation
     * @param $data
     * @return array[]
     */
    public function display_settings($data)
    {
        $settings = $this->getSettingsForm(
            'datalist',
            $data,
            'datalist_options',
            lang('options_field_desc') . lang('datalist_options_desc')
        );

        return ['field_options_datalist' => [
                'label' => 'field_options',
                'group' => 'datalist',
                'settings' => $settings
            ]
        ];
    }

    public function display_field($data)
    {
        $defaults = ['list' => '__'.$this->field_name, 'name' => $this->field_name, 'value' => $data];
        $input = "<input " . _parse_form_attributes($defaults, []) . " />";
        $options = $this->_get_field_options($data);
        if(is_array($options)) {
            $input .= '<datalist id="__'.$this->field_name.'">';
            foreach($options AS $key => $value) {
                $input .= '<option value="'.$key.'">';
            }
            $input .= '</datalist>';
        }

        return $input;
    }

    public function grid_display_field($data)
    {
        return $this->display_field($data);
    }

    public function replace_tag($data, $params = [], $tagdata = false)
    {
        return 'Magic!';
    }

    function form_datalist($name = '', $options = [], $selected = [], $extra = '', $form_prep = true)
    {
        $defaults = ['list' => '__'.$name, 'name' => $name, 'value' => $selected];
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
