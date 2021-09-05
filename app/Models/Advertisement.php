<?php

namespace App\Models;

use Cohensive\Embed\Facades\Embed;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advertisement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function displayVideoFromLink()
    {
        $embed = Embed::make($this->link)->parseUrl();
        if (!$embed) {
            return;
        }
        $embed->setAttribute(['width' => 500]);
        return $embed->getHtml();
    }

    public function childcategory()
    {
        return $this->hasOne(Childcategory::class, 'id', 'childcategory_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id','category_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //scope method for car

   public function scopeFirstFourAdsInCaurosel($query,$categoryId)
   {
       return $query->where('category_id', $categoryId)
       ->orderByDesc('id')->take(6)->get();
   }

   public function scopeSecondFourAdsInCaurosel($query,$categoryId)
   {
       $firstAds = $this->scopeFirstFourAdsInCaurosel($query,$categoryId);
       return $query->where('category_id', $categoryId)
       ->whereNotIn('id',$firstAds->pluck('id')->toArray())
        ->take(6)->get();
   }

   //scope for electronics
   public function scopeFirstFourAdsInCauroselForElectronics($query,$categoryId)
   {
       return $query->where('category_id', $categoryId)
       ->orderByDesc('id')->take(6)->get();
   }

   public function scopeSecondFourAdsInCauroselForElectronics($query,$categoryId)
   {
       $firstAds = $this->scopeFirstFourAdsInCauroselForElectronics($query,$categoryId);
       return $query->where('category_id', $categoryId)
       ->whereNotIn('id',$firstAds->pluck('id')->toArray())
        ->take(6)->get();
   }

   public function userads()
    {
        return $this->belongsToMany(User::class);
    }

    public function didUserSavedAd()
    {
        return DB::table('advertisement_user')
            ->where('user_id', auth()->user()->id)
            ->where('advertisement_id', $this->id)
            ->first();
    }

    
}
