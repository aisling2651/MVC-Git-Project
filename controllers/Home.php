<?php

return function($req, $res) {
    $res->render('main', 'home', [
        'pageTitle' => 'Home',
    ]);
}
?>