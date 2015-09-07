<?php

namespace Masakielastic\Silex;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class HtmlGeneratorServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['htmlgen'] = $app->protect(function () use ($app) {

            $it = new \DirectoryIterator($app['htmlgen.content.dir']);

            foreach ($it as $file) {

                if ($file->isDir()) {
                    continue;
                }

                $name = $file->getBasename('.md');
                $path = $app['htmlgen.baseUri'].$name;
                $response = $app->handle(Request::create($path));
                $content = $response->getContent();

                file_put_contents($app['htmlgen.public.dir']."/$name.html", $content);
            }
        });
    }

    public function boot(Application $app)
    {
    }
}