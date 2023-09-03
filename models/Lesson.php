<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lessons".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string $video
 * @property int $created_at
 * @property int $updated_at
 *
 * @property LessonPlan[] $lessonPlans
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lessons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'description', 'video'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'video' => 'Video',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[LessonPlans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLessonPlans()
    {
        return $this->hasMany(LessonPlan::class, ['lesson_id' => 'id']);
    }
}
