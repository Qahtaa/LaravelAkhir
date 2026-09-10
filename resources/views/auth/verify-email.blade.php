<x-guest-layout>
    <div class="mb-4 text-sm text-zinc-400">
        {{ __('Terima kasih sudah mendaftar. Sebelum mulai, verifikasi alamat email kamu melalui tautan yang baru saja kami kirim. Jika email belum diterima, kamu bisa meminta tautan baru.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-emerald-400">
            {{ __('Tautan verifikasi baru sudah dikirim ke email yang kamu gunakan saat mendaftar.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Kirim Ulang Verifikasi') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="aa-link">
                {{ __('Keluar') }}
            </button>
        </form>
    </div>
</x-guest-layout>
