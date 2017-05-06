<?php
// Routes

$app->post('/hook', function ($request, $response, $args) {
    $this->logger->info("Telegram hook received");
    /** @var \Telegram\Bot\Api $telegram */
    $telegram = $this->telegram;
    /** @var \Telegram\Bot\Objects\Update $update */
    $update = $telegram->getWebhookUpdates();

    $publicKeyModel = \App\Model\PublicKey::firstOrNew([
        'user_id' => $update->getMessage()->getFrom()->getId(),
        'public_key' => $update->getMessage()->getText()
    ]);
    $publicKeyModel->save();
    $telegram->sendMessage(['text' => 'Success', 'chat_id' => $update->getMessage()->getChat()->getId()]);
});

