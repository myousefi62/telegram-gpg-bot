<?php
// Routes

$app->post('/hook', function ($request, $response, $args) {
    $this->logger->info("Telegram hook received");
    /** @var \Telegram\Bot\Api $telegram */
    $telegram = $this->telegram;
});