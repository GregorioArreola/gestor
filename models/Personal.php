<?php

namespace app\models;

use Yii;
use webvimark\modules\UserManagement\models\User;

/**
 * This is the model class for table "personal".
 *
 * @property int $per_id
 * @property string $per_nombre
 * @property string $per_paterno
 * @property string $per_materno
 * @property string $per_nacimiento
 * @property int $per_fkusuario
 *
 * @property User $perFkusuario
 * @property Periodo[] $periodos
 */
class Personal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['per_nombre', 'per_paterno', 'per_materno', 'per_nacimiento', 'per_fkusuario'], 'required'],
            [['per_nacimiento'], 'safe'],
            [['per_fkusuario'], 'integer'],
            [['per_nombre', 'per_paterno', 'per_materno'], 'string', 'max' => 45],
            [['per_fkusuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['per_fkusuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'per_id' => 'ID',
            'per_nombre' => 'Nombre',
            'per_paterno' => 'Paterno',
            'per_materno' => 'Materno',
            'per_nacimiento' => 'Fecha de Nacimiento',
            'per_fkusuario' => 'usuario',
        ];
    }

    /**
     * Gets query for [[PerFkusuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerFkusuario()
    {
        return $this->hasOne(User::class, ['id' => 'per_fkusuario']);
    }

    /**
     * Gets query for [[Periodos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodos()
    {
        return $this->hasMany(Periodo::class, ['per_fkpersonal' => 'per_id']);
    }
    
}
