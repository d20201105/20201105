<?php

namespace D20201105\Gen\Commands;

use Illuminate\Console\Command;

class Gen extends Command
{
    protected $signature = 'dg:gen';

    protected $description = '문서를 생성합니다.';

    public function handle()
    {
        $this->info('dg:gen ...');
    }
}
