<?php

namespace frontend\controllers;

use app\models\Expenses;
use app\models\ExpensesSearch;
use app\models\Incomes;
use app\models\IncomesSearch;
use app\models\Limit;
use app\models\Savings;
use app\models\Typesexpense;
use app\models\TypesexpenseSearch;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use frontend\models\Event;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['POST'],
                ],
                
            ],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionBar()
    {
        return $this->render('bar');
    }

    public function actionLine()
    {
        return $this->render('line');
    }

    public function actionPie()
    {
        return $this->render('pie');
    }

    //--------------------------------Pocket--------------------------------
    public function actionPocket()
    {
        // type_expense_search
        $type_expense = new TypesexpenseSearch();
        $user_id = (String)Yii::$app->user->identity->id;
        $typesexpenseModel = $type_expense->type_expense_search($user_id);
        return $this->render('pocket',[
            'typesexpenseModel' => $typesexpenseModel
        ]);
    }

    public function actionUpdatePocket($_id)
    {
        $model = $this->findModelPocket($_id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            if(empty($model->type_name)) {
                $model->type_name = [];
            }
            if(empty($model->create_date)){
                $model->create_date = time();
                $model->create_date = Yii::$app->formatter->asDate($model->create_date, 'yyyy-MM-dd');
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Pocket Added');
                return $this->redirect(['site/pocket']);
            }
            return $this->render('site/pocket', [
                'model' => $model,
            ]);
        }

        return $this->render('updatePocket', [
            'model' => $model,
        ]);
    }

    protected function findModelPocket($_id)
    {
        if (($model = Typesexpense::findOne(['_id' => $_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //--------------------------------Saving--------------------------------
    public function actionCalculator() 
    {
        return $this->render('calculator');
    }

    public function actionUpdateSaving($_id)
    {
        if ($_id === null) {
            throw new BadRequestHttpException('Invalid request. Please provide a valid _id.');
        }
        $model = $this->findModelSaving($_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Saving Updated');
            return $this->redirect(['site/overview']);
        }

        return $this->render('updateSaving', [
            'model' => $model,
        ]);
    }

    protected function findModelSaving($_id)
    {
        if (($model = Savings::findOne(['_id' => $_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDeleteSaving($_id)
    {
        $this->findModelSaving($_id)->delete();
        Yii::$app->session->setFlash('danger', 'Saving Deleted');
        return $this->redirect(['calculator']);
    }

    //--------------------------------Limit--------------------------------
    public function actionLimit()
    {
        return $this->render('limit');
    }

    public function actionUpdateLimit($_id = null)
    {
        if ($_id === null) {
            throw new BadRequestHttpException('Invalid request. Please provide a valid _id.');
        }

        $model = $this->findModelLimit($_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Limit Updated');
            return $this->redirect(['site/overview']);
        }

        return $this->render('updateLimit', [
            'model' => $model,
        ]);
    }

    protected function findModelLimit($_id)
    {
        $model = Limit::findOne(['_id' => $_id]);
        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDeleteLimit($_id)
    {
        $this->findModelLimit($_id)->delete();
        Yii::$app->session->setFlash('danger', 'Limit Deleted');
        return $this->redirect(['limit']);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays calendar page.
     *
     * @return mixed
     */
    public function actionCalendar()
    {
        return $this->render('calendar');
    }

    /**
     * Displays overview page.
     *
     * @return mixed
     */
    public function actionOverview()
    {
        // type_expense_search
        $type_expense = new TypesexpenseSearch();
        $user_id = (String)Yii::$app->user->identity->id;
        $typesexpenseModel = $type_expense->type_expense_search($user_id);
        return $this->render('overview',[
            'typesexpenseModel' => $typesexpenseModel
        ]);

        
    }

    /**
     * Displays dayview page.
     *
     * @return mixed
     */

    //--------------------------------Income--------------------------------
    public function actionIncome()
    {
        $income = new IncomesSearch();
        $user_id = (String)Yii::$app->user->identity->id;
        $incomeModel = $income->income_search($user_id);
        return $this->render('income',[
            'incomeModel' => $incomeModel
        ]);
    }

    public function actionUpdateIncome($_id)
    {
        $model = $this->findModelIncome($_id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            
            if(empty($model->income_type)){
                $model->income_type = [];
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Income Updated');
                return $this->redirect(['site/overview']);
            }
            return $this->render('site/overview', [
                'model' => $model,
            ]);
        }

        return $this->render('updateIncome', [
            'model' => $model,
        ]);
    }

    public function actionDeleteIncome($_id)
    {
        $this->findModelIncome($_id)->delete();
        Yii::$app->session->setFlash('danger', 'Income Deleted');
        return $this->redirect(['income']);
    }

    protected function findModelIncome($_id)
    {
        if (($model = Incomes::findOne(['_id' => $_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //--------------------------------Expense--------------------------------
    public function actionExpense()
    {
        $expense = new ExpensesSearch();
        $user_id = (String)Yii::$app->user->identity->id;
        $expenseModel = $expense->expense_search($user_id);
        return $this->render('expense',[
            'expenseModel' => $expenseModel
        ]);
    }
    
    public function actionUpdateExpense($_id)
    {
        $model = new Expenses();
        $model = $this->findModelExpense($_id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            if(empty($model->expense_type)){
                $model->expense_type = [];
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Expense Updated');
                return $this->redirect(['site/overview']);
            }
            return $this->render('site/overview', [
                'model' => $model,
            ]);
        }

        return $this->render('updateExpense', [
            'model' => $model,
        ]);
    }

    public function actionDeleteExpense($_id)
    {
        $this->findModelExpense($_id)->delete();
        Yii::$app->session->setFlash('danger', 'Expense Deleted');
        return $this->redirect(['expense']);
    }

    protected function findModelExpense($_id)
    {
        if (($model = Expenses::findOne(['_id' => $_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Successfully registered.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
