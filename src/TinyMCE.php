<?php

namespace Almamun2s\TinyMCE;

use Almamun2s\Tinymce\Enum\FrontendFramework;
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
     * Default data to show in the tinymce
     * @var string
     */
    private string $default = 'Welcome to <b>TinyMCE!</b> This package is Developed by <a href="https://github.com/almamun2s/tinymce">Abdullah Almamun</a>';

    /**
     * This is the tinymce editor name for submitting form
     * @var string
     */
    private string $name;

    /**
     * HTML class that may handle css related things
     * @var string
     */
    private string $class;

    /**
     * HTML id that may handle js related things
     * @var string
     */
    private string $id;

    /**
     * data attribute of the tinymce editor
     * @var array
     */
    private array $data;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app    = $app;
        $this->config = $this->app['config'];
    }

    /**
     * Display the WYSIWYG editor 
     * @param string $name
     * @return string
     */
    public function display(string $default = '', array $property = [], array $data = [])
    {
        $frontendFramework = config('tinymce.frontend_framework');
        if (!empty($default)) {
            $this->default     = $default;
        }
        $this->name        = $property['name'] ?? 'my-wysiwyg' ;
        $this->class       = $property['class'] ?? '';
        $this->id          = $property['id'] ?? '';
        $this->data        = $data;

        return match ($frontendFramework) {
            FrontendFramework::Blade->value   => $this->laravelBlade(),
            FrontendFramework::Angular->value => $this->angular(),
            FrontendFramework::React->value   => $this->react(),
            FrontendFramework::Vue->value     => $this->vue(),
            default                           => $this->laravelBlade()
        };
    }

    /**
     * Display the WYSIWYG editor in laravel blade
     * @return string
     */
    private function laravelBlade()
    {
        $api = config('tinymce.api_key');
        $html = '';

        $html .= '<script src="https://cdn.tiny.cloud/1/' . $api . '/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>';

        $html .= "
            <script>
                tinymce.init({
                    selector: 'textarea',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                });
            </script>
            ";
        $html .= '<textarea name="' . $this->name . '" class="' . $this->class . '" id="' . $this->id . '" ' . $this->renderDataAttributes() . ' >'. $this->default .'</textarea>';

        return $html;
    }

    /**
     * Display the WYSIWYG editor in react
     * @return string
     */
    private function react()
    {
        return 'Coming soon';
    }

    /**
     * Display the WYSIWYG editor in vue
     * @return string
     */
    private function vue()
    {
        return 'Coming soon';
    }

    /**
     * Display the WYSIWYG editor in angular
     * @return string
     */
    private function angular()
    {
        return 'Coming soon';
    }

    /**
     * Render data in the tinymce editor
     * @return string
     */
    private function renderDataAttributes()
    {
        $data = $this->data;
        $dataAttr = '';

        foreach ($data as $key => $value) {
            $dataAttr .= ' data-' . $key . '="' . $value . '"';
        }

        return $dataAttr;
    }
}