<?php

return [
    'title' => config('app.name') .  ' Roadmap',
    'prefix' => 'roadmap',
    'middleware' => 'web',
    'meta_title' => config('app.name') . ' Roadmap: Your Guide to Our Plans and Developments',
    'meta_description' => 'Explore our roadmap to discover the exciting future developments and enhancements we have planned. Stay informed about upcoming features, improvements, and milestones as we continue to evolve our products and services',
    'noindex' => false,
    'types' => [
        'need_feedback' => 'Need Feedback',
        'next' => 'Next',
        'in_progress' => 'In Progress',
        'done' => 'Done',
    ],
];
