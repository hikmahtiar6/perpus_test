<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    protected $table = "buku";
	protected $primaryKey = 'buku_id';
	public $incrementing = true;

    protected $guarded = [
        'created_at', 'updated_at',
    ];

    protected $fillable = [
        'buku_judul', 'buku_kode', 'buku_tahun_terbit', 'pencipta_id', 'buku_stok'
    ];

    public function getDataAll() 
    {
        return BukuModel::all();
    }

    public function pencipta() 
    {
        return $this->belongsTo(PenciptaModel::class, 'pencipta_id');
    }

    public function saveData($array=[]) {
        $save = BukuModel::newInstance($array);

        if($save->save()) {
            return $save;
        }
    }
}
