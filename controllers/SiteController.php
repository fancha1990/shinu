<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Diameter;
use app\models\Height;
use app\models\Width;
use yii\db\ActiveRecord;
use app\models\ProductsShinu;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
     * @return string
     */
    public function actionIndex()
    {
//        Yii::$app->session->open();
//        if( Yii::$app->session->destroy() ){
//            echo "session destroy";
//        }
//        else
//        {
//            echo "session not destroy";
//        }

        if(!empty( Yii::$app->request->get('diam') ))
        {
            //shinu
            $diam = Yii::$app->request->get('diam');
            $width = Yii::$app->request->get('width');
            $height = Yii::$app->request->get('height');
            $proizv = Yii::$app->request->get('proizv');
            
//            select * from 'products_shinu' where diameter='R13' and width=155 and height=70
            
            $d_diameter = (new \yii\db\Query())
            ->select(['*'])
            ->from('products_shinu')
            ->Where(['diameter'=>$diam])
            ->andWhere(['width'=>$width])
            ->andWhere(['height'=>$height])
            ->andWhere(['manufacturer'=>$proizv])
            ->all();   
        }
        
  
        $d_proizvod = $this->getAllprod("d_proizvod");
        $d_pcd = $this->getAllprod("d_pcd");
        $d_et = $this->getAllprod("d_et");
        $d_width = $this->getAllprod("d_width");
        $d_diameter = $this->getAllprod("d_diameter");
        $proizvod = $this->getAllprod("proizvod");
        $height = $this->getAllprod("height");
        $width = $this->getAllprod("width");
        
        $diameter = $this->getAllprod("diameter");
        
        var_dump($_GET);
        return $this->render('index', 
        array(
              'diameter'=>$diameter, 
              'width'=>$width, 
              'height'=>$height,
              'proizvod'=>$proizvod,
              'd_diameter'=>$d_diameter,
              'd_width'=>$d_width,
              'd_et'=>$d_et,
              'd_pcd'=>$d_pcd,
              'd_proizvod'=>$d_proizvod
              )
         );
        
    }
    
    function getAllprod($table)
    {
        $query = (new \yii\db\Query())
                    ->select(['*'])
                    ->from($table)
                    ->all();

        return $query;
    }
    
    
    
    
    public function actionFind()
    {
        $post = Yii::$app->request->get();
        var_dump($post);
        if( $post['first'] != "Любой" )
        {
            $search = $search . $post['first'];
        }
        return $this->render('find');
    }
    
    public function actionFindshinu()
    {
        $get = Yii::$app->request->get();
        
        //дерзнем
        /*$get['diam'] = "R13";
        $get['width'] = "155";
        $get['height'] = "70";
        $get['proizv'] = "Росава";*/
       
        $diam = $get['diam'];
        $width = $get['width'];
        $height = $get['height'];       
        $manufacturer = $get['proizv'];
        $where = "";
                
        //select * from products_shinu WHERE 'diameter'=11 AND 'width'=10 AND 'height'=99 AND 'manufacturer'='Росава'
        $select = "SELECT * FROM products_shinu";
        
        if(!empty($diam) or !empty($width) or !empty($height) or !empty($manufacturer))
        {
            $where = " WHERE ";
        }
        
        $sql1 = "";$sql2 = "";$sql3 = "";$sql4 = "";
        
        if ( $diam != 0 )
        {
           $sql1 = "diameter='$diam'";
           
        }
        if ( $width != 0 )
        {
           $sql2 = "width=$width";
           if(!empty($sql1))
               {
                $sql2 = " AND width=$width";
               }
        }
        if ( $height != 0 )
        {
           $sql3 = "height=$height";
           
           if(!empty($sql2) or !empty($sql1))
               {
                $sql3 = " AND height=$height";
               }
               
        }
        if ( !empty($manufacturer)  )
        {
           $sql4 = "manufacturer='$manufacturer'";
           
           if(!empty($sql1) or !empty($sql2) or !empty($sql3))
               {
                $sql4 = " AND manufacturer='$manufacturer'";
               }
        }
        
        $sql_all = $select . $where . $sql1 . $sql2 . $sql3 . $sql4;
        //echo $sql_all;
        //берем все потому что в бд нету товаров с такими же опциями которые указанны на гл. стр. 
        $posts = Yii::$app->db->createCommand("SELECT * FROM products_shinu")
            ->queryAll();
        //var_dump($posts);
        
        return $this->render('find', array('products'=>$posts));
    }
    
    public function actionFinddisku()
    {
        $get = Yii::$app->request->get();
        var_dump($get);
        exit();
        
        return $this->render('find');
    }
    
    public function actionProduct()//product page
    {      
        $price = Yii::$app->request->get('price');
        //$category_id = Yii::$app->request->get('category_id');
        $id = Yii::$app->request->get('id');
        $qty = Yii::$app->request->get('qty');
        
        $product = ProductsShinu::findOne(['product_code'=>$id]);
        
        if( !empty( Yii::$app->session['cart'] ) )//если есть товары
        {
            $ses_cart = Yii::$app->session['cart'];

                foreach( $ses_cart as $key => $ses_cartfor)
                {
                    if( $ses_cartfor['id'] == $id )//проверка на повторение в массиве
                    {
                        $ses_cart[$key]['qty'] = $qty;
                    }
                }
            
            $prod_new = array (
                    array (
                        'id' => $id,
                        'price' => $price,
                        'qty' => $qty,
                        'name' => $product->name
                    )
                );
            
            array_push( $ses_cart , $prod_new );
            Yii::$app->session['cart'] = $ses_cart;
        }
        else
        {
            $prod_first = array (
                    array (
                        'id' => $id,
                        'price' => $price,
                        'qty' => $qty,
                        'name' => $product->name
                    )
                );
            
            Yii::$app->session['cart'] =  $prod_first ;
        }
        
        var_dump( Yii::$app->session['cart'] );
        
        return $this->render('product', array('product'=>$product, 'qty'=>$qty));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) 
        {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) 
        {
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
