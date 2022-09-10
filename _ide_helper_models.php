<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Hotspot
 *
 * @property int $id
 * @property int|null $router_id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Router|null $router
 * @method static \Illuminate\Database\Eloquent\Builder|Hotspot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hotspot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hotspot query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hotspot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotspot whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotspot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotspot whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotspot whereRouterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hotspot whereUpdatedAt($value)
 */
	class Hotspot extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HotspotAccount
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $birth_year
 * @property string|null $identity_number
 * @property string|null $phone
 * @property string|null $phone_verified_token
 * @property string $password
 * @property string|null $phone_verified_at
 * @property string|null $identity_verified_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $username
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount whereBirthYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount whereIdentityNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount whereIdentityVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount wherePhoneVerifiedToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotspotAccount whereUpdatedAt($value)
 */
	class HotspotAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Router
 *
 * @property int $id
 * @property string $name
 * @property string $identity
 * @property string|null $description
 * @property string $ip_address
 * @property int $api_port
 * @property string $api_username
 * @property string $api_password
 * @property string $log_prefix
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read bool $client_status
 * @property-read \App\Models\Hotspot|null $hotspot
 * @method static \Illuminate\Database\Eloquent\Builder|Router newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Router newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Router query()
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereApiPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereApiPort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereApiUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereIdentity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereLogPrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereUpdatedAt($value)
 */
	class Router extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

