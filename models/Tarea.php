<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tarea".
 *
 * @property int $tar_id
 * @property string $tar_nombre
 * @property string $tar_descripcion
 * @property int $tar_fkprioridad
 * @property int $tar_fkestado
 * @property string $tar_creacion
 * @property string $tar_finalizacion
 * @property string|null $tar_inicio
 * @property string|null $tar_cierre
 * @property int $tar_fkmateria
 *
 * @property Estado $tarFkestado
 * @property Materia $tarFkmateria
 * @property Prioridad $tarFkprioridad
 * @property Tareausuario[] $tareausuarios
 */
class Tarea extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tarea';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tar_nombre', 'tar_descripcion', 'tar_fkprioridad', 'tar_fkestado', 'tar_creacion', 'tar_finalizacion', 'tar_fkmateria'], 'required'],
            [['tar_fkprioridad', 'tar_fkestado', 'tar_fkmateria'], 'integer'],
            [['tar_creacion', 'tar_finalizacion', 'tar_inicio', 'tar_cierre'], 'safe'],
            [['tar_nombre'], 'string', 'max' => 60],
            [['tar_descripcion'], 'string', 'max' => 255],
            [['tar_fkestado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::class, 'targetAttribute' => ['tar_fkestado' => 'est_id']],
            [['tar_fkmateria'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::class, 'targetAttribute' => ['tar_fkmateria' => 'mat_id']],
            [['tar_fkprioridad'], 'exist', 'skipOnError' => true, 'targetClass' => Prioridad::class, 'targetAttribute' => ['tar_fkprioridad' => 'prio_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tar_id' => 'Tar ID',
            'tar_nombre' => 'Nombre',
            'tar_descripcion' => 'Descripcion',
            'tar_fkprioridad' => 'Tar Fkprioridad',
            'tar_fkestado' => 'Tar Fkestado',
            'tar_creacion' => 'Tar Creacion',
            'tar_finalizacion' => 'Fecha de Finalizacion',
            'tar_inicio' => 'Fecha de Inicio',
            'tar_cierre' => 'Fecha de Cierre',
            'tar_fkmateria' => 'Tar Fkmateria',
        ];
    }

    /**
     * Gets query for [[TarFkestado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarFkestado()
    {
        return $this->hasOne(Estado::class, ['est_id' => 'tar_fkestado']);
        
    }

    /**
     * Gets query for [[TarFkmateria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarFkmateria()
    {
        return $this->hasOne(Materia::class, ['mat_id' => 'tar_fkmateria']);
    }

    /**
     * Gets query for [[TarFkprioridad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarFkprioridad()
    {
        return $this->hasOne(Prioridad::class, ['prio_id' => 'tar_fkprioridad']);
    }

    /**
     * Gets query for [[Tareausuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTareausuarios()
    {
        return $this->hasMany(Tareausuario::class, ['tarusu_fktarea' => 'tar_id']);
    }
}
