<?php
// Routes

$app->post('/hook', function ($request, $response, $args) {
    $this->logger->info("Telegram hook received");

});

$app->post('/getUpdates', function ($request, $response, $args) {
    /** @var \Telegram\Bot\Api $telegram */
    $telegram = $this->telegram;
    $responses = $telegram->getUpdates();

    /** @var \Telegram\Bot\Objects\Update $response */
    foreach ($responses as $response) {
        $model = new \App\Model\PublicKey();
        $model->user_id = $response->getMessage()->getFrom()->getId();
        $model->public_key = $response->getMessage()->getText();
        $model->save();
        $telegram->sendMessage(['text' => 'Success']);
    }


});
