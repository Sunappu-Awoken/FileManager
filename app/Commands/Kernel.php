protected $commands = [\App\Console\Commands\PruneOrphans::class];

protected function schedule(Schedule $schedule) {
  $schedule->command('files:prune-orphans')->weekly();
}