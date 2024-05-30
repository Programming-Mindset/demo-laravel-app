<?php

class ExampleTest extends \Tests\TestCase
{
    /**
     * A basic test example.
     */
    public function test_true(): void
    {
        $this->get('bkash');
        $this->assertTrue(true);
    }
}
