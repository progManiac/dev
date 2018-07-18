<?php

use yii\db\Migration;

/**
 * Handles the creation of table `service`.
 * Has foreign keys to the tables:
 *
 * - `service`
 */
class m180705_084923_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('service', [
            'id' => $this->primaryKey(),
            'parent' => $this->integer(),
            'name' => $this->string()->notNull(),
        ], "CHARACTER SET utf8 COLLATE utf8_general_ci");

        // creates index for column `parent`
        $this->createIndex(
            'idx-service-parent',
            'service',
            'parent'
        );

        // add foreign key for table `service`
        $this->addForeignKey(
            'fk-service-parent',
            'service',
            'parent',
            'service',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `service`
        $this->dropForeignKey(
            'fk-service-parent',
            'service'
        );

        // drops index for column `parent`
        $this->dropIndex(
            'idx-service-parent',
            'service'
        );

        $this->dropTable('service');
    }
}
