
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
<?php //var_dump($siteData['themesList']);?>
    <div class="album py-5 bg-light" >
        <div class="container">
            <!-- начало-->
            <!-- если у нас редактирование то действует такая сылка-->
            <form action="<?=PATH . $siteData['link'];?>" method="post">
                <!-- выбр категории-->
                <label for="exampleKatList" class="form-label">Выбор категории</label>
                <!-- если у нас edit, то будет выбрано то что в масиве и заблокировано, если не edit есть выбр-->
                <?php if ($siteData['link'] == 'edit') { ?>
                <select  id="exampleKatList" class="form-select form-select-sm disabled" aria-label=".form-select-sm example" readonly="readonly" name="type">
                    <option selected ><?= $siteData['themes'];?></option>
                    <?php } else { ?>
                    <select id="exampleKatList" class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                    <option selected>-----</option>
                    <option value="theory">Теория</option>
                    <option value="practice">Практика</option>
                    <?php } ?>
                </select>
                <!-- выбр тем-->
                <!-- использовать js для выдачи списка как делалось в интернет магазин курс-->
                <label for="exampleDataList" class="form-label">Выбор тем</label>
                    <!-- если у нас edit, то будет выбрано то что в масиве и заблокировано, если не edit есть выбр-->
                    <?php if ($siteData['link'] == 'edit') { ?>
                        <input class="form-control disabled" readonly="readonly" id="exampleDataList" name="themes" value="<?= $siteData['tag'];?>" >
                    <?php } else { ?>
                        <input class="form-control" list="datalistOptions" id="exampleDataList" name="themes" placeholder="Нажмите для поиска..." >
                        <!-- выпадающий список что есть в бд в форме -->
                        <datalist id="datalistOptions">
                            <?php foreach ($siteData['themesList'] as $data) { ?>
                                <option value="<?=$data['themes'];?>">
                            <?php } ?>
                        </datalist>
                    <?php } ?>
                    <!-- если у нас edit, значит передадим пост id-->
                    <?php if ($siteData['link'] == 'edit') { ?>
                        <input type="hidden" name="postId" value=" <?= $siteData['editPost']['id'];?>">         <!-- скрытая отправка от пользователя, какой номер поста -->
                    <?php } ?>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"> </label>
                        <!-- если у нас edit, то будет выбрано то что в масиве и можно редактировать, если не edit есть выбр-->
                        <?php if ($siteData['link'] == 'edit') { ?>
                            <input type="text"   name="index" class="form-control" id="exampleFormControlInput1" value="<?= $siteData['editPost']['index'];?>">
                        <?php } else { ?>
                            <input type="text"  name="index" class="form-control" id="exampleFormControlInput1" placeholder="Заголовок">
                        <?php } ?>
                </div>
                <div class="mb-3">
                    <!-- если у нас edit, то будет выбрано то что в масиве и можно редактировать, если не edit есть выбр-->
                    <?php if ($siteData['link'] == 'edit') { ?>
                        <textarea class="form-control" id="exampleFormControlTextarea1"  name="comment" rows="7"><?= $siteData['editPost']['comment'];?></textarea>
                    <?php } else { ?>
                    <textarea class="form-control" id="exampleFormControlTextarea1"  name="comment" rows="7"></textarea>
                    <?php } ?>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <!-- второй кнопки для вкладке редактировать data-bs-toggle="modal" data-bs-target="#staticBackdrop"-->
                    <!-- если у нас edit, значит можно удалить и редоктировать пост (кнопки) , если не edit только отправить новый пост-->
                    <?php if ($siteData['link'] == 'edit') { ?>
                        <button type="submit" class="btn btn-outline-danger btn-sm me-md-2" name="dell">Удалить</button>
                        <button type="submit" class="btn btn-dark btn-sm send-b" name="edit" >редактировать</button>
                    <?php } else { ?>
                        <button type="submit" class="btn btn-dark btn-sm send-b" name="send"  >отправить</button>
                    <?php } ?>
                </div>
            </form>

            <!-- конец-->
        </div>
    </div>

</main>



