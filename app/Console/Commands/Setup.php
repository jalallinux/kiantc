<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup {--key-generate : Generating application key}
                                  {--migrate-fresh-seed : Fresh migrations and run seeders}
                                  {--migrate : Migrate new tables}
                                  {--pm2-startup : Start, startup and save pm2 process}
                                  {--pm2-link : Link pm2 to https://app.pm2.io/}
                                  {--symlinks : Linking filesystem links}
                                  {--docs-generate : Generating documentation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize Setup';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (
            ! $this->option('key-generate') && ! $this->option('migrate-fresh-seed')
            && ! $this->option('migrate') && ! $this->option('pm2-startup')
            && ! $this->option('pm2-link') && ! $this->option('symlinks')
            && ! $this->option('help')
        ) {
            $this->error('No option passes. run `php artisan setup --help` to see options.');

            return 0;
        }

        if ($this->option('key-generate')) {
            $this->call('key:generate', ['--force' => 1]);
            $this->call('passport:install', ['--force' => 1]);
        }

        $this->callSilently('optimize:clear');

        if ($this->option('migrate-fresh-seed')) {
            $this->call('migrate:fresh', ['--seed' => 1, '--force' => 1]);
        }

        if ($this->option('migrate')) {
            $this->call('migrate', ['--force' => 1]);
        }

        if ($this->option('pm2-startup')) {
            shell_exec('pm2 stop all');
            shell_exec('pm2 del all');
            shell_exec('pm2 start '.base_path('ecosystem.config.js'));
            shell_exec('pm2 startup');
            shell_exec('pm2 save --force');
        }

        if ($this->option('pm2-link')) {
            $pm2Keys = config('app.pm2');
            if (empty($pm2Keys['public_key']) || empty($pm2Keys['secret_key'])) {
                $this->error('Pm2 public_key or secret_key is not set.');
            } else {
                shell_exec('pm2 link delete');
                shell_exec("pm2 link {$pm2Keys['secret_key']} {$pm2Keys['public_key']}");
            }
        }

        if ($this->option('symlinks')) {
            if (file_exists(public_path('storage'))) {
                shell_exec('rm '.public_path('storage'));
            }
            if (file_exists(public_path('docs'))) {
                shell_exec('rm '.public_path('docs'));
            }
            $this->call('storage:link');
        }

        if ($this->option('docs-generate')) {
            $this->call('sajya:docs');
        }

        return self::SUCCESS;
    }
}
