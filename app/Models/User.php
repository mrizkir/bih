<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia, JWTSubject
{
  use HasApiTokens, HasFactory, HasRoles, InteractsWithMedia, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'username',
    'password',
    'name',
    'nomor_hp',
    'email',
    'theme',
    'foto',
    'active',
    'isdeleted',
    'default_role',
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
    'password' => 'hashed',
  ];

  // Rest omitted for brevity

  /**
   * Get the identifier that will be stored in the subject claim of the JWT.
   *
   * @return mixed
   */
  public function getJWTIdentifier()
  {
    return $this->getKey();
  }

  /**
   * Return a key value array, containing any custom claims to be added to the JWT.
   *
   * @return array
   */
  public function getJWTCustomClaims()
  {
    return [];
  }

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('foto')
      ->singleFile()
      ->useDisk('public')
      ->acceptsMimeTypes([
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/svg+xml',
        'image/webp',
      ]);

    $this->addMediaCollection('dokumen')
      ->useDisk('public');
  }

  public function fotoUrl(): ?string
  {
    $mediaUrl = $this->getFirstMediaUrl('foto');

    if ($mediaUrl !== '') {
      return $mediaUrl;
    }

    $foto = $this->foto;

    if ($foto === null || $foto === '') {
      return null;
    }

    if (str_starts_with($foto, 'http://') || str_starts_with($foto, 'https://')) {
      return $foto;
    }

    if (str_starts_with($foto, 'storage/')) {
      return asset($foto);
    }

    if (str_starts_with($foto, 'img_user/')) {
      return asset('storage/'.$foto);
    }

    return asset('storage/img_user/'.$foto);
  }
}
