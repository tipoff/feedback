<?php

declare(strict_types=1);

namespace Tipoff\Feedback\Tests\Unit\Models;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tipoff\Feedback\Models\Feedback;
use Tipoff\Feedback\Tests\TestCase;

class FeedbackModelTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function create()
    {
        $model = Feedback::factory()->create();
        $this->assertNotNull($model);
    }
}