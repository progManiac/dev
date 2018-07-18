<?php

use yii\db\Migration;

/**
 * Handles the creation of table `provider`.
 * Has foreign keys to the tables:
 *
 * - `service`
 */
class m180705_085219_create_provider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('provider', [
            'id' => $this->primaryKey(),
            'service' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
        ], "CHARACTER SET utf8 COLLATE utf8_general_ci");

        // creates index for column `service`
        $this->createIndex(
            'idx-provider-service',
            'provider',
            'service'
        );

        // add foreign key for table `service`
        $this->addForeignKey(
            'fk-provider-service',
            'provider',
            'service',
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
            'fk-provider-service',
            'provider'
        );

        // drops index for column `service`
        $this->dropIndex(
            'idx-provider-service',
            'provider'
        );

        $this->dropTable('provider');
    }
}
