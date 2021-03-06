<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="https://cdn3.professor-falken.com/recursos/js/snowstorm.js"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);

/*NUEVO*/
$navItems=[
    ['label' => 'Home', 'url' => ['/site/index']],
    ['label' => 'About', 'url' => ['/site/about']],
    //['label' => 'Contact', 'url' => ['/site/contact']],
    ['label' => 'Actividades', 'url' => ['/actividades/ficharesumida']],
    ['label' => 'Areas', 'url' => ['/area/index']],
    ['label' => 'Etiquetas', 'url' => ['/etiqueta/index']],
    ['label' => 'Imagenes', 'url' => ['/actividad-imagen/index']],
  ];

$opciones = ['label' => 'Opciones de usuario' , 'items' => [
    ['label' => 'Mi Perfil', 'url' => ['/usuarios/']],
    ['label' => 'Avisos y Notificaciones', 'url' => ['/usuario-avisos/index']],
    ['label' => 'Actividades Propias (aprovechando lo creado en F2)', 'url' => ['/actividad-imagen/index']],
    ['label' => 'Actividades en Seguimiento (F2)', 'url' => ['/actividad-imagen/index']],
    ['label' => 'Actividades como Participante (F2, F4)', 'url' => ['/actividad-participante/index']],
    ['label' => 'Comentarios en Actividades (F2, F3)', 'url' => ['/actividad-comentarios/index']],// no hay clase
    ['label' => 'Alertas y Notas (F5).', 'url' => ['/usuario-avisos/index']],
]];
  if (Yii::$app->user->isGuest)
  {
    array_push($navItems,['label' => 'Sign In', 'url' => ['/site/signin']],['label' => 'Login', 'url' => ['/site/login']]);
  }
  else
  {
    $rol= Yii::$app->user->identity->rol;
    //$lista_actividad = ['label' => 'ACt', $lista_actividad];
    if ($rol == 'A' || $rol == 'M') {
        array_push($navItems, ['label' => 'ADMIN USUARIOS', 'url' => ['/usuarios/index']]);
        array_push($navItems, [
            'label' => 'ADMIN ACTIVIDADES',
            'url' => ['/actividades/index'],
        ]);
    $navItems[] = ['label' => 'Areas del Moderador', 'url' => ['/usuario-area-moderacion/index']];
    }

    if ($rol=="N") 
       {
    array_push($navItems,['label' => 'Seguimiento Actividades', 'url' => ['/actividad-seguimientos/fichaseguimientos']]);
    array_push($navItems,['label' => 'Comentarios', 'url' => ['/comentarios/ficharesumida']]);
    }
    
    array_push($navItems, [
        'label' => 'Logout (' . Yii::$app->user->identity->nick . ')',
        'url' => ['/site/logout'],
        'linkOptions' => ['data-method' => 'post'],
    ]);
  }

$navItems[] = $opciones;

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => $navItems,
    ]);

/*FIN NUEVO*/
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
