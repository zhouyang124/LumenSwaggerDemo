## LumenSwaggerDemo

> 项目地址：https://github.com/zhouyang124/LumenSwaggerDemo

#### 通过 Composer Create-Project 命令安装 lumen

``` sh
$ composer create-project --prefer-dist laravel/lumen demo 6.0
```

#### 安装依赖

``` sh
$ composer require darkaonline/swagger-lume:6.0
```

#### 项目配置
在 bootstrap/app.php 文件中，去掉下面配置的注释（大约在 26 行），启用 Facades 支持。

``` php
$app->withFacades();
```
启用 SwaggerLume 项目的配置文件，在 Register Container Bindings 部 分前面，添加

``` php
$app->configure('swagger-lume');
```

然后，在 Register Service Providers 部分，注册 SwaggerLume 的 ServiceProvider

``` php
$app->register(\SwaggerLume\ServiceProvider::class);
```

在项目的根目录，执行命令 php artisan swagger-lume:publish 发布 swagger 相关的配置

执行该命令后，主要体现以下几处变更
- 在 config/ 目录中，添加了项目的配置文件 swagger-lume.php
- 在 resources/views/vendor 目录中，生成了 swagger-lume/index.blade.php 视图文件，用于预览生成的 API 文档

从配置文件中我们可以获取以下关键信息

- api.title 生成的 API 文档显示标题
- routes.api 用于访问生成的 API 文档 UI 的路由地址默认为 /api/documentation
- routes.docs 用于访问生成的 API 文档原文，json 格式，默认路由地址为 /docs
- paths.docs 和 paths.docs_json 组合生成 api-docs.json 文件的地址，默认为 storage/api-docs/api-docs.json，执行 php artisan swagger-lume:generate 命令时，将会生成该文件

#### 语法自动提示

纯手写 swagger 注释肯定是要不得的，太容易出错，还需要不停的去翻看文档参考语法，因此我们很有必要安装一款能够自动提示注释中的注解语法的插件，我们常用的 IDE 是 phpstorm，在 phpstorm 中，需要安装 PHP annotation 插件

安装插件之后，我们在写 Swagger 文档时，就有代码自动提示功能了

#### 生成文档

执行下面的命令，就可以生成文档了，生成的文档在 storage/api-docs/api-docs.json。

``` php
php artisan swagger-lume:generate
```

#### 预览文档

打开浏览器访问 http://127.0.0.1:8080/api-docs.json，可以看到 json内容串


访问 http://localhost:3200/ ，我们看到swagger接口页面

#### 更多
本文简述了如何在 Lumen 项目中使用代码注释自动生成 Swagger 文档，并配合 phpstorm 的代码提示功能，然而，学会了这些还远远不够，你还需要去了解 Swagger 文档的语法结构，在 [swagger-php](https://github.com/zircote/swagger-php) 项目的 Examples 目录中包含很多使用范例，你可以参考一下。




