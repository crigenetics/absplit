<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
//use yii\filters\VerbFilter;
//use yii\filters\AccessControl;
//use common\models\LoginForm;

/**
 * Site controller
 */
class AbController extends Controller
{
    /**
     * {@inheritdoc}
     */
  /*  public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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

*/
    /**
     * {@inheritdoc}
     */
  /*  public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
*/
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return "1"; // $this->render('index');
    }

 }
