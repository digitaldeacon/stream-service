<?php

use yii\db\Migration;

class m160318_093701_table_add_stream extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE `stream` (
          `id` int(11) NOT NULL,
          `name` varchar(120) CHARACTER SET utf8_unicode_ci NOT NULL,
          `url` text CHARACTER SET utf8_unicode_ci,
          `code` varchar(12) CHARACTER SET utf8_unicode_ci NOT NULL,
          `description` text CHARACTER SET utf8_unicode_ci,
          `details` mediumtext CHARACTER SET utf8_unicode_ci,
          `config` text CHARACTER SET utf8_unicode_ci,
          `parent` int(11) DEFAULT NULL,
          `active` tinyint(1) NOT NULL DEFAULT '0',
          `start` datetime DEFAULT NULL,
          `end` datetime DEFAULT NULL,
          `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          `modified_by` int(11) NOT NULL
        ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
    }

    public function down()
    {
        echo "m160318_093701_table_add_stream cannot be reverted.\n";

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
