<?php

namespace app\models;

use Yii;
//use \yii\web\IdentityInterface;
//use \yii\db\ActiveRecord;
/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $email Correo Electronico y "login" del usuario.
 * @property string $password
 * @property string $nick
 * @property string $nombre
 * @property string $apellidos
 * @property string|null $fecha_nacimiento Fecha de nacimiento del usuario o NULL si no lo quiere informar.
 * @property string|null $direccion Direccion del usuario o NULL si no quiere informar.
 * @property int $area_id Area/Zona de localización del usuario o CERO si no lo quiere informar (como si fuera NULL), aunque es recomendable.
 * @property string $rol Código de la Clase / Tipo de Perfil: N=Normal, M=Moderador, P=Patrocinador, A=Administrador
 * @property int $avisos_por_correo Indicador de si el usuario desea recibir correos con los avisos que se generan en el sistema para él o no.
 * @property int $avisos_agrupados Indicador de si los avisos se envian directamente al generarlos, se agrupan en un solo correo, o lo que sea.
 * @property int $avisos_marcar_leidos Indicador de marcar los correos leidos como borrados después de un tiempo  0:No marcar, >0:tiempo en días.
 * @property int $avisos_eliminar_borrados Indicador para eliminar los correos borrados tras el tiempo indicado: >=1 día y <=1 año, o como se considere oportuno.
 * @property string|null $fecha_registro Fecha y Hora de registro del usuario o NULL si no se conoce por algún motivo (que no debería ser).
 * @property int $confirmado Indicador de usuario ha confirmado su registro o no.
 * @property string|null $fecha_acceso Fecha y Hora del ultimo acceso del usuario. Debería estar a NULL si no ha accedido nunca.
 * @property int $num_accesos Contador de accesos fallidos del usuario o CERO si no ha tenido o se ha reiniciado por un acceso valido o por un administrador.
 * @property int $bloqueado Indicador de usuario bloqueado: 0=No, 1=Si(bloqueada por accesos), 2=Si(bloqueada por administrador), ...
 * @property string|null $fecha_bloqueo Fecha y Hora del bloqueo del usuario. Debería estar a NULL si no está bloqueado o si se desbloquea.
 * @property string|null $notas_bloqueo Notas visibles sobre el motivo del bloqueo del usuario o NULL si no hay -se muestra por defecto según indique "bloqueado"-.
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'nick', 'nombre', 'apellidos', 'rol', 'confirmado'], 'required'],
            [['fecha_nacimiento', 'fecha_registro', 'fecha_acceso', 'fecha_bloqueo'], 'safe'],
            [['direccion', 'notas_bloqueo'], 'string'],
            [['area_id', 'avisos_por_correo', 'avisos_agrupados', 'avisos_marcar_leidos', 'avisos_eliminar_borrados', 'confirmado', 'num_accesos', 'bloqueado'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 60],
            [['nick'], 'string', 'max' => 25],
            [['nombre'], 'string', 'max' => 50],
            [['apellidos'], 'string', 'max' => 100],
            [['rol'], 'string', 'max' => 1],
            [['email'], 'unique'],
            [['nick'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Correo Electronico *',
            'password' => 'Password *',
            'nick' => 'Nombre de usuario *',
            'nombre' => 'Nombre *',
            'apellidos' => 'Apellidos *',
            'fecha_nacimiento' => 'Fecha de nacimiento',
            'direccion' => 'Direccion',
            'area_id' => 'Codigo postal',
            'rol' => 'Código de la Clase / Tipo de Perfil: N=Normal, M=Moderador, P=Patrocinador, A=Administrador',
            'avisos_por_correo' => '¿Desea recibir correos de los eventos?',
            'avisos_agrupados' => '¿Desea recibir todos los correos agrupados?',
            'avisos_marcar_leidos' => '¿Desea marcar los correos leidos como borrados?',
            'avisos_eliminar_borrados' => '¿Desea eliminar los correos borrados en un dia?',
            'fecha_registro' => 'Fecha y Hora de registro del usuario o NULL si no se conoce por algún motivo (que no debería ser).',
            'confirmado' => 'Indicador de usuario ha confirmado su registro o no.',
            'fecha_acceso' => 'Fecha y Hora del ultimo acceso del usuario. Debería estar a NULL si no ha accedido nunca.',
            'num_accesos' => 'Contador de accesos fallidos del usuario o CERO si no ha tenido o se ha reiniciado por un acceso valido o por un administrador.',
            'bloqueado' => 'Indicador de usuario bloqueado: 0=No, 1=Si(bloqueada por accesos), 2=Si(bloqueada por administrador), ...',
            'fecha_bloqueo' => 'Fecha y Hora del bloqueo del usuario. Debería estar a NULL si no está bloqueado o si se desbloquea.',
            'notas_bloqueo' => 'Notas visibles sobre el motivo del bloqueo del usuario o NULL si no hay -se muestra por defecto según indique \"bloqueado\"-.',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UsuariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuariosQuery(get_called_class());
    }





    public static function findIdentity($id)
    {
        return self::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type=null)
    {
        return null;
    }

    public static function findByUsername($username)
    {
        return self::findOne(['nick'=>$username]);
    }






    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
      //return md5( sprintf( 'AK:a=%s,b=%s', $this->id, LINE));
      return md5( sprintf( 'AK:id=%s', $this->id));
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return $password;
        //return password_verify($password, $this->password);
    }

  
}
