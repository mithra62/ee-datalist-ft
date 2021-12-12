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
     * @return Provider1
     */
    public function testSettingsValue($addon): Provider
    {
        $addon = ee('App')->get('datalist');
        $this->assertFalse($addon->get('settings_exist'));
        return $addon;
    }
}