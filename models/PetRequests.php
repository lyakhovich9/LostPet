<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet_requests".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string|null $admin_message
 * @property string $missing_date
 * @property int $user_id
 * @property int $status_id
 *
 * @property Status $status
 * @property User $user
 */
class PetRequests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pet_requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'missing_date', 'user_id', 'status_id'], 'required'],
            [['description', 'admin_message'], 'string'],
            [['missing_date'], 'safe'],
            [['user_id', 'status_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
            'admin_message' => 'Admin Message',
            'missing_date' => 'Дата',
            'user_id' => 'User ID',
            'status_id' => 'Status ID',
        ];
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
