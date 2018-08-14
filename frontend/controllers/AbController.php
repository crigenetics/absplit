<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class AbController extends Controller
{


  public $session = null;
  public $test = null;



  public function beforeAction($action)
  {
      $this->enableCsrfValidation = false;
      return parent::beforeAction($action);
  }

    /**
     * {@inheritdoc}
     */
  /*  public function behaviors()
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
*/




    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return  'hello'; // $this->render('index');
    }






      public function readCookie(){

        // get the cookie collection (yii\web\CookieCollection) from the "request" component
        $cookies = Yii::$app->request->cookies;

        if (($cookie = $cookies->get('absid')) !== null) {
            // load session
            $this->session = \common\models\ABSession::find()
            ->where("sid = :sid", [  ':sid' => $cookie->value ])
            ->one();

            return $this->session ? true : false;
          }

          return false;
      }


      public function setupCookie($pageid = 1) {

        // session id in cookies
        $absid = sha1(time());

        // create new session
        $this->session = new \common\models\ABSession();
        $this->session->sid = $absid;
        $this->session->created_at = new \yii\db\Expression('now()');
        $this->session->ip = $_SERVER['REMOTE_ADDR'];
        $this->session->pageid = $pageid;
        $this->session->abtest_id = $this->test->id;
        $this->session->save();


        // increase counts
        if ($this->session->pageid == 1) {
            $this->test->page1_hits++;
        } else {
          $this->test->page2_hits++;
        }
        $this->test->save();

        // get the cookie collection (yii\web\CookieCollection) from the "response" component
        $cookies = Yii::$app->response->cookies;

        // add a new cookie to the response to be sent
        $cookies->add(new \yii\web\Cookie([
            'name' => 'absid',
            'value' => $absid
        ]));

      }


/*
    public function router() {

        $abid = \Yii::$app->request->get('a', false);
        $test = \common\models\ABTest::findOne($abid);

        if($test) {
            if(!$this->readCookie()) {
              $pageid = 1;
              if ($test->page1_hits > $test->page2_hits) {
                // set page2
                $pageid = 2;
              }
              $this->setupCookie($pageid);
            }

            // redirect
            $nextUrl = $this->session->pageid == 1
              ? $test->page1
              : $test->page2;
        }
    }
*/





/**
* landing js
*/
    public function actionJslanding() {

        $id = \Yii::$app->request->get('a', false);
        $test = \common\models\ABTests::findOne($id);
        $this->test = $test;

        // print_r($test);

        if($test) {
            if(!$this->readCookie()) {
              $pageid = 1;
              if ($test->page1_hits > $test->page2_hits) {
                // set page2
                $pageid = 2;
              }
              $this->setupCookie($pageid);
            }

            // redirect
            if ($this->session->pageid == 2) {
                return 'window.location.href="' . $test->page2 .'";';
            }
        }

    }




/**
* js page hit
*/
    public function actionJsHit() {

      if ( $this->readCookie() ) {

        return $this->renderPartial('hit', [
          'posturl' => \yii\helpers\Url::to(['/ab/hit', 'absid' => $this->session->sid], 'http'),
          'absid' => $this->session->sid
        ]);

      }

      return '';

    }





/* register hit from js */
    public function actionHit() {
      // log
      $absid = \Yii::$app->request->post('absid');
      $url = \Yii::$app->request->post('url', '');

      $this->session = \common\models\ABSession::find()
        ->where('sid = :sid', [':sid' => $absid])
        ->one();

      if ($this->session) {
        $this->registerHistoryItem($url);
      }
    }


    protected function registerHistoryItem($url = 'conversion') {

      // register hit
      $item = new \common\models\ABSessionHistory();
      $item->session_id = $this->session->id;
      $item->url =   $url;
      $item->ts = new \yii\db\Expression('now()');
      $item->save();

      return $item->id;
    }




    public function actionJsConversion() {

      if ($this->readCookie()) {

          $itemid = $this->registerHistoryItem();

          $conv = \common\models\Conversion::find()
            ->where('session_id = :sid', [':sid' => $this->session->id])
            ->one();


          if (!$conv) {
              $conv = new \common\models\Conversion();
              $conv->session_id = $this->session->id;
              $conv->ts = new \yii\db\Expression('now()');
              $conv->session_history_id = $itemid;
              $conv->save();
          } // if
      } // if

    } // f













}
