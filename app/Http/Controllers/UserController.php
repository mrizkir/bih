<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(): Response
    {
        $users = User::query()
            ->where('isdeleted', 0)
            ->orderByDesc('id')
            ->get()
            ->map(fn (User $user) => [
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'nomor_hp' => $user->nomor_hp,
                'default_role' => $user->default_role,
                'foto_url' => $this->fotoUrl($user->foto),
            ]);

        return Inertia::render('Admin/Users/Index', [
            'users' => $users,
            'roles' => Role::query()->orderBy('name')->pluck('name'),
        ]);
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $data = $request->safe()->except('foto');
        $data['theme'] = 'default';
        $data['active'] = 1;
        $data['isdeleted'] = 0;
        $data['foto'] = $request->file('foto')->store('img_user', 'public');

        $user = User::query()->create($data);
        $user->assignRole($data['default_role']);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil disimpan.');
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $data = $request->safe()->except(['foto', 'password']);

        if ($request->filled('password')) {
            $data['password'] = $request->string('password')->toString();
        }

        if ($request->hasFile('foto')) {
            $this->deleteFoto($user->foto);
            $data['foto'] = $request->file('foto')->store('img_user', 'public');
        }

        $user->update($data);
        $user->syncRoles([$data['default_role']]);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diubah.');
    }

    public function destroy(User $user): RedirectResponse
    {
        abort_if($user->is(request()->user()), 422, 'Akun yang sedang dipakai tidak dapat dihapus.');

        $user->update(['isdeleted' => 1]);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    private function fotoUrl(?string $foto): ?string
    {
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

    private function deleteFoto(?string $foto): void
    {
        if ($foto === null || $foto === '' || str_starts_with($foto, 'storage/images/')) {
            return;
        }

        $path = str_starts_with($foto, 'img_user/') ? $foto : 'img_user/'.$foto;

        Storage::disk('public')->delete($path);
    }
}
