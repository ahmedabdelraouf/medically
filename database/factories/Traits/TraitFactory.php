<?php


namespace Database\Factories\Traits;


trait TraitFactory
{

    public function getNameDescriptionarray()
    {
        $ArFaker = \Faker\Factory::create('ar_AA'); // create a Arabic faker
        $name['ar'] = $ArFaker->name;
        $description['ar'] = $ArFaker->text;

        $name ['en'] = $this->faker->name;
        $description['en'] = $this->faker->text;
        return [
            'name' => json_encode($name),
            'description' => json_encode($description),
        ];
    }

}
