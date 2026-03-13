<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Page extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'page_type',
        'excerpt',
        'content',
        'featured_image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'order',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }
            if (Auth::check()) {
                $page->created_by = Auth::id();
            }
        });

        static::updating(function ($page) {
            if (Auth::check()) {
                $page->updated_by = Auth::id();
            }
        });
    }

    /**
     * Get the user who created the page
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated the page
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Scope a query to only include published pages
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope a query to filter by page type
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('page_type', $type);
    }

    /**
     * Get page types
     */
    public static function getPageTypes()
    {
        return [
            'home' => 'Home',
            'about' => 'About Us',
            'services' => 'Services',
            'projects' => 'Projects',
            'blog' => 'Blog',
            'gallery' => 'Gallery',
            'faqs' => 'FAQs',
            'contact' => 'Contact Us',
        ];
    }

    /**
     * Get status options
     */
    public static function getStatusOptions()
    {
        return [
            'draft' => 'Draft',
            'published' => 'Published',
        ];
    }
}
