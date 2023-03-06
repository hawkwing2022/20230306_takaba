<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion'];

    public static function doSearch($name, $gender, $frd, $tod, $email)
    {
        $query = self::query();
        if (!empty($name)) {
            $query->where('fullname', 'like binary', "%{$name}%");
        }
        if (!empty($gender)) {
            if($gender == 0) {
                $query->all();
            }
            else {
                $query->where('gender', '=', $gender);
            }
        }
        if (!empty($frd)) {
            if (!empty($tod)) {
                $query->whereBetween('created_at', [$frd, $tod]);
            }
            else {
                $query->where('created_at', '>', $frd);
            }
        }
        else {
            if (!empty($tod)) {
                $query->where('created_at', '<', $tod);
            }
        }
        if (!empty($email)) {
            $query->where('email', 'like binary', "%{$email}%");
        }
        $results = $query->get();
        return $results;
    }

    function isCheckedGender($gender)
    {
        return $this->gender == $gender ? 'checked' : '';
    }
}
