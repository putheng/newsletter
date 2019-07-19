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
        $dirs = ['components', 'routes', 'vuex'];

        File::copyDirectory($app_path.'/app/layout', $app_path.'/app/'. $import);

        $importContext = "import $import from './$import/routes'\n";

        $spread = ",\n\t...$import\n]";

        $replace = $this->generateStub($stub, [
            "\n]" => $spread,
        ]);

        File::put($stub, $replace);

        File::prepend($stub, $importContext);

        return $this->info($importContext);
    }
}
