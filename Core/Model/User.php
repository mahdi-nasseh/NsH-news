<?php
/**
 * @param $ID
 * @param $name
 * @param $family
 * @param $username
 * @param $mobile
 * @param $email
 * @param $thumbnail
 * @param $birthday
 * @param $bio
 * @param $role
 * @param $job
 */
namespace Nshnews\Model;
include '.././vendor/autoload.php';

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $table = 'user';

    protected $fillable = [
        "name",
        "family",
        "username",
        "mobile",
        "email",
        "thumbnail",
        "birthday",
        "bio",
        "role",
        "job"
    ];

    protected $hidden = [
        "password",
        "remember_token"
    ];

    public function setPassword($password)
    {
        $this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'likeable');
    }
    public  function getFullName(){
        return $this->attributes['name'] . ' ' . $this->attributes['family'];
    }

}
