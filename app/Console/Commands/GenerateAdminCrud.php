<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateAdminCrud extends Command
{
    protected $signature = 'generate:admin-crud';

    protected $description = 'Generate admin CRUD files';

    public function handle()
    {
        $this->info('Admin CRUD Generator Running...');

        return self::SUCCESS;
    }
}
