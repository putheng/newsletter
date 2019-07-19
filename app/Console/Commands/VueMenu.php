<?php

namespace App\Console\Commands;

use App\Console\Traits\Generatable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class VueMenu extends Command
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
        $explode = explode('\\', $arg);
        $resource = resource_path('js/app/');

        $stub = app_path('Console/Traits/stubs/page.stub');
        $id = 'C' . strtoupper(uniqid()) . 'B';

        if(count($explode) <= 1){
            return $this->error('Should be include main menu');
        }

        $cleanPath = strtolower(implode('/', $explode));

        $mainx = $explode[0];
        $main = strtolower($mainx);

        $clean = $main . '/components'. str_replace($main, '', $cleanPath);

        $fileName = array_pop($explode);
        $name = strtolower($fileName);

        $path = $resource . rtrim(str_replace(strtolower($fileName), '', $clean), '/');

        $file = $path .'/'.$fileName.'.vue';

        $indexjs = $resource . $main .'/components/index.js';
        $routejs = $resource . $main .'/routes/index.js';
        

        $subdir = strtolower(str_replace('\\'. $fileName, '', ltrim(str_replace($mainx, '', $arg), '\\')));

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $content = $this->generateStub($stub, [
            "DummyPage" => $fileName,
        ]);

        if(file_exists($file)){
            return $this->error('File already exist!');
        }

        $export = "\nexport const {$id} = Vue.component('{$id}', require('./{$subdir}/{$fileName}.vue').default)";

        File::put($file, $content);
        sleep(2);

        File::append($indexjs, $export);

        $routes = "{\n\t\tpath: '/{$cleanPath}',\n\t\tcomponent: {$id},\n\t\tname: '{$main}-{$name}'\n\t},\n\t/**/";

        sleep(1);

        $generateRoute = $this->generateStub($routejs, [
            "/**/" => $routes,
            "/****/" => $id .",\n\t/****/"
        ]);

        File::put($routejs, $generateRoute);

        return $this->info('Generate success');
    }
}
