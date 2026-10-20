<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase as ApplicationTestCase;

class AdminUiTest extends ApplicationTestCase
{
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::query()->where('username', 'admin')->firstOrFail();
        $this->cleanup();
    }

    protected function tearDown(): void
    {
        $this->cleanup();

        parent::tearDown();
    }

    public function test_indicator_pages_validate_save_update_and_print(): void
    {
        $cases = [
            ['pma', '/indikator/pma', ['tahun' => 1991, 'jumlah' => 10, 'status_data' => 1], 'm_35_pma', '1991', ['jumlah' => 25]],
            ['perkebunan', '/indikator/perkebunan', ['tahun' => 1991, 'jumlah' => 3, 'status_data' => 2], 'm_23_perkebunan', '1991', ['jumlah' => 8]],
            ['jalan', '/indikator/jalan', ['tahun' => 1991, 'panjang' => 4, 'status_data' => 1], 'm_28_jalan', '1991', ['panjang' => 9]],
            ['penduduk-umur', '/indikator/penduduk-umur', ['tahun' => 1991, 'kelompok_umur' => 1, 'jumlah' => 100, 'status_data' => 1], 'm_26_penduduk_umur', '1991~1', ['jumlah' => 120]],
            ['pdrb-berlaku', '/indikator/pdrb-berlaku', ['uraian' => 1, 'tahun' => 1991, 'jumlah' => 50, 'status_data' => 3], 'm_19_pdrb_berlaku', '1~1991', ['jumlah' => 75]],
        ];

        foreach ($cases as [$key, $url, $payload, $table, $record, $changes]) {
            $this->actingAs($this->admin)
                ->get($url)
                ->assertOk()
                ->assertInertia(fn (Assert $page) => $page->component('Admin/Indicator/Index')->where('indicator.key', $key));

            $this->actingAs($this->admin)
                ->post($url, [])
                ->assertSessionHasErrors();

            $this->actingAs($this->admin)
                ->post($url, $payload)
                ->assertRedirect(route('indikator.index', $key));

            $this->assertDatabaseHas($table, $payload);

            $this->actingAs($this->admin)
                ->put($url.'/'.$record, $changes)
                ->assertRedirect(route('indikator.index', $key));

            $this->actingAs($this->admin)
                ->get($url.'/cetak')
                ->assertOk()
                ->assertInertia(fn (Assert $page) => $page->component('Admin/Indicator/Print'));

            $this->actingAs($this->admin)
                ->delete($url.'/'.$record)
                ->assertRedirect(route('indikator.index', $key));

            $this->assertDatabaseMissing($table, $payload);
        }
    }

    public function test_saving_an_unchanged_indicator_row_does_not_404(): void
    {
        $row = DB::table('m_2_ipm')->where('tahun', 2024)->first();

        $this->actingAs($this->admin)
            ->from('/indikator/ipm')
            ->put('/indikator/ipm/2024', [
                'ipm' => $row->ipm,
                'status_data' => $row->status_data,
            ])
            ->assertRedirect('/indikator/ipm');
    }

    public function test_superadmin_can_manage_users_and_api_still_returns_json(): void
    {
        Storage::fake('public');

        $this->actingAs($this->admin)
            ->post('/pengguna', [
                'name' => 'Pengguna Tanpa Foto',
                'username' => 'pengguna-tanpa-foto',
                'email' => 'pengguna-tanpa-foto@example.com',
                'nomor_hp' => '0800000001992',
                'password' => 'rahasia-uji',
                'default_role' => 'operator',
            ])
            ->assertRedirect(route('pengguna.index'))
            ->assertSessionHasNoErrors();

        $withoutFoto = User::query()->where('username', 'pengguna-tanpa-foto')->firstOrFail();
        $this->assertNull($withoutFoto->getFirstMedia('foto'));
        $withoutFoto->syncRoles([]);
        $withoutFoto->delete();

        $this->actingAs($this->admin)
            ->post('/pengguna', [
                'name' => 'Pengguna Uji',
                'username' => 'pengguna-uji',
                'email' => 'pengguna-uji@example.com',
                'nomor_hp' => '0800000001991',
                'password' => 'rahasia-uji',
                'default_role' => 'operator',
                'foto' => UploadedFile::fake()->image('foto.jpg'),
            ])
            ->assertRedirect(route('pengguna.index'));

        $user = User::query()->where('username', 'pengguna-uji')->firstOrFail();
        $this->assertTrue($user->hasRole('operator'));
        $this->assertNotNull($user->getFirstMedia('foto'));
        $this->assertNotSame('', $user->fotoUrl());

        $password = $user->password;

        $this->actingAs($this->admin)
            ->post('/pengguna/'.$user->id, [
                'name' => 'Pengguna Uji Diubah',
                'username' => 'pengguna-uji',
                'email' => 'pengguna-uji@example.com',
                'nomor_hp' => '0800000001991',
                'password' => '',
                'default_role' => 'operator',
            ])
            ->assertRedirect(route('pengguna.index'))
            ->assertSessionHasNoErrors();

        $user->refresh();
        $this->assertSame('Pengguna Uji Diubah', $user->name);
        $this->assertSame($password, $user->password);

        $this->actingAs($this->admin)
            ->delete('/pengguna/'.$user->id)
            ->assertRedirect(route('pengguna.index'));

        $this->assertSame(1, (int) $user->fresh()->isdeleted);

        $user->forceDelete();

        $this->getJson('/api/v1/sosial/ppm')->assertOk();
    }

    private function cleanup(): void
    {
        DB::table('m_35_pma')->where('tahun', 1991)->delete();
        DB::table('m_23_perkebunan')->where('tahun', 1991)->delete();
        DB::table('m_28_jalan')->where('tahun', 1991)->delete();
        DB::table('m_26_penduduk_umur')->where('tahun', 1991)->where('kelompok_umur', 1)->delete();
        DB::table('m_19_pdrb_berlaku')->where('tahun', 1991)->where('uraian', 1)->delete();

        foreach (['pengguna-uji', 'pengguna-tanpa-foto'] as $username) {
            $user = User::query()->where('username', $username)->first();
            if ($user) {
                $user->syncRoles([]);
                $user->delete();
            }
        }
    }
}
