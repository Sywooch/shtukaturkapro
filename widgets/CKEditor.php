<?php
/**
 * Created by PhpStorm.
 * User: ivanvodanov
 * Date: 09.01.15
 * Time: 18:41
 */

namespace app\widgets;

use yii\helpers\ArrayHelper;

use iutbay\yii2kcfinder\KCFinderAsset;

class CKEditor extends \dosamigos\ckeditor\CKEditor
{

    public $enableKCFinder = true;

    /**
     * Registers CKEditor plugin
     */
    protected function registerPlugin()
    {
        if ($this->enableKCFinder)
        {
            $this->registerKCFinder();
        }

        parent::registerPlugin();
    }

    /**
     * Registers KCFinder
     */
    protected function registerKCFinder()
    {
        $register = KCFinderAsset::register($this->view);
        $kcfinderUrl = $register->baseUrl;

        $browseOptions = [
            'filebrowserBrowseUrl' => $kcfinderUrl . '/browse.php?opener=ckeditor&type=files',
            'filebrowserUploadUrl' => $kcfinderUrl . '/upload.php?opener=ckeditor&type=files',
        ];

        $this->clientOptions = ArrayHelper::merge($browseOptions, $this->clientOptions);
    }

}

// kcfinder options
// http://kcfinder.sunhater.com/install#dynamic
$kcfOptions = array_merge(\iutbay\yii2kcfinder\KCFinder::$kcfDefaultOptions, [
    'uploadURL' => \Yii::getAlias('@web').'/upload',
    'access' => [
        'files' => [
            'upload' => true,
            'delete' => false,
            'copy' => false,
            'move' => false,
            'rename' => false,
        ],
        'dirs' => [
            'create' => true,
            'delete' => false,
            'rename' => false,
        ],
    ],
]);

// Set kcfinder session options
\Yii::$app->session->set('KCFINDER', $kcfOptions);