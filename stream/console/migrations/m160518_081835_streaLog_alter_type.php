<?php

use yii\db\Migration;

class m160518_081835_streaLog_alter_type extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE `stream_log` CHANGE `type` `type` ENUM('info','error','login')");
    }

    public function down()
    {
        echo "m160518_081835_streaLog_alter_type cannot be reverted.\n";

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
