<?php
namespace Mithra62\DataList\Fields\DataList;

use CartThrob\Seeder\Core\AbstractSeed;
use CartThrob\Seeds\Fields\AbstractField;

class Seeder extends AbstractField
{
    /**
     * @param \Faker\Generator $faker
     * @param AbstractSeed $seed
     * @return array|int|mixed|string
     */
    public function fakieData(\Faker\Generator $faker, AbstractSeed $seed)
    {
        $values = $this->randomOptionValues();
        return end($values);
    }
}