<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <?php foreach($serviceList as $service) : ?>

        <a href="<?= action('SearchController@index', $service->slug) ?>"><?= $service->name ?></a><br>
        <?php endforeach; ?>
        
        <script src="" async defer></script>
    </body>
</html>
