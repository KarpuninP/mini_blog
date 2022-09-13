
<!-- В режиме разрабочика, если неуказана середина страници то выйдет это -->
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h2 class="fw-light"><?= $siteData['namePage'];?></h2>
                <p class="lead text-muted"><?= $siteData['descriptionPage'];?></p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light" >
        <div class="container">
            <!-- начало-->
            <form action="add" method="post">
                <!-- выбр категории-->
                <label for="exampleKatList" class="form-label">Выбор категории</label>
                <select id="exampleKatList" class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                    <option selected>-----</option>
                    <option value="theory">Теория</option>
                    <option value="practice">Практика</option>
                </select>
                <!-- выбр тем-->
                <!-- использовать js для выдачи списка как делалось в интернет магазин курс-->
                <label for="exampleDataList" class="form-label">Выбор тем</label>
                <input class="form-control" list="datalistOptions" id="exampleDataList" name="themes" placeholder="Нажмите для поиска..." >
                <datalist id="datalistOptions">
                    <option value="PHP">
                    <option value="Docker">
                    <option value="js">
                    <option value="Los Angeles">
                    <option value="Chicago">
                </datalist>
                <input type="hidden" name="postId" value=" 123">         <!-- скрытая отправка от пользователя, какой номер поста -->
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"> </label>
                    <input type="text"  name="index" class="form-control" id="exampleFormControlInput1" placeholder="Заголовок">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1"  name="comment" placeholder="Пишем тут свой пост" rows="7"></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <!-- второй кнопки для вкладке редактировать data-bs-toggle="modal" data-bs-target="#staticBackdrop"-->
                    <button type="submit" class="btn btn-outline-danger btn-sm me-md-2" name="dell">Удалить</button>
                    <button type="submit" class="btn btn-dark btn-sm send-b" name="send"  >отправить</button>
                </div>
            </form>

            <!-- конец-->
        </div>
    </div>


</main>



