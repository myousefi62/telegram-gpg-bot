<?php

namespace App\Commands;

use Telegram\Bot\Commands\Command;

/**
 * Class StartCommand
 *
 * @package App\Commands
 * @author Ivan Klymenchenko <iillexial@gmail.com>
 */
class StartCommand extends Command
{
    /**
     * @var string
     */
    protected $name = 'start';

    /**
     * @var string
     */
    protected $description = 'Start command';

    /**
     * @param $arguments
     *
     * @return void
     */
    public function handle($arguments)
    {
        $this->replyWithMessage("Hello! I'm GPG Bot.");
    }

}