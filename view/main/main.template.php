<!-- Если надо передать пораметры через контролер то вот так их получать-->
<!--<//?=$siteData['a'];?>-->


<!-- середина, она и будет менятся-->
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h2 class="fw-light"><?= $siteData['namePage'];?></h2>
                <p class="lead text-muted"><?= $siteData['descriptionPage'];?></p>
            </div>
        </div>
    </section>

    <div class="album py-5" >
        <div class="container">
            <!-- начало-->
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- оглавление-->
                <nav id="navbar-example2" class="navbar bg-light px-3 mb-3">
                    <p class="navbar-brand"><?= $siteData['textDb']['tag'];?></p>
                    <ul class="nav nav-pills">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Быстрый переход</a>
                            <ul class="dropdown-menu">
                                <!-- меню-->
                                <?php $i=0;?>
                                <?php foreach ($siteData['textDb'] as $data) { ?>
                                    <!-- для увеличение ссылки на 1 (имя)-->
                                    <?php $i+=1;?>
                                    <?php if (isset($data['index'])) { ?>
                                         <li><a class="dropdown-item" href="#scrollspyHeading<?=$i;?>"> <?= $data['index'];?></a></li>
                                    <?php } ?>
                                <?php } ?>

                                <!-- прелесть в низ-->
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#scrollspyHeading500">Перейти вниз</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- тело сообщение-->
                <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
                    <?php $i=0;?>
                    <?php foreach ($siteData['textDb'] as $data) { ?>
                        <!-- для увеличение сылки на 1 (имя)-->
                        <?php $i+=1;?>
                         <?php if (isset($data['comment'])) { ?>
                            <h4 id="scrollspyHeading<?=$i;?>"><?=$data['index'];?></h4>
                            <p><?= $data['comment'];?></p>
                            <!-- Редактирование поста, возможно тока если админ зайдет-->
                            <a class="edit float-md-end" href="#" >редактировать</a>
                        <?php } ?>
                    <?php } ?>
                    <!-- ссылка что бы перейти на низ странице-->
                    <h4 id="scrollspyHeading500"></h4>
                </div>
            </div>
            <!-- конец-->
        </div>
    </div>

    <!-- переход на следующею страницу << 1 2 3 >> -->
    <div class="container-fluid d-flex  justify-content-center align-items-center p-0 ">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <!-- всегда в гет параметре первая страница будут 1 -->
                    <a class="page-link" href="?p=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <!-- Проходимся циклом по массиву, задаем ключ и значение-->
                <?php foreach ($siteData['page'] as $key => $volume) {?>
                    <!-- Подставляем, $key - отображение номера странице (массив начинается с нуля прибавляем 1). $volume - это наш id тега по которому мы загружаем масив   -->
                    <?= '<li class="page-item"><a class="page-link" href="?p=';?><?= $volume;?><?='">' . $key+1;?><?='</a></li>';?>
                <?php } ?>
                <li class="page-item">
                    <!-- Последнею страницу мы задаем с помощь функции end выдает последние значение в массиве -->
                    <a class="page-link" href=" ?p=<?= end($siteData['page']) ;?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Подняться  верх -->
    <div class="position-relative text-user">
        <p class="position-absolute bottom-0 end-0">
            <a  href="#">Наверх</a>
        </p>
    </div>
</main>






