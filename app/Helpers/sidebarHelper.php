<?php

use App\Models\CmsModule;
use Illuminate\Support\Facades\Auth;

if (! function_exists('dynamic_sidebar')) {
    function dynamic_sidebar()
    {
        $role = Auth::user()?->role;

        if (! $role) {
            return collect();
        }

        return CmsModule::with(['children' => function ($q) use ($role) {
            $q->whereHas('permissions', function ($perm) use ($role) {
                $perm->where('role', $role)
                    ->where('is_view', 1);
            })->orderBy('sort_order');
        }])
            ->where('parent_id', 0)
            ->where('status', 'active')
            ->whereHas('permissions', function ($q) use ($role) {
                $q->where('role', $role)
                    ->where('is_view', 1);
            })
            ->orderBy('sort_order')
            ->get();
    }
}
