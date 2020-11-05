<?php
  
namespace App;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
   
class Participant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 use SoftDeletes;
	 protected $table = 'participants';
    protected $fillable = [
        'name', 'age', 'dob', 'profession', 'locality', 'number_of_guests', 'address', 'deleted_at'
    ];
}