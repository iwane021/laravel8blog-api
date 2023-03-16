<?php

namespace Tests\Feature;

use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CollectionTest extends TestCase
{
    public function testCreateCollection() {
        $collection = collect([1,2,3]);
        $this->assertEqualsCanonicalizing([1,2,3], $collection->all());
    }

    public function testMapInfo() {
        $collection = collect(["Iwan"]);
        $result = $collection->mapInto(Person::class);
        $this->assertEquals([new Person("Iwan")], $result->all());
    }

    public function testMapSpread() {
        $collection = collect([
            ["Iwan", "Prasetiyo"],
            ["Ricardo", "Kaka"]
        ]);

        $result = $collection->mapSpread(function ($firstName, $lastName) {
            $fullName = $firstName . ' ' . $lastName;
            return new Person($fullName);
        });

        $this->assertEquals([
            new Person("Iwan Prasetiyo"),
            new Person("Ricardo Kaka"),
        ], $result->all());
    }
}
