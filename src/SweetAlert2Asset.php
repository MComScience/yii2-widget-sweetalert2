<?php

namespace mcomscience\sweetalert2;

use yii\web\AssetBundle;

/**
 * Class SweetAlert2Asset
 * @package m-comscience\sweetalert2
 */
class SweetAlert2Asset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/sweetalert2/dist';

    /**
     * @var array
     */
    public $js = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $min = YII_ENV_DEV ? '' : '.min';
        $this->js[] = 'sweetalert2.all' . $min . '.js';
    }
}
