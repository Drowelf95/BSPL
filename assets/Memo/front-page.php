<?php get_header();?>

<!---->
<div class="dispFlex main_wrapper">

    <!--Left handside of the page-->
    <div class="leftSection">

        <header>
            <!--Site title-->
            <div class="dispFlex titleWrapper">
                <img src="https://quifaitquoi.pole-emploi-services.fr/wp-content/uploads/2020/06/Logo-PES.png"
                    alt="Logo Pole emploi services">
                <h1>Qui fait quoi ?</h1>
            </div>
        </header>

        <!--Site presentation-->
        <section class="dispFlex firstSection">
            <div class="introText">
                <h2> C'est simple et rapide.</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam elementum massa dapibus nisi
                    accumsan, vitae lobortis sapien tincidunt. Cras ac arcu faucibus, sollicitudin felis sed, ultricies
                    nunc. Sed ullamcorper vestibulum dolor
                    a facilisis. Suspendisse potenti.</p>
            </div>
        </section>

        <!--Search engine-->
        <section class="secondSection">
            <div class="searchWrapper">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <?php get_search_form()?>
            </div>
        </section>
    </div>

    <!--Right handside of the page-->
    <aside class="dispFlex rightSection">

        <?php include('menu.php') ?>

    </aside>

    <!--Javascript & Jquery-->
    <script src="https://code.jquery.com/jquery-3.5.0.js"
        integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {

        const Initmenu = new menuHandler();
    });
    </script>

</div>

<?php get_footer();?>