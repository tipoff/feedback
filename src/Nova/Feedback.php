<?php

declare(strict_types=1);

namespace Tipoff\Feedback\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Tipoff\Support\Nova\BaseResource;

class Feedback extends BaseResource
{
    public static $model = \Tipoff\Feedback\Models\Feedback::class;

    public static function label()
    {
        return 'Participant Feedback';
    }

    public static function singularLabel()
    {
        return 'Feedback';
    }

    public function title()
    {
        return 'Participant Feedback';
    }

    public static $title = 'id';

    public static $search = [
        'id',
    ];

    public static $group = 'Reporting';

    public function fieldsForIndex(NovaRequest $request)
    {
        return array_filter([
            ID::make()->sortable(),
            Date::make('Date Played', 'date')->sortable(),
            nova('participant') ? BelongsTo::make('Participant', 'participant', nova('participant'))->sortable() : null,
            nova('location') ? BelongsTo::make('Location', 'location', nova('location'))->sortable() : null,
            Badge::make('Response', function () {
                if (empty($this->emailed_at)) {
                    return 'Queued';
                }
                if (empty($this->clicked_positive_at) && empty($this->clicked_negative_at)) {
                    return 'Waiting';
                }
                if (isset($this->clicked_negative_at)) {
                    return 'Negative';
                }
                if (isset($this->clicked_semi_negative_at)) {
                    return 'Semi-Negative';
                }
                if (isset($this->clicked_semi_positive_at)) {
                    return 'Semi-Positive';
                }
                if (isset($this->clicked_positive_at)) {
                    return 'Positive';
                }

                return 'Waiting';
            })->map([
                'Negative' => 'danger',
                'Semi-Negative' => 'danger',
                'Semi-Positive' => 'success',
                'Positive' => 'success',
                'Queued' => 'warning',
                'Waiting' => 'info',
            ]),
        ]);
    }

    public function fields(Request $request)
    {
        return array_filter([
            Date::make('Date Played', 'date'),
            nova('participant') ? BelongsTo::make('Participant', 'participant', nova('participant')) : null,
            nova('location') ? BelongsTo::make('Location', 'location', nova('location')) : null,
            DateTime::make('Request Emailed', 'emailed_at'),
            Badge::make('Response', function () {
                if (empty($this->emailed_at)) {
                    return 'Queued';
                }
                if (empty($this->clicked_positive_at) && empty($this->clicked_negative_at)) {
                    return 'Waiting';
                }
                if (isset($this->clicked_negative_at)) {
                    return 'Negative';
                }
                if (isset($this->clicked_semi_negative_at)) {
                    return 'Semi-Negative';
                }
                if (isset($this->clicked_semi_positive_at)) {
                    return 'Semi-Positive';
                }
                if (isset($this->clicked_positive_at)) {
                    return 'Positive';
                }

                return 'Waiting';
            })->map([
                'Negative' => 'danger',
                'Semi-Negative' => 'danger',
                'Semi-Positive' => 'success',
                'Positive' => 'success',
                'Queued' => 'warning',
                'Waiting' => 'info',
            ]),

            new Panel('Feedback Response', $this->responseFields()),

            new Panel('Request Details', $this->infoFields()),

        ]);
    }

    protected function responseFields()
    {
        return [
            DateTime::make('Email Opened', 'opened_at'),
            DateTime::make('Clicked Negative', 'clicked_negative_at'),
            DateTime::make('Clicked Semi-Negative', 'clicked_semi_negative_at'),
            DateTime::make('Clicked Semi-Positive', 'clicked_semi_positive_at'),
            DateTime::make('Clicked Positive', 'clicked_positive_at'),
            DateTime::make('Clicked to Review', 'clicked_review_at'),
            DateTime::make('Redirected to Review', 'redirected_at'),
            DateTime::make('Message Submitted', 'submitted_at'),
            Textarea::make('Message')->rows(3)->alwaysShow(),
        ];
    }

    protected function infoFields()
    {
        return [
            ID::make()->sortable(),
            Text::make('Token'),
            Text::make('Email Identifier'),
            DateTime::make('Created At'),
            DateTime::make('Updated At'),
        ];
    }
}
