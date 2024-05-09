<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tareausuario".
 *
 * @property int $tarusu_id
 * @property int $tarusu_fkusuario
 * @property int $tarusu_fktarea
 * @property string $tarusu_tipo
 *
 * @property Tarea $tarusuFktarea
 * @property User $tarusuFkusuario
 */
class Tareausuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tareausuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tarusu_fkusuario', 'tarusu_fktarea', 'tarusu_tipo'], 'required'],
            [['tarusu_fkusuario', 'tarusu_fktarea'], 'integer'],
            [['tarusu_tipo'], 'string', 'max' => 20],
            [['tarusu_fktarea'], 'exist', 'skipOnError' => true, 'targetClass' => Tarea::class, 'targetAttribute' => ['tarusu_fktarea' => 'tar_id']],
            [['tarusu_fkusuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['tarusu_fkusuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tarusu_id' => 'Tarusu ID',
            'tarusu_fkusuario' => 'Tarusu Fkusuario',
            'tarusu_fktarea' => 'Tarusu Fktarea',
            'tarusu_tipo' => 'Tarusu Tipo',
        ];
    }

    /**
     * Gets query for [[TarusuFktarea]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarusuFktarea()
    {
        return $this->hasOne(Tarea::class, ['tar_id' => 'tarusu_fktarea']);
    }

    /**
     * Gets query for [[TarusuFkusuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarusuFkusuario()
    {
        return $this->hasOne(User::class, ['id' => 'tarusu_fkusuario']);
    }
}
