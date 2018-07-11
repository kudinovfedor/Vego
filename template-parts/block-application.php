<!-- Start Application -->
<?php $bg = esc_attr(esc_url(get_template_directory_uri() . '/assets/img/application-bg.jpg')); ?>
<div class="application" style="background-image: url('<?php echo $bg; ?>')">
    <div class="container">
        <div class="application-content">
            <div class="application-action text-bold">
                Побывайте в <span class="highlight">«Балтик <br> Хаус»</span>, чтобы:
            </div>
            <ul class="application-list">
                <li>Прогуляться по территории и «вживую» оценить коттеджи</li>
                <li>Посмотреть коттеджи с роскошными террасами</li>
                <li>Ощутить внутреннее пространство и и продуманные планировки</li>
                <li>Ознакомиться с архитектурой домов, и инфраструктурой возле двора</li>
            </ul>
        </div>
        <div class="application-form">
            <div class="feedback-box">
                <div class="feedback-headline text-center text-uppercase">Заявка на просмотр</div>
                <form action="./" method="post" class="feedback-form">
                    <div class="form-row">
                        <input class="form-field" type="text" name="name" placeholder="Введите Ваше имя">
                    </div>
                    <div class="form-row">
                        <input class="form-field" type="tel" name="tel" placeholder="Введите номер телефона">
                    </div>
                    <div class="form-row">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="agree" value="yes" checked="">
                            <span class="checkbox"></span>
                            Я согласен на обработку моих персональных данных
                        </label>
                    </div>
                    <button class="button-medium" type="submit">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Application -->