<?php foreach($serviceList as $service) : ?>

<a href="<?= action('SearchController@index', $service->slug) ?>"><?= $service->name ?></a><br>
<?php endforeach; ?>