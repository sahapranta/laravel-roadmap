<?php

use Illuminate\Support\Facades\Route;
use Sahapranta\LaravelRoadmap\Http\Controllers\RoadmapController;

Route::get('/', [RoadmapController::class, 'index'])->name('roadmap.index');
