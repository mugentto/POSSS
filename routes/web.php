<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

route::get('/',[AdminController::class,"index"]);


