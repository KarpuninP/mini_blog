<!-- Если надо передать пораметры через контролер то вот так их получать-->
<!--<//?=$siteData['a'];?>-->


<!-- середина, она и будет менятся-->
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h2 class="fw-light">Тут название раздела типа теория</h2>
                <p class="lead text-muted">Описание этого раздела</p>
            </div>
        </div>
    </section>

    <div class="album py-5" >
        <div class="container">
            <!-- начало-->
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- огловление-->
                <nav id="navbar-example2" class="navbar bg-light px-3 mb-3">
                    <p class="navbar-brand">Содержание</p>
                    <ul class="nav nav-pills">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu">
                                <!-- меню-->
                                <li><a class="dropdown-item" href="#scrollspyHeading1">First</a></li>
                                <li><a class="dropdown-item" href="#scrollspyHeading2">Second</a></li>
                                <li><a class="dropdown-item" href="#scrollspyHeading3">Third</a></li>
                                <li><a class="dropdown-item" href="#scrollspyHeading4">Fourth</a></li>
                                <!-- пролист в низ-->
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#scrollspyHeading5">Перейти в низ</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- тело сообшение-->
                <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
                    <h4 id="scrollspyHeading1">First heading</h4>
                    <p>...</p>
                    <h4 id="scrollspyHeading2">Second heading</h4>
                    <p>......</p>
                    <h4 id="scrollspyHeading3">Third heading</h4>
                    <p>HTML - расшифровывается как HyperText Markup Language (язык гипертекстовой разметки). Это язык разметки документов во Всемирной паутине (World Wide Web, WWW). HTML — это стандартизированный язык, позволяющий составлять форматированный текст. Браузер интерпретирует его и отображает на экране элементы веб-страниц.
                        CSS - (англ. Cascading Style Sheets) это каскадные таблицы стилей. Этот язык разметки определяет, как HTML-элементы веб-сайта должны отображаться на интерфейсе страницы.
                        HTML применяется для разметки веб-страниц.
                        Она нужна браузерам, которые преобразуют гипертекст и выводят на экран страницу в удобном для человека формате. А CSS описывает внешний вид HTML-элементов. То есть разработчики с помощью каскадных таблиц стилей определяют, как должен выглядеть тот или иной элемент на странице.
                    </p>
                    <!-- Редоктирование поста, возможно тока если админ зайдет-->
                    <a class="edit float-md-end" href="# " >редактировать</a>

                    <h4 id="scrollspyHeading4">Fourth heading</h4>
                    <p>...</p>
                    <h4 id="scrollspyHeading5">Fifth heading</h4>
                    <p>...</p>
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
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Поднятся в верх -->
    <div class="position-relative text-user">
        <p class="position-absolute bottom-0 end-0">
            <a  href="#">Наверх</a>
        </p>
    </div>
</main>






