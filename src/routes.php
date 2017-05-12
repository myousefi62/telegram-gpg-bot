<?php
// Routes

$app->post('/hook', function ($request, $response, $args) {
    $this->logger->info("Telegram hook received");
    /** @var \Telegram\Bot\Api $telegram */
    $telegram = $this->telegram;

    $updates = $telegram->getUpdates();

    if (count($updates) >= 1) {
        /** @var \Telegram\Bot\Objects\Update $update */
        foreach ($updates as $update) {
            \App\Model\PublicKey::updateOrCreate([
                'user_id' => $update->getMessage()->getFrom()->getId()
            ], [
                'public_key' => $update->getMessage()->getText()
            ]);

            $telegram->sendMessage(['text' => 'Success', 'chat_id' => $update->getMessage()->getChat()->getId()]);
        }
    }



});

