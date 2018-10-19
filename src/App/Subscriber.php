<?php

namespace Ushahidi\App;

use Illuminate\Contracts\Events\Dispatcher;
use Ushahidi\App\Listener\CreatePostFromMessage;
use Ushahidi\App\Listener\HandleTargetedSurveyResponse;
use Ushahidi\App\Listener\QueueExportJob;

class Subscriber
{

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(
            'message.receive',
            HandleTargetedSurveyResponse::class
        );

        $events->listen(
            'message.receive',
            CreatePostFromMessage::class
        );

        $events->listen(
            'export_job.create',
            QueueExportJob::class
        );
    }
}
