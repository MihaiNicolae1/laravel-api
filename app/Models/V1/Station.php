<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Station extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'latitude', 'longitude', 'company_id', 'address'];


    public static function getInRadius(int $km, float $lat, float $long)
    {
        $sql_distance = "(((acos(sin((" . $lat .
            "*pi()/180)) * sin((`stations`.`latitude`*pi()/180))+cos((" .
            $lat . "*pi()/180)) * cos((`stations`.`latitude`*pi()/180)) * cos(((" .
            $long . "-`stations`.`longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance ";

        $stations = DB::table('stations')
            ->select('*')
            ->selectRaw($sql_distance)
            ->having('distance', '<=', $km)
            ->orderBy('distance', 'ASC')
            ->get();
        $stations = collect($stations)->all();

        $grouped = [];
        foreach ($stations as $stationObject) {
            $group = implode(',', [$stationObject->latitude, $stationObject->longitude]);
            $grouped[$group][] = $stationObject;
        }
        return $grouped;
    }

    /**
     * Get the company that owns the station.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
