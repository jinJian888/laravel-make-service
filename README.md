# laravel-make-service

* 此 package 仅适用于 laravel 框架
* laravel 版本要求大于等于 8.0

```shell
    composer require jiange/laravel-make-service
```

首先，确保已经将你的 Composer 包安装到了 Laravel 项目中，并且在 composer.json 文件中正确地配置了包的信息。

接下来，打开你的 Laravel 项目的控制台（终端）并运行 composer dump-autoload 命令，以确保 Composer 已经正确地加载了你的自定义命令文件。

然后，打开 app/Console/Kernel.php 文件，找到 protected $commands 数组，确保你的自定义命令添加到了该数组中。你可以像这样添加：

```shell
protected $commands = [
    \Jiange\LaravelMakeService\MakeServiceCommand::class,
];
```


最后，在你的 Laravel 项目的控制台中运行 php artisan 命令，你应该能够看到 make:service 命令列在可用的命令列表中。

现在，你可以在你的 Laravel 项目中使用 php artisan make:service 命令来创建服务类了。例如，运行以下命令来创建一个名为 ExampleService 的服务类：

```shell
    php artisan make:service ExampleService
```
这将在你指定的命名空间中生成一个服务类文件。

