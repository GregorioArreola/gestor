<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prioridad".
 *
 * @property int $prio_id
 * @property string $prio_nombre
 *
 * @property Tarea[] $tareas
 */
class Prioridad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prioridad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prio_nombre'], 'required'],
            [['prio_nombre'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prio_id' => 'Prio ID',
            'prio_nombre' => 'Prio Nombre',
        ];
    }

    /**
     * Gets query for [[Tareas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTareas()
    {
        return $this->hasMany(Tarea::class, ['tar_fkprioridad' => 'prio_id']);
    }
}
