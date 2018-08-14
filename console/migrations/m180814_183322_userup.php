<?php

use yii\db\Migration;

/**
 * Class m180814_183322_userup
 */
class m180814_183322_userup extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


      $transaction = $this->getDb()->beginTransaction();
          $user = \Yii::createObject([
              'class'    => \common\models\User::className(),
              'scenario' => 'create',
              'email'    => 'admin',
              'username' => 'admin',
              'password' => 'admin',
          ]);
          if (!$user->insert(false)) {
              $transaction->rollBack();
              return false;
          }
          //$user->confirm();
          $transaction->commit();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180814_183322_userup cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180814_183322_userup cannot be reverted.\n";

        return false;
    }
    */
}
