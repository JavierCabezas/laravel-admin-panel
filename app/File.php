<?php

namespace App;

use App\Helpers\UnitConvert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'hash', 'name', 'path', 'mime_type', 'extension', 'size'
    ];

    /**
     * Get the public file path
     *
     * @return string
     */
    public function getPath()
    {
        return storage_path("app/local/") . $this->path;
    }
}
