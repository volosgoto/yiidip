<?php

use yii\db\Migration;

/**
 * Class m180310_134021_upd_user_table_created_at_2
 */
class m180310_134021_upd_user_table_created_at_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%user}}', 'created_at', $this->timestamp()->notNull() );
        $this->addColumn('{{%user}}', 'updated_at', $this->timestamp()->notNull() );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('user');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180310_134021_upd_user_table_created_at_2 cannot be reverted.\n";

        return false;
    }
    */
}
