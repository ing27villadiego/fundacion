<?php  namespace App\Funpacol\Entities;



use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    protected $fillable = ['name', 'letter'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function zones()
    {
        return $this->hasMany(Zone::class);
    }

    public function promoters()
    {
        return $this->hasMany(Promoter::class);
    }

}
