<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Link;
use common\models\Material;
use common\models\MaterialSearch;
use common\models\Tag;
use common\models\Type;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialController implements the CRUD actions for Material model.
 */
class MaterialController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Material models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MaterialSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Material model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'material' => $this->findModel($id),
            'link' => new Link(),
            'tag' => new Tag(),
        ]);
    }

    /**
     * Creates a new Material model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $category = new Category();
        $type = new Type();
        $material = new Material();

        if ($this->request->isPost) {
            if ($material->load($this->request->post()) && $material->save()) {
                return $this->redirect(['view', 'id' => $material->id]);
            }
        } else {
            $material->loadDefaultValues();
        }

        return $this->render('create', [
            'category' => $category,
            'material' => $material,
            'type' => $type,
        ]);
    }

    /**
     * Updates an existing Material model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $category = new Category();
        $type = new Type();
        $material = $this->findModel($id);

        if ($this->request->isPost && $material->load($this->request->post()) && $material->save()) {
            return $this->redirect(['view', 'id' => $material->id]);
        }

        return $this->render('create', [
            'category' => $category,
            'material' => $material,
            'type' => $type,
        ]);
    }

    /**
     * Deletes an existing Material model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Material model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Material the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Material::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
