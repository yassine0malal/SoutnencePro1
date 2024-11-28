<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    protected $fillable = [
   'FirstName',
   'LastName',
   'Username',
    'Phone',
    'email',
   'password',

  ];
  public function formulair()
    {
        return $this->hasMany(Formulair::class, 'profil_id','id');
    }
  public function company()
    {
        return $this->belongsTo(Company::class, 'profil_id');
    }

}
