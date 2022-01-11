<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actividades".
 *
 * @property int $id
 *@property string $titulo Titulo corto o slogan para la actividad.
 * @property string|null $descripcion Descripción breve de la actividad o NULL si no es necesaria.
 * @property string|null $fecha_celebracion Fecha y Hora de celebración de la actividad o NULL si no se conoce (mostrar próximamente).
 * @property int $duracion_estimada Tiempo en Minutos de duración estimada de la actividad, si es CERO no se conoce o no es relevante.
 * @property string|null $detalles_celebracion Detalles de celebración de la actividad si es necesario o NULL si no hay.
 * @property string|null $direccion Dirección concreta del lugar de celebración de la actividad o NULL si no se conoce, aunque no debería estar vacío este dato.
 * @property string|null $como_llegar Notas sobre cómo llegar a la dirección indicada o NULL si no hay indicaciones de como llegar.
 * @property string|null $notas_lugar Notas adicionales sobre el lugar de celebración de la actividad que no forman parte de la dirección o de las indicaciones, o NULL si no hay.
 * @property int|null $area_id Area/Zona de celebración de la actividad o CERO si no existe o aún no está indicado (como si fuera NULL).
 * @property string|null $notas Notas adicionales sobre la actividad que no forman parte de las posibles notas anteriores o NULL si no hay.
 * @property string|null $url Dirección web externa (opcional) que enlaza con la página "oficial" de la actividad o NULL si no hay.
 * @property string|null $imagen_id Nombre identificativo (fichero interno) con la imagen principal o "de presentación" de la actividad, o NULL si no hay.
 * @property int $edad_id Edad recomendada por Rango de Edades: 0=Todas las edades, 1=Bebé (0 a 3 años), 2=Infantil (4 a 9), 3=Alevín (10 a 14), 3=Juvenil (15 a 17), 4=Adulto Joven (18-25), 5=Adulto Medio (26-35), 6=Adulto Mayor (36-65), 7=Tercera Edad (>66).
 * @property int $publica Indicador de actividad para todos los usuarios o solo para los registrados: 0=Privada, 1=Publica.
 * @property int $visible Indicador de actividad visible a los usuarios o invisible (se está manteniendo): 0=Invisible, 1=Visible.
 * @property int $terminada Indicador de actividad terminada: 0=No, 1=Realizada, 2=Suspendida, 3=Cancelada por Inadecuada, ...
 * @property string|null $fecha_terminacion Fecha y Hora de terminación de la actividad. Debería estar a NULL si no está terminada.
 * @property string|null $notas_terminacion Notas visibles sobre el motivo de la terminación de la actividad.
 * @property int $num_denuncias Contador de denuncias de la actividad o CERO si no ha tenido.
 * @property string|null $fecha_denuncia1 Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.
 * @property int $bloqueada Indicador de actividad bloqueada: 0=No, 1=Si(bloqueada por denuncias), 2=Si(bloqueada por administrador), ...
 * @property string|null $fecha_bloqueo Fecha y Hora del bloqueo de la actividad. Debería estar a NULL si no está bloqueada o si se desbloquea.
 * @property string|null $notas_bloqueo Notas visibles sobre el motivo del bloqueo de la actividad o NULL si no hay -se muestra por defecto según indique "bloqueada"-.
 * @property int $max_participantes Indica si está abierta la participación y el número máximo de participantes que pueden apuntarse en la actividad, 0:No se admiten participantes, >0:Ese valor límite, -1:No hay límite máximo.
 * @property int $min_participantes Indica el número de participantes apuntados para que la actividad se lleve a cabo, >=0:Ese valor mínimo, -1:No hay mínimo.
 * @property int $reserva_participantes Valor lógico para indicar si se admiten o no participantes en reserva en caso de que esté abierta la participación de la actividad con el "participantes_maxima".
 * @property string|null $formulario_participacion Bloque de información con la configuración de los campos de datos requeridos para el formulario de registro de participación en la actividad. Será NULL si no necesita configuración de datos adicionales.
 * @property int $votosOK Contador de votos a favor para la actividad.
 * @property int $votosKO Contador de votos encontra para la actividad.
 * @property int|null $crea_usuario_id Usuario que ha creado la actividad o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string|null $crea_fecha Fecha y Hora de creación de la actividad o NULL si no se conoce por algún motivo.
 * @property int|null $modi_usuario_id Usuario que ha modificado la actividad por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string|null $modi_fecha Fecha y Hora de la última modificación de la actividad o NULL si no se conoce por algún motivo.
 * @property string|null $notas_admin Notas adicionales para los administradores sobre la actividad o NULL si no hay.

 */
class Actividades extends \yii\db\ActiveRecord
{
  public $edad;
  public $area;
  public $publica1;
  public $visible1;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actividades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           [['edad','edad_id','area'], 'safe'],
            [['titulo'], 'required'],
            [['titulo', 'descripcion', 'detalles_celebracion', 'direccion', 'como_llegar', 'notas_lugar', 'notas', 'url', 'notas_terminacion', 'notas_bloqueo', 'formulario_participacion', 'notas_admin'], 'string'],
            [['fecha_celebracion', 'fecha_terminacion', 'fecha_denuncia1', 'fecha_bloqueo', 'crea_fecha', 'modi_fecha'], 'safe'],
            [['duracion_estimada', 'area_id', 'edad_id', 'publica', 'visible', 'terminada', 'num_denuncias', 'bloqueada', 'max_participantes', 'min_participantes', 'reserva_participantes', 'votosOK', 'votosKO', 'crea_usuario_id', 'modi_usuario_id'], 'integer'],
            [['imagen_id'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'fecha_celebracion' => Yii::t('app', 'Fecha Celebracion'),
            'duracion_estimada' => Yii::t('app', 'Duracion Estimada'),
            'detalles_celebracion' => Yii::t('app', 'Detalles Celebracion'),
            'direccion' => Yii::t('app', 'Direccion'),
            'como_llegar' => Yii::t('app', 'Como Llegar'),
            'notas_lugar' => Yii::t('app', 'Notas Lugar'),
            'area_id' => Yii::t('app', 'Area ID'),
            'notas' => Yii::t('app', 'Notas'),
            'url' => Yii::t('app', 'Url'),
            'imagen_id' => Yii::t('app', 'Imagen ID'),
            'edad_id' => Yii::t('app', 'Edad ID'),
            'publica' => Yii::t('app', 'Publica'),
            'visible' => Yii::t('app', 'Visible'),
            'terminada' => Yii::t('app', 'Terminada'),
            'fecha_terminacion' => Yii::t('app', 'Fecha Terminacion'),
            'notas_terminacion' => Yii::t('app', 'Notas Terminacion'),
            'num_denuncias' => Yii::t('app', 'Num Denuncias'),
            'fecha_denuncia1' => Yii::t('app', 'Fecha Denuncia1'),
            'bloqueada' => Yii::t('app', 'Bloqueada'),
            'fecha_bloqueo' => Yii::t('app', 'Fecha Bloqueo'),
            'notas_bloqueo' => Yii::t('app', 'Notas Bloqueo'),
            'max_participantes' => Yii::t('app', 'Max Participantes'),
            'min_participantes' => Yii::t('app', 'Min Participantes'),
            'reserva_participantes' => Yii::t('app', 'Reserva Participantes'),
            'formulario_participacion' => Yii::t('app', 'Formulario Participacion'),
            'votosOK' => Yii::t('app', 'Votos Ok'),
            'votosKO' => Yii::t('app', 'Votos Ko'),
            'crea_usuario_id' => Yii::t('app', 'Crea Usuario ID'),
            'crea_fecha' => Yii::t('app', 'Crea Fecha'),
            'modi_usuario_id' => Yii::t('app', 'Modi Usuario ID'),
            'modi_fecha' => Yii::t('app', 'Modi Fecha'),
            'notas_admin' => Yii::t('app', 'Notas Admin'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ActividadesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActividadesQuery(get_called_class());
    }

    public  function afterfind()
    {
      parent::afterFind();
//atributo virtual edad sustituimos el edad_id por su valor
      switch ($this->edad_id) {
                case 1:
                $this->edad = "Bebé (0 a 3 años)";
                        break;
                case 2:
                $this->edad = "Infantil (4 a 9)";
                        break;
                case 3:
                $this->edad = "Alevín (10 a 14) y Juvenil (15 a 17)";
                        break;
                case 4:
                $this->edad = "Adulto Joven (18-25)";
                        break;
                case 5:
                $this->edad = "Adulto Medio (26-35)";
                        break;
                case 6:
                $this->edad = "Adulto Mayor (36-65)";
                        break;
                case 7:
                $this->edad = "Tercera edad (>66)";
                        break;


                default:
                $this->edad = "Todas las edades";
                        break;
        }
      //atributo virtual area sustituimos el area_id por su valor
        switch ($this->area_id) {
                case 1:
                $this->area = "Pais";
                        break;
                case 2:
                $this->area = "Comunidad Autonoma";
                        break;
                case 3:
                $this->area = "Provincia";
                        break;
                case 4:
                $this->area = "Población";
                        break;
                case 5:
                $this->area = "Zona";
                        break;


                default:
                $this->area = "Sin definir area";
                break;
        }

        //Comprobamos que la fecha de celebracion sea mayor que la fecha actual
        if ($this->fecha_celebracion < date('Y-m-d')) {
            $this->terminada = 1;
            // Lo actualizamos en la BD


        }
        switch($this->publica){
            case 0:
                $this->publica1 = "Privado";
                break;
            case 1:
                $this->publica1 = "Público";
                break;
        }
        switch($this->visible){
            case 0:
                $this->visible1 = "No visible";
                break;

}}
