<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title><?= $locals['pageTitle'] ?? 'Default Title' ?></title>

        <link rel='stylesheet' href='<?= SITE_BASE_DIR ?>/assets/styles/site.css'>
    </head>
    <body>
        <div class='header'>

            <h1>My Paint Shop</h1>
            <nav>
                <ul>
                    <li> 
                        <a class='btn' href='<?= SITE_BASE_DIR ?>/'> Home </a>
                    </li>
                    <li>
                        <a class='btn' href='<?= SITE_BASE_DIR ?>/addPaint'> Add Paint </a> 
                    </li>
                    <li>
                        <a class='btn' href='<?= SITE_BASE_DIR ?>/viewPaint'> View Paint </a> 
                    </li>
                    <li>
                        <a class='btn' href='<?= SITE_BASE_DIR ?>/addCompany'> Add Company </a> 
                    </li>
                    <li>
                        <a class='btn' href='<?= SITE_BASE_DIR ?>/viewCompany'> View Company </a> 
                    </li>

                </ul>
        </div>


        <div class='container'>
            <?= \Rapid\Renderer::VIEW_PLACEHOLDER ?>

    </body>
</div>
<div>
    <footer>
        <p class="copyright">
            &copy; My Paint Shop  <?php echo date("Y"); ?>
        </p>
    </footer>
</div>


</html>