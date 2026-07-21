<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Slider extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function isExternalImage(): bool
    {
        return Str::startsWith($this->image, ['http://', 'https://']);
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->isExternalImage()) {
            return $this->image;
        }

        return Storage::disk('public')->url($this->image);
    }

    public function deleteStoredImage(): void
    {
        if (! $this->isExternalImage() && $this->image && Storage::disk('public')->exists($this->image)) {
            Storage::disk('public')->delete($this->image);
        }
    }
}
