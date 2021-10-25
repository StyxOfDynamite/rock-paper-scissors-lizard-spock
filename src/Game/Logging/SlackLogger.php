<?php

namespace App\Game\Logging;

class SlackLogger implements Logger
{
    private $webhook;

    public function __construct($webhook)
    {
        $this->webhook = $webhook;
    }

    public function log(string $line): void
    {
        // Post to slack webhook.
        printf("sending \"%s\" to configured slack channel, via %s\n", $line, $this->getWebhook());
    }
    
    public function getWebhook()
    {
        return $this->webhook;
    }
}
