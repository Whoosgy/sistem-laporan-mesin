<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Notifications\Notification;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{
    // Mengatur form agar menggunakan NIK 
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNikFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }

    protected function getNikFormComponent(): Component
    {
        return TextInput::make('nik')
            ->label('NIK (Nomor Induk Karyawan)')
            ->placeholder('Masukkan NIK Anda')
            ->required()
            ->autocomplete()
            ->autofocus();
    }

    protected function getPasswordFormComponent(): Component
    {
        return parent::getPasswordFormComponent()
            ->placeholder('Masukkan password Anda');
    }

    // PROSES AUTENTIKASI DAN ALERT ERROR
    public function authenticate(): ?LoginResponse
    {
        try {
            $data = $this->form->getState();

            // Mencoba login menggunakan credentials NIK dan Password
            if (! auth()->attempt([
                'nik' => $data['nik'],
                'password' => $data['password'],
            ], $data['remember'] ?? false)) {
                
                // JIKA GAGAL: Lemparkan pengecualian agar ditangkap oleh sistem validasi Filament
                throw ValidationException::withMessages([
                    'data.nik' => 'NIK tidak terdaftar atau password salah.',
                ]);
            }

            session()->regenerate();

            //NOTIFIKASI SUKSES LOGIN 
            Notification::make()
                ->title('Login Berhasil')
                ->body('Selamat Datang di Admin Panel!')
                ->success() 
                ->send();

            return app(LoginResponse::class);

        } catch (ValidationException $exception) {
            
            // Memunculkan Alert Pop-up Merah (Notification Toast) di pojok layar
            Notification::make()
                ->title('Gagal Masuk')
                ->body('NIK tidak terdaftar atau password salah. Silakan periksa kembali data Anda.')
                ->danger()
                ->send();

            // Teruskan exception agar kotak input NIK ikut berwarna merah
            throw $exception;
        }
    }
}