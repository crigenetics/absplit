<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "abtests".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $page1
 * @property string $page2
 * @property int $page1_hits
 * @property int $page2_hits
 */
class ABTests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'abtests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page1_hits', 'page2_hits'], 'integer'],
            [['name', 'code'], 'string', 'max' => 255],
            [['page1', 'page2'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'page1' => 'Page1',
            'page2' => 'Page2',
            'page1_hits' => 'Page1 Hits',
            'page2_hits' => 'Page2 Hits',
        ];
    }
}
