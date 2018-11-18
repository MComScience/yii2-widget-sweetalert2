<?php

namespace mcomscience\sweetalert2;

use yii\web\AssetBundle;

/**
 * Class SwalAsset
 * @package m-comscience\sweetalert2
 */
class SwalAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@mcomscience/sweetalert2/assets';

    /**
     * @var array
     */
    public $css = [
        'css/swal.css'
    ];
}
