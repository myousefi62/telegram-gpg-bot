<?php
// Routes

$app->post('/hook', function ($request, $response, $args) {
    $this->logger->info("Telegram hook received");
    /** @var \Telegram\Bot\Api $telegram */
    $telegram = $this->telegram;

    $update = $telegram->getWebhookUpdates();

    if ($update->count() >= 1) {
        \App\Model\PublicKey::updateOrCreate([
            'user_id' => $update->getMessage()->getFrom()->getId()
        ], [
            'public_key' => $update->getMessage()->getText()
        ]);

        $telegram->sendMessage(['text' => 'Success', 'chat_id' => $update->getMessage()->getChat()->getId()]);
    }


});

