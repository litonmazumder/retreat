<?php

namespace App\Console\Commands;

use App\Imports\ParticipantsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportParticipants extends Command
{
    protected $signature = 'participants:import {file}';

    protected $description = 'Import retreat participants from Excel or CSV';

    public function handle(): int
    {
        $file = $this->argument('file');

        if (!file_exists($file)) {
            $this->error("File not found: {$file}");
            return self::FAILURE;
        }

        $import = new ParticipantsImport();

        Excel::import($import, $file);

        $this->info("Imported: {$import->imported}");
        $this->info("Skipped: {$import->skipped}");

        foreach ($import->errors as $error) {
            $this->warn($error);
        }

        return self::SUCCESS;
    }
}
