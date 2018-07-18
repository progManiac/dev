<?php

use yii\db\Migration;

/**
 * Handles the creation of table `schedule`.
 * Has foreign keys to the tables:
 *
 * - `provider`
 */
class m180709_092108_create_schedule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('schedule', [
            'id' => $this->primaryKey(),
            'provider_id' => $this->integer()->notNull(),
            'week_interval' => $this->integer()->notNull(),
            'time_start' => $this->time()->notNull(),
            'time_end' => $this->time()->notNull(),
        ]);

        // creates index for column `provider_id`
        $this->createIndex(
            'idx-schedule-provider_id',
            'schedule',
            'provider_id'
        );

        // add foreign key for table `provider`
        $this->addForeignKey(
            'fk-schedule-provider_id',
            'schedule',
            'provider_id',
            'provider',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `provider`
        $this->dropForeignKey(
            'fk-schedule-provider_id',
            'schedule'
        );

        // drops index for column `provider_id`
        $this->dropIndex(
            'idx-schedule-provider_id',
            'schedule'
        );

        $this->dropTable('schedule');
    }
}
