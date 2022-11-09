<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WordCountTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $textWords = "My name is Iwan";
        $responseText = $this->countWords($textWords);

        $this->assertEquals(4, $responseText);
    }

    public function countWords($sentence)
    {
        return count(explode(" ",$sentence));
    }
}
