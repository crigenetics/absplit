<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "session_history".
 *
 * @property int $id
 * @property string $ts
 * @property int $session_id
 * @property string $url
 * @property string $query_string
 * @property string $pagetype
 * @property string $key1
 * @property string $key2
 */
class ABSessionHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'session_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ts', 'session_id'], 'safe'],
            [['url'], 'string', 'max' => 1024],
            [['query_string'], 'string', 'max' => 2048],
            [['pagetype'], 'string', 'max' => 32],
            [['key1', 'key2'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ts' => 'Ts',
            'url' => 'Url',
            'query_string' => 'Query String',
            'pagetype' => 'Pagetype',
            'key1' => 'Key1',
            'key2' => 'Key2',
        ];
    }
}
