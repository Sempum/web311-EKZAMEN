<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Document extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'product_id', 'approved'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getImage()
    {
        $info = pathinfo($this->file);
        $ext = $info['extension'];
        $imgExt = ['jpg', 'jpeg', 'png', 'svg'];
        $pdfExt = ['pdf'];

        if ( in_array($ext, $imgExt)) {
            return '<img src="'.asset('assets/img/img-ico.svg').'" alt="'.$this->name.'"style="width: 100%">';
        }

        if ( in_array($ext, $pdfExt)) {
            return '<img src="'.asset('assets/img/pdf-ico.svg').'" alt="'.$this->name.'"style="width: 100%">';
        }
    }

    public function uploadDocs($file)
    {
        if ($file === null) return;

        $ext = $file->extension();
        $availableExtensions = ['pdf', 'img'];

        if ( !in_array($ext, $availableExtensions)) return;

        $filename = 'doc_'. $this->id;
        $path = '/products_doc/' . $filename;
        $fullPath = $file->store($path, 'uploads');

        $this->file = $fullPath;
        $this->save();
    }

    public function removeDoc(): void
    {
        if($this->file === null) return;

        Storage::disk('uploads')->delete($this->file);

        $this->file = null;
        $this->save();
    }
}
