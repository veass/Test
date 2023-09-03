<?php

namespace app\controllers;
use yii\helpers\Url;
use app\models\LessonPlan;

class LessonController extends \yii\rest\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLooked($id)
    {

        if(\Yii::$app->user->isGuest) {
            return 302;
        }

        $lessonPlan = LessonPlan::findOne(['lesson_id' => $id]);
        
        if( $lessonPlan === null){ 
            $model = new LessonPlan();
            $model->lesson_id = $id;
            $model->user_id = (int)\Yii::$app->user->id;
            $model->is_done = 1;
            if(!$model->save()){
                return $model->getErrors();
            }
            return $model;
        } else {
            $model = $lessonPlan;
            $model->is_done = 1;
            $model->update();
            return $model;
        }

    }
}
