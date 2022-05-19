<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for(__('navigation.home'), function ($trail) {
    $trail->push(__('navigation.home'), route('user.home.index'));
});

Breadcrumbs::for(__('navigation.beers'), function ($trail) {
    $trail->parent(__('navigation.home'));
    $trail->push(__('navigation.beers'), route('user.beers.index'));
});

Breadcrumbs::for(__('navigation.beers').'.show', function ($trail, $beer) {
    $trail->parent(__('navigation.beers'));
    $trail->push($beer->getName(), route('user.beers.show', $beer->getId()));
});

Breadcrumbs::for(__('navigation.ranking'), function ($trail) {
    $trail->parent(__('navigation.home'));
    $trail->push(__('navigation.ranking'), route('user.beers.ranking'));
});

Breadcrumbs::for(__('navigation.cart'), function ($trail) {
    $trail->parent(__('navigation.home'));
    $trail->push(__('navigation.cart'), route('user.cart.index'));
});

Breadcrumbs::for(__('navigation.orders'), function ($trail) {
    $trail->parent(__('navigation.home'));
    $trail->push(__('navigation.orders'), route('user.orders.index'));
});

Breadcrumbs::for(__('navigation.orders').'.show', function ($trail, $order) {
    $trail->parent(__('navigation.orders'));
    $trail->push($order->getId(), route('user.orders.show', $order->getId()));
});
