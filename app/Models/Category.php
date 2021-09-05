<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function scopeCategoryCar($query)
    {
        return $query->where('name', 'car')->first();
    }
    public function scopeCategoryElectronics($query)
    {
        return $query->where('name', 'electronics')->first();
    }

    public function ads()
    {
        return $this->hasMany(Advertisement::class);
    }
    
}
