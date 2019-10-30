<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DisableOldAgendamentos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agendamentos:disable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancela todos os agendamentos que já passaram a data, mas não houve mudança de status.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
