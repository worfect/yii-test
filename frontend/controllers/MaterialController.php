<?php

declare(strict_types=1);

namespace frontend\controllers;

use common\models\BindTagToMaterialForm;
use common\models\Category;
use common\models\LinkForm;
use common\models\Material;
use common\models\SearchForm;
use common\models\Tag;
use common\models\Type;
use Yii;
use yii\db\Exception;
use yii\db\StaleObjectException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * MaterialController implements the CRUD actions for Material model.
 */
final class MaterialController extends Controller
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
                    'class' => VerbFilter::class,
                    'actions' => [
                        'index' => ['GET'],
                        'view' => ['GET', 'POST'],
                        'create' => ['GET', 'POST'],
                        'update' => ['GET', 'POST'],
                        'delete' => ['POST'],
                        'unbind-tag' => ['POST'],
                        'delete-link' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex(): string
    {
        $searchModel = new SearchForm();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @throws NotFoundHttpException|Exception if the model cannot be found
     */
    public function actionView(int $id): string
    {
        $bindModel = new BindTagToMaterialForm();
        $linkModel = new LinkForm();

        if ($this->request->isPost) {
            if ($bindModel->load(Yii::$app->request->post())) {
                $bindModel->bind();
            }
            if ($linkModel->load(Yii::$app->request->post())) {
                $linkModel->action();
            }
        }

        return $this->render('view', [
            'linkModel' => $linkModel,
            'bindModel' => $bindModel,
            'material' => $this->findModel($id),
            'tag' => new Tag(),
        ]);
    }

    public function actionCreate(): Response|string
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
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id): Response|string
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
     * @throws NotFoundHttpException|StaleObjectException if the model cannot be found
     */
    public function actionDelete(int $id): Response
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Куда бы его деть?
     *
     */
    public function actionUnbindTag(): Response
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
     * И его тоже.
     *
     */
    public function actionDeleteLink(): Response
    {
        $linkId = $this->request->get('linkId');
        $materialId = $this->request->get('materialId');

        $material = Material::findOne($materialId);
        $links = json_decode($material->links_json, true);

        foreach ($links as $key => $link) {
            if ($link['id'] === (int)$linkId) {
                unset($links[$key]);
            }
        }

        $material->links_json = json_encode($links);
        $material->save();

        return $this->redirect(["material/view?id={$materialId}"]);
    }

    /**
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): Material
    {
        if (($model = Material::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
