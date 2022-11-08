<!-- If you need to pass parameters through the controller, then get them like this-->
<!--<//?=$siteData['a'];?>-->

<!-- dynamic middle of the site-->
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

            <?php if (isset($siteData['textDb']['tag'])) {?>
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <!-- content-->
                    <?php //var_dump($siteData);?>
                    <nav id="navbar-example2" class="navbar bg-light px-3 mb-3">
                        <p class="navbar-brand"><?= $siteData['textDb']['tag'];?></p>
                        <ul class="nav nav-pills">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Fast passage</a>
                                <ul class="dropdown-menu">
                                    <!-- menu-->
                                    <?php $i=0;?>
                                    <?php foreach ($siteData['textDb'] as $data) { ?>
                                        <!-- to increase the reference by 1 (name) -->
                                        <?php $i+=1;?>
                                        <?php if (isset($data['index'])) { ?>
                                             <li><a class="dropdown-item" href="#scrollspyHeading<?=$i;?>"> <?= $data['index'];?></a></li>
                                        <?php } ?>
                                    <?php } ?>

                                    <!-- charm to the bottom-->
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#scrollspyHeading500">Go down</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- message body-->
                    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
                        <?php $i=0;?>
                        <?php foreach ($siteData['textDb'] as $data) { ?>
                            <!-- to increase the reference by 1 (name)-->
                            <?php $i+=1;?>
                             <?php if (isset($data['comment'])) { ?>
                                <h4 id="scrollspyHeading<?=$i;?>"><?=$data['index'];?></h4>
                                <p><?= $data['comment'];?></p>
                                <!-- Editing a post, registered members only $siteData['textDb']['tag']-->
                                 <?php if (isset($_SESSION['isLogin'])) { ?>
                                    <a class="edit float-md-end" href="edit/?postId=<?=$data['id'];?>&type=<?=$siteData['nameTable'];?>&themes=<?=$siteData['textDb']['tag'];?>">edit</a>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <!-- link to go to the bottom of the page-->
                        <h4 id="scrollspyHeading500"></h4>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- move to the next page << 1 2 3 >> -->
    <div class="container-fluid d-flex  justify-content-center align-items-center p-0 ">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <!-- always in the get parameter the first page will be 1 -->
                    <a class="page-link" href="?p=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <!-- Loop through the array, set the key and valueе-->
                <?php foreach ($siteData['page'] as $key => $volume) {?>
                    <!-- Substitute, $key - display the page number (the array starts from zero, add 1). $volume is our id of the tag by which we load the array  -->
                    <?= '<li class="page-item"><a class="page-link" href="?p=';?><?= $volume;?><?='">' . $key+1;?><?='</a></li>';?>
                <?php } ?>
                <li class="page-item">
                    <!-- We set the last page using the end function gives the last value in the array -->
                    <a class="page-link" href=" ?p=<?= end($siteData['page']) ;?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Climb up -->
    <div class="position-relative text-user">
        <p class="position-absolute bottom-0 end-0">
            <a  href="#">Up</a>
        </p>
    </div>
</main>






