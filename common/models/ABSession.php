<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "session".
 *
 * @property int $id
 * @property int $pageid
 * @property string $ip
 * @property string $sid
 * @property string $created_at
 * @property string $last_hit_at
 */
class ABSession extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pageid'], 'integer'],
            [['created_at', 'last_hit_at'], 'safe'],
            [['ip'], 'string', 'max' => 64],
            [['sid'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pageid' => 'Pageid',
            'ip' => 'Ip',
            'sid' => 'Sid',
            'created_at' => 'Created At',
            'last_hit_at' => 'Last Hit At',
        ];
    }
}
