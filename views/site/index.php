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
                           <img class="img-responsive" src="http://vashashina.dp.ua/images/radius_icon.png" alt="">                 
                           <?= Html::label('Диаметер') ?>
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
                           <img class="img-responsive" src="http://vashashina.dp.ua/images/width_icon.png" alt="">              
                           <?= Html::label('Ширина') ?>
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
                           <img class="img-responsive" src="http://vashashina.dp.ua/images/height_icon.png" alt="">                
                           <?= Html::label('Высота') ?>
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
                           <?= Html::label('Сезон') ?><br>
                           <a id="summerA" class="seasonIcon" href="javascript:void(0)"></a>                
                           <a id="winterA" class="seasonIcon" href="javascript:void(0)"></a>                
                           <a id="allSeasonA" class="seasonIcon" href="javascript:void(0)"></a>              
                           <?= Html::input('hidden', 'Tire[season]', '', ['id'=>'seasonInput']) ?>
                           
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
                           <img class="img-responsive" src="http://vashashina.dp.ua/images/radius_icon.png" alt="">                
                           <?= Html::label('Диаметр') ?>
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
                           <img class="img-responsive" src="http://vashashina.dp.ua/images/width_icon.png" alt="">           
                           <?= Html::label('Ширина') ?>
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
                        <img src="http://vashashina.dp.ua/assets/e5dbbcf8/images/et.jpg" alt="">
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
                              <option value="Alfa Romeo">Alfa Romeo</option>
                              <option value="Aston Martin">Aston Martin</option>
                              <option value="Audi">Audi</option>
                              <option value="Bentley">Bentley</option>
                              <option value="BMW">BMW</option>
                              <option value="Brilliance">Brilliance</option>
                              <option value="Buick">Buick</option>
                              <option value="BYD">BYD</option>
                              <option value="Cadillac">Cadillac</option>
                              <option value="Changan">Changan</option>
                              <option value="Chery">Chery</option>
                              <option value="Chevrolet">Chevrolet</option>
                              <option value="Chrysler">Chrysler</option>
                              <option value="Citroen">Citroen</option>
                              <option value="Dadi">Dadi</option>
                              <option value="Daewoo">Daewoo</option>
                              <option value="Daihatsu">Daihatsu</option>
                              <option value="Datsun">Datsun</option>
                              <option value="Derways">Derways</option>
                              <option value="Dodge">Dodge</option>
                              <option value="Emgrand">Emgrand</option>
                              <option value="FAW">FAW</option>
                              <option value="Ferrari">Ferrari</option>
                              <option value="Fiat">Fiat</option>
                              <option value="Ford">Ford</option>
                              <option value="Geely">Geely</option>
                              <option value="GMC">GMC</option>
                              <option value="Great Wall">Great Wall</option>
                              <option value="Haima">Haima</option>
                              <option value="Honda">Honda</option>
                              <option value="Hummer">Hummer</option>
                              <option value="Hyundai">Hyundai</option>
                              <option value="Infiniti">Infiniti</option>
                              <option value="Isuzu">Isuzu</option>
                              <option value="Iveco">Iveco</option>
                              <option value="Jaguar">Jaguar</option>
                              <option value="Jeep">Jeep</option>
                              <option value="Jiangling">Jiangling</option>
                              <option value="JMC">JMC</option>
                              <option value="Kia">Kia</option>
                              <option value="Lamborghini">Lamborghini</option>
                              <option value="Lancia">Lancia</option>
                              <option value="Land Rover">Land Rover</option>
                              <option value="Landwind">Landwind</option>
                              <option value="Lexus">Lexus</option>
                              <option value="Lifan">Lifan</option>
                              <option value="Lincoln">Lincoln</option>
                              <option value="Lotus">Lotus</option>
                              <option value="Maserati">Maserati</option>
                              <option value="Maybach">Maybach</option>
                              <option value="Mazda">Mazda</option>
                              <option value="Mercedes">Mercedes</option>
                              <option value="Mercury">Mercury</option>
                              <option value="MG">MG</option>
                              <option value="Mini">Mini</option>
                              <option value="Mitsubishi">Mitsubishi</option>
                              <option value="Mosler">Mosler</option>
                              <option value="Nissan">Nissan</option>
                              <option value="Oldsmobile">Oldsmobile</option>
                              <option value="Opel">Opel</option>
                              <option value="Panoz">Panoz</option>
                              <option value="Peugeot">Peugeot</option>
                              <option value="Plymouth">Plymouth</option>
                              <option value="Pontiac">Pontiac</option>
                              <option value="Porsche">Porsche</option>
                              <option value="Ram">Ram</option>
                              <option value="Renault">Renault</option>
                              <option value="Rolls Royce">Rolls Royce</option>
                              <option value="Rover">Rover</option>
                              <option value="Saab">Saab</option>
                              <option value="Saleen">Saleen</option>
                              <option value="Saturn">Saturn</option>
                              <option value="Scion">Scion</option>
                              <option value="Seat">Seat</option>
                              <option value="Skoda">Skoda</option>
                              <option value="Smart">Smart</option>
                              <option value="Ssang Yong">Ssang Yong</option>
                              <option value="Subaru">Subaru</option>
                              <option value="Suzuki">Suzuki</option>
                              <option value="Toyota">Toyota</option>
                              <option value="Volkswagen">Volkswagen</option>
                              <option value="Volvo">Volvo</option>
                              <option value="Xin Kai">Xin Kai</option>
                              <option value="ZAZ">ZAZ</option>
                              <option value="ZX">ZX</option>
                              <option value="ВАЗ">ВАЗ</option>
                              <option value="ГАЗ">ГАЗ</option>
                              <option value="ТагАЗ">ТагАЗ</option>
                              <option value="УАЗ">УАЗ</option>
                           </select>
                        </span>
                        <span class="selected">Любая</span><span class="carat"></span>
                        <div>
                           <ul>
                              <li class="active">Любая</li>
                              <li>Acura</li>
                              <li>Alfa Romeo</li>
                              <li>Aston Martin</li>
                              <li>Audi</li>
                              <li>Bentley</li>
                              <li>BMW</li>
                              <li>Brilliance</li>
                              <li>Buick</li>
                              <li>BYD</li>
                              <li>Cadillac</li>
                              <li>Changan</li>
                              <li>Chery</li>
                              <li>Chevrolet</li>
                              <li>Chrysler</li>
                              <li>Citroen</li>
                              <li>Dadi</li>
                              <li>Daewoo</li>
                              <li>Daihatsu</li>
                              <li>Datsun</li>
                              <li>Derways</li>
                              <li>Dodge</li>
                              <li>Emgrand</li>
                              <li>FAW</li>
                              <li>Ferrari</li>
                              <li>Fiat</li>
                              <li>Ford</li>
                              <li>Geely</li>
                              <li>GMC</li>
                              <li>Great Wall</li>
                              <li>Haima</li>
                              <li>Honda</li>
                              <li>Hummer</li>
                              <li>Hyundai</li>
                              <li>Infiniti</li>
                              <li>Isuzu</li>
                              <li>Iveco</li>
                              <li>Jaguar</li>
                              <li>Jeep</li>
                              <li>Jiangling</li>
                              <li>JMC</li>
                              <li>Kia</li>
                              <li>Lamborghini</li>
                              <li>Lancia</li>
                              <li>Land Rover</li>
                              <li>Landwind</li>
                              <li>Lexus</li>
                              <li>Lifan</li>
                              <li>Lincoln</li>
                              <li>Lotus</li>
                              <li>Maserati</li>
                              <li>Maybach</li>
                              <li>Mazda</li>
                              <li>Mercedes</li>
                              <li>Mercury</li>
                              <li>MG</li>
                              <li>Mini</li>
                              <li>Mitsubishi</li>
                              <li>Mosler</li>
                              <li>Nissan</li>
                              <li>Oldsmobile</li>
                              <li>Opel</li>
                              <li>Panoz</li>
                              <li>Peugeot</li>
                              <li>Plymouth</li>
                              <li>Pontiac</li>
                              <li>Porsche</li>
                              <li>Ram</li>
                              <li>Renault</li>
                              <li>Rolls Royce</li>
                              <li>Rover</li>
                              <li>Saab</li>
                              <li>Saleen</li>
                              <li>Saturn</li>
                              <li>Scion</li>
                              <li>Seat</li>
                              <li>Skoda</li>
                              <li>Smart</li>
                              <li>Ssang Yong</li>
                              <li>Subaru</li>
                              <li>Suzuki</li>
                              <li>Toyota</li>
                              <li>Volkswagen</li>
                              <li>Volvo</li>
                              <li>Xin Kai</li>
                              <li>ZAZ</li>
                              <li>ZX</li>
                              <li>ВАЗ</li>
                              <li>ГАЗ</li>
                              <li>ТагАЗ</li>
                              <li>УАЗ</li>
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