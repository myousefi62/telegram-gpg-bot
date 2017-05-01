<?php

namespace App\Commands;

use Telegram\Bot\Commands\Command;

class ImportPublicKeyCommand extends Command
{
    protected $name = 'importkey';

    protected $description = 'Attach the public key to your account';

    public function handle($arguments)
    {

    }
}