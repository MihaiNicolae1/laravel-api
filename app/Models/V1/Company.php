<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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

    public static function getDescendantsIds($id)
    {
        $query = DB::table('companies')
            ->select('companies.id')
            ->where('id','=', $id)
            ->unionAll(
                DB::table('companies')
                    ->select('companies.id')
                    ->join('tree', 'tree.id', '=', 'companies.parent_company_id')
            );

        $tree = DB::table('tree')
            ->withRecursiveExpression('tree', $query)
            ->get();

        $tree = collect($tree)->all();
        $result = [];
        foreach ($tree as  $object) {
            $result[] = $object->id;
        }
        return $result;
    }

    public static function getDescendantsList($id)
    {
        $query = DB::table('companies')
            ->where('id','=', $id)
            ->unionAll(
                DB::table('companies')
                    ->select('companies.*')
                    ->join('tree', 'tree.id', '=', 'companies.parent_company_id')
            );

        $tree = DB::table('tree')
            ->withRecursiveExpression('tree', $query)
            ->get();

        return $tree;
    }
}
