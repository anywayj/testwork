<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\SignupFormtwo;
use app\models\RecordUser;
use app\models\User;

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
                'rules' => [
                    [
                        'actions' => ['login','error','signup','index'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout','index','profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
        
    }


    public function actionSignup()
    {

        $model = new SignupForm();
            $model->created_at = date("Y-m-d H:i:s");
            $model->updated_at = date("Y-m-d H:i:s");
        $modelnew = new SignupFormtwo();
        if ($model->load(Yii::$app->request->post()) && $modelnew->load(Yii::$app->request->post())) {
            if ($user = $model->signup() && $user1 = $modelnew->signuptwo()) {
                Yii::$app->session->setFlash('success','Спасибо за регистрацию!');
                return $this->redirect('/site/login'); 
            }  
        }

        return $this->render('signup', compact('model','modelnew'));
    }

    /**
     * Login action.
     *
     * @return Response|string
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

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionProfile($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('profile', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = RecordUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
