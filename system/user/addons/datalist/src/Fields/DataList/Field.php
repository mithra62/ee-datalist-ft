<?php
namespace Mithra62\DataList\Fields\DataList;

class Field
{
    /**
     * The name for the field
     * @var string
     */
    protected $name = '';

    /**
     * The options for the datalist
     * @var array
     */
    protected $options = [];

    /**
     * The value to use for the field
     * @var string
     */
    protected $value = '';

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the ID used in the "list" input paraam to relate
     * @return string
     */
    public function getListName()
    {
        return '__'.$this->getName();
    }

    /**
     * @param $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string[]
     */
    public function getInputParams()
    {
        return [
            'list' => $this->getListName(),
            'name' => $this->getName(),
            'id' => $this->getName(),
            'value' => $this->getValue()
        ];
    }

    /**
     * @return string
     */
    public function getInputField()
    {
        return "<input type='text' " . _parse_form_attributes($this->getInputParams(), []) . " />";
    }

    /**
     * @return string
     */
    public function getDataListOptions()
    {
        $input = '';
        if($this->getOptions()) {
            $input .= '<datalist id="'.$this->getListName().'">';
            foreach($this->getOptions() AS $key => $value) {
                $input .= '<option value="'.$key.'">';
            }
            $input .= '</datalist>';
        }

        return $input;
    }

    /**
     * @return string
     */
    public function generate()
    {
        return $this->getInputField().$this->getDataListOptions();
    }
}