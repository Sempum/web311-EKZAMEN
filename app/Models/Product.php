<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class Product extends Model
{
    use HasFactory, HasSlug, SoftDeletes;

    protected $fillable = ['name', 'category_id', 'description', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
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

        $filename = 'product_'. $this->id;
        $path = '/products_image/' . $filename;
        $fullPath = $file->store($path, 'uploads');

        $this->image = $fullPath;
        $this->save();
    }

    public function getImage()
    {
        if($this->image) {
            return '<img src="'.asset('uploads/' . $this->image).'" alt="'.$this->name.'"class="img-fluid rounded-start">';
        }

        return '<img src="'.asset('admin-assets/img/no-image.png').'" alt="'.$this->name.'"class="img-fluid rounded-start">';
    }

    public function removeImage(): void
    {
        if($this->image === null) return;

        Storage::disk('uploads')->delete($this->image);

        $this->image = null;
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }
}
