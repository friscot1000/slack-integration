<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Maknz\Slack\Client;

define("SpamNotification", "SPAMNOTIFICATION");

class EmailController extends Controller
{
    /**
     * Render the exception into an HTTP response.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getSpam(Request $request): JsonResponse
    {
        if (strtoupper($request->get("Type")) == SpamNotification) {
            $client = new Client('https://hooks.slack.com/services/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');
            $client->to('#general')->send('"Email":"'. $request->get('Email') .',');
            return (response()->json([
                "RecordType" => "Bounce",
                "Type" => "SpamNotification",
                "TypeCode"=> 512,
                "Name"=> "Spam notification",
                "Tag"=> "",
                "MessageStream"=> "outbound",
                "Description"=> "The message was delivered, but was either blocked by the user, or classified as spam, bulk mail, or had rejected content.",
                "Email"=>$request->get('Email'),
                "From"=> "notifications@honeybadger.io",
                "BouncedAt"=> "2023-02-27T21:41:30Z"], 503));
        }
        return (response()->json([
            "RecordType" => "Bounce",
            "MessageStream" => "outbound",
            "Type" => "HardBounce",
            "TypeCode" => 1,
            "Name" => "Hard bounce",
            "Tag" => "Test",
            "Description" => "The server was unable to deliver your message (ex: unknown user, mailbox not found).",
            "Email" => $request->get('Email'),
            "From" => "notifications@honeybadger.io",
            "BouncedAt" => "2019-11-05T16:33:54.9070259Z",
            ], 200));
    }
}
