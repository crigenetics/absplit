<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "conversions".
 *
 * @property int $id
 * @property int $session_id
 * @property int $session_history_id
 * @property string $orderno
 * @property string $ts
 */
class Conversion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conversions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_id', 'session_history_id'], 'integer'],
            [['ts'], 'safe'],
            [['orderno'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'session_id' => 'Session ID',
            'session_history_id' => 'Session History ID',
            'orderno' => 'Orderno',
            'ts' => 'Ts',
        ];
    }
}
