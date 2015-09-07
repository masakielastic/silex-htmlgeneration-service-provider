Html Generation Service Provider for Silex
==========================================

使い方
-----

```php
use Silex\Application;
use Masakielastic\Silex\HtmlGeneratorServiceProvider;

$app = new Application();
$app['debug'] = true;

$app->register(new HtmlGeneratorServiceProvider());
$app->get('/', function(Application $app) {
    $content = file_get_contents($app['htmlgen.content.dir'].'/index.md');
    return $content;
});

$app->get('/{name}', function(Application $app, $name) {
    $content = file_get_contents($app['htmlgen.content.dir'].'/'.$name.'.md');
    return $content;
});

$app['htmlgen']();
```

ライセンス
---------

MIT