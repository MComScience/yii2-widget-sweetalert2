<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii2 Extension</h1>
    <br>
</p>

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Install

```
composer require m-comscience/yii2-widget-sweetalert2 '@dev'
```

## Usage

Popup Types:
```
TYPE_SUCCESS or 'success'
TYPE_ERROR or 'error'
TYPE_WARNING or 'warning'
TYPE_INFO or 'info'
TYPE_QUESTION or 'question'
```

## Use Flash message Alert

View:
```php
<?= \mcomscience\sweetalert2\SweetAlert2::widget(['useSessionFlash' => true]) ?>
```

Controller:
```php
 use mcomscience\sweetalert2\SweetAlert2;
 Yii::$app->session->setFlash(SweetAlert2::TYPE_SUCCESS, 'Completed!');
```

```php
 Yii::$app->session->setFlash(SweetAlert2::TYPE_SUCCESS, [
    [
        'title' => 'Your title',
        'text' => 'Your message',
        'confirmButtonText' => 'Done!',
    ]
 ]);
```

## Usage Widget
View:
```php
use mcomscience\sweetalert2\SweetAlert2;
```

A basic message
```php
<?= SweetAlert2::widget([
    'options' => [
        'Any fool can use a computer'
    ],
]) ?>
```

A title with a text under
```php
<?= SweetAlert2::widget([
    'options' => [
        'The Internet?',
        'That thing is still around?',
        SweetAlert2::TYPE_QUESTION
    ]
]) ?>
```

success message!
```php
<?= SweetAlert2::widget([
    'options' => [
        'Good job!',
        'You clicked the button!',
        SweetAlert2::TYPE_SUCCESS
    ]
]) ?>
```

A custom positioned dialog
```php
<?= SweetAlert2::widget([
    'options' => [
	    'position' => 'top-end',
		'type' => 'success',
        'title' => 'Your work has been saved',
        'timer' => 1500,
    ]
]) ?>
```

A message with auto close timer
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => 'Auto close alert!',
        'text' => 'I will close in 2 seconds.',
        'timer' => 2000,
    ]
]) ?>
```

Custom HTML description and buttons with ARIA labels
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => '<i>HTML</i> <u>example</u>',
        'type' => SweetAlert2::TYPE_INFO,
        'html' => 'You can use <b>bold text</b>,'
            . '<a href="//github.com">links</a> '
            . 'and other HTML tags',
        'showCloseButton' => true,
        'showCancelButton' => true,
        'confirmButtonText' => '<i class="fa fa-thumbs-up"></i> Great!',
        'cancelButtonText' => '<i class="fa fa-thumbs-down"></i>',
    ],
]) ?>
```

Custom animation
[Animate.css](https://daneden.github.io/animate.css)

Example:
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => 'Custom animation with Animate.css',
        'animation' => false,
        'customClass' => 'animated tada',
    ],
]) ?>
```

A confirm dialog, with a function attached to the "Confirm"-button...
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => 'Are you sure?',
        'text' => "You won't be able to revert this!",
        'type' => SweetAlert2::TYPE_WARNING,
        'showCancelButton' => true,
        'confirmButtonColor' => '#3085d6',
        'cancelButtonColor' => '#d33',
        'confirmButtonText' => 'Yes, delete it!',
    ],
    'callback' => new \yii\web\JsExpression("
        (result) => {
            if (result.value) {
                swal(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
            }
        }
    "),
]) ?>
```

... and by passing a parameter, you can execute something else for "Cancel".
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => 'Are you sure?',
        'text' => "You won't be able to revert this!",
        'type' => SweetAlert2::TYPE_WARNING,
        'showCancelButton' => true,
        'confirmButtonColor' => '#3085d6',
        'cancelButtonColor' => '#d33',
        'confirmButtonText' => 'Yes, delete it!',
        'cancelButtonText' => 'No, cancel!',
        'confirmButtonClass' => 'btn btn-success',
        'cancelButtonClass' => 'btn btn-danger',
        'buttonsStyling' => false,
    ],
    'callback' => new \yii\web\JsExpression("
        (result) => {
            if (result.value) {
                swalWithBootstrapButtons(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            } else if (
              // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        }
    "),
]) ?>
```

## INPUT TYPES

Type Text:
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => 'Input something',
        'input' => SweetAlert2::INPUT_TYPE_TEXT,
        'showCancelButton' => true,
        'inputValidator' => new \yii\web\JsExpression("
          (value) => {
              return !value && 'You need to write something!'
          }
        ")
    ],
    'callback' => new \yii\web\JsExpression("
        function (result) {
            if(result.value) {
                swal({
                    type: 'success',
                    html: 'You entered: ' + result.value
                })
            }
        }
    "),
]) ?>
```

Type Email:
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => 'Input email address',
        'input' => SweetAlert2::INPUT_TYPE_EMAIL,
    ],
    'callback' => new \yii\web\JsExpression("
        function (result) {
            swal({
                type: 'success',
                html: 'Entered email: ' + result.value
            })
        }
    "),
]) ?>
```

Type Password:
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => 'Enter your password',
        'input' => SweetAlert2::INPUT_TYPE_PASSWORD,
        'inputAttributes' => [
            'maxlength' => 10,
            'autocapitalize' => 'off',
            'autocorrect' => 'off',
        ]
    ],
    'callback' => new \yii\web\JsExpression("
        function (result) {
          if (result.value) {
              swal({
                  type: 'success',
                  html: 'Entered password: ' + result.value
              })
          }
        }
   "),
]) ?>
```

Type Textarea:
```php
<?= SweetAlert2::widget([
    'options' => [
        'input' => SweetAlert2::INPUT_TYPE_TEXTAREA,
        'showCancelButton' => true,
    ],
    'callback' => new \yii\web\JsExpression("
        function (result) {
            if (result.value) {
                swal(result.value)
            }
        }
    "),
]) ?>
```

Type Select:
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => 'Select Russia',
        'input' => SweetAlert2::INPUT_TYPE_SELECT,
        'inputOptions' => [
            'SRB' => 'Serbia',
            'RUS' => 'Russia',
            'UKR' => 'Ukraine',
            'HRV' => 'Croatia',
        ],
        'inputPlaceholder' => 'Select country',
        'showCancelButton' => true,
        'inputValidator' => new \yii\web\JsExpression("
            function (value) {
                return new Promise(function (resolve) {
                    if (value === 'RUS') {
                        resolve()
                    } else {
                        resolve('You need to select Russia :)')
                    }
                })
            }
        ")
    ],
    'callback' => new \yii\web\JsExpression("
        function (result) {
            if (result.value) {
                swal({
                    type: 'success',
                    html: 'You selected: ' + result.value
                })
            }
        }
    "),
]) ?>
```

Type Radio:
```php
$script = new \yii\web\JsExpression("
    // inputOptions can be an object or Promise
    var inputOptions = new Promise(function (resolve) {
        setTimeout(function () {
            resolve({
                '#ff0000': 'Red',
                '#00ff00': 'Green',
                '#0000ff': 'Blue'
            })
        }, 2000)
    })
");
$this->registerJs($script, \yii\web\View::POS_HEAD);

echo SweetAlert2::widget([
    'options' => [
        'title' => 'Select color',
        'input' => SweetAlert2::INPUT_TYPE_RADIO,
        'inputOptions' => new \yii\web\JsExpression("inputOptions"),
        'inputValidator' => new \yii\web\JsExpression("
            function (result) {
                return new Promise(function (resolve) {
                    if (result) {
                        resolve()
                    } else {
                        resolve('You need to select something!')
                    }
                })
            }
        ")
    ],
    'callback' => new \yii\web\JsExpression("
        function (result) {
            swal({
                type: 'success',
                html: 'You selected: ' + result.value
            })
        }
    "),
]); ?>
```

Type Checkbox:
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => 'Terms and conditions',
        'input' => SweetAlert2::INPUT_TYPE_CHECKBOX,
        'inputValue' => 1,
        'inputPlaceholder' => 'I agree with the terms and conditions',
        'confirmButtonText' => 'Continue <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>',
        'inputValidator' => new \yii\web\JsExpression("
            function (result) {
                return new Promise(function (resolve) {
                    if (result) {
                        resolve()
                    } else {
                        resolve('You need to agree with T&C')
                    }
                })
            }
        ")
    ],
    'callback' => new \yii\web\JsExpression("
        function (result) {
            swal({
                type: 'success',
                html: 'You agreed with T&C :' + result.value
            })
        }
    "),
]) ?>
```

Type File:
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => 'Select image',
        'input' => SweetAlert2::INPUT_TYPE_FILE,
        'inputAttributes' => [
            'accept' => 'image/*',
            'aria-label' => 'Upload your profile picture',
        ],
    ],
    'callback' => new \yii\web\JsExpression("
        function(result) {
            var reader = new FileReader
            reader.onload = function (e) {
                swal({
                    title: 'Your uploaded picture',
                    imageUrl: e.target.result,
                    imageAlt: 'The uploaded picture'
                })
            }
            reader.readAsDataURL(result.value)
        }
    "),
]) ?>
```

Type Range:
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => 'How old are you?',
        'type' => SweetAlert2::TYPE_QUESTION,
        'input' => Alert::INPUT_TYPE_RANGE,
        'inputAttributes' => [
            'min' => 8,
            'max' => 120,
            'step' => 1,
        ],
        'inputValue' => 25,
    ]
]) ?>
```

Multiple inputs aren't supported, you can achieve them by using `html` and `preConfirm` parameters.
Inside the `preConfirm()` function you can pass the custom result to the `resolve()` function as a parameter:
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => 'Multiple inputs',
        'html' => '<input id="swal-input1" class="swal2-input"> <input id="swal-input2" class="swal2-input">',
        'preConfirm' => new \yii\web\JsExpression("
            function () {
                return new Promise(function (resolve) {
                    resolve([
                        $('#swal-input1').val(),
                        $('#swal-input2').val()
                    ])
                })
            }
        "),
        'onOpen' => new \yii\web\JsExpression("
            function () {
                $('#swal-input1').focus()
            }
        "),
    ],
    'callback' => new \yii\web\JsExpression("
        function (result) {
            swal(JSON.stringify(result.value))
        }
    "),
]) ?>
```
Ajax request example
```php
<?= SweetAlert2::widget([
    'options' => [
        'title' => 'Submit email to run ajax request',
        'input' => SweetAlert2::INPUT_TYPE_EMAIL,
        'showCancelButton' => true,
        'confirmButtonText' => 'Submit',
        'showLoaderOnConfirm' => true,
        'preConfirm' => new \yii\web\JsExpression("
            function (email) {
                return new Promise(function (resolve) {
                    setTimeout(function () {
                        if (email === 'taken@example.com') {
                            swal.showValidationError(
                                'This email is already taken.'
                            )
                        }
                        resolve()
                    }, 2000)
                })
            }
        "),
        'allowOutsideClick' => false,
    ],
    'callback' => new \yii\web\JsExpression("
        function (result) {
            if (result.value) {
                swal({
                    type: 'success',
                    title: 'Ajax request finished!',
                    html: 'Submitted email: ' + result.value
                })
            }
        }
    "),
]) ?>
```
