<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Models\Notes;
use Tests\TestCase;

class NotesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_store() // you can use this method or call it with model
    {
        $response = $this->call('POST', '/notes', [
            'patient_id' => '14',
            'user_id' => '28',
            'note' => 'This is test note3333',
            'type' => 'testType123'
        ]);

        // dd($response);

        $this->assertTrue(true);
    }

    public function test_update()
    {
        $notes = Notes::findOrFail(49); // example id from database
        $notes->note = 'New note from test_update';
        $notes->save();

//        dd($notes);

        $this->assertTrue(true);
    }

    public function test_destroy()
    {
        $notes = Notes::findOrFail(52); // example id from database
        $notes->delete();

        $this->assertTrue(true);

    }


}
