<?php

namespace Almamun2s\TinyMCE;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\Application;


class TinyMCE
{
    /**
     * @var Repository $config
     */
    protected $config;

    /**
     * @var Repository $app
     */
    protected $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->config = $this->app['config'];
    }

    public function display()
    {
        return 'Hello from TinyMCE';
    }
}