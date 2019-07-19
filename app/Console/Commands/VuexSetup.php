<?php

namespace App\Console\Commands;

use App\Console\Traits\Generatable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class VuexSetup extends Command
{
    use Generatable;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vuex:fetch {action} {--endpoint=} {--endpoint=} {--state=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vuex setup action, getter, mutation and state';

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
        $this->addState();
        $this->addAction();
        $this->addMutation();
        $this->addGetter();

        return $this->info('Generate success');
    }

    public function addGetter()
    {
        $getters = $this->resourcesPath('getters.js');
        $state = $this->option('state');

        $context = $this->stubGenerate('VueGetter', [
            'DummyValue' => 'get'. ucfirst($this->option('state')),
        ]);

        File::append($getters, "\n\n". $context);
     
        $this->info('Getter success');
    }

    public function addState()
    {
        $state = $this->resourcesPath('state.js');

        $context = $this->generateStub($state, [
            "/**/" => $this->option('state') .",\n\t". "/**/",
        ]);

        File::put($state, $context);
     
        $this->info('State success');
    }

    public function addMutation()
    {
        $mutations = $this->resourcesPath('mutations.js');
        $state = $this->option('state');

        $context = $this->stubGenerate('VuexMutation', [
            'DummySet' => 'set'. ucfirst($state),
            'DummyState' => $this->option('state'),
        ]);

        File::append($mutations, "\n\n". $context);
     
        $this->info('Mutation success');
    }


    public function addAction()
    {
        $actions = $this->resourcesPath('actions.js');
        $state = $this->option('state');

        $fetch = explode('/', $this->argument('action'))[1];

        $context = $this->stubGenerate('VuexFetch', [
            'DummyEndPoint' => $this->option('endpoint'),
            'DummyState' => 'set'. ucfirst($state),
            'fetchDummy' => $fetch,
        ]);

        File::append($actions, "\n\n". $context);

        $this->info('Actions success');
    }

    public function resourcesPath($file)
    {
        $namespace = explode('/', $this->argument('action'))[0];

        return base_path("resources/js/app/{$namespace}/vuex/{$file}");
    }
}
