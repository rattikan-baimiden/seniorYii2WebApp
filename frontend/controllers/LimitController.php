<?php

namespace frontend\controllers;

use Yii;
use app\models\Limit;
use app\models\LimitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LimitController implements the CRUD actions for Limit model.
 */
class LimitController extends Controller
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
     * Lists all Books models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LimitSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     /**
     * Displays a single Books model.
     * @param int $_id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($_id),
        ]);
    }

     /**
     * Creates a new Books model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Limit();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                
                if(empty($model->create_date)){
                    $model->create_date = time();
                    $model->create_date = Yii::$app->formatter->asDate($model->create_date, 'yyyy-MM-dd');
                }
                if(empty($model->update_date)){
                    $model->update_date = time();
                    $model->update_date = Yii::$app->formatter->asDate($model->update_date, 'yyyy-MM-dd');
                }
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Limit Added');
                    return $this->redirect(['site/overview']);
                }
            }
        } 

        return $this->render('create', [
            'model' => $model,
        ]);
    }

     /**
     * Updates an existing Types model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $_id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($_id)
    {
        $model = $this->findModel($_id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            
            if(empty($model->update_date)){
                $model->update_date = time();
                $model->update_date = Yii::$app->formatter->asDate($model->update_date, 'yyyy-MM-dd');
            }
            if ($model->save()) {
                return $this->redirect(['view', '_id' => (string) $model->_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

     /**
     * Deletes an existing Types model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $_id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($_id)
    {
        $this->findModel($_id)->delete();
        Yii::$app->session->setFlash('danger', 'Limit Deleted');
        return $this->redirect(['index']);
    }

     /**
     * Finds the Types model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $_id ID
     * @return Limit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($_id)
    {
        if (($model = Limit::findOne(['_id' => $_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
