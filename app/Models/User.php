<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //creando una relacion one to many
    public function posts()
    {  // En caso de que no funcione colocar la clave foranea
       // return $this->hasMany(Post::class,'id_foreanea');
        return $this->hasMany(Post::class,'users_id');
    }
    public function likes()
    {
        // Crea relacion de LIkes y usuarios, un usuario tine muchos likes
        return $this->hasMany(Like::class,'users_id');
    }

    // almacenar los seguidores de un usuario

    public function follower()
    {
        // un seguirdor puede seguir a muchos y viceversaa
        return $this->belongsToMany(User::class,'followers','users_id','follower_id');
    }
    public function siguiendo(User $user)
    {
        return   $this->follower->contains($user->id);
    }
    public function followings()
    {
        return $this->belongsToMany(User::class,'followers','follower_id','users_id');
    }
}
