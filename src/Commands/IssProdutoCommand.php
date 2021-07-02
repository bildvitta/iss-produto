<?php

namespace Bildvitta\IssProduto\Commands;

use Illuminate\Console\Command;

/**
 * Class IssProdutoCommand.
 * 
 * @package Bildvitta\IssProduto\Commands
 */
class IssProdutoCommand extends Command
{
    public $signature = 'iss-produto';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
