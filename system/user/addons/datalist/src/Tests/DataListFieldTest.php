<?php
namespace Mithra62\DataList\Tests;

use PHPUnit\Framework\TestCase;
use \Datalist_ft AS FieldType;

class DataListFieldTest extends TestCase
{
    public function testFileExists()
    {
        $file_name = realpath(PATH_THIRD.'/datalist/ft.datalist.php');
        $this->assertNotNull($file_name);
    }

    public function testFtObjetExists()
    {
        $this->assertTrue(class_exists('Datalist_ft'));
    }

    public function testObjectIsInstanceOfOptions(): FieldType
    {
        $ft = new FieldType();
        $this->assertInstanceOf('\OptionFieldtype', $ft);
        return $ft;
    }

    /**
     * @depends testObjectIsInstanceOfOptions
     * @param FieldType $ft
     * @return FieldType
     */
    public function testInfoPropertyExists(FieldType $ft): FieldType
    {
        $this->assertClassHasAttribute('info', '\Datalist_ft');
        return $ft;
    }

    /**
     * @depends testInfoPropertyExists
     * @param FieldType $ft
     * @return FieldType
     */
    public function testInfoPropertyChildKeysExist(FieldType $ft): FieldType
    {
        $this->assertArrayHasKey('name', $ft->info);
        $this->assertArrayHasKey('version', $ft->info);
        return $ft;
    }
}