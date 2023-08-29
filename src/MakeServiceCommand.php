<?php
/**
 * User  : Rock
 * Date  : 2023/8/29 14:09
 * Class : MakeServiceCommand.php
 * Desc  :
 */

namespace Jiange\LaravelMakeService;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;

class MakeServiceCommand extends GeneratorCommand
{
    public function __construct(Filesystem $files)
    {
        parent::__construct($files);
    }

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create service';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return $this->resolveStubPath('/stubs/service.stub');
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param string $stub
     * @return string
     */
    protected function resolveStubPath(string $stub): string
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__ . $stub;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Services';
    }

    /**
     * @param string $name
     * @return array|string
     * @throws FileNotFoundException
     */
    protected function buildClass($name): array|string
    {
        $stub = $this->files->get($this->getStub());
        $stub = $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
        return str_replace(['{{ dateTime }}', '{{dateTime}}'], date('Y-m-d H:i:s'), $stub);
    }

}