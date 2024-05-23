<?php

namespace app\controllers;
use Yii;
use app\models\Tarea;
use yii\web\Response;
use yii\web\Controller;
use app\models\ContactForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\models\forms\LoginForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {/*
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];*/
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
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
    $usuario_actual_id = Yii::$app->user->identity->getId();
    $fecha_actual = new \DateTime();
    $fecha_proxima = new \DateTime('+7 days');

    // Tareas Recientes
    $tareasRecientes = Tarea::find()
        ->alias('t')
        ->innerJoin('materia m', 't.tar_fkmateria = m.mat_id')
        ->innerJoin('periodo p', 'm.mat_fkperiodo = p.per_id')
        ->innerJoin('personal per', 'p.per_fkpersonal = per.per_id')
        ->where(['and', 
        ['per.per_fkusuario' => $usuario_actual_id],
        ['<>', 't.tar_fkestado', 3] // Estado vencido
       ])
        ->orderBy(['t.tar_creacion' => SORT_DESC])
        ->limit(5)
        ->all();

    // Tareas Vencidas
    $tareasVencidas = Tarea::find()
        ->alias('t')
        ->innerJoin('materia m', 't.tar_fkmateria = m.mat_id')
        ->innerJoin('periodo p', 'm.mat_fkperiodo = p.per_id')
        ->innerJoin('personal per', 'p.per_fkpersonal = per.per_id')
        ->where(['and', 
                 ['per.per_fkusuario' => $usuario_actual_id],
                 ['t.tar_fkestado' => 3]  // Estado vencido
                ])
        ->orderBy(['t.tar_finalizacion' => SORT_ASC])
        ->limit(5)
        ->all();

    // Tareas Próximas a Vencer
    $tareasProximasVencer = Tarea::find()
        ->alias('t')
        ->innerJoin('materia m', 't.tar_fkmateria = m.mat_id')
        ->innerJoin('periodo p', 'm.mat_fkperiodo = p.per_id')
        ->innerJoin('personal per', 'p.per_fkpersonal = per.per_id')
        ->where(['and',
                 ['per.per_fkusuario' => $usuario_actual_id],
                 ['<>', 't.tar_fkestado', 3],  // Excluir tareas ya vencidas
                 ['between', 't.tar_finalizacion', $fecha_actual->format('Y-m-d'), $fecha_proxima->format('Y-m-d')]
                ])
        ->orderBy(['t.tar_finalizacion' => SORT_ASC])
        ->limit(5)
        ->all();

    return $this->render('index', [
        'tareasRecientes' => $tareasRecientes,
        'tareasVencidas' => $tareasVencidas,
        'tareasProximasVencer' => $tareasProximasVencer,
    ]);
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

        $model->password = '';
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
