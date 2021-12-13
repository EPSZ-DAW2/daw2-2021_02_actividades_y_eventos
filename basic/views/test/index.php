<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $this yii\web\View */

$this->title = 'Test de funcionamiento de extensiones.';
?>
<div class="site-index">

  <div class="row my-3">
<?php
    $idGrupoProgreso= 'progresoGrupo';
    $idProgreso= 'progresoBarra';
    $etiqueta= 'Test';
    echo yii\bootstrap5\Progress::widget([
      'id'=>$idGrupoProgreso,
      'percent' => 0,
      'label' => $etiqueta,
      'options' => ['class'=>'bg-light' ],
      'barOptions' => [ 'id' => $idProgreso, 'aria-label'=>$etiqueta],
    ]);
    $script= 'setInterval(function(){'
        .'var elem= $("#'.$idProgreso.'");'
        .'var lbl= elem.attr("aria-label");'
        .'var min= parseInt( elem.attr("aria-valuemin"));'
        .'var max= parseInt( elem.attr("aria-valuemax"));'
        .'var now= parseInt( elem.attr("aria-valuenow"));'
        .'now+=5; if (now > max) now= min;'
        //.'console.log("lbl= "+lbl+", min= "+min+", max= "+max+", now= "+now+", bg= "+bg_new);'
        .'var clases=["bg-success","bg-info","bg-warning","bg-danger"];'
        .'var bg_now= ""; for(i=0; i<clases.length; i++){ if (elem.hasClass(clases[i])) { bg_now=clases[i]; break;}}'
        .'var bg_new= clases[ Math.floor(now / ((max-min+1)/clases.length)) ];'
        //.'console.log("bg_now= "+bg_now+", bg_new= "+bg_new+", i= "+i+", now= "+now);'
        .'elem.attr("aria-valuenow",now).width(now+"%").text(lbl+" "+now+"%");'
        .'if (bg_now != bg_new){ elem.removeClass(bg_now).addClass(bg_new);}'
      .'}, 1000);';
    $this->registerJs( $script, $this::POS_READY, 'script_'.$idGrupoProgreso);
?>
  </div>
  
  <div class="row my-3">
    <div class="col-4">
      Selectores de Fecha con JUI:
    </div>
    <div class="col-4">
<?php
  echo Html::label( 'Fecha Inicial:', 'selFechaIni', ['class'=>'me-3']);
  echo yii\jui\DatePicker::widget(['id'=>'selFechaIni', 'name' => 'fechaIni']); 
?>
    </div>
    <div class="col-4">
<?php
  echo Html::label( 'Fecha Final:', 'selFechaFin', ['class'=>'me-3']);
  echo yii\jui\DatePicker::widget(['id'=>'selFechaFin', 'name' => 'fechaFin']); 
?>
    </div>
  </div>
  
  <div class="row my-3">
    <div class="col-6 bg-warning">
<?php 
  echo Html::label( 'Elegir un lenguaje que te guste:', 'buscaLenguaje', ['class'=>'me-3']);
  echo yii\jui\Autocomplete::widget([
      //Si el componente esta relacionado con un modelo, indicarlo con su atributo,
      //sino, indicar nombre y valor, y opcionalmente el identificador.
      'id' => 'buscaLenguaje',
      'model' => null, 
      'attribute' => null,
      //'name' => 'txtLenguaje',//Comentar el nombre si no queremos guardar aqui lo seleccionado.
      'value' => '',
      'clientOptions' => [
          'source' => Url::toRoute( 'test/buscar-lenguaje'),//envia "term" como busqueda
          'select' =>  new JsExpression( 'function(ev,ui){'
              //--.'console.log(ui);'
              .'var msg="Seleccionado: ID= "+ui.item.id+", LABEL= "+ui.item.label + ", VALUE= "+ui.item.value;'
              //--.'alert(msg);'
              .'$("<div>").text(msg).prependTo("#log");'
              .'$("#log").scrollTop(0);'
            .'}'),
          'classes'=>'',
          'delay'=>250,
          'minLength' => 1,
          
      ],
      'options' => [
      ],
  ]); 
?>
    </div>
    <div class="col-6 bg-light">
      <div id="log" class=""></div>
    </div>
  </div>


  
</div>
