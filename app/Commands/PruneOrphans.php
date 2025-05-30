namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PruneOrphans extends Command {
  protected $signature = 'files:prune-orphans';
  protected $description = 'Delete files not referenced in the database';

  public function handle() {
    $filesInDb = DB::table('media')->pluck('path')->toArray();
    $allFiles = Storage::disk(config('lfm.disk'))->allFiles(config('lfm.private_folder_name', ''));
    foreach ($allFiles as $file) {
      if (! in_array($file, $filesInDb)) {
        Storage::disk(config('lfm.disk'))->delete($file);
        $this->info("Deleted orphan: $file");
      }
    }
  }
}