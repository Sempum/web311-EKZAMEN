<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory, hasSlug;

    protected $fillable = ['name', 'sector_id'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function uploadImage($file)
    {
        if ($file === null) return;

        $ext = $file->extension();
        $availableExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if ( !in_array($ext, $availableExtensions)) return;

        $filename = 'category_'. $this->id;
        $path = '/categories_image/' . $filename;
        $fullPath = $file->store($path, 'uploads');

        $this->icon = $fullPath;
        $this->save();
    }

    public function getImage()
    {
        if($this->icon) {
            return '<img src="'.asset('uploads/' . $this->icon).'" alt="'.$this->name.'"style="width: 60px; height: 60px">';
        }

        return '<img src="'.asset('admin-assets/img/no-image.png').'" alt="'.$this->name.'"style="width: 60px; height: 60px">';
    }

    public function removeImage(): void
    {
        if($this->icon === null) return;

        Storage::disk('uploads')->delete($this->icon);

        $this->icon = null;
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }
}
