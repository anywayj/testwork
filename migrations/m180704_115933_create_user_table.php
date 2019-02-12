<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180704_115933_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
 
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $table = 'user';

        $this->createTable($table, [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ], $tableOptions);

        $this->insert($table, [
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'status' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
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
