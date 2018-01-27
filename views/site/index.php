<?php
/* @var $this yii\web\View */

use yii\helpers\Html;


$this->title = 'My Yii Application';

?>

<div class="container calc">
      <div class="row">
         <!-- tire search widget -->
         <div class="col-sm-6">
            <div class="search-box">
               <h2>шины</h2>
               <div class="col-sm-12">
                    <?= Html::beginForm([''], 'get', ['enctype' => 'multipart/form-data', 'id' => 'tire-find-form', 'class'=>'form-horizontal']);
                      echo Html::input('hidden', 'r', 'site/findshinu'); ?>
                     <ul class="select-type" id="carType">
                        <li><a class="active">Все</a></li>
                        <li><a>Легковые</a></li>
                        <li><a>Грузовые</a></li>
                        <li><a>Джипы</a></li>
                        <li><a>Мото</a></li>
                        <li><a>Микроавтобусы</a></li>
                     </ul>
                     <?= Html::input('hidden', 'Tire[car_type]', 'all', ['id'=>'carTypeInput']) ?>
                     <div class="select-img row">
                        <div class="col-sm-6 col-md-4 to-center">
                           <?= Html::img($my_item['http://vashashina.dp.ua/images/radius_icon.png'], ['class' => 'img-responsive']);
                           echo Html::label('Диаметер') ?>
                           <div class="dropdown">
                               <select name="diam">
                                   <option value="0">Любой</option>
                                   <?php foreach($diameter as $key => $diameter_for): ?>
                                     <option value="<?=$diameter_for['diameter'] ;?>"><?=$diameter_for['diameter'] ;?></option>
                                    <?php endforeach; ?>
                               </select>                            
                              <div> 
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <?= Html::img($my_item['http://vashashina.dp.ua/images/width_icon.png'], ['class' => 'img-responsive', 'alt'=>'']);
                           echo Html::label('Ширина') ?>
                           <div class="dropdown">
                               <select name="width">
                                   <option value="">Любой</option>
                                    <?php foreach($width as $key => $width_for): ?>
                                     <option value="<?=$width_for['name'] ;?>"><?=$width_for['name'] ;?></option>
                                    <?php endforeach; ?>
                               </select>
                               
                              <div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4 to-center">
                           <?= Html::img($my_item['http://vashashina.dp.ua/images/height_icon.png'], ['class' => 'img-responsive', 'alt'=>'']);
                           echo Html::label('Высота') ?>
                           <div class="dropdown">
                               
                               <select name="height">
                                   <option value="">Любой</option>
                                   <?php foreach($height as $key => $height_for): ?>
                                     <option value="<?=$height_for['height'] ;?>"><?=$height_for['height'] ;?></option>
                                    <?php endforeach; ?>
                               </select>
                               
                           </div>
                        </div>
                     </div>
                     <div class="other-option row">
                        <div class="col-sm-6">
                           <?= Html::label('Сезон');
                           echo "<br>";
                           echo Html::a('', 'javascript:void(0)', ['id'=>'summerA', 'class'=>'seasonIcon']); 
                           echo Html::a('', 'javascript:void(0)', ['id'=>'winterA', 'class'=>'seasonIcon']); 
                           echo Html::a('', 'javascript:void(0)', ['id'=>'allSeasonA', 'class'=>'seasonIcon']);         
                           echo Html::input('hidden', 'Tire[season]', '', ['id'=>'seasonInput']) ?>  
                        </div>
                        <div class="col-sm-6">
                           <?= Html::label('Производитель') ?>
                           <div class="dropdown">
                               
                               <select name="proizv">
                                   <option value="">Любой</option>
                                   <?php foreach($proizvod as $key => $proizvod_for): ?>
                                     <option value="<?=$proizvod_for['name'] ;?>"><?=$proizvod_for['name'] ;?></option>
                                    <?php endforeach; ?>
                               </select>
                              
                           </div>
                        </div>
                     </div>
                     <div class="slider-calc row">
                        <div class="col-xs-12">
                           <div class="count-fill pull-left">
                              <?= Html::input('text', 'Tire[season]', '486', ['id'=>'minPriceTire', 'placeholder'=>'мин', 'class'=>'form-control']) ?>
                           </div>
                           <div class="slider slider-horizontal" id="tirePriceSlider">
                              <div class="slider-track">
                                 <div class="slider-track-low" style="left: 0px; width: 0%;"></div>
                                 <div class="slider-selection" style="left: 0%; width: 100%;"></div>
                                 <div class="slider-track-high" style="right: 0px; width: 0%;"></div>
                                 <div class="slider-handle min-slider-handle round" style="left: 0%;" tabindex="0"></div>
                                 <div class="slider-handle max-slider-handle round" style="left: 100%;" tabindex="0"></div>
                              </div>
                              <div class="tooltip tooltip-main top" style="left: 50%; margin-left: -36.5px;">
                                 <div class="tooltip-arrow"></div>
                                 <div class="tooltip-inner">486 : 61300</div>
                              </div>
                              <div class="tooltip tooltip-min top" style="left: 0%; margin-left: -17px;">
                                 <div class="tooltip-arrow"></div>
                                 <div class="tooltip-inner">486</div>
                              </div>
                              <div class="tooltip tooltip-max top" style="left: 100%; margin-left: -23px;">
                                 <div class="tooltip-arrow"></div>
                                 <div class="tooltip-inner">61300</div>
                              </div>
                           </div>
                           <input id="ex" type="text" value="486,61300" data-slider-min="486" data-slider-max="61300" data-slider-step="5" data-slider-value="[486,61300]" data="value: '486,61300'" data-value="486,61300" style="display: none;">
                           <div class="count-fill pull-right">
                              <?= Html::input('text', 'Tire[maxPrice]', '61300', ['id'=>'maxPriceTire', 'placeholder'=>'макс', 'class'=>'form-control']) ?>
                           </div>
                        </div>
                     </div>
                     <div class="find row">
                        <div class="col-xs-12">
                           <button class="send-calc">Подобрать</button>
                           <?//= Html::button('Подобрать', ['class' => 'send-calc']) ?>
                           <div class="find-box">Найдено<br>
                              <span class="count">0</span>&nbsp;шин
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- end of tire search widget -->
         <!-- disk search widget -->
         <div class="col-sm-6">
            <div class="search-box">
               <h2>диски</h2>
               <div class="col-sm-12">
                  <?= Html::beginForm([''], 'get', ['enctype' => 'multipart/form-data', 'id' => 'tire-find-form', 'class'=>'form-horizontal']);
                      echo Html::input('hidden', 'r', 'site/findshinu'); ?>
                     <ul class="select-type" id="diskType">
                        <li><a class="active">Все</a></li>
                        <li><a>Стальные</a></li>
                        <li><a>Литые</a></li>
                        <li><a>Кованные</a></li>
                        <?= Html::input('hidden', 'Disk[disk_type]', 'all', ['id'=>'diskTypeInput']) ?>
                     </ul>
                     <div class="select-img row">
                        <div class="col-sm-6 col-md-6 to-center">
                           <?= Html::img('http://vashashina.dp.ua/images/radius_icon.png', ['class' => 'img-responsive', 'alt'=>'']);
                           echo Html::label('Диаметр') ?>
                           <div class="dropdown">
                               
                               <select name="d_diam">
                                   <option value="">Любой</option>
                                   <?php foreach($d_diameter as $key => $d_diameter_for): ?>
                                     <option value="<?=$d_diameter_for['name'] ;?>"><?=$d_diameter_for['name'] ;?></option>
                                    <?php endforeach; ?>
                               </select>
                               
                              <span class="old">

                              </span>
                              <span class="selected">Любой</span><span class="carat"></span>
                              <div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                           <?= Html::img('http://vashashina.dp.ua/images/width_icon.png', ['class' => 'img-responsive', 'alt'=>'']);
                           echo Html::label('Ширина') ?>
                           <div class="dropdown">
                               
                               <select name="d_width">
                                   <option value="">Любой</option>
                                   <?php foreach($d_width as $key => $d_width_for): ?>
                                     <option value="<?=$d_width_for['name'] ;?>"><?=$d_width_for['name'] ;?></option>
                                    <?php endforeach; ?>
                               </select>
                               
                              <span class="old">

                              </span>
                              <span class="selected">Любая</span><span class="carat"></span>
                              <div>

                              </div>
                           </div>
                        </div>
                        <div class="hiddenSelect"></div>
                     </div>
                     <div class="other-option row">
                        <div class="col-sm-6 col-md-4 to-center">
                           <!--<label>PCD<span class="tooltip-up" data-toggle="modal" data-target="#pcdModal" title="Что такое PCD?">?</span></label>-->
                            <?= Html::label('PCD') ?>
                           <div class="dropdown">
                               
                               <select name="d_pcd">
                                   <option value="">Любой</option>
                                   <?php foreach($d_pcd as $key => $d_pcd_for): ?>
                                     <option value="<?=$d_pcd_for['name'] ;?>"><?=$d_pcd_for['name'] ;?></option>
                                    <?php endforeach; ?>
                               </select>
                               
                              <span class="old">

                              </span>
                              <span class="selected">Любой</span><span class="carat"></span>
                              <div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4 to-center">
                           <!--<label>ET<span class="tooltip-up" data-toggle="modal" data-target="#etModal" title="Что такое вылет ET?">?</span></label>-->
                           <?= Html::label('ET') ?>
                           <div class="dropdown">
                               
                               <select name="d_et">
                                   <option value="">Любой</option>
                                   <?php foreach($d_et as $key => $d_et_for): ?>
                                     <option value="<?=$d_et_for['name'] ;?>"><?=$d_et_for['name'] ;?></option>
                                    <?php endforeach; ?>
                               </select>
                               
                              <span class="old">

                              </span>
                              <span class="selected">Любой</span><span class="carat"></span>
                              <div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4 to-center">
                           <?= Html::label('Производитель') ?>
                           <div class="dropdown">
                               
                               <select name="d_proizv">
                                   <option value="">Любой</option>
                                   <?php foreach($d_proizvod as $key => $d_proizvod_for): ?>
                                     <option value="<?=$d_proizvod_for['name'] ;?>"><?=$d_proizvod_for['name'] ;?></option>
                                    <?php endforeach; ?>
                               </select>
                               
                              <span class="old">
                                 
                              </span>
                              <span class="selected">Любой</span><span class="carat"></span>
                              <div>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="slider-calc row">
                        <div class="col-xs-12">
                           <div class="count-fill pull-left">
                              <!--<input id="minPriceDisk" type="text" placeholder="мин" name="Disk[minPrice]" value="261" class="form-control">-->
                              <?= Html::input('text', 'Disk[minPrice]', '261', ['id'=>'seasonInput', 'class'=>'form-control']) ?>
                           </div>
                           <div class="slider slider-horizontal" id="diskPriceSlider">
                              <div class="slider-track">
                                 <div class="slider-track-low" style="left: 0px; width: 0%;"></div>
                                 <div class="slider-selection" style="left: 0%; width: 100%;"></div>
                                 <div class="slider-track-high" style="right: 0px; width: 0%;"></div>
                                 <div class="slider-handle min-slider-handle round" style="left: 0%;" tabindex="0"></div>
                                 <div class="slider-handle max-slider-handle round" style="left: 100%;" tabindex="0"></div>
                              </div>
                              <div class="tooltip tooltip-main top" style="left: 50%; margin-left: -36.5px;">
                                 <div class="tooltip-arrow"></div>
                                 <div class="tooltip-inner">261 : 25477</div>
                              </div>
                              <div class="tooltip tooltip-min top" style="left: 0%; margin-left: -17px;">
                                 <div class="tooltip-arrow"></div>
                                 <div class="tooltip-inner">261</div>
                              </div>
                              <div class="tooltip tooltip-max top" style="left: 100%; margin-left: -23px;">
                                 <div class="tooltip-arrow"></div>
                                 <div class="tooltip-inner">25477</div>
                              </div>
                           </div>
                           <input id="ex2" type="text" value="261,25477" data-slider-min="261" data-slider-max="25477" data-slider-step="5" data-slider-value="[261,25477]" data="value: '261,25477'" data-value="261,25477" style="display: none;">
                           <div class="count-fill pull-right">
                              <!--<input id="maxPriceTire2" type="text" placeholder="макс" name="Disk[maxPrice]" value="25477" class="form-control">-->
                              <?= Html::input('text', 'Disk[maxPrice]', '25477', ['id'=>'maxPriceTire2', 'class'=>'form-control', 'placeholder'=>'макс']) ?>
                           </div>
                        </div>
                     </div>
                     <div class="find row">
                        <div class="col-xs-12">
                           <!--<button class="send-calc">Подобрать</button>-->
                           <?= Html::button('Подобрать', ['class' => 'send-calc']) ?>
                           <div class="find-box">Найдено<br><span class="count">0</span>&nbsp; дисков</div>
                        </div>
                     </div>
                  <!--</form>-->
                  <?= Html::endForm() ?>
               </div>
            </div>
         </div>
         <div id="etModal" class="fade modal" role="dialog" tabindex="-1">
            <div class="modal-dialog ">
               <div class="modal-content">
                  <div class="modal-header">
                     <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                     <?= Html::button('×', ['class' => 'close', 'data-dismiss'=>'modal', 'aria-hidden'=>'true', 'type'=>'button']) ?>
                     <h2>Что такое вылет ET?</h2>
                  </div>
                  <div class="modal-body">
                     <p>Очень многие задаются вопросом, что такое вылет диска. 
                        В этой статье я попробую объяснить что же это такое. 
                        Слово вылет говорит самое за себя. Итак Вылет (ET) — это некое
                        расстояние прилегающее к ступице от плоскости колеса, до плоскости
                        проходящей через середину ширины обода. ET измеряется в миллиметрах. 
                        Для каждого автомобиля предусмотрен заводом изготовителем свой вылет.  
                        Как правило вылет на диске не больше 30-50 мм.
                     </p>
                     <p>
                        Мы настоятельно рекомендуем, не устанавливать диски с не штатным вылетом  — 
                        не обсудив это с официальным дилером. 
                     </p>
                     <p>
                        Причины здесь две:<br>
                        1. Уменьшение вылета нагружает сильно подшипники ступицы, в итоге подвеска
                        перегружается и в итоге ломается, приехав к диллеру на сервисный ремонт, 
                        ответ будет очевиден, из-за уменьшение вылета, вы нарушили условия гарантии 
                        и с гарантии на подвеску вы отныне слетаете. Увеличить вылет как правило невозможно, 
                        т.к он просто упрется в тормозные колодки.
                        <br>
                        2. Нарушения баланса систем VSA, ESP, VSC (курсовой устойчивости) — из-за того 
                        что вылет вы уменьшаете тем самым, вы обманываете компьютер автомобиля 
                        и он может работать неверно. Не нужно гнаться за красотой, да машина 
                        становиться красивее с меньшим вылетом, но как правило к хорошему это никогда не приводит.
                     </p>
                     <div class="etImage">
                        <?= Html::img('http://vashashina.dp.ua/assets/e5dbbcf8/images/et.jpg', ['alt'=>'']) ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="pcdModal" class="fade modal" role="dialog" tabindex="-1">
            <div class="modal-dialog ">
               <div class="modal-content">
                  <div class="modal-header">
                     <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                     <?= Html::button('×', ['class' => 'close', 'data-dismiss'=>'modal', 'aria-hidden'=>'true', 'type'=>'button']) ?>
                     <h2>Что такое PCD?</h2>
                  </div>
                  <div class="modal-body">
                     <p>P.C.D. (Pitch Circle Diameter) очень важный параметр колеса и наибольшее число 
                        ошибок при замене колесных дисков связано именно с этим параметром. 
                        Очень часто владельцы автомашин устанавливают диски, PCD которых отличается от 
                        штатных на пару миллиметров. Иногда по незнанию, ведь отличить диаметр 100мм 
                        от диаметра 98мм "на глаз" очень сложно. Иногда надеясь на то, что столь 
                        незначительное расхождение в параметрах роли не играет - ведь все остальные 
                        параметры "как у родного". Кроме того, диаметр самих крепежных отверстий 
                        имеет довольно солидный допуск (допуск в плюс), что позволяет проигнорировать 
                        расхождение в PCD.
                     </p>
                     <p>Например владельцы Opel Cadett 80-х годов (PCD - 100), из желания съэкономить,
                        могут поставить себе диски от Жигулей (PCD - 98) или на BMW (PCD - 120) 
                        иногда ставят диски от Jaguar (PCD - 120,65).
                     </p>
                     <p>Делать это не надо. Диск на ступице центрируется болтами (или гайками) с 
                        помощью конической (или сферической) юбки. Таким образом в результате только 
                        один болт или гайка окажутся затянутыми полностью или будут затянуты с 
                        перекосом. Колесо будет "бить", причем балансировка тут, сами понимаете 
                        будет не при чем, гайки или болты могут откручиваться со всеми вытекающими 
                        (вылетающими) проблемами. И, конечно, износ ступичных подшипников.
                     </p>
                     <p>Европейские и японские автомобили имеют более-менее ограниченное число вариантов 
                        PCD. В Европе весьма распространен PCD 98мм. Применять его начали итальянцы, 
                        в частности FIAT, можно сказать, что это один из косвенных признаков итальянского 
                        происхождения модели. Этот диаметр у SEAT, Жигули. Также часто встречаются 
                        диаметры 100 и 108. Иногда встречается 110 (некоторые из OPEL), 112 (AUDI, 
                        MERCEDES) и 120 (все BMW с 1991 года, до того у 3-й серии был диаметр 100). 
                        Многие внедорожники имеют PCD 139,7 (однако диски могут отличаться другими 
                        параметрами, например, вылетом, диаметром центрального отверстия, количеством 
                        отверстий под крепеж).
                     </p>
                     <p>Японские проивзодители обычно пользуются теми же PCD, что и европейские, но 
                        кроме того пользуются PCD - 114,3 мм. Этот же диаметр (114,3) есть у 
                        автомобилей выпущенных в странах третьего мира по японским лицензиям 
                        (как и в случае с FIAT).
                     </p>
                     <p>
                        В США все по-другому. Нет никаких систематизированных стандартных рядов. Зато 
                        часто встречаются совсем экзотические размеры, которые можно встретить на одной 
                        или двух моделях, видимо для того, чтобы ограничить клиентам свободу выбора и 
                        таким образом оградить от ошибок. Например, BUICK SKYHAWK 1975-1982 гг. имеет 
                        PCD - 101,6 - такой более нигде не встречается. На остальных BUICK PCD 127 или 
                        115, размеры тоже редкие, но не настолько (кстати, PCD 115 у Москвич-2140).
                        При замене дисков нужно учитывать и год выпуска автомобиля. Случается, что фирмы, 
                        по одним известным им причинам меняют параметры дисков, в том числе и PCD. 
                        Например, у AUDI 100 выпущенной до 1990 года 4 отверстия на PCD 108, а после - 
                        5 отверстий на PCD 112. Также и BMW 3-й серии - до 91г 4 отверстия на PCD 100, 
                        после - 5 отверстий на PCD 120.
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <!-- end of disk search widget -->
      </div>
      <!-- FindByCar search widget -->
      <div class="row" id="carFindRow">
         <div class="col-sm-12">
            <br>
            <h3 class="text-left margin-30">Я знаю только марку своего авто</h3>
            <div class="row">
                    <?= Html::beginForm([''], 'get', ['enctype' => 'multipart/form-data', 'id' => 'car-find-form', 'class'=>'form-horizontal']);
                      echo Html::input('hidden', 'r', 'site//site/podbor-po-avto'); ?>
                  <div class="col-sm-2">
                     <?= Html::label('Марка') ?>
                     <div class="dropdown">
                        <span class="old">
                           <select id="vendor" class="" name="PodborShiniDiski[vendor]">
                              <option value="">Любая</option>
                              <option value="Acura">Acura</option>
                           </select>
                        </span>
                        <span class="selected">Любая</span><span class="carat"></span>
                        <div>
                           <ul>
                              <li class="active">Любая</li>
                              <li>Acura</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <?= Html::label('Модель') ?>
                     <div class="dropdown">
                        <span class="old">
                           <select id="carModel" class="" name="PodborShiniDiski[carModel]">
                              <option value="">Любая</option>
                           </select>
                        </span>
                        <span class="selected">Любая</span><span class="carat"></span>
                        <div>
                           <ul>
                              <li class="active">Любая</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <?= Html::label('Модификация') ?>
                     <div class="dropdown">
                        <span class="old">
                           <select id="carMod" class="" name="PodborShiniDiski[carMod]">
                              <option value="">Любая</option>
                           </select>
                        </span>
                        <span class="selected">Любая</span><span class="carat"></span>
                        <div>
                           <ul>
                              <li class="active">Любая</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-2 col-md-3">
                     <?= Html::label('Год') ?>
                     <div class="dropdown">
                        <span class="old">
                           <select id="carYear" class="" name="PodborShiniDiski[carYear]">
                              <option value="">Любая</option>
                           </select>
                        </span>
                        <span class="selected">Любая</span><span class="carat"></span>
                        <div>
                           <ul>
                              <li class="active">Любая</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-3 col-md-2">
                     <!--<button class="margin-30 send-calc" id="carFindButton">Подобрать</button>-->
                     <?= Html::button('Подобрать', ['class' => 'margin-30 send-calc','id'=>'carFindButton']) ?>
                  </div>
                    <?= Html::endForm() ?>
            </div>
         </div>
      </div>
      <!-- end of FindByCar search widget -->
   </div>