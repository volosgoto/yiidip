<?php

use yii\db\Migration;

/**
 * Class m180303_134951_upd_image_table
 */
class m180303_134951_upd_image_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'filePath' => $this->string(400)->notNull(),
            'itemId' => $this->integer(),
            'isMain' => $this->boolean(),
            'modelName' => $this->string(150)->notNull(),
            'urlAlias' => $this->string(400)->notNull(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%image}}');
    }
}
