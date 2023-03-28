<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'latitude', 'longitude', 'company_id', 'address'];

    /**
     * Get the post that owns the comment.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
