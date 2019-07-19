<?php

namespace App\Console\Traits;

trait Generatable
{
    protected $stubDirectory = __DIR__ . '/stubs/';

    public function generateStub($stub, $replacements)
    {
        return str_replace(
            array_keys($replacements),
            $replacements,
            file_get_contents($stub)
        );
    }

    public function stubGenerate($stub, $replacements)
    {
    	return str_replace(
            array_keys($replacements),
            $replacements,
            file_get_contents($this->stubDirectory . $stub.'.stub')
        );
    }
}
