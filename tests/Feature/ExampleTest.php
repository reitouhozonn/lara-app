<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use database\factories\PersonFactory;
use App\Person;
use Illuminate\Support\Facades\Bus;
use App\Jobs\MyJob;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testBasicTest()
    // {
    //   $response = $this->get('/');
    //     $response->assertStatus(200);
    //     $this->withoutExceptionHandling();
    //     $this->get('/')->assertStatus(200);
    //     $this->get('/hello')->assertOk();
    //     // $this->post('/hello')->assertOk();
    //     $this->get('/react')->assertOk();
    //     // $this->post('/react')->assertOk();
    //     // $this->get('/hello/1')->assertOk();
    //     // $this->get('/hoge')->assertStatus(404);
    //     $this->get('/hello')->assertSeeText('Index');
    //     $this->get('/hello')->assertSee('<h1>');
    //     $this->get('/hello')->assertSeeInOrder([
    //       '<html', '<head', '<body', '<h1>']);
    // }
    //
    // public function testDbTest()
    // {
    //     for ($i=0; $i < 100; $i++) {
    //       // code...
    //       // factory(Person::class)->create();
    //     $count = Person::get()->count();
    //     $person = Person::find($i+1);
    //     $data = $person->toArray();
    //
    //     $this->assertDatabaseHas('people', $data);
    //
    //     $person->delete();
    //     $this->assertDatabaseMissing('people', $data);
    //   }
    // }

    public function testJobTest()
    {
      $id = 1;

      Bus::fake();
      Bus::assertNotDispatched(MyJob::class);
      MyJob::dispatch($id);
      Bus::assertDispatched(MyJob::class);
    }

}
