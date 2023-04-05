<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="article-section section">
    <div class="top-container">
        <div class="top-row">
            <div class="menu-column">
                <a class="menu-text" href="<?= $home_page_url ?>"><?= _e( $home_page_name ); ?></a>
            </div>
            <div class="menu-column">
                <div class="inner-div">
                    <div class="menu-svg">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#menu-arrow"></use>
                        </svg>
                    </div>
                    <a class="menu-text" href="<?= $blog_page_url ?>"><?= _e( $blog_page_name ); ?></a>
                </div>
            </div>
            <div class="menu-column">
                <div class="inner-div">
                    <div class="menu-svg">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#menu-arrow"></use>
                        </svg>
                    </div>
                    <a class="menu-text" id="active-menu">Українці в Європі. Які зміни в правилах перебування очікувати у 2023 році?</a>
                </div>
            </div>
        </div>
        <div class="row-cols-2">
            <div class="col-50">
                <h2 class="base-title top-page-title">
                    Українці в Європі. Які зміни в правилах перебування очікувати у 2023 році?
                </h2>
            </div>
            <div class="col-50 date-col">
                <div class="article-date">
                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <use xlink:href="#date"></use>
                    </svg>
                    <p class="date-text">
                        12.01.2023
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="description">
        <p class="text description-text">
            Lorem ipsum dolor sit amet consectetur. Arcu interdum morbi libero netus pellentesque ullamcorper. Nec ipsum egestas fringilla in purus enim. Phasellus a aenean aliquam vulputate. Commodo pellentesque volutpat et ultricies. Et facilisis at lectus dui fringilla ipsum odio gravida
        </p>
    </div>
    <img class="article-img" alt="article-img" loading="lazy" src="/wp-content/themes/dryf/images/common/EU-flag.png">
    <div class="main-content">
        <p class="article-text">
            Польща<br>
            <br>1. Житло Вимушеним переселенцям у Польщі потрібно буде самим оплачувати частину вартості проживання в місцях колективного розміщення. Можливість безплатно жити у даних місцях буде тільки перші 120 днів з моменту прибуття до країни. Далі потрібно буде сплачувати половину вартості проживання, а з 01.05.2023 - 75% вартості проживання (але ціна буде максимум 40-60 zł на добу).Варто зауважити, що дані зміни не відносяться до пенсіонерів, людей з інвалідністю, вагітних або жінок з дітьми віком до року, жінок з трьома дітьми та більше, осіб у скрутній ситуації.
            <br>
            <br>2. Замороження соціальної допомоги Якщо ви плануєте виїзд з території Польщі на певний період часу, то візьміть до уваги, що соціальні виплати, які ви отримуєте буде заморожено. А якщо перебуватимете в іншій країні більше як 30 днів, то право на соціальну допомогу буде втрачено.
            <br>
            <br>3. Посвідчення на тимчасове проживання Тепер посвідчення на тимчасове проживання видаватимуть не на 3 роки, а на півтора року.Також для легального перебування українцям необхідно мати лише електронне посвідчення - еквівалент польського документа mObywatel. А на оформлення польського ідентифікаційного коду (PESEL) тепер дається не 90, а 30 днів.
            <br>
            <br>Німеччина<br>
            <br>Лише у Німеччині у 2023 році збільшать допомогу для вимушених переселенців. Одинокі дорослі будуть отримувати на 53 євро більше. Для дорослих осіб із сім'єю, підлітків та дітей виплати також буде підвищено, але сума допомоги буде меншою.Крім того, перебувати у Німеччині без реєстрації тепер можна лише до 90 діб.
            <br>
            <br>Швейцарія<br>
            <br>У Швейцарії обіцяють виділити додаткові місця для проживання українських біженців.В країні планують облаштувати військові бази аби там могли проживати вимушені переселенці.
        </p>
    </div>
    <div class="under-article-row">
        <div class="col-50 social-col">
            <p class="article-social-text">
                Поділитися в соціальних мережах:
            </p>
            <div class="row">
                <a class="social-circle" href="#">
                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#twitter"></use>
                    </svg>
                </a>
                <a class="social-circle" href="#">
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#facebook"></use>
                    </svg>
                </a>
            </div>
        </div>
        <div class="col-50 copy-col">
            <button class="copy-article" onclick="<!--copyToClipboard()-->">
                <div class="inner-div">
                    <div class="svg-container">
                        <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#copy"></use>
                        </svg>
                    </div>
                    <p class="copy-text">
                        <?= _e( $copy_link ); ?>
                    </p>
                </div>
            </button>
        </div>
    </div>
</section>
<script src="/wp-content/themes/dryf/src/js/main.js"></script>