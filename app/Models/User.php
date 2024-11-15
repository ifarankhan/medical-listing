<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use CrudTrait;
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
        'profile_picture'
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
    /**
     * Get the users associated with the role.
     */
    public function userRole(): BelongsToMany
    {
        return $this->belongsToMany(UserRole::class, 'user_role_user');
    }

    public function hasRole(string $role): bool
    {
        return $this->userRole->contains('name', $role);
    }

    public static function getUserCountByRole(string $role)
    {
        return self::whereHas('userRole', function ($query) use ($role) {
            $query->where('name', $role);
        })->count();
    }

    public static function userCountByRoleWidgetArray(int $count, int $target, array $options): array
    {
        $progress = ($count / $target) * 100;
        return [
            'type'          => 'progress',
            'class'         => $options['class'],
            'value'         => $count,
            'description'   => $options['description'],
            'progress'      => $progress,
            'progressClass' => 'progress-bar bg-primary',
            'hint'          => ($target - $count) . ' more until next milestone.',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->hasRole(UserRole::ROLE_ADMIN);
    }
    public function isCustomer(): bool
    {
        return $this->hasRole(UserRole::ROLE_CUSTOMER);
    }
    public function isServiceProvider(): bool
    {
        return $this->hasRole(UserRole::ROLE_INSURANCE_PROVIDER);
    }
    public function setPasswordAttribute($value): void
    {
        // Check if the request is coming from a Backpack route
        if (!request()->routeIs('backpack.*')) { // Adjust the URL pattern as needed
            // Hash the password if it's not a Backpack route
            $this->attributes['password'] = Hash::make($value);
        } else {
            // Directly set the password if it is a Backpack route
            $this->attributes['password'] = $value;
        }
    }
    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    public function messages(): HasMany
    {
        $key = $this->isServiceProvider()? 'provider_id': 'user_id';

        return $this->hasMany(Message::class, $key);
    }

    public function getHasTrialEndedAttribute(): bool
    {
        if (!$this->trial_period_end) {
            return false;
        }

        return Carbon::parse($this->trial_period_end)->isPast();
    }

    public function getFormattedTrialEndDateAttribute(): ?string
    {
        if (!$this->trial_period_end) {
            return null;
        }

        return Carbon::parse($this->trial_period_end)->format('F j, Y');
    }
}
