<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Stream;

/**
 * Site controller
 */
class FrameController extends Controller
{
    /**
     * @inheritdoc
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
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
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
        $stream = new Stream();
        if(isset($_GET['s'])) {
            $stream = \backend\models\Stream::find()
                ->where(['code'=>trim($_GET['s']),'active'=>1])
                ->one();
            if(empty($stream)) {
                $stream = new Stream();
                $stream->addError('code',Yii::t('frontend', 'error.code.invalid'));
            }
        }
        if(isset($_GET['sid'])) {
            $stream = \backend\models\Stream::find()
                ->where(['id'=>trim($_GET['sid']),'active'=>1])
                ->one();
            if(empty($stream)) {
                $stream = new Stream();
            }
        }

        return $this->render('@frontend/views/site/index',['stream'=>$stream]);
    }

}
