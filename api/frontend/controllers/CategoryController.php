<?php

declare(strict_types=1);

namespace frontend\controllers;

use frontend\domains\models\Category;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\StaleObjectException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    /**
     * {@inheritDoc}
     */
    public function behaviors(): array
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'index' => ['GET'],
                        'create' => ['GET', 'POST'],
                        'update' => ['GET', 'POST'],
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate(): Response|string
    {
        $model = new Category();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionUpdate(int $id): Response|string
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     */
    public function actionDelete(int $id): Response
    {
        if ($this->findModel($id)->getMaterial()->exists()) {
            Yii::$app->session->setFlash('error', 'Невозможно удалить');
        } else {
            $this->findModel($id)->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): Category
    {
        if (($model = Category::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
