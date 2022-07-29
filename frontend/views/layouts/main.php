<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language; ?>" class="h-100">
<head>
    <meta charset="<?php echo Yii::$app->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags(); ?>
    <title><?php echo Html::encode($this->title); ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>
    <div class="main-wrapper">
        <div class="content">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => '/',
                'options' => [
                    'class' => 'navbar navbar-expand-lg navbar-light bg-light',
                ],
            ]);
$menuItems = [
    ['label' => 'Материалы', 'url' => ['material/index']],
    ['label' => 'Теги', 'url' => ['tag/index']],
    ['label' => 'Категории', 'url' => ['category/index']],
];
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => $menuItems,
]);
NavBar::end();
?>
            <div class="container">
                <?php echo common\widgets\Alert::widget(); ?>
                <?php echo $content; ?>
            </div>
        </div>
        <footer class="footer py-4 mt-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col text-muted"><?php echo Yii::$app->name; ?></div>
                </div>
            </div>
        </footer>
    </div>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage();
