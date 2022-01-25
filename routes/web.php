<?php

use app\controllers\User;

$app->get('/', User::class . ':index');