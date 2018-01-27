<?php

$session = Yii::$app->session;

use yii\helpers\Html;

?>
<div class="row">
    <? foreach($products as $my_item ): ?>
        <div>
            <div class="col-xs-12 col-sm-9 equalHeight border-left" style="height: 194px;">
                <h3>
                   <?= Html::img($my_item['http://vashashina.dp.ua/images/tire_icon.jpg'], ['class' => 'season']); 
                   echo Html::a($my_item['name'], $my_item["url"], ['data-pjax' => '0']) ?>
                </h3>
                <div class="row">
                   <div class="col-xs-7">
                      <table>
                         <tbody>
                            <tr>
                               <td>Ширина</td>
                               <td><?=$my_item['width']?></td>
                            </tr>
                            <tr>
                               <td>Высота</td>
                               <td><?=$my_item['height']?></td>
                            </tr>
                            <tr>
                               <td>Диаметр</td>
                               <td><?=$my_item['diameter']?></td>
                            </tr>
                            <tr>
                               <td>Индекс скорости</td>
                               <td><?=$my_item['index_of_payload']?></td>
                            </tr>
                            <tr>
                               <td>Индекс нагрузки</td>
                               <td><?=$my_item['index_of_speed']?></td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                   <div class="col-xs-5">
                      <div>
                         <div class="price margin-10"><?=$my_item['price']?></div>
                         <?= Html::beginForm([''], 'get', ['enctype' => 'multipart/form-data', 'id' => 'w1']);
                            echo Html::input('hidden', 'r', 'site/product');
                            echo Html::input('hidden', 'price', $my_item['price']);
                            echo Html::input('hidden', 'category_id', $my_item['category_id']);
                            echo Html::input('hidden', 'id', $my_item['product_code']); 
                         ?>                
                            <button class="send-calc buy">купить</button>
                            <?//= Html::button('купить', ['class' => 'send-calc  buy']) ?>
                            <span>X
                            <?= Html::input('number', 'qty', '1', ['placeholder'=>'1']) ?>
                            </span>
                            <div class="exist">
                                <?php if( $my_item['product_code'] > 0)
                                        echo "Есть в наличии";
                                      else  
                                        echo "Нет в наличии";
                                 ?>
                            </div>
                         <?= Html::endForm(); ?>
                      </div>
                   </div>
                </div>
             </div>
        </div>
       <? endforeach; ?>
</div>
