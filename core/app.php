<?php
//注册。注册之后可以用$app['xxx']来调用服务
$app = new Illuminate\Container\Container;

//setInstance将服务容器的实例添加为静态属性，这样可以在任何位置都可以获得服务容器的实例。
Illuminate\Container\Container::setInstance($app);

#[读取env组件]
$dotenv = new Dotenv\Dotenv(ROOT_PATH);
$dotenv->load();

//引入全局方法名称
require 'function.php';


#[日志组件]
$app->singleton('Logger',function(){
    return new Core\Loggers\BaseMonolog('daohang');
});


//注册事件和路由
with(new Illuminate\Events\EventServiceProvider($app))->register();
with(new Illuminate\Routing\RoutingServiceProvider($app))->register();
//注册事件 ==跟上面的写法相等
//$app->singleton('events',function($app){
//    return new Illuminate\Events\EventServiceProvider($app);
//});

#[加载ORM模型]
$manager = new \Illuminate\Database\Capsule\Manager();
$manager->addConnection(require CONFIG_PATH . 'databases.php');
$manager->bootEloquent();

#[视图]
// 流式接口（fluent interface）是软件工程中面向对象API的一种实现方式，以提供更为可读的源代码
$app->instance('config',new \Illuminate\Support\Fluent());

//设定视图编译文件所在目录
$app['config']['view.compiled'] = STORAGE_PATH . 'framework' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR;
//设定视图文件所在目录
$app['config']['view.paths'] = [ROOT_PATH . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR];


// 视图、 文件
with(new Illuminate\View\ViewServiceProvider($app))->register();
with(new Illuminate\Filesystem\FilesystemServiceProvider($app))->register();

#[路由]
//设定全局路由变量
$route = $app['router'];

//加载路由
require ROOT_PATH . DIRECTORY_SEPARATOR .  'rotues' . DIRECTORY_SEPARATOR . 'web.php';
//实例化请求分发处理
$request = Illuminate\Http\Request::createFromGlobals();
$response = $route->dispatch($request);
//返回请求的响应
$response->send();
