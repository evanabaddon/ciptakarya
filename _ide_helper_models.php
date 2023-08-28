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
 * App\Models\KategoriKegiatan
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kegiatan> $kegiatans
 * @property-read int|null $kegiatans_count
 * @method static \Database\Factories\KategoriKegiatanFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|KategoriKegiatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KategoriKegiatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KategoriKegiatan query()
 * @method static \Illuminate\Database\Eloquent\Builder|KategoriKegiatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KategoriKegiatan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KategoriKegiatan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KategoriKegiatan whereUpdatedAt($value)
 */
	class KategoriKegiatan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kegiatan
 *
 * @property int $id
 * @property int $program_id
 * @property string $kategori_kegiatan_id
 * @property string $name
 * @property string|null $desa
 * @property string|null $kecamatan
 * @property string|null $pagu
 * @property string|null $nilaikontrak
 * @property string|null $nokontrak
 * @property string|null $tglkontrak
 * @property string|null $bataspelaksanaan
 * @property string|null $penyedia
 * @property string|null $realisasi
 * @property string|null $keuangan
 * @property string|null $fisik
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\KategoriKegiatan|null $kategori_kegiatan
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Program|null $program
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\KegiatanFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereBataspelaksanaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereDesa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereFisik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereKategoriKegiatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereKeuangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereNilaikontrak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereNokontrak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan wherePagu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan wherePenyedia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereRealisasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereTglkontrak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereUpdatedAt($value)
 */
	class Kegiatan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Program
 *
 * @property int $id
 * @property string $name
 * @property string|null $anggaran
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kegiatan> $kegiatans
 * @property-read int|null $kegiatans_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\ProgramFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Program newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Program newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Program query()
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereAnggaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereUpdatedAt($value)
 */
	class Program extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $nohp
 * @property string|null $akses
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAkses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNohp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

