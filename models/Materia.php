<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materia".
 *
 * @property int $mat_id
 * @property string $mat_nombre
 * @property int $mat_fkperiodo
 *
 * @property Periodo $matFkperiodo
 * @property Tarea[] $tareas
 */
class Materia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mat_nombre', 'mat_fkperiodo'], 'required'],
            [['mat_fkperiodo'], 'integer'],
            [['mat_nombre'], 'string', 'max' => 40],
            [['mat_fkperiodo'], 'exist', 'skipOnError' => true, 'targetClass' => Periodo::class, 'targetAttribute' => ['mat_fkperiodo' => 'per_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mat_id' => 'ID',
            'mat_nombre' => 'Nombre de la materia',
            'mat_fkperiodo' => 'Elige un periodo',
        ];
    }

    /**
     * Gets query for [[MatFkperiodo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatFkperiodo()
    {
        return $this->hasOne(Periodo::class, ['per_id' => 'mat_fkperiodo']);
    }

    /**
     * Gets query for [[Tareas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTareas()
    {
        return $this->hasMany(Tarea::class, ['tar_fkmateria' => 'mat_id']);
    }
}
