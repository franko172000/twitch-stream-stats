<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function wantsJson()
    {
        return $this->withHeader('Accept', 'application/json');
    }
}
