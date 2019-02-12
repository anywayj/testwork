<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m190211_215343_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'product';
        $this->createTable($table, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'price' => $this->double()->notNull(),
            'count' => $this->integer(11)->notNull(),
            'description' => $this->text(255)->notNull(),
            'icon' => $this->string(255)->notNull(),
            'date' => $this->datetime()->notNull(),
            'category_id' => $this->integer(11)->notNull()
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'category_id',
            $table,
            'category_id'
        );

        $this->batchInsert($table,

        ['name','price','count','description','icon','date','category_id'], [
            ['Samsung',3200,4,'Описание','f1.png',date("Y-m-d H:i:s"),1], 
            ['iPhone',6500,6,'Описание','f2.png',date("Y-m-d H:i:s"),1], 
            ['Leagoo',2500,3,'Описание','f3.png',date("Y-m-d H:i:s"),1], 
            ['Huawei',2750,7,'Описание','f4.png',date("Y-m-d H:i:s"),1],
            ['mouse',350,7,'Описание','f5.png',date("Y-m-d H:i:s"),2],
            ['headset',550,2,'Описание','f6.png',date("Y-m-d H:i:s"),2],
            ['processor',2150,2,'Описание','f7.png',date("Y-m-d H:i:s"),3],
            ['battery',850,5,'Описание','f8.png',date("Y-m-d H:i:s"),3],
            ['motherboards',3250,3,'Описание','f9.png',date("Y-m-d H:i:s"),3]
        ]


    );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        // drops index for column `category_id`
        $this->dropIndex(
            'category_id',
            $table
        );
        $this->delete($table, ['in', 'id', [
           1,2,3,4,5,6,7,8,9
        ]]);
        $this->dropTable($table);

    }
}
