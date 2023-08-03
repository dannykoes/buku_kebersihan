<?php

namespace App\Helpers;

use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;

class GlobalHelper
{


    public static function cloudinarys()
    {
        $config = new Configuration();
        // $config->cloud->cloudName = 'ayo-kerja';
        // $config->cloud->apiKey = '194182573157553';
        // $config->cloud->apiSecret = 'OtgFzcO1gJN4bcXUW4w1IC8vO28';
        $cloudName = 'djta83wtg';
        $apiKey = '289462895692655';
        $apiSecret = 'ZNdFaw-x3x57totsh5Wsbh-cD_s';

        $config->cloud->cloudName = $cloudName;
        $config->cloud->apiKey = $apiKey;
        $config->cloud->apiSecret = $apiSecret;
        $config->url->secure = true;
        $cloudinary = new Cloudinary($config);

        return $cloudinary;
    }
}
