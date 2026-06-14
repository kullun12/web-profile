<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    /**
     * Nama perintah yang akan diketik di terminal.
     */
    protected $signature = 'make:service {name : The name of the service class}';

    /**
     * Deskripsi perintah.
     */
    protected $description = 'Create a new Service class in app/Services';

    /**
     * Eksekusi logika command.
     */
    public function handle()
    {
        // Mengambil argumen nama service (contoh: PelamarService)
        $name = $this->argument('name');
        
        // Menentukan lokasi folder dan file
        $directory = app_path('Services');
        $path = $directory . '/' . $name . '.php';

        // Mencegah penimpaan file jika service sudah ada
        if (File::exists($path)) {
            $this->error("Service [{$name}] sudah ada!");
            return Command::FAILURE;
        }

        // Membuat folder app/Services jika belum ada
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Template dasar/stub untuk file Service baru
        $stub = <<<EOT
<?php

namespace App\Services;

class {$name}
{
    /**
     * Create a new service instance.
     */
    public function __construct()
    {
        //
    }
}

EOT;

        // Menulis file ke dalam direktori
        File::put($path, $stub);

        $this->info("Service [app/Services/{$name}.php] berhasil dibuat \u{2714}");
        
        return Command::SUCCESS;
    }
}