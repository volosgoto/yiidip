<?php

use yii\db\Migration;

/**
 * Class m180310_133413_upd_user
 */
class m180310_133413_upd_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'created_at', $this->timestamp()->null() );
        $this->addColumn('{{%user}}', 'updated_at', $this->timestamp()->null() );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180310_133413_upd_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180310_133413_upd_user cannot be reverted.\n";

        return false;
    }
    */
}
