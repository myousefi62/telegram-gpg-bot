<?php
// Routes

$app->post('/hook', function ($request, $response, $args) {
    $this->logger->info("Telegram hook received");

});

$app->post('/getUpdates', function ($request, $response, $args) {
    /** @var \Telegram\Bot\Api $telegram */
    $telegram = $this->telegram;
    $response = $telegram->getWebhookUpdates();

    $gpg = new \gnupg();

    $response->each(function ($message) use ($gpg, $telegram) {

        if ($gpg->addencryptkey($message['message']['text'])) {
            $model = new \App\Model\PublicKey();
            $model->user_id = $message['message']['from']['id'];
            $model->public_key = $message['message']['text'];
            $model->save();
            $telegram->sendMessage(['text' => 'Success']);

        } else {
            $telegram->sendMessage(['text' => 'Error']);
        }

    });

});
