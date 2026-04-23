<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EditPanduan extends Model
{
    protected $primaryKey = 'id'; //default: id
    protected $keyType = 'integer'; //default: bigInteger
    protected $table ="edit_panduan";
    protected $fillable = [
        'id',
        'judul_1',
        'isi_1',
        'judul_2',
        'isi_2'
];
}