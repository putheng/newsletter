<?php

namespace App\Console\Commands;

use App\Console\Traits\Generatable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class VueMake extends Command
{
    use Generatable;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vue:menu {menu}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new vue menu item';

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
        $arg = $this->argument('menu');
        $import = strtolower($arg);

        $app_path = base_path() . '/resources/js';

        if(file_exists($app_path .'/app/'. $import .'/routes/index.js')){
            return $this->error('The menu already exists');
        }

        $stub = base_path() . '/resources/js/app/routes.js';
        $vuex = base_path() . '/resources/js/vuex/index.js';

        File::copyDirectory($app_path.'/app/layout', $app_path.'/app/'. $import);

        $importContext = "import $import from './$import/routes'\n";

        $spread = "...$import,\n\t/**/";

        $replace = $this->generateStub($stub, [
            "/**/" => $spread,
        ]);

        File::put($stub, $replace);
        sleep(1);
        File::prepend($stub, $importContext);

        $importvuex = "/*import*/\nimport {$import} from '../app/{$import}/vuex'";
        $exportvuex = "$import:$import,\n\t\t/*export*/";

        $content = $this->generateStub($vuex, [
            "/*import*/" => $importvuex,
            "/*export*/" => $exportvuex,
        ]);

        sleep(1);
        File::put($vuex, $content);

        return $this->info('Generate success');
    }
}
