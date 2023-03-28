<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Company extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';
    protected $fillable = ['parent_company_id', 'name'];

    public function getParentKeyName(): string
    {
        return 'parent_company_id';
    }
    /**
     * Get the comments for the blog post.
     */
    public function stations()
    {
        return $this->hasMany(Station::class);
    }
}
