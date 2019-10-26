<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m191026_205505_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull()->unique(),
            'date_add' => $this->dateTime(),
            'date_last_view' => $this->dateTime(),
        ]);

        $this->insert('{{%user}}',[
            'name' => 'ZelenskyyUa',
            'date_add' => date("Y-m-d H:i:s"),
            'date_last_view' => date("Y-m-d H:i:s"),

        ]);
        $this->insert('{{%user}}',[
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
        $this->dropTable('{{%user}}');
    }
}
