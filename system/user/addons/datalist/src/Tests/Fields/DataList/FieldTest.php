<?php
namespace Mithra62\DataList\Tests\DataList;

use PHPUnit\Framework\TestCase;
use Mithra62\DataList\Fields\DataList\Field;
use DOMDocument;
use DOMElement;

class FieldTest extends TestCase
{
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Mithra62\DataList\Fields\DataList\Field'));;
    }

    public function testNamePropertyExists()
    {
        $this->assertClassHasAttribute('name', Field::class);
    }

    public function testOptionsPropertyExists()
    {
        $this->assertClassHasAttribute('options', Field::class);
    }

    public function testValuePropertyExists()
    {
        $this->assertClassHasAttribute('value', Field::class);
    }

    /**
     * @return Field
     */
    public function testNamePropertyDefaultValue(): Field
    {
        $field = new Field();
        $this->assertTrue($field->getName() === '');
        return $field;
    }

    /**
     * @depends testNamePropertyDefaultValue
     * @param $field
     * @return Field
     */
    public function testSetNameReturnInstance(Field $field): Field
    {
        $this->assertInstanceOf(Field::class, $field->setName('foo'));
        return $field;
    }

    /**
     * @depends testNamePropertyDefaultValue
     * @param Field $field
     * @return Field
     */
    public function testGetListNameReturnValue(Field $field): Field
    {
        $field->setName('foo');
        $this->assertEquals('__foo', $field->getListName());
        return $field;
    }

    /**
     * @depends testGetListNameReturnValue
     * @param Field $field
     * @return Field
     */
    public function testOptionsReturnDefaultValue(Field $field): Field
    {
        $this->assertTrue($field->getOptions() === []);
        return $field;
    }

    /**
     * @depends testOptionsReturnDefaultValue
     * @param Field $field
     * @return Field
     */
    public function testSetOptionsReturnInstance(Field $field): Field
    {
        $this->assertInstanceOf(Field::class, $field->setOptions([]));
        return $field;
    }

    /**
     * @depends testSetOptionsReturnInstance
     * @param Field $field
     * @return Field
     */
    public function testValueReturnDefaultValue(Field $field): Field
    {
        $this->assertTrue($field->getValue() === '');
        return $field;
    }

    /**
     * @depends testValueReturnDefaultValue
     * @param Field $field
     * @return Field
     */
    public function testGetInputParamCount(Field $field): Field
    {
        $this->assertCount(4, $field->getInputParams());
        return $field;
    }

    /**
     * @depends testGetInputParamCount
     * @param Field $field
     * @return Field
     */
    public function testGetInputParamHasListKey(Field $field): Field
    {
        $this->assertArrayHasKey('list', $field->getInputParams());
        return $field;
    }

    /**
     * @depends testGetInputParamHasListKey
     * @param Field $field
     * @return Field
     */
    public function testGetInputParamHasNameKey(Field $field): Field
    {
        $this->assertArrayHasKey('name', $field->getInputParams());
        return $field;
    }

    /**
     * @depends testGetInputParamHasNameKey
     * @param Field $field
     * @return Field
     */
    public function testGetInputParamHasIdKey(Field $field): Field
    {
        $this->assertArrayHasKey('id', $field->getInputParams());
        return $field;
    }

    /**
     * @depends testGetInputParamHasIdKey
     * @param Field $field
     * @return Field
     */
    public function testGetInputParamHasValueKey(Field $field): Field
    {
        $this->assertArrayHasKey('value', $field->getInputParams());
        return $field;
    }

    /**
     * @return DOMElement
     */
    public function testGetInputFieldHtml(): DomElement
    {
        $field = new Field();
        $field->setName('test-name')->setValue('test-value');
        ee()->load->helper('form_helper');
        $dom = new DOMDocument();
        $dom->loadHTML($field->getInputField());
        $input = $dom->getElementById('test-name');
        $this->assertInstanceOf('DomElement', $input);
        $this->assertTrue(strtolower($input->tagName) == 'input');
        return $input;
    }

    /**
     * @depends testGetInputFieldHtml
     * @param DOMElement $dom
     * @return DOMElement
     */
    public function testGetInputFieldNameParamValue(DomElement $dom): DomElement
    {
        $this->assertTrue($dom->getAttribute('name') =='test-name');
        return $dom;
    }

    /**
     * @depends testGetInputFieldNameParamValue
     * @param DOMElement $dom
     * @return DOMElement
     */
    public function testGetInputFieldIdParamValue(DomElement $dom): DomElement
    {
        $this->assertTrue($dom->getAttribute('id') =='test-name');
        return $dom;
    }

    /**
     * @depends testGetInputFieldIdParamValue
     * @param DOMElement $dom
     * @return DOMElement
     */
    public function testGetInputFieldValueParamValue(DomElement $dom): DomElement
    {
        $this->assertEquals($dom->getAttribute('value'), 'test-value');
        return $dom;
    }

    /**
     * @depends testGetInputFieldValueParamValue
     * @param DOMElement $dom
     * @return DOMElement
     */
    public function testGetInputFieldTypeParamValue(DomElement $dom): DomElement
    {
        $this->assertEquals($dom->getAttribute('type'), 'text');
        return $dom;
    }

    /**
     * @depends testGetInputFieldTypeParamValue
     * @param DOMElement $dom
     * @return DOMElement
     */
    public function testGetInputFieldListParamValue(DomElement $dom): DomElement
    {
        $this->assertEquals($dom->getAttribute('list'), '__test-name');
        return $dom;
    }

    public function testGetDataListingdHtml()
    {
        $field = new Field();
        $options = ['one' => 'One', 'two' => 'Two'];
        $field->setName('test-name')->setValue('two')->setOptions($options);
        $xml = simplexml_load_string($field->getDataListOptions());
        $this->assertInstanceOf('SimpleXMLElement', $xml);

        $this->assertEquals($xml->option[0], 'One');
        $this->assertEquals($xml->option[1], 'Two');
    }
}