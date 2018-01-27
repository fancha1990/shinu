<?php


namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
//use app\models\Article;
use app\models\User;
//$a =  yii\db\ActiveRecord;
//$a::isNewRecord;

use app\models\Categoryes;

class UsersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        
        $my_cat = Categoryes::findAll(7);
        //var_dump($my_cat[0]->name);
        //var_dump($my_cat[1]->name);
        
        $my_one = Categoryes::findOne(7);
       // var_dump($my_one->name);
        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $my_login = Yii::$app->request->post('LoginForm')['username'];
        $my_password = Yii::$app->request->post('LoginForm')['password'];
        
        //var_dump( $my_login );
//        $users = new User;
//        var_dump($users);
//        $users->username = $my_login;
        if( !empty($my_login) && !empty($my_password) )
        {
            Yii::$app->db->createCommand()->insert('users', [
                'username' => $my_login,
                'password' => md5( $my_password )//pass!!!!
            ])->execute();
            
            $session = Yii::$app->session;
            //$session->open();
            $session['user'] = $my_login;
            
            
            //валидация
            if ($model->load(Yii::$app->request->post()) && $model->login()) 
            {
                return $this->goBack(); //возврат на пред страницу
            }
            return $this->render('kab', [
                'model' => $model,
            ]);
            //return $this->render('index');
        }
       
        return $this->render('index', [
                'model' => $model,
            ]);
        
    }
    
    public function actionKabinet()
    {
        $this->render('kab');
    }

}
