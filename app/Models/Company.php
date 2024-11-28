<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Profiler\Profile;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'company', 'social_reason', 'reference', 'founded_out','solde'];

    public function profile()
    {
        return $this->hasMany(Profile::class);
    }

}
