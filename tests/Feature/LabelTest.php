<?php

namespace Tests\Feature;

use App\Models\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LabelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();// TODO: Change the autogenerated stub
        $this->user = $this->authUser();
    }

    public function test_user_can_fetch_all_labels()
    {
        $label = $this->createLabel([
            'user_id' => $this->user->id
        ]);

        $response = $this->getJson(route('label.index'))
            ->assertOk()
            ->json();

        $this->assertDatabaseHas('labels',['title' => $label->title]);
        $this->assertEquals(1,count($response));
        $this->assertEquals($response[0]['title'],$label->title);


    }

    public function test_user_can_add_label()
    {
        $label = $this->createlabel();


        $this->postJson(route('label.store'),['title'=>$label->title,'color'=>$label->color])
        ->assertCreated();

        $this->assertDatabaseHas('labels',['title' => $label->title,'color' => $label->color]);
    }

    public function test_user_can_delete_a_label()
    {
        $label = $this->createLabel();

        $this->deleteJson(route('label.destroy',$label->id))
            ->assertNoContent();

        $this->assertDatabaseMissing('labels',['title' => $label->title,'color' => $label->color]);
    }

    public function test_user_can_update_a_label()
    {
        $label = $this->createLabel();
        $newLabel = Label::factory()->make();

        $this->patchJson(route('label.update',$label->id),
            ['color' => $newLabel->color])
            ->assertOk()
            ->json();

        $this->assertDatabaseHas('labels',['color' => $newLabel->color]);
    }
}