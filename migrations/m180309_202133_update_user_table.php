<?php

use yii\db\Migration;

/**
 * Class m180309_202133_update_user_table
 */
class m180309_202133_update_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'email', $this->string()->notNull()->unique());
        $this->addColumn('{{%user}}', 'status', $this->smallInteger()->notNull()->defaultValue(10));
        $this->addColumn('{{%user}}', 'created_at', $this->integer()->notNull() );
        $this->addColumn('{{%user}}', 'updated_at', $this->integer()->notNull() );

    }

    public function down()
    {
        $this->dropTable('user');
    }
}
