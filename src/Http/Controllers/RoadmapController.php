<?php

namespace Sahapranta\LaravelRoadmap\Http\Controllers;

use Sahapranta\LaravelRoadmap\Models\Feature;

class RoadmapController
{
    public function index()
    {
        $features = Feature::with('votes')->paginate();

        return view('roadmap::index', compact('features'));
    }
}
