<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Email;

class EmailTest extends TestCase
{
    /**
     * @group Unit.Email
     *
     * @return void
     */
    public function testRelationWithUser()
    {
        $email = factory(Email::class)->create();
        $this->assertEquals( $email->user_id, $email->user->id );
    }
}
