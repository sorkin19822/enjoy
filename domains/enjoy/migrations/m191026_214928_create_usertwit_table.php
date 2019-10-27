<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%usertwit}}`.
 */
class m191026_214928_create_usertwit_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%usertwit}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull()->unique(),
            'date_add' => $this->dateTime(),
            'date_last_view' => $this->dateTime(),
        ]);

        $this->insert('{{%usertwit}}',[
            'name' => 'ZelenskyyUa',
            'date_add' => date("Y-m-d H:i:s"),
            'date_last_view' => date("Y-m-d H:i:s"),

        ]);
        $this->insert('{{%usertwit}}',[
            'name' => 'meduzaproject',
            'date_add' => date("Y-m-d H:i:s"),
            'date_last_view' => date("Y-m-d H:i:s"),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%usertwit}}');
    }
}
