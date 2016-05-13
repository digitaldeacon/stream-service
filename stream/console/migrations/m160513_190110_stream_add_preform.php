<?php

use yii\db\Migration;

class m160513_190110_stream_add_preform extends Migration
{
    public function up()
    {
        $this->addColumn('stream','form_pre','TEXT');
    }

    public function down()
    {
        $this->dropColumnColumn('stream','form_pre');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
