<?php
namespace shornuk\upload\web\twig;

use shornuk\upload\Upload;

use Craft;
use craft\web\View;

use Twig_Extension;
use Twig_SimpleFilter;
use Twig_Environment;

class Extension extends Twig_Extension
{
    // Public Methods
    // =========================================================================


    public function getFilters(): array
    {
        return [
            new Twig_SimpleFilter('formatSizeUnits', [$this, 'formatSizeUnits'], ['is_safe' => ['html']]),
        ];
    }


    public function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
