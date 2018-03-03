<?php

use yii\db\Migration;

/**
 * Class m180303_135010_upd_name_in_image_table
 */
class m180303_135010_upd_name_in_image_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%image}}', 'name', $this->string(80));

    }

    public function down()
    {
        $this->dropColumn('{{%image}}', 'name');
    }
}
