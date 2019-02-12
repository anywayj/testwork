<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m190212_123947_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $table = 'category';
        $this->createTable($table, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
        $this->batchInsert($table,

        ['name'], [
            ['Смартфоны'], 
            ['Аксессуары'],
            ['Комплектующие']
        ]
    );

        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete($table, ['in', 'id', [
           1,2,3
        ]]);
        $this->dropTable($table);
    }
}
