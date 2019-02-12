<?php

use yii\db\Migration;

/**
 * Class m180905_172914_resourse
 */
class m180905_172916_record_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'record_user';
        $this->createTable($table, [
            'id' => $this->primaryKey(),
            'firstname' => $this->string(255)->notNull(),
            'lastname' => $this->string(255)->notNull()
        ]);

        $this->insert($table, [
            'firstname' => 'Валерий',
            'lastname' => 'Гриценко',
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete($table, ['id' => 1]);
        $this->dropTable($table);
    }
}
