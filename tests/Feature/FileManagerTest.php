<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Middleware\Authenticate;
use Tests\TestCase;

class FileManagerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Disable auth middleware so routes load without redirect
        $this->withoutMiddleware(Authenticate::class);
    }

    /** @test */
    public function unauthenticated_users_can_view_file_manager()
    {
        $this->get('/laravel-filemanager')
             ->assertStatus(200);
    }

    /** @test */
    public function authenticated_users_can_view_file_manager()
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $this->actingAs($user)
             ->get('/laravel-filemanager')
             ->assertStatus(200)
             ->assertSee('Upload');
    }

    /** @test */
    public function file_upload_works()
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $file = UploadedFile::fake()->image('photo.jpg');

        $response = $this->actingAs($user)
                         ->post('/laravel-filemanager/upload?type=Files', [
                             'upload' => $file,
                         ]);

        $response->assertStatus(200)
                 ->assertJson(['uploaded' => true]);

        Storage::disk('public')
               ->assertExists("{$user->id}/Files/" . $file->hashName());
    }
}
