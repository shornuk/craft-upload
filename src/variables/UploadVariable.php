<?php
namespace shornuk\upload\variables;

use shornuk\upload\models\Uploader; // DEPRICIATE

use shornuk\upload\Upload;
use shornuk\upload\assetbundles\upload\UploadAssetBundle;
use shornuk\upload\base\UploaderInterface;
use shornuk\upload\models\VolumeUploader;
use shornuk\upload\models\FieldUploader;
use shornuk\upload\models\UserPhotoUploader;

use Craft;
use craft\web\View;
use craft\helpers\Template as TemplateHelper;
use craft\helpers\Json as JsonHelper;

class UploadVariable
{
    // Public Methods
    // =========================================================================

    public function volumeUploader($attributes = [])
    {
        return $this->_renderUploader(VolumeUploader::class, $attributes);
    }

    public function fieldUploader($attributes = [])
    {
        return $this->_renderUploader(FieldUploader::class, $attributes);
    }

    public function userPhotoUploader($attributes = [])
    {
        return $this->_renderUploader(UserPhotoUploader::class, $attributes);
    }

    // Private Methods
    // =========================================================================

    public function _renderUploader($type, $attributes = [])
    {
        try{
            $uploader = new $type($attributes);
        } catch(\Throwable $throwable) {
            $uploader = false;
        }

        if(!$uploader)
        {
            return TemplateHelper::raw('<p>Invalid Uploader!</p>');
        }

        return TemplateHelper::raw($uploader->render());
    }

}
