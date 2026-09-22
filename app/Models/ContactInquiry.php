<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    /** @use HasFactory<\Database\Factories\ContactInquiryFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'read_at' => 'datetime',
        ];
    }

    public function scopeUnread(Builder $query): Builder
    {
        return $query->where('status', 'new');
    }

    public function scopeLatestFirst(Builder $query): Builder
    {
        return $query->latest();
    }

    public function isNew(): bool
    {
        return $this->status === 'new';
    }

    public function markRead(): void
    {
        if ($this->isNew()) {
            $this->forceFill([
                'status' => 'read',
                'read_at' => now(),
            ])->save();
        }
    }

    public function markUnread(): void
    {
        $this->forceFill([
            'status' => 'new',
            'read_at' => null,
        ])->save();
    }
}
