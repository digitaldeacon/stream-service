<?php

use yii\db\Migration;

class m160518_081006_streaLog_add_clientip extends Migration
{
    public function up()
    {
        $this->addColumn('stream_log','clientip','VARCHAR(49)');
    }

    public function down()
    {
        $this->dropColumn('stream_log','clientip','VARCHAR(49)');
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
