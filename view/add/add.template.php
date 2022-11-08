
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
            <!-- if we have editing, then such a link works-->
            <form action="<?=PATH . $siteData['link'];?>" method="post">
                <!-- category selection-->
                <label for="exampleKatList" class="form-label">Category selection</label>
                <!-- if we have edit, then what is in the array will be selected and blocked, if not edit, there is a choice -->
                <?php if ($siteData['link'] == 'edit') { ?>
                <select  id="exampleKatList" class="form-select form-select-sm disabled" aria-label=".form-select-sm example" readonly="readonly" name="type">
                    <option selected ><?= $siteData['themes'];?></option>
                    <?php } else { ?>
                    <select id="exampleKatList" class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                    <option selected>-----</option>
                    <option value="theory">Theory</option>
                    <option value="practice">Practice</option>
                    <?php } ?>
                </select>
                <!-- choice of topics-->
                <label for="exampleDataList" class="form-label">Choice of topics</label>
                    <!-- if we have edit, then what is in the array will be selected and blocked, if not edit, there is a choice-->
                    <?php if ($siteData['link'] == 'edit') { ?>
                        <input class="form-control disabled" readonly="readonly" id="exampleDataList" name="themes" value="<?= $siteData['tag'];?>" >
                    <?php } else { ?>
                        <input class="form-control" list="datalistOptions" id="exampleDataList" name="themes" placeholder="Click to search..." >
                        <!-- drop-down list of what is in the database in the form -->
                        <datalist id="datalistOptions">
                            <?php foreach ($siteData['themesList'] as $data) { ?>
                                <option value="<?=$data['themes'];?>">
                            <?php } ?>
                        </datalist>
                    <?php } ?>
                    <!-- if we have edit, then we will pass the post id-->
                    <?php if ($siteData['link'] == 'edit') { ?>
                        <input type="hidden" name="postId" value=" <?= $siteData['editPost']['id'];?>">         <!-- hidden send from user what post number -->
                    <?php } ?>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"> </label>
                        <!-- if we have edit, then what is in the array will be selected and you can edit, if not edit, there is a choice -->
                        <?php if ($siteData['link'] == 'edit') { ?>
                            <input type="text"   name="index" class="form-control" id="exampleFormControlInput1" value="<?= $siteData['editPost']['index'];?>">
                        <?php } else { ?>
                            <input type="text"  name="index" class="form-control" id="exampleFormControlInput1" placeholder="Header">
                        <?php } ?>
                </div>
                <div class="mb-3">
                    <!-- if we have edit, then what is in the array will be selected and you can edit, if not edit, there is a choice-->
                    <?php if ($siteData['link'] == 'edit') { ?>
                        <textarea class="form-control" id="exampleFormControlTextarea1"  name="comment" rows="7"><?= $siteData['editPost']['comment'];?></textarea>
                    <?php } else { ?>
                    <textarea class="form-control" id="exampleFormControlTextarea1"  name="comment" rows="7"></textarea>
                    <?php } ?>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <!-- second button for edit tab data-bs-toggle="modal" data-bs-target="#staticBackdrop"-->
                    <!-- if we have edit, then we can delete and edit the post (buttons), if not edit, only send a new post-->
                    <?php if ($siteData['link'] == 'edit') { ?>
                        <button type="submit" class="btn btn-outline-danger btn-sm me-md-2" name="dell">Delete</button>
                        <button type="submit" class="btn btn-dark btn-sm send-b" name="edit">Edit</button>
                    <?php } else { ?>
                        <button type="submit" class="btn btn-dark btn-sm send-b" name="send">Send</button>
                    <?php } ?>
                </div>
            </form>

        </div>
    </div>

</main>



