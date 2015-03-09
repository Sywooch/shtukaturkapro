<?php
/**
 * Created by PhpStorm.
 * User: ivphpan
 * Date: 09.03.15
 * Time: 12:28
 */

namespace app\widgets\post;

use yii\base\Widget;
use app\models\PostCategory;

class CategoryNav extends Widget{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $primaryItems = PostCategory::getPrimaryNavData();
        $secondaryItems = PostCategory::getSecondNavData();
        return $this->render('CategoryNav',['primaryItems'=>$primaryItems,'secondaryItems'=>$secondaryItems]);
    }

} 