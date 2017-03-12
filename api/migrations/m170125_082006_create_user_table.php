<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `user`.
 */
class m170125_082006_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(255),
            'last_name' => $this->string(255),
            'username' => $this->string(200),
            'auth_key' => $this->string(255),
            'access_token_expired_at' => $this->integer(11).' NULL DEFAULT NULL',
            'password_hash' => $this->string(255),
            'password_reset_token' => $this->string(255),
            'email' => $this->string(255),
            'unconfirmed_email' => $this->string(255),
            'confirmed_at' => $this->integer(11).' NULL DEFAULT NULL',
            'registration_ip' => $this->string(20),
            'last_login_at' => $this->integer(11).' NULL DEFAULT NULL',
            'last_login_ip' => $this->string(20),
            'blocked_at' => $this->integer(11).' NULL DEFAULT NULL',
            'status' => $this->integer(2)->defaultValue(10),
            'role' => $this->integer(11)->null(),
            'gender' => $this->string(255).' NULL DEFAULT NULL',
            'avatar' => $this->string(255).' NULL DEFAULT NULL',
            'phone_number' => $this->string(20).' NULL DEFAULT NULL',
            'address' => $this->string(255).' NULL DEFAULT NULL',
            'trigger_forcast' => $this->string(255).' NULL DEFAULT NULL',
            'zipcode' => $this->string(255).' NULL DEFAULT NULL',
            'birthday' => $this->date(),
            'created_at' => $this->integer(11).' NULL DEFAULT NULL',
            'updated_at' => $this->integer(11).' NULL DEFAULT NULL'
        ]);

        // creates index for table
        $this->createIndex(
            'idx-user',
            'user',
            ['username', 'auth_key', 'password_hash', 'status']
        );

        $this->batchInsert('user', [
            'id',
            'first_name',
            'last_name',
            'username',
            'auth_key',
            'access_token_expired_at',
            'password_hash',
            'password_reset_token',
            'email',
            'unconfirmed_email',
            'confirmed_at',
            'registration_ip',
            'last_login_at',
            'last_login_ip',
            'blocked_at',
            'status',
            'role',
            'birthday',
            'created_at',
            'updated_at'
        ], [
            [
                2,
                'user',
                'Xm-zZRREtAIKsFlINVRLSw3U7llbx_5a',
                '2017-05-30 20:30:31',
                '$2y$13$TKh5pEy0RFTmkC9Kjvb9A.WR/I1QVzYHdfYDw0m7MnHnN0bsv96Jq',
                null,
                'staff@demo.com',
                'staff@demo.com',
                time(),
                '127.0.0.1',
                time(),
                '127.0.0.1',
                null,
                10,
                50,
                time(),
                time()
            ]
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropIndex('idx-user', 'user');

        $this->dropTable('user');
    }
}
