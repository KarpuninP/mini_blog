
<!-- В режиме разрабочика, если неуказана середина страници то выйдет это -->
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h2 class="fw-light">К сожалению, такой странице еше не создана</h2>
                    <img src="/pic/ops.jpg" alt="ops... " width="500px">
            </div>
        </div>
    </section>

    <?php
    $logs = R::getDatabaseAdapter()
        ->getDatabase()
        ->getLogger();

    echo '<pre>' . print_r( $logs, true )  . '</pre>';
    ?>

</main>



