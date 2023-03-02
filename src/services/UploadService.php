<?php
namespace shornuk\upload\services;

use shornuk\upload\Upload;
use shornuk\upload\helpers\UploadHelper;

use Craft;
use craft\base\Component;

class UploadService extends Component
{
    // Public Methods
    // =========================================================================

    public function getAssetFieldByHandleOrId($handleOrId)
    {
    	if(!$handleOrId)
    	{
    		return false;
    	}

    	if(is_numeric($handleOrId))
    	{
			$field = UploadHelper::getFieldById($handleOrId);
    	}
    	else
    	{
    		$field = UploadHelper::getFieldByHandle($handleOrId);
    	}

    	return $field;
    }

}
