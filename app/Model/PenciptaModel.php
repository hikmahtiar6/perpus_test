<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PenciptaModel extends Model
{
    protected $table = "pencipta";
	protected $primaryKey = 'pencipta_id';
	public $incrementing = true;

    protected $guarded = [
        'created_at', 'updated_at',
    ];

    protected $fillable = [
        'pencipta_nama'
    ];

    public function getDataAll() 
    {
        return PenciptaModel::all();
    }

    public function saveData($array=[]) {
        $save = PenciptaModel::newInstance($array);

        if($save->save()) {
            return $save;
        }
    }
}
