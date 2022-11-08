
<!-- In developer mode, if the middle of the page is not specified, then this will come out -->
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">

                <h2 class="fw-light">Sorry, this page has not yet been created.</h2>
                    <img src="/pic/ops.jpg" alt="ops... " width="500px">
            </div>
        </div>
    </section>

    <?php
   // So that there is no error, if the url is /test/db, then we will display the console of our database
    if ( $_SERVER['REQUEST_URI'] == '/test/db') {
    $logs = R::getDatabaseAdapter()
        ->getDatabase()
        ->getLogger();

    echo '<pre>' . print_r( $logs, true )  . '</pre>';
   } ?>

</main>
