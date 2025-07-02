<?php

namespace App\Observers;

use App\Models\Drawing;
use Illuminate\Support\Facades\Artisan;

class DrawingObserver
{
    public function created(Drawing $drawing): void
    {
        Artisan::call('og:generate', [
            'slug' => $drawing->slug,
        ]);
    }
}
