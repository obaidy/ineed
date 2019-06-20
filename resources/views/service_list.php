<?php foreach($serviceList as $service) : ?>
    <a href="<?= action('SearchController@index') ?>"><?= $service->name ?></a><br>
<?php endforeach; ?>