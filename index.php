<?php
require("./src/php/config.php");
require("./src/inc/header.php");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $number = $_POST['number'];
    if (empty($number)) {
        echo "Numara yok!";
    } else {
        $result = $actions->query_number($number);

        if (!$result) {
            echo "Numara sistem içerisinde yok!";
        }
    }
}
?>

<body>
    <?php
    require("./src/inc/navbar.php");
    ?>
    <section class="section">
        <div class="container">
            <form action="" method="post">
                <h1 class="title is-size-3 has-text-centered">Bilinmeyen bir numaramı arıyor?</h1>
                <h2 class="subtitle is-size-4 has-text-centered">Hemen Sorgulayın!</h2>

                <br>

                <div class="field">
                    <label class="label has-text-centered">Telefon Numarası</label>
                    <div class="control">
                        <input class="input" name="number" type="number" min="5000000000" max="5559999999" required>
                    </div>
                </div>

                <div class="buttons is-centered">
                    <button class="button is-info" type="submit">Sorgula</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>