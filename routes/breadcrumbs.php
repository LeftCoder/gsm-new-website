<?php

Breadcrumbs::for('home', function ($trail) {
  $trail->push('Home', url('/'));
});

Breadcrumbs::for('posts', function ($trail) {
  $trail->push('Posty', url('/posts'));
});

Breadcrumbs::for('add_post', function ($trail) {
  $trail->parent('posts');   
  $trail->push('Dodaj', url('/posts/create'));
});

Breadcrumbs::for('edit_post', function ($trail, $name) {
  $trail->parent('posts');   
  $trail->push($name, route('edit_post', 'post'));
});

Breadcrumbs::for('shops', function ($trail) {
  $trail->push('Lista punktów', url('/shops'));
});

Breadcrumbs::for('add_shop', function ($trail) {
  $trail->parent('shops');   
  $trail->push('Dodaj', url('/shop/create'));
});

Breadcrumbs::for('edit_shop', function ($trail, $name) {
  $trail->parent('shops');   
  $trail->push($name, route('edit_shop', 'shop'));
});

Breadcrumbs::for('gallery', function ($trail) {
  $trail->push('Galeria', url('/gallery'));
});

Breadcrumbs::for('album', function ($trail, $folder) {
  $trail->parent('gallery');
  $trail->push($folder, route('album', 'folder'));
});