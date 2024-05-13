<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "periodo".
 *
 * @property int $per_id
 * @property int $per_fkpersonal
 * @property string $per_nombre
 *
 * @property Materia[] $materias
 * @property Personal $perFkpersonal
 */
class Periodo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'periodo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['per_fkpersonal', 'per_nombre'], 'required'],
            [['per_fkpersonal'], 'integer'],
            [['per_nombre'], 'string', 'max' => 80],
            [['per_fkpersonal'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::class, 'targetAttribute' => ['per_fkpersonal' => 'per_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'per_id' => 'Per ID',
            'per_fkpersonal' => 'Per Fkpersonal',
            'per_nombre' => 'Per Nombre',
        ];
    }

    /**
     * Gets query for [[Materias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaterias()
    {
        return $this->hasMany(Materia::class, ['mat_fkperiodo' => 'per_id']);
    }

    /**
     * Gets query for [[PerFkpersonal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerFkpersonal()
    {
        return $this->hasOne(Personal::class, ['per_id' => 'per_fkpersonal']);
    }

    public static function getList() {
        $periodos = self::find()->all();
        return ArrayHelper::map($periodos, 'per_id', 'per_nombre');
    }
}
