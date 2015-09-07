Html Generation Service Provider for Silex
==========================================

インストール
----------

次の　JSON を　`composer.json` に追加します。

```javascript
{
    "repositories": [
    {
        "type": "package",
        "package": {
            "name": "masakielastic/silex-html-generation-service-provider",
            "version": "0.1.0",
            "type": "package",
            "source": {
                "url": "https://github.com/masakielastic/silex-html-generation-service-provider.git",
                "type": "git",
                "reference": "master"
            },
            "autoload": {
                "psr-4": { "Masakielastic\\Silex\\": "src/" }
            }
        }
    }
    ],
    "require": {
        "silex/silex": "~1.3",
        "masakielastic/silex-html-generation-service-provider": "*"
    }
}
```

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