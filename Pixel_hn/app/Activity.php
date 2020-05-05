<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
	protected $fillable = ['name','activity_statuses_id'];

	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
    public function ActivityStatus()
    {
        return $this->hasOne('App\ActivityStatus');
    }
}
