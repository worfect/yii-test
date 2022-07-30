<?php

namespace frontend\controllers;

use common\models\BindTagToMaterialForm;
use common\models\Category;
use common\models\Material;
use common\models\SearchForm;
use common\models\Tag;
use common\models\Type;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * MaterialController implements the CRUD actions for Material model.
 */
final class MaterialController extends Controller
{
    /**
     * {@inheritDoc}
     */
    public function behaviors()
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

    /**
     * Lists all Material models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchForm();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Material model.
     * @param int $id
     * @throws NotFoundHttpException if the model cannot be found
     * @return string
     */
    public function actionView($id)
    {
        $bindModel = new BindTagToMaterialForm();

        return $this->render('view', [
            'bindModel' => $bindModel,
            'material' => $this->findModel($id),
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
     * @throws NotFoundHttpException if the model cannot be found
     * @return string|\yii\web\Response
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
     * @throws NotFoundHttpException if the model cannot be found
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionBindTag()
    {
        $model = new BindTagToMaterialForm();

        $model->load(Yii::$app->request->post());
        $model->bind();

        return $this->render('view', [
            'bindModel' => $model,
            'material' => $this->findModel($model->id),
            'tag' => new Tag(),
        ]);
    }

    public function actionUnbindTag()
    {
        $materialId = $this->request->get('materialId');
        $tagId = $this->request->get('tagId');

        Yii::$app->db->createCommand('DELETE FROM "material_tag" WHERE material_id=:materialId AND tag_id=:tagId', [
            ':materialId' => $materialId,
            ':tagId' => $tagId,
        ])->execute();

        return $this->redirect(["material/view?id={$materialId}"]);
    }

    /**
     * Finds the Material model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @throws NotFoundHttpException if the model cannot be found
     * @return Material the loaded model
     */
    protected function findModel($id)
    {
        if (($model = Material::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
