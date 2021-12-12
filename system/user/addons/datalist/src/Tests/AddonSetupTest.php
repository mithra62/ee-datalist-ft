<?php
namespace Mithra62\DataList\Tests;

use PHPUnit\Framework\TestCase;
use ExpressionEngine\Core\Provider;

class AddonSetupTest extends TestCase
{
    /**
     * @return void
     */
    public function testFileExists(): void
    {
        $file_name = realpath(PATH_THIRD.'/datalist/addon.setup.php');
        $this->assertNotNull($file_name);
    }

    /**
     * @return Provider
     */
    public function testAuthorValue(): Provider
    {
        $addon = ee('App')->get('datalist');
        $this->assertEquals('mithra62', $addon->getAuthor());
        return $addon;
    }

    /**
     * @depends testAuthorValue
     * @param $addon
     * @return Provider
     */
    public function testNameValue($addon): Provider
    {
        $addon = ee('App')->get('datalist');
        $this->assertEquals('DataList', $addon->getName());
        return $addon;
    }

    /**
     * @depends testAuthorValue
     * @param $addon
     * @return Provider
     */
    public function testNamespaceValue($addon): Provider
    {
        $addon = ee('App')->get('datalist');
        $this->assertEquals('Mithra62\DataList', $addon->getNamespace());
        return $addon;
    }

    /**
     * @depends testAuthorValue
     * @param $addon
     * @return Provider
     */
    public function testSettingsValue($addon): Provider
    {
        $this->assertFalse($addon->get('settings_exist'));
        return $addon;
    }

    /**
     * @depends testSettingsValue
     * @param $addon
     * @return Provider
     */
    public function testFieldtypesIndexExists($addon): Provider
    {
        $this->assertIsArray($addon->get('fieldtypes'));
        return $addon;
    }

    /**
     * @depends testFieldtypesIndexExists
     * @param $addon
     * @return Provider
     */
    public function testFieldNameIsProper($addon): Provider
    {
        $field_data = $addon->get('fieldtypes');
        $this->assertTrue(!empty($field_data['datalist']['name']));
        $this->assertEquals('DataList', $field_data['datalist']['name']);
        return $addon;
    }

    /**
     * @depends testFieldNameIsProper
     * @param $addon
     * @return Provider
     */
    public function testFieldCompatibility($addon): Provider
    {
        $field_data = $addon->get('fieldtypes');
        $this->assertTrue(!empty($field_data['datalist']['compatibility']));
        $this->assertEquals('list', $field_data['datalist']['compatibility']);
        return $addon;
    }

    /**
     * @depends testFieldCompatibility
     * @param $addon
     * @return Provider
     */
    public function testSeederIndexExists($addon): Provider
    {
        $this->assertIsArray($addon->get('seeder'));
        return $addon;
    }

    /**
     * @depends testSeederIndexExists
     * @param $addon
     * @return Provider
     */
    public function testSeederField($addon): Provider
    {
        $seeder = $addon->get('seeder');
        $this->assertTrue(!empty($seeder['fields']['datalist']));
        $this->assertEquals('Mithra62\DataList\Fields\DataList', $seeder['fields']['datalist']);
        return $addon;
    }
}