<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\PostCategory;
use app\models\PostCategorySearch;
use app\modules\admin\controllers\AdminController;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * PostCategoryController implements the CRUD actions for PostCategory model.
 */
class PostCategoryController extends AdminController
{
    /**
     * Lists all PostCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PostCategory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PostCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PostCategory();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            $image = UploadedFile::getInstance($model,'image');

            if($image)
                $model->image = $image;

            if($model->validate())
            {
                if($image)
                {
                    $filename = \app\components\Translit::str2url($model->title).'.'.$model->image->extension;
                    $model->image->saveAs('upload/post-category/'.$filename);
                    $model->image = $filename;
                }

                if($model->save())
                    return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PostCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            $image = UploadedFile::getInstance($model,'image');

            if($image)
                $model->image = $image;

            if($model->validate())
            {
                if($image)
                {
                    $filename = \app\components\Translit::str2url($model->title).'.'.$model->image->extension;
                    $model->image->saveAs('upload/post-category/'.$filename);
                    $model->image = $filename;
                }

                if($model->save())
                    return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update',['model'=>$model]);
    }

    /**
     * Deletes an existing PostCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PostCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PostCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PostCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
