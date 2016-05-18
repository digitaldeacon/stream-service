<?php

use yii\db\Migration;

class m160518_083538_streamLog_alter_indecies extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE stream_log DROP PRIMARY KEY");
        $this->addColumn('stream_log','id' ,'BIGINT');
        $this->execute("ALTER TABLE `stream_log` ADD PRIMARY KEY(`id`);");
        $this->execute("ALTER TABLE `stream_log` CHANGE `id` `id` BIGINT(20) NOT NULL AUTO_INCREMENT");
    }

    public function down()
    {
        echo "m160518_083538_streamLog_alter_indecies cannot be reverted.\n";

        return false;
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
