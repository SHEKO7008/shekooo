<?php
set_time_limit(0);
$TOKEN = "5087385634:AAGye_JHUdoSzo3u2N82GStz4sjSlaAFnno";
$forwardM=json_decode(file_get_contents("forwardM.json"),1);
$Js=json_decode(file_get_contents("Js.json"),1);
$Ds=json_decode(file_get_contents("Ds.json"),1);
$Vs=json_decode(file_get_contents("Users/Vs.json"),1);
if($Js['sudo']==null){	
$sudo=1126359517 ;//ايدي المطور
}else{
$sudo=$Js['sudo'];
}
$sudos=[$sudo]; 
if($Js['start']==null){
$TART="
• اهلا بك ، 
";
$Js['start']=$TART; 
SV("Js.json", $Js); 
}else{
$START=$Js['start'];
}
if (isset($TOKEN)) {
	define("TOKEN", $TOKEN);
} else {
	echo "<br> Hello There : <strong>The Variable " . '$TOKEN' . " Undefined :( </strong><br>";
	exit;
}

function bot($method, $datas = [])
{
	if (function_exists('curl_init')) {
		$url = "https://api.telegram.org/bot" . TOKEN . "/" . $method;
		$ch  = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
		$res = curl_exec($ch);
		if (curl_error($ch)) {
			var_dump(curl_error($ch));
		} else {
			return json_decode($res);
		} # END OF ISSET CURL
	} else {
		$iBadlz = http_build_query($datas);
		$url    = "https://api.telegram.org/bot" . TOKEN . "/" . $method . "?$iBadlz";
		$iBadlz = file_get_contents($url);
		return json_decode($iBadlz);
	} # END OF !CURL EXISTS
}
function Add($path, $content)
{
	$file = fopen("$path", "a") or die("Unable to open file!");
	fwrite($file, "$content");
	fclose($file);
}
function GetUpdates($offset = null, $limit = 1, $timeout = null, $allowed_updates = [])
{
	return bot('getUpdates', [
		'offset' => $offset,
		'limit' => $limit,
		'timeout' => $timeout,
		'allowed_updates' => $allowed_updates
	]);
}
function SetWebhook($url, $certificate = null, $max_connections = 1, $allowed_updates = [])
{
	return bot('setWebhook', [
		'url' => $url,
		'certificate' => $certificate,
		'max_connections' => $max_connections,
		'allowed_updates' => $allowed_updates,
	]);
}
function DeleteWebhook()
{
	return bot('deleteWebhook');
}
function GetWebhookInfo()
{
	return bot('getWebhookInfo');
}
function SendChatAction($chat_id, $action)
{
	bot('sendChatAction', [
		'chat_id' => $chat_id,
		'action' => $action
	]);
}
function SendMessage($chat_id, $text, $parse_mode = "MARKDOWN", $disable_web_page_preview = true, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendMessage', [
		'chat_id' => $chat_id,
		'text' => $text,
		'parse_mode' => $parse_mode,
		'disable_web_page_preview' => $disable_web_page_preview,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function ForwardMessage($chat_id, $from_chat_id, $message_id)
{
	return bot('forwardMessage', [
		'chat_id' => $chat_id,
		'from_chat_id' => $from_chat_id,
		'disable_notification' => false,
		'message_id' => $message_id
	]);
}
function SendPhoto($chat_id, $photo, $caption = null, $parse_mode = "MARKDOWN", $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendPhoto', [
		'chat_id' => $chat_id,
		'photo' => $photo,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendAudio($chat_id, $audio, $caption = null, $parse_mode = "MARKDOWN", $duration = null, $performer = null, $title = null, $thumb = null, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendAudio', [
		'chat_id' => $chat_id,
		'audio' => $audio,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'duration' => $duration,
		'performer' => $performer,
		'title' => $title,
		'thumb' => $thumb,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendDocument($chat_id, $document, $thumb = null, $caption = null, $parse_mode = "MARKDOWN", $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendDocument', [
		'chat_id' => $chat_id,
		'document' => $document,
		'thumb' => $thumb,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendVideo($chat_id, $video, $duration = null, $width = null, $height = null, $thumb = null, $caption = null, $parse_mode = "MARKDOWN", $reply_to_message_id = null, $reply_markup = null, $supports_streaming = null)
{
	return bot('sendVideo', [
		'chat_id' => $chat_id,
		'video' => $video,
		'duration' => $duration,
		'width' => $width,
		'height' => $height,
		'thumb' => $thumb,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'supports_streaming' => $supports_streaming,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendAnimation($chat_id, $animation, $duration = null, $width = null, $height = null, $thumb = null, $caption = null, $parse_mode = "MARKDOWN", $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendAnimation', [
		'chat_id' => $chat_id,
		'animation' => $animation,
		'duration' => $duration,
		'width' => $width,
		'height' => $height,
		'thumb' => $thumb,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendVoice($chat_id, $voice, $caption = null, $parse_mode = "MARKDOWN", $duration = null, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendVoice', [
		'chat_id' => $chat_id,
		'voice' => $voice,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'duration' => $duration,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendVideoNote($chat_id, $video_note, $duration = null, $length = null, $width = null, $height = null, $thumb = null, $caption = null, $parse_mode = "MARKDOWN", $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendVideoNote', [
		'chat_id' => $chat_id,
		'video_note' => $video_note,
		'duration' => $duration,
		'length' => $length,
		'thumb' => $thumb,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendMediaGroup($chat_id, $media, $reply_to_message_id = null)
{
	return bot('sendMediaGroup', [
		'chat_id' => $chat_id,
		'media' => $media,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id
	]);
}
function SendLocation($chat_id, $latitude, $longitude, $live_period = null, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendLocation', [
		'chat_id' => $chat_id,
		'latitude' => $latitude,
		'longitude' => $longitude,
		'live_period' => $live_period,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendContact($chat_id, $phone_number, $first_name, $last_name = null, $reply_to_message_id = null, $reply_markup = null, $vcard = null)
{
	return bot('sendContact', [
		'chat_id' => $chat_id,
		'phone_number' => $phone_number,
		'first_name' => $first_name,
		'last_name' => $last_name,
		'vcard' => $vcard,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendPoll($chat_id, $question, $options, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendPoll', [
		'chat_id' => $chat_id,
		'question' => $question,
		'options' => $options,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function GetUserProfilePhotos($user_id, $offset = null, $limit = null)
{
	return bot('getUserProfilePhotos', [
		'user_id' => $user_id,
		'offset' => $offset,
		'limit' => $limit
	]);
}
function GetFile($file_id)
{
	return bot('getFile', [
		'file_id' => $file_id
	]);
}
function File_path($file_path)
{
	$info = file_get_contents("https://api.telegram.org/file/bot" . TOKEN . "/" . $file_path);
	return $info;
}
function KickChatMember($chat_id, $user_id, $until_date = null)
{
	return bot('kickChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id,
		'until_date' => $until_date
	]);
}
function UnKickChatMember($chat_id, $user_id)
{
	return bot('promoteChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id,
		'can_send_messages' => true,
	]);
}
function PromoteChatMember($chat_id, $user_id)
{
	return bot('promoteChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id,
		'can_send_messages' => true,
		'can_delete_messages' => true,
		'can_invite_users' => true,
		'can_restrict_members' => true,
		'can_pin_messages' => true,
	]);
}
function RestrictChatMember($chat_id, $user_id)
{
	return bot('restrictChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id,
		'can_send_messages' => false,
		'can_send_media_messages' => false,
		'can_invite_users' => false,
		'can_send_other_messages' => false,
	]);
}
function UnRestrictChatMember($chat_id, $user_id)
{
	return bot('promoteChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id,
		'can_send_messages' => true,
		'can_send_media_messages' => true,
		'can_send_other_messages' => true,
	]);
}
function DemoteChatMember($chat_id, $user_id)
{
	return bot('promoteChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id,
		'can_change_info' => false,
		'can_post_messages' => false,
		'can_edit_messages' => false,
		'can_delete_messages' => false,
		'can_invite_users' => false,
		'can_restrict_members' => false,
		'can_pin_messages' => false,
		'can_promote_members' => false
	]);
}
function ExportChatInviteLink($chat_id)
{
	return bot('exportChatInviteLink', [
		'chat_id' => $chat_id
	]);
}
function SetChatPhoto($chat_id, $photo)
{
	return bot('setChatPhoto', [
		'chat_id' => $chat_id,
		'photo' => $photo
	]);
}
function DeleteChatPhoto($chat_id)
{
	return bot('deleteChatPhoto', [
		'chat_id' => $chat_id
	]);
}
function SetChatTitle($chat_id, $title)
{
	return bot('setChatTitle', [
		'chat_id' => $chat_id,
		'title' => $title
	]);
}
function SetChatDescription($chat_id, $description)
{
	return bot('setChatDescription', [
		'chat_id' => $chat_id,
		'description' => $description
	]);
}
function PinChatMessage($chat_id, $message_id)
{
	return bot('pinChatMessage', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'disable_notification' => false
	]);
}
function UnpinChatMessage($chat_id)
{
	return bot('unpinChatMessage', [
		'chat_id' => $chat_id,
	]);
}
function LeaveChat($chat_id)
{
	return bot('LeaveChat', [
		'chat_id' => $chat_id
	]);
}
function GetChat($chat_id)
{
	return bot('getChat', [
		'chat_id' => $chat_id
	]);
}
function GetChatAdministrators($chat_id)
{
	return bot('getChatAdministrators', [
		'chat_id' => $chat_id
	]);
}
function GetChatMembersCount($chat_id)
{
	return bot('getChatMembersCount', [
		'chat_id' => $chat_id
	]);
}
function GetChatMember($chat_id, $user_id)
{
	return bot('getChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id
	]);
}
function AnswerCallbackQuery($callback_query_id, $text, $show_alert = false, $url = null, $cache_time = 0)
{
	return bot('answerCallbackQuery', [
		'callback_query_id' => $callback_query_id,
		'text' => $text,
		'show_alert' => $show_alert,
		'url' => $url,
		'cache_time' => $cache_time
	]);
}
function EditMessageText($chat_id, $message_id, $text, $inline_message_id = null, $parse_mode = "MARKDOWN", $disable_web_page_preview = true, $reply_markup = null)
{
	return bot('editMessageText', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'inline_message_id' => $inline_message_id,
		'text' => $text,
		'parse_mode' => $parse_mode,
		'disable_web_page_preview' => $disable_web_page_preview,
		'reply_markup' => $reply_markup
	]);
}
function EditMessageCaption($chat_id, $message_id, $caption, $inline_message_id = null, $parse_mode = "MARKDOWN", $reply_markup = null)
{
	return bot('editMessageCaption', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'inline_message_id' => $inline_message_id,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'reply_markup' => $reply_markup
	]);
}
function EditMessageMedia($chat_id, $message_id, $media, $inline_message_id = null, $parse_mode = "MARKDOWN", $reply_markup = null)
{
	return bot('editMessageMedia', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'inline_message_id' => $inline_message_id,
		'media' => $media,
		'reply_markup' => $reply_markup
	]);
}
function EditMessageReplyMarkup($chat_id, $message_id, $reply_markup, $inline_message_id = null)
{
	return bot('editMessageReplyMarkup', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'inline_message_id' => $inline_message_id,
		'reply_markup' => $reply_markup
	]);
}
function StopPoll($chat_id, $message_id, $reply_markup = null)
{
	return bot('stopPoll', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'reply_markup' => $reply_markup
	]);
}
function DeleteMessage($chat_id, $message_id)
{
	return bot('deletemessage', [
		'chat_id' => $chat_id,
		'message_id' => $message_id
	]);
}
function SendSticker($chat_id, $sticker, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendSticker', [
		'chat_id' => $chat_id,
		'sticker' => $sticker,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function AnswerInlineQuery($inline_query_id, $results, $cache_time = 0, $is_personal = false, $next_offset = null, $switch_pm_text = null, $switch_pm_parameter = null)
{
	return bot('answerInlineQuery', [
		'inline_query_id' => $inline_query_id,
		'results' => $results,
		'cache_time' => $cache_time,
		'is_personal' => $is_personal,
		'next_offset' => $next_offset,
		'switch_pm_text' => $switch_pm_text,
		'switch_pm_parameter' => $switch_pm_parameter
	]);
}
function SendGame($chat_id, $game_short_name, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendGame', [
		'chat_id' => $chat_id,
		'game_short_name' => $game_short_name,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function InlineKeyBoard($inlinetext = [], $type, $contents = [], $standar = "column", $count = 1)
{
	for ($i = 0; $i < $count; $i++) {

		$text     = $inlinetext[$i];
		$content = $contents[$i];

		if ($standar == "column") {
			$keyboard['inline_keyboard'][] = [['text' => $text, $type => $content]];
		}
		if ($standar == "row") {
			$keyboard['inline_keyboard'][] = [['text' => $inlinetext[$i], $type => $contents[$i]], ['text' => $inlinetext[++$i], $type => $contents[$i]]];
		}
	}
	$inline = json_encode($keyboard);
	return $inline;
}
function KeyBoard($keytext = [], $standar = "column", $count = 1)
{
	for ($i = 0; $i < $count; $i++) {

		$text = $keytext[$i];

		if ($standar == "column") {
			$keyboard['keyboard'][] = [['text' => $text]];
		}
		if ($standar == "row") {
			$keyboard['keyboard'][] = [['text' => $keytext[$i]], ['text' => $keytext[++$i]]];
		}
	}
	$resize_keyboard = json_encode($keyboard);
	return $resize_keyboard;
}
function myZip($myZip1, $myZip2)
{
	$myZip4 = realpath($myZip1);
	$myZip = new ZipArchive();
	$myZip->open($myZip2, ZipArchive::CREATE | ZipArchive::OVERWRITE);
	$myZip3 = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($myZip4),
		RecursiveIteratorIterator::LEAVES_ONLY
	);
	foreach ($myZip3 as $myZip5 => $myZip6) {
		if (!$myZip6->isDir()) {
			$myZip7 = $myZip6->getRealPath();
			$myZip8 = substr($myZip7, strlen($myZip4) + 1);
			$myZip->addFile($myZip7, $myZip8);
		}
	}
	$myZip->close();
}

function myZip1($myZip9, $myZip10 = 2)
{
	$myZip11 = array(' B', ' KB', ' MB', ' GB', ' TB', ' PB', ' EB', ' ZB', ' YB');
	$myZip12 = floor((strlen($myZip9) - 1) / 3);
	return sprintf("%.{$myZip10}f", $myZip9 / pow(1024, $myZip12)) . @$myZip11[$myZip12];
}

function GetMe()
{
	return bot('getMe');
}

function Slin($a){
$P=GetChat($a)->result;
if($P->username==null){
if($P->invite_link!=null){
$d=$P->invite_link;$tc="خاصه";
}else{
$d=ExportChatInviteLink($a)->result;$tc="خاصه";
}
}else{$d="t.me/".$P->username;$tc="عامه";} 
return $d;}


if (!is_dir("Users")) { // used to make dir
mkdir("Users");
}
function isthere($path) // check member.txt & chat.txt
{
$ex = explode("\n", file_get_contents($path));
return $ex;
}

$update     = json_decode(file_get_contents('php://input'));

if (isset($update)) {

	$bot = GetMe()->result;
	$botid = $bot->id;
	$botname = $bot->first_name;
	$botusername = $bot->username;

	$message      = $update->message;
	$data         = $update->callback_query->data;
	$edit         = $update->edited_message;
	$inline_query = $update->inline_query->query;

	if ($message) {

		$date                  = $message->date;
		$message_id            = $message->message_id;
		$text                  = $message->text;
		$chat_id               = $message->chat->id;
		$from_id               = $message->from->id;
		$reply                 = $message->reply_to_message;
		$reply_id              = $message->reply_to_message->from->id;
		$reply_user            = $message->reply_to_message->from->username;
		$reply_message_id      = $message->reply_to_message->message_id;
		$reply_caption         = $message->reply_to_message->caption;
		$reply_audio           = $message->reply_to_message->audio;
		$reply_audio_file_id   = $message->reply_to_message->audio->file_id;
		$reply_audio_size      = $message->reply_to_message->audio->file_size;
		$forward               = $message->forward_from;
		$forward_id            = $forward->id;
		$forward_username      = $forward->username;
		$chat_forward          = $message->forward_from_chat;
		$chat_forward_id       = $chat_forward->id;
		$chat_forward_username = $chat_forward->username;
		$chat_forward_title    = $chat_forward->title;
		$chat_forward_type     = $chat_forward->type;
		$username              = $message->from->username;
		$type                  = $message->chat->type;
		$itprivate             = $type == "private";
		$itchannel             = $type == "channel";
		$itsupergroup          = $type == "supergroup";
		$itgroup               = $type == "group";
		$group_title           = $message->chat->title;
		$name                  = $message->from->first_name;
		$name_tag              = "[ • $name • ](tg://user?id=$from_id)";
		$name_reply            = $message->reply_to_message->from->first_name;
		$name_tag_reply        =  "[$name_reply](tg://user?id=$reply_id)";
		$audio                 = $message->audio;
		$audio_file_id         = $message->audio->file_id;
		$video                 = $message->video;
		$video_file_id         = $message->video->file_id;
		$voice                 = $message->voice;
		$voice_file_id         = $message->voice->file_id;
		$photo                 = $message->photo;
		$photo_file_id         = $message->photo[0]->file_id;
		$sticker               = $message->sticker;
		$sticker_file_id       = $message->sticker->file_id;
		$contact               = $message->contact;
		$contact_number        = $message->contact->phone_number;
		$contact_name          = $message->contact->first_name;
		$video_note            = $message->video_note;
		$video_note_file_id    = $message->video_note->file_id;
		$document              = $message->document;
		$document_name         = $document->file_name;
		$document_file_id      = $document->file_id;
		$gif                   = $message->animation;
		$gif_file_id           = $message->animation->file_id;
		$pin                   = $message->pinned_message;
		$pin_id                = $message->pinned_message->from->id;
		$pin_first_name        = $message->pinned_message->from->first_name;
		$pin_tag               = "[$pin_first_name](tg://user?id=$pin_id)";
		$inline                = $message->reply_markup->inline_keyboard;
		$entities              = $message->entities;
		$location              = $message->location;
		$location_file_id      = $message->location->file_id;
		$new_chat              = $message->new_chat_member;
		$left_chat             = $message->left_chat_member;
		$new_id                = $new_chat->id;
		$left_id               = $left_chat->id;
		$left_name             = $left_chat->first_name;
		$checkbots             = GetChatMember($chat_id, $new_id)->result->user->is_bot;
	} elseif ($data) {
                $username =             $update->callback_query->from->username;
		$date                  = $update->callback_query->date;
		$chat_id               = $update->callback_query->message->chat->id;
		$from_id               = $update->callback_query->message->reply_to_message->from->id;
		$message_id            = $update->callback_query->message->message_id;
		$from_id               = $update->callback_query->from->id;
		$name                  = $update->callback_query->from->first_name;
		$name_tag              = "[$name](tg://user?id=$from_id)";
	} elseif ($edit) {

		$from_id               = $update->edited_message->from->id;
		$chat_id               = $update->edited_message->chat->id;
		$message_id            = $update->edited_message->message_id;
		$name                  = $update->edited_message->from->first_name;
		$name_tag              = "[$name_edit](tg://user?id=$edit_from_id)";
	} elseif ($inline_query) {
		$inline_query_id = $update->inline_query->id;
	}
} #End of $update isset
include("Conect.php");
$filejson = json_decode(mys('file',"Get"),true);
$records = json_decode(mys('records',"Get"),true);
$sales = json_decode(mys('sales',"Get"),true);
$move = json_decode(mys('move',"Get"),true);

function SV($a,$b){file_put_contents($a,json_encode($b,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));}
$webhost = "https://" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']; //مسار ملفك من الاستضافه
$path= "Users"; # مسار مجلد الخزن 
$Ty=$Js['type'][$chat_id];
$Ch=$Js['ch'];
if($Js['Jp']==null){
$Js['Jp']="on";
$Js['Forward']="❌";
$Js['Notices']="❌";
$Js['TSF']="❌";
$Js['backp']="❌";
$Vs['TBr']="❌";
$Js['MNT']="❌";
$Js['SubC']="✅";
$Js['BotS']="✅";
SV("Js.json",$Js);
SV("$path/Vs.json",$Vs);
}

$Members = count(isthere("$path/member.txt")) - 1;
$Groups= count(isthere("$path/chat.txt")) - 1;
if($data=="Aban"){
$button = ['رجوع']; $keys = ['band']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);
}elseif($data=="Admin"){
$button = ['رجوع']; $keys = ['Admins']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);
}elseif($data=="Aban"){
$button = ['رجوع']; $keys = ['band']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);
}elseif(in_array($data,['FGbroadcast','Fbroadcast','Gbroadcast','Pbroadcast'])){
$button =['رجوع']; $keys = ['broDa']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);
}elseif(in_array($data,['addch','Dch','Dfake','addfake','SubK'])){
$button = ['رجوع']; $keys = ['ChaneLL']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);
}elseif(in_array($data,['DTT','AddT1'])){
$button = ['رجوع']; $keys = ['ET']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);
}elseif(in_array($data,['AddV1','DelV1'])){
$button = ['رجوع']; $keys = ['EV1']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);
}elseif(in_array($data,['uBK','rebackup', 'uBKg'])){
$button = ['رجوع']; $keys = ['Bckup']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);
}elseif(!$data or !in_array($data,['DelV1','AddT1','DTT','Pbroadcast','Gbroadcast','Fbroadcast','FGbroadcast','Aban','Admin','SubK','addfake','Dfake','addch','Dch'])){
$button = ['رجوع']; $keys = ['cancel']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);
}
$buttn = ['الغاء الاذاعه','رجوع']; $kes = ['caBr','broDa']; $keyboar2 = InlineKeyBoard($buttn, 'callback_data', $kes, 'column', 2);
//****
$keyboard=json_encode(['inline_keyboard'=>[
[['text'=>"الاشعارات: ".$Js['Notices'],'callback_data'=>"Notices"],['text'=>"التواصل: ".$Js['Forward'],'callback_data'=>"Forward"],['text'=>"البوت: ".$Js['BotS'],'callback_data'=>"BotS"]], 
[['text'=>"التصفيه التلقائيه : ".$Js['TSF'],'callback_data'=>"TSF"], 
['text'=>"منع التكرار : ".$Js['MNT'],'callback_data'=>"MNT"]], 
[['text'=>"رساله الترحيب (start) ",'callback_data'=>"startM"]], 
[['text'=>"قسم الاشتراك الاجباري ",'callback_data'=>"ChaneLL"],['text'=>"قسم الاذاعه ",'callback_data'=>"broDa"]], 
[['text'=>"قسم النسخه الاحتياطيه",'callback_data'=>"Bckup" ]], 
[['text'=>"قسم الادمنيه ",'callback_data'=>"Admins"],['text'=>"قسم الحظر ",'callback_data'=>"band"]], 
[['text'=>"قسم الاعلانات ",'callback_data'=>"EV1"], ['text'=>"قسم التمويل ",'callback_data'=>"ET"]], 
[['text'=>"نقل ملكيه البوت",'callback_data'=>"sudo"],
['text'=>"اعدادات الرشق",'callback_data'=>"stengbott"]],
[['text'=>"قسم الأحصائيات",'callback_data'=>"count"]], 
]]);
//****
$keyboardBa=json_encode(['inline_keyboard'=>[
[['text'=>"حظر عضو ➕",'callback_data'=>"Aban"]], 
[['text'=>"المحظورين 🚫",'callback_data'=>"AllB"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]);
//****
$keyboardBackup=json_encode(['inline_keyboard'=>[
[['text'=>"نسخه يوميه: ".$Js['backp'],'callback_data'=>"backp"], ['text'=>"جلب نسخه احتياطيه",'callback_data'=>"gBK"]],
[['text'=>"استعاده الخزن",'callback_data'=>"rebackup"]], 
[['text'=>"رفع نسخه اعضاء",'callback_data'=>"uBK"], ['text'=>"رفع نسخه كروبات",'callback_data'=>"uBKg"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]);
//****
$keyboardAd=json_encode(['inline_keyboard'=>[
[['text'=>"رفع ادمن ➕",'callback_data'=>"Admin"]], 
[['text'=>"الادمنيه 📑",'callback_data'=>"Allad"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]);
//****
$keyboardB=json_encode(['inline_keyboard'=>[
[['text'=>"تثبيت الاذاعه : ".$Vs['TBr'],'callback_data'=>"TBr"]], 
[['text'=>"اذاعه خاص 📢",'callback_data'=>"Pbroadcast"],['text'=>"توجيه خاص 🔄",'callback_data'=>"Fbroadcast"]], 
[['text'=>"اذاعه كروبات 📢",'callback_data'=>"Gbroadcast"],['text'=>"توجيه كروبات 🔄",'callback_data'=>"FGbroadcast"]], 
[['text'=>"الاحصائيات 📊",'callback_data'=>"count"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]);
//****
$KeyboardCH=json_encode(['inline_keyboard'=>[
[['text'=>"كليشه واحده : ".$Js['SubC'],'callback_data'=>"SubC"],['text'=>"اضافه قناة ➕",'callback_data'=>"addch"]], 
[['text'=>"عرض القنوات 📋",'callback_data'=>"Vch"],['text'=>"حذف القنوات 🗑",'callback_data'=>"Dch"]], 
[['text'=>"تغيير كليشه الاشتراك 📃",'callback_data'=>"SubK"]], 
[['text'=>"اضف اشتراك وهمي 🔢",'callback_data'=>"addfake"],['text'=>"حذف الاشتراك الوهمي 🗑",'callback_data'=>"Dfake"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]],]]); 
//****
$KeyboardT=json_encode(['inline_keyboard'=>[
[['text'=>"التمويلات الجاريه 🗄",'callback_data'=>"TT1"],['text'=>"اضف تمويل ➕",'callback_data'=>"AddT1"]], 
[['text'=>"سجل التمويلات 📑",'callback_data'=>"ETM"]], 
[['text'=>"حذف التمويلات 🗑",'callback_data'=>"DTT"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]); 
//****
$KeyboardV=json_encode(['inline_keyboard'=>[
[['text'=>"عرض الاعلان ⚙️",'callback_data'=>"VV1"]], 
[['text'=>"ضع اعلان 🎁",'callback_data'=>"AddV1"], ['text'=>"حذف الاعلان 🗑",'callback_data'=>"DelV1"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]); 
//****
if($Js['SubK']==null){
$SubK="انت غير مشترك بقناه البوت ◽
اشترك ثم ارسل /start 
"; 
}else{
$SubK=$Js['SubK']; 
} 
if(!$username){$Suser="لايوجد";}else{$Suser="@$username";}
//----------------

if (file_exists($path . "/counter.txt")) {
$get_c = get($path . "/counter.txt");
$get_t = get($path . "/type.txt");
$get_i = get($path . "/index.txt");
$get_m = get($path . "/msg.txt");
$get_s = get($path . "/sender.txt");
$get_a = get($path . "/caption.txt");
}
function txt($path, $contents, $options = null)
{
file_put_contents($path, $contents, $options);
}
function get($path)
{
return file_get_contents($path);
}
function CurlGetContents($url){
$header = array('Accept-Language: en');
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$data = curl_exec($curl);
curl_close($curl);
return $data;
}

echo ini_get('memory_limit');

function broadcast($Vs, $index, $caption) // set broadcast
{
txt($GLOBALS['path'] . "/index.txt", $index);
$exmem= isthere($GLOBALS['path'] . "/$index.txt");
$mm=get($GLOBALS['path'] . "/m.txt");
$get_s = get($GLOBALS['path'] . "/sender.txt");
$get_c = get($GLOBALS['path'] . "/counter.txt");
 
if ($GLOBALS['text']) {
$x = 20;
txt($GLOBALS['path'] . "/counter.txt", $x);
txt($GLOBALS['path'] . "/a.txt",count(explode("\n",get($GLOBALS['path'] . "/$index.txt")))-1);
txt($GLOBALS['path'] . "/type.txt", "text");
txt($GLOBALS['path'] . "/sender.txt", $GLOBALS['from_id']);
txt($GLOBALS['path'] . "/msg.txt", $GLOBALS['text']);
for ($i = 0; $i <= $x; $i++) {
$y=SendMessage($exmem[$i], $GLOBALS['text'], "MARKDOWN", true)->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
} 
}
}
if ($GLOBALS['photo']) {
$x = 20;
txt($GLOBALS['path'] . "/counter.txt", $x);
txt($GLOBALS['path'] . "/type.txt", "photo");
txt($GLOBALS['path'] . "/sender.txt", $GLOBALS['from_id']);
txt($GLOBALS['path'] . "/msg.txt", $GLOBALS['photo_file_id']);
txt($GLOBALS['path'] . "/caption.txt", $caption);
for ($i = 0; $i <= $x; $i++) {
$y=SendPhoto($exmem[$i], $GLOBALS['photo_file_id'], $caption, "MARKDOWN")->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
} }
}
if ($GLOBALS['video']) {
$x = 20;
txt($GLOBALS['path'] . "/counter.txt", $x);
txt($GLOBALS['path'] . "/type.txt", "video");
txt($GLOBALS['path'] . "/sender.txt", $GLOBALS['from_id']);
txt($GLOBALS['path'] . "/msg.txt", $GLOBALS['video_file_id']);
txt($GLOBALS['path'] . "/caption.txt", $caption);
for ($i = 0; $i <= $x; $i++) {
$y=SendVideo($exmem[$i], $GLOBALS['video_file_id'], null, null, null, null, $caption, "MARKDOWN")->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
} }
}
if ($GLOBALS['video_note']) {
$x = 20;
txt($GLOBALS['path'] . "/counter.txt", $x);
txt($GLOBALS['path'] . "/type.txt", "video_note");
txt($GLOBALS['path'] . "/sender.txt", $GLOBALS['from_id']);
txt($GLOBALS['path'] . "/msg.txt", $GLOBALS['video_note_file_id']);
txt($GLOBALS['path'] . "/caption.txt", $caption);
for ($i = 0; $i <= $x; $i++) {
$y=SendVideoNote($exmem[$i], $GLOBALS['video_note_file_id'], null, null, null, null, null, $caption, "MARKDOWN")->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
} }
}
if ($GLOBALS['audio']) {
$x = 20;
txt($GLOBALS['path'] . "/counter.txt", $x);
txt($GLOBALS['path'] . "/type.txt", "audio");
txt($GLOBALS['path'] . "/sender.txt", $GLOBALS['from_id']);
txt($GLOBALS['path'] . "/msg.txt", $GLOBALS['audio_file_id']);
for ($i = 0; $i <= $x; $i++) {
$y=SendAudio($exmem[$i], $GLOBALS['audio_file_id'], $caption, "MARKDOWN")->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
} }
}
if ($GLOBALS['voice']) {
$x = 20;
txt($GLOBALS['path'] . "/counter.txt", $x);
txt($GLOBALS['path'] . "/type.txt", "voice");
txt($GLOBALS['path'] . "/sender.txt", $GLOBALS['from_id']);
txt($GLOBALS['path'] . "/msg.txt", $GLOBALS['voice_file_id']);
for ($i = 0; $i <= $x; $i++) {
$y=SendVoice($exmem[$i], $GLOBALS['voice_file_id'], $caption, "MARKDOWN")->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
} }
}
if ($GLOBALS['sticker']) {
$x = 20;
txt($GLOBALS['path'] . "/counter.txt", $x);
txt($GLOBALS['path'] . "/type.txt", "sticker");
txt($GLOBALS['path'] . "/sender.txt", $GLOBALS['from_id']);
txt($GLOBALS['path'] . "/msg.txt", $GLOBALS['sticker_file_id']);
for ($i = 0; $i <= $x; $i++) {
$y=SendSticker($exmem[$i], $GLOBALS['sticker_file_id'])->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
} }
}
file_get_contents("https://" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
}

function myheaders($Vs, $msg, $index, $caption = null) // run broadcast
{
$abs= $GLOBALS['path'];
$get_c= get($abs . "/counter.txt");
$get_t= get($abs . "/type.txt");
$get_i= get($abs . "/index.txt");
$get_m= get($abs . "/msg.txt");
$get_s= get($abs . "/sender.txt");
 
$mm=get($GLOBALS['path'] . "/m.txt");
$exmem= isthere($GLOBALS['path'] . "/$index.txt");
$count= count($exmem);
if (file_exists($abs . "/counter.txt")) {
$x = $get_c + 20;
if ($get_c + 20 >= $count + 20) {
echo "done!";
SendMessage($get_s, "
تم الاذاعه لـ*$count* عضو
", "MARKDOWN", true,null,json_encode(['inline_keyboard'=>[[['text'=>"الصفحه الرئيسيه",'callback_data'=>"cancel"]]]]));
unlink($abs . "/counter.txt");
unlink($abs . "/type.txt");
unlink($abs . "/index.txt");
unlink($abs . "/m.txt");
unlink($abs . "/msg.txt");
unlink($abs . "/sender.txt");
exit;
} elseif ($get_t == "text") {
for ($i = $get_c; $i <= $x; $i++) {
$y=SendMessage($exmem[$i], $msg, "MARKDOWN", true)->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
} }
} elseif ($get_t == "photo") {
for ($i = $get_c; $i <= $x; $i++) {
$y=SendPhoto($exmem[$i], $msg, $caption, "MARKDOWN")->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
}  }
} elseif ($get_t == "video") {
for ($i = $get_c; $i <= $x; $i++) {
$y=SendVideo($exmem[$i], $msg, null, null, null, null, $caption, "MARKDOWN")->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
}  }
} elseif ($get_t == "video_note") {
for ($i = $get_c; $i <= $x; $i++) {
$y=SendVideoNote($exmem[$i], $msg, null, null, null, null, null, $caption, "MARKDOWN")->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
} }
} elseif ($get_t == "audio") {
for ($i = $get_c; $i <= $x; $i++) {
$y=SendAudio($exmem[$i], $msg, $caption, "MARKDOWN")->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
}  }
} elseif ($get_t == "voice") {
for ($i = $get_c; $i <= $x; $i++) {
$y=SendVoice($exmem[$i], $msg, $caption, "MARKDOWN")->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
}  }
} elseif ($get_t == "sticker") {
for ($i = $get_c; $i <= $x; $i++) {
$y=SendSticker($exmem[$i], $msg)->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
}  }
}
txt($GLOBALS['path'] . "/counter.txt", $x);
header("Refresh:2");
echo "<strong>sending to ..." . $get_c . "</strong><br>";
file_get_contents("https://" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
}
}

function forward($Vs,$index) // set broadcast Forward
{
txt($GLOBALS['path'] . "/index.txt", $index);
$exmem= isthere($GLOBALS['path'] . "/$index.txt");
$mm=get($GLOBALS['path'] . "/m.txt");
$get_s = get($GLOBALS['path'] . "/sender.txt");
$get_c = get($GLOBALS['path'] . "/counter.txt");
 
if ($GLOBALS['forward'] || $GLOBALS['chat_forward']) {
$x = 20;
txt($GLOBALS['path'] . "/counter.txt", $x);
txt($GLOBALS['path'] . "/type.txt", "forward");
txt($GLOBALS['path'] . "/sender.txt", $GLOBALS['from_id']);
txt($GLOBALS['path'] . "/msg.txt", $GLOBALS['message_id']);
txt($GLOBALS['path'] . "/a.txt",count(explode("\n",get($GLOBALS['path'] . "/$index.txt")))-1);
for ($i = 0; $i <= $x; $i++) {
$y=ForwardMessage($exmem[$i], $GLOBALS['chat_id'], $GLOBALS['message_id'])->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]]));  
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
} 
}
}
file_get_contents("https://" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
}

function myheaders_forward($Vs, $chat_id, $message_id, $index) // run broadcast Forward
{
$abs= $GLOBALS['path'];
$get_c= get($abs . "/counter.txt");
$get_t= get($abs . "/type.txt");
$get_i= get($abs . "/index.txt");
$get_m= get($abs . "/msg.txt");
$get_s= get($abs . "/sender.txt");
 
$mm=get($GLOBALS['path'] . "/m.txt");
$exmem= isthere($GLOBALS['path'] . "/$index.txt");
$count= count($exmem);
if (file_exists($abs . "/counter.txt")) {
$x = $get_c + 20;
if ($get_c + 20 >= $count + 20) {
echo "done!";
SendMessage($get_s, "
تم الاذاعه لـ*$count* عضو
", "MARKDOWN", true,null,json_encode(['inline_keyboard'=>[[['text'=>"الصفحه الرئيسيه",'callback_data'=>"cancel"]]]]));
unlink($abs . "/counter.txt");
unlink($abs . "/type.txt");
unlink($abs . "/index.txt");
unlink($abs . "/msg.txt");
unlink($abs . "/sender.txt");
unlink($abs . "/m.txt");
exit;
} elseif ($get_t == "forward") {
for ($i = $get_c; $i <= $x; $i++) {
$y=ForwardMessage($exmem[$i], $chat_id, $message_id)->result->message_id;
EditMessageText($get_s,$mm,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]]));  
if($Vs['TBr']=="✅"){
bot('pinchatMessage', [
'chat_id'=>$exmem[$i],
'message_id'=>$y,
]);
} 
}
}
txt($GLOBALS['path'] . "/counter.txt", $x);
header("Refresh:2");
echo "<strong>sending to ..." . $get_c . "</strong><br>";
get("https://" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
}
}

if (!$update) {// set the headers for bradcasting
if ($get_t == "text") {
myheaders($Vs,$get_m, $get_i);
}
if ($Info["type"][0] == "photo") {
myheaders($Vs,$get_m, $get_i, $get_a);
}
if ($Info["type"][0] == "video") {
myheaders($Vs,$get_m, $get_i, $get_a);
}
if ($Info["type"][0] == "video_note") {
myheaders($Vs,$get_m, $get_i, $get_a);
}
if ($Info["type"][0] == "audio") {
myheaders($Vs,$get_m, $get_i, $get_a);
}
if ($Info["type"][0] == "voice") {
myheaders($Vs,$get_m, $get_i, $get_a);
}
if ($Info["type"][0] == "sticker") {
myheaders($Vs,$get_m, $get_i);
}

# forward ... 

if ($get_t == "forward") {
myheaders_forward($Vs,$get_s, $get_m, $get_i);
}
}
if($message and $chat_id!=$sudo and !in_array($chat_id, $Js['admin']) and $itprivate){
if(!in_array($chat_id,$Js['new'])){
if(count($Js['new'])<5){
$Js['new'][]=$chat_id; 
SV("Js.json",$Js);
}else{
unset($Js['new'][0]); 
SV("Js.json",$Js);
$Js['new']=array_values($Js['new']);
SV("Js.json",$Js); 
$Js['new'][]=$chat_id; 
SV("Js.json",$Js);
}} 
if(!in_array($chat_id,$Js['endm'])){
$Js['endm'][]=$chat_id; 
SV("Js.json",$Js);
} 
if($Js['MNT']=="✅"){
if($Ds[$from_id]==null){
$Ds[$from_id][]=$text;
SV("Ds.json",$Ds);
}elseif($Ds[$from_id]!=null and $text==$Ds[$from_id][0]){
$Ds[$from_id][]=$text;
SV("Ds.json",$Ds);
}elseif($Ds[$from_id]!=null and $text!=$Ds[$from_id][0]){
unset($Ds[$from_id]);
SV("Ds.json",$Ds);
}
$sudoo="[$sudo](tg://user?id=".$sudo.")"; 
if($text==$Ds[$from_id][15] and $from_id!=$botid){
SendMessage($chat_id,"- تم حظرك من البوت بسبب التكرار \n لفك الحظر راسل المطور $sudoo ","markdown",true,$message_id);
$Js['band'][]=$from_id;
SV("Js.json",$Js);
unset($Ds[$from_id]);
SV("Ds.json",$Ds);
SendMessage($sudo,"
- تم حظر هذا الشخص بسبب التكرار 

• معلوماته

اسمه: $name_tag
معرفه: [$Suser]
ايديه: `$from_id`
","markdown",true,null,json_encode(['inline_keyboard'=>[[['text'=>"الغاء حظر",'callback_data'=>"unban_".$from_id]],]]));
}
} 
} 

if($Js['d']!=date("d")){
if($Js['backp']=="✅" and !$data){
bot('senddocument',['chat_id'=>$sudo,'document'=>new CURLFile("Users/member.txt"),]);
bot('senddocument',['chat_id'=>$sudo,'document'=>new CURLFile("Users/chat.txt"),]);
txt("$path/Js.txt",file_get_contents("Js.json")); 
} 
unset($Js['new']); 
unset($Js['endm']); 
$Js['d']=date("d"); 
SV("Js.json",$Js); 
} 

if($chat_id==$sudo or in_array($from_id, $Js['admin'])){

if ($text == '/start') { // start message
SendMessage($chat_id, "• اهلا بك في لوحه الأدمن الخاصه بالبوت 🤖\n\n- يمكنك التحكم في البوت الخاص بك من هنا\n\n~~~~~~~~~~~~~~~~~
لاظهار اوامر ادمن اخري اضغط : /admin","markdown", true, null, $keyboard);
}

if ($data == 'cancel') { // cancel 
$inf= "• اهلا بك في لوحه الأدمن الخاصه بالبوت 🤖\n\n- يمكنك التحكم في البوت الخاص بك من هنا\n\n~~~~~~~~~~~~~~~~~
لاظهار اوامر ادمن اخري اضغط : /admin";
EditMessageText($chat_id, $message_id, $inf, null, "MARKDOWN", true, $keyboard);if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
if (file_exists("$path/broadcast$chat_id.txt")) :
unlink("$path/broadcast$chat_id.txt");
unlink("$path/type$chat_id.txt");
endif;
}
//الاحصائيات
$Allcount=$Groups + $Members;
$endM=count($Js['endm']);
$band=count($Js['band']); 
if($data=="count"){
for($i=0;$i<count($Js['new']);$i++){
$p=$i+1;
$uy="$uy $p - [".$Js['new'][$i]."](tg://user?id=".$Js['new'][$i].")\n"; 
} 
EditMessageText($chat_id,$message_id,"
مرحبا بك في قسم الاحصائيات 📊

• عدد المسخدمين الكلي : *$Allcount* 
• عدد المستخدمين في الخاص : *$Members*
• عدد الكروبات والقنوات : *$Groups*
• عدد المحظورين : *$band*
• عدد المتفاعلين اليوم : *$endM*

قائمة اخر الاعضاء الذين استخدموا البوت
-------------- 
$uy
",null,"markdown",true,$keyboard2);
}
//الاحصائيات

//رفع وجلب نسخه
if($data=="Bckup"  ){
if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
EditMessageText($chat_id,$message_id,"اهلا بك في قسم النسخ الاحتياطيه",null,"markdown",true,$keyboardBackup);
}

if($data=="gBK"){
bot('senddocument',['chat_id'=>$chat_id,'document'=>new CURLFile("Users/member.txt"),]);
bot('senddocument',['chat_id'=>$chat_id,'document'=>new CURLFile("Users/chat.txt"),]);
}

if($data=="uBK"){
$k="قم بأرسال ملف الاعضاء بصيغه txt";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($data=="rebackup" ){
if(get("$path/Js.txt")!=null){
EditMessageText($chat_id,$message_id,"تم تجديد البيانات ✅",null,"markdown",true,$keyboard2);
$Js=json_decode(file_get_contents("$path/Js.txt")); 
SV("Js.json",$Js);
}else{
EditMessageText($chat_id,$message_id,"لا توجد بيانات لأستعادتها",null,"markdown",true,$keyboard2);
}}
if($Ty=="uBK"){
if($document ){
if(preg_match("/(.*).txt/",$document_name)){unset($Js['type'][$chat_id]);SV("Js.json",$Js);
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.TOKEN.'/getFile?file_id='.$document_file_id),true);
$pth = $url['result']['file_path'];
$f = file_get_contents('https://api.telegram.org/file/bot'.TOKEN.'/'.$pth);
file_put_contents("Users/member.txt","$f");
SendMessage($chat_id,"تم رفع النسخه","markdown",true,$message_id,$keyboard2);
}else{SendMessage($chat_id,"عذرا هذا الملف ليس بصيغه txt","markdown",true,$message_id,$keyboard2);}}}
if($data=="uBKg"){
$k="قم بأرسال ملف الاعضاء بصيغه txt";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($Ty=="uBKg"){
if($document ){
if(preg_match("/(.*).txt/",$document_name)){unset($Js['type'][$chat_id]);SV("Js.json",$Js);
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.TOKEN.'/getFile?file_id='.$document_file_id),true);
$pth = $url['result']['file_path'];
$f = file_get_contents('https://api.telegram.org/file/bot'.TOKEN.'/'.$pth);
file_put_contents("Users/chat.txt","$f");
SendMessage($chat_id,"تم رفع النسخه","markdown",true,$message_id,$keyboard2);
}else{SendMessage($chat_id,"عذرا هذا الملف ليس بصيغه txt","markdown",true,$message_id,$keyboard2);}}}
//رفع وجلب نسخه




//قسم الاشتراك الاجباري
if($data=="ChaneLL" ){if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
EditMessageText($chat_id,$message_id,"اهلا بك في قسم الاشتراك الاجباري",null,"markdown",true,$KeyboardCH);
}
if($data=="addch"){
$k="قم بتوجيه رساله من القناه";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($chat_forward ){
if($Ty=="addch"){
if(!in_array($chat_forward_id,$Ch)){
if(GetChatMember($chat_forward_id, $botid)->result->status=="administrator"){
$Js['ch'][]=$chat_forward_id;
SV("Js.json",$Js);
$k="تم حفظ القناة";
SendMessage($chat_id,$k,"markdown",true,$message_id,$keyboard2);
}else{SendMessage($chat_id,"البوت ليس ادمن","markdown",true,$message_id,null);}
}else{SendMessage($chat_id,"هذه القناة مضافه بالفعل","markdown",true,$message_id,null);}
}}
$channel=$Js['chs'];
if($data=="Vch"){
if(count($Ch)!=0){
$k="اليك القنوات";
$reply_markup = [];
foreach($Js['ch'] as $T){
$o=Slin($T);
$P=GetChat($T)->result->title;
$reply_markup['inline_keyboard'][] =[['text'=>trim($P),'url'=>"$o"],['text'=>"🗑",'callback_data'=>"Del_$T"]];}
$reply_markup['inline_keyboard'][] =[['text'=>"➕",'callback_data'=>"addch"]];
$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"cancel"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$K);
}else{EditMessageText($chat_id,$message_id,"لم تقم بأضافه اي قناه",null,"markdown",true,$keyboard2);}
}

if(preg_match("/(Del_)(.*?)/",$data)){
$st=str_replace("Del_","",$data);
$st=array_search($st,$Js['ch']);
unset($Js['ch'][$st]);
SV("Js.json",$Js);
$Js['ch']=array_values($Js['ch']);
SV("Js.json",$Js); $k="تم حذف القناة";
$reply_markup = [];
foreach($Js['ch'] as $T){
if($T!=$st){
$o=Slin($T);
$P=GetChat($T)->result->title;
$reply_markup['inline_keyboard'][] =[['text'=>trim($P),'url'=>"$o"],['text'=>"🗑",'callback_data'=>"Del_$T"]];}}
$reply_markup['inline_keyboard'][] =[['text'=>"➕",'callback_data'=>"addch"]];
$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"cancel"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$K);
}
if($data=="Dch"){
if(count($Ch)!=0){
EditMessageText($chat_id,$message_id,"تم حذف القنوات",null,"markdown",true,$keyboard2);
unset($Js['ch']);SV("Js.json",$Js);
}else{EditMessageText($chat_id,$message_id,"لم تقم بأضافه اي قناه",null,"markdown",true,$keyboard2);}
}
if($data=="SubK"){
$k="- حسنا عزيزي ارسل رساله الاشتراك الجديده 
";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($Ty=="SubK" and !$data){
if($text!="/start"){
unset($Js['type'][$chat_id]);
$Js['SubK']=$text;
SV("Js.json",$Js);
SendMessage($chat_id,"تم الحفظ بنجاح ✅","markdown",true,$message_id,$keyboard2);
}
} 

if($Ty=="addfake" and $text){
if($Js['fakesub']!=$text ){
SendMessage($chat_id,"تم الحفظ ✅","markdown",true,$message_id,$keyboard2);
$Js['fakesub']=$text;
SV("Js.json",$Js);unset($Js['type'][$chat_id]);SV("Js.json",$Js);
}else{SendMessage($chat_id,"هذا الاشتراك مضاف بالفعل","markdown",true,$message_id,$keyboard2);
}}
if($data=="addfake"){
$k="- حسنا عزيزي قم بأرسال كليشه لوضعها ك أشتراك وهمي
مثل


`يجب عليك دخول هذا البوت اول @Lnnnbot`
";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}

if($data=="Dfake"){
if($Js['fakesub']!=null){
EditMessageText($chat_id,$message_id,"تم حذف الاشتراك الوهمي \n [". $Js['fakesub']."] ",null,"markdown",true,$keyboard2);
unset($Js['fakesub']);
SV("Js.json",$Js);
unset($Ds['fakesub']);
SV("Ds.json",$Ds);
}else{EditMessageText($chat_id,$message_id,"انت لم تقم بأضافه اشتراك وهمي ",null,"markdown",true,$keyboard2);}
}

//قسم الاشتراك الاجباري

//قسم الاعلانات
if($data=="EV1" ){if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
EditMessageText($chat_id,$message_id,"اهلا بك في قسم الاعلانات",null,"markdown",true,$KeyboardV);
}
if($Ty=="AddV1"){
if(preg_match("/([A-Z])|([a-z])|([ا-ي])/",$text)){
SendMessage($chat_id,"تم وضع الاعلان في بوت ✅","markdown",true,$message_id,$keyboard2);
$Js['ads']=json_encode($update); unset($Js['type'][$chat_id]);SV("Js.json",$Js);
}}
if($data=="AddV1"){
$k="قم بأرسال اعلان جديد";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($data=="VV1"){
if($Js['ads']!=null){
$u=json_decode($Js['ads']);
if(!isset($u->message->reply_markup)){
SendMessage($chat_id,$u->message->text,null,null);
}else{SendMessage($chat_id,$u->message->text,null,null,null,json_encode($u->message->reply_markup));}
}else{EditMessageText($chat_id,$message_id,"انت لم تقم بأضافه اعلان لعرضه",null,"markdown",true,$keyboard2);}
}
if($data=="DelV1"){
if($Js['ads']!=null){
EditMessageText($chat_id,$message_id,"تم حذف الاعلان بنجاح ✅",null,"markdown",true,$keyboard2);
unset($Js['ads']);
unset($Js['adss']);
SV("Js.json",$Js);
}else{EditMessageText($chat_id,$message_id,"انت لم تقم بأضافه اعلان لتحذفه",null,"markdown",true,$keyboard2);}
}
//قسم الاعلانات

//قسم التمويل
if($data=="ET" ){if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
EditMessageText($chat_id,$message_id,"اهلا بك في قسم التمويلات",null,"markdown",true,$KeyboardT);
}
if(!preg_match("/([A-Z])|([a-z])|([ا-ي])/",$text) and preg_match("/([0-9])/",$text) and $text!=0){
$yt=explode("+", $Ty); 
if($yt[1]=="AddT1"){
SendMessage($chat_id,"تم اضافه التمويل ","markdown",true,$message_id,$keyboard2);
$Js['TMM'][]=$yt[0];
$Ds['TMo'][$yt[0]]=['count'=>[],'C'=>$text]; 
SV("Ds.json", $Ds); 
unset($Ty); 
SV("Js.json", $Js); 
}} 
if($chat_forward ){
if($Ty=="AddT1"){
if(!in_array($chat_forward_id,$Js['TMM'])){
if(GetChatMember($chat_forward_id, $botid)->result->status=="administrator"){
$Js['type'][$chat_id]=$chat_forward_id."+AddT1";SV("Js.json",$Js);
$k="حسنا ارسل عدد الاعضاء الذي تريد  اضافتهم لهذه القناه -";
SendMessage($chat_id,$k,"markdown",true,$message_id,$keyboard2);
}else{SendMessage($chat_id,"البوت ليس ادمن","markdown",true,$message_id,null);}
}else{SendMessage($chat_id,"هذه القناة تحت التمويل بالفعل","markdown",true,$message_id,null);}
}
}

if($data=="AddT1"){
$k="قم بتوجيه رساله من القناه";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
$channel=$Js['TMM'];
if($data=="TT1"){
if(count($channel)!=0){
$k="اليك التمويلات الجاريه";
$reply_markup = [];
for($i=0;$i<count($channel);$i++){
$T=$channel[$i]; 
$o=Slin($T);
$P=GetChat($T)->result->title;
$cc=count($Ds['TMo'][$T]['count']); 
$co=$Ds['TMo'][$T]['C']; 
$reply_markup['inline_keyboard'][] =[['text'=>trim($P),'url'=>"$o"],['text'=>$co."/".$cc,'url'=>$o],['text'=>"🗑",'callback_data'=>"DelT1_$T"]];}
$reply_markup['inline_keyboard'][] =[['text'=>"➕",'callback_data'=>"AddT1"]];
$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"ET"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$K);
}else{EditMessageText($chat_id,$message_id,"لم تقم بأضافه اي تمويل",null,"markdown",true,$keyboard2);}
}

if(preg_match("/(DelT1_)(.*?)/",$data)){
$st=str_replace("DelT1_","",$data);
$st=array_search($st,$Js['TMM']);
unset($Js['TMM'][$st]);
SV("Js.json",$Js);
$Js['TMM']=array_values($Js['TMM']);SV("Js.json",$Js); 
unset($Ds['TMo'][$st]); 
unset($Ds['X'][$st]); 
SV("Ds.json", $Ds); 
$k="تم حذف التمويل";
$reply_markup = [];
for($i=0;$i<count($channel);$i++){
$T=$channel[$i]; 
if($T!=$st){
$o=Slin($T);
$P=GetChat($T)->result->title;
$cc=count($Ds['TMo'][$T]['count']); 
$co=$Ds['TMo'][$T]['C']; 
$reply_markup['inline_keyboard'][] =[['text'=>trim($P),'url'=>"$o"],['text'=>$co."/".$cc,'url'=>$o],['text'=>"🗑",'callback_data'=>"DelT1_$T"]];}} 
$reply_markup['inline_keyboard'][] =[['text'=>"➕",'callback_data'=>"AddT1"]];
$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"ET"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$K);
}
if($data=="ETM"){
for($i=0;$i<count($Js['ETM']);$i++){
$t=$i+1;
$io=explode("+",$Js['ETM'][$i]); 
$io1=$io[0]; $io2=$io[1]; 
$u="$u $t - القناه:  [$io1] 
عدد الاعضاء المضافين:  *$io2*

--------------------
 "; 
} 
EditMessageText($chat_id,$message_id," 
- اليك سجل التمويلات

$u
",null,"markdown",true,$keyboard2);
} 
if($data=="DTT"){
if(count($Js['TMM'])!=0){
EditMessageText($chat_id,$message_id,"تم حذف التمويلات ",null,"markdown",true,$keyboard2);
unset($Js['TMM']); unset($Ds['TMo']);unset($Ds['X']);SV("Ds.json", $Ds); SV("Js.json",$Js);
}else{EditMessageText($chat_id,$message_id,"انت لم تقم بأضافه اي تمويل",null,"markdown",true,$keyboard2);}
}
//قسم التمويل



//الازرار
if($data=="MNT" or $data=="TSF"or $data =="Forward" or $data=="BotS" or $data=="Notices"){
if($Js[$data]=="✅"){
$Js[$data]="❌";SV("Js.json",$Js);
$Xd="تم القفل بنجاح 🔒";
}else{
$Js[$data]="✅";SV("Js.json",$Js);
$Xd="تم الفتح بنجاح 🔓";
}
AnswerCallbackQuery($update->callback_query->id,$Xd, false);
EditMessageReplyMarkup($chat_id, $message_id,json_encode(['inline_keyboard'=>[[['text'=>"الاشعارات: ".$Js['Notices'],'callback_data'=>"Notices"],['text'=>"التواصل: ".$Js['Forward'],'callback_data'=>"Forward"],['text'=>"البوت: ".$Js['BotS'],'callback_data'=>"BotS"]], [['text'=>"التصفيه التلقائيه : ".$Js['TSF'],'callback_data'=>"TSF"],['text'=>"منع التكرار : ".$Js['MNT'],'callback_data'=>"MNT"]], [['text'=>"رساله الترحيب (start) ",'callback_data'=>"startM"]],
 [['text'=>"قسم الاشتراك الاجباري ",'callback_data'=>"ChaneLL"],['text'=>"قسم الاذاعه ",'callback_data'=>"broDa"]], [['text'=>"قسم النسخه الاحتياطيه",'callback_data'=>"Bckup" ]], [['text'=>"قسم الادمنيه ",'callback_data'=>"Admins"],['text'=>"قسم الحظر ",'callback_data'=>"band"]], [['text'=>"قسم الاعلانات ",'callback_data'=>"EV1"], ['text'=>"قسم التمويل ",'callback_data'=>"ET"]], [['text'=>"نقل ملكيه البوت",'callback_data'=>"sudo"],['text'=>"اعدادات الرشق",'callback_data'=>"lolmymat"]], [['text'=>"قسم الأحصائيات",'callback_data'=>"count"]],]]));
}
if($data=="SubC" or $data=="TBr" or $data=="backp"){
if($data=="SubC"){
if($Js[$data]=="✅"){
$Js[$data]="❌";SV("Js.json",$Js);
}else{
$Js[$data]="✅";SV("Js.json",$Js);
}
$kk=json_encode(['inline_keyboard'=>[[['text'=>"كليشه واحده : ".$Js['SubC'],'callback_data'=>"SubC"],['text'=>"اضافه قناة ➕",'callback_data'=>"addch"]], [['text'=>"عرض القنوات 📋",'callback_data'=>"Vch"],['text'=>"حذف القنوات 🗑",'callback_data'=>"Dch"]], [['text'=>"تغيير كليشه الاشتراك 📃",'callback_data'=>"SubK"]], [['text'=>"اضف اشتراك وهمي 🔢",'callback_data'=>"addfake"],['text'=>"حذف الاشتراك الوهمي 🗑",'callback_data'=>"Dfake"]], [['text'=>"رجوع",'callback_data'=>"cancel"]],]]); 
}elseif($data=="TBr"){
if($Vs[$data]=="✅"){
$Vs[$data]="❌";SV("$path/Vs.json",$Vs);
}else{
$Vs[$data]="✅";SV("$path/Vs.json",$Vs);
}
$kk=json_encode(['inline_keyboard'=>[[['text'=>"تثبيت الاذاعه : ".$Vs['TBr'],'callback_data'=>"TBr"]], [['text'=>"اذاعه خاص 📢",'callback_data'=>"Pbroadcast"],['text'=>"توجيه خاص 🔄",'callback_data'=>"Fbroadcast"]], [['text'=>"اذاعه كروبات 📢",'callback_data'=>"Gbroadcast"],['text'=>"توجيه كروبات 🔄",'callback_data'=>"FGbroadcast"]], [['text'=>"الاحصائيات 📊",'callback_data'=>"count"]], [['text'=>"رجوع",'callback_data'=>"cancel"]]]]); 
}elseif($data=="backp"){
if($Js[$data]=="✅"){
$Js[$data]="❌";SV("Js.json",$Js);
}else{
$Js[$data]="✅";SV("Js.json",$Js);
}
$kk=json_encode(['inline_keyboard'=>[[['text'=>"نسخه يوميه: ".$Js['backp'],'callback_data'=>"backp"], ['text'=>"جلب نسخه احتياطيه",'callback_data'=>"gBK"]],[['text'=>"استعاده الخزن",'callback_data'=>"rebackup"]], [['text'=>"رفع نسخه اعضاء",'callback_data'=>"uBK"], ['text'=>"رفع نسخه كروبات",'callback_data'=>"uBKg"]], [['text'=>"رجوع",'callback_data'=>"cancel"]]]]); 
}
EditMessageReplyMarkup($chat_id, $message_id,$kk); 
}

//الازرار


//رساله الستارت
if($data=="Olstart"){
$k="- تم العوده الى رساله البدأ الافتراضيه";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
unset($Js['start']);SV("Js.json",$Js);
}
if($data=="startM"){
$io=json_encode(['inline_keyboard'=>[
[['text'=>"العوده الى الافتراضي",'callback_data'=>"Olstart"]],
[['text'=>"رجوع",'callback_data'=>"cancel"]],
]]);
$k="- حسنا عزيزي ارسل رساله البدأ الجديده
رساله البدأ الحاليه: 


`$START`

";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$io);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($Ty=="startM" and !$data){
if($text){
unset($Js['type'][$chat_id]);
$Js['start']=$text;
SV("Js.json",$Js);
SendMessage($chat_id,"تم الحفظ بنجاح ✅","markdown",true,$message_id,$keyboard2);
}
} 
//رساله الستارت

//نقل الملكيه
if($chat_id==$sudo){
if($data=="sudo"){
$ssa=md5(rand(82828,188888));
$k="قم بأرسال هذا الرابط للشخص الذي تريد نقل الملكيه له\n https://t.me/$botusername?start=$ssa";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;
$Js['sudoF']=$ssa;
SV("Js.json",$Js);
}}

//نقل الملكيه



//قسم الحظر
if($data=="band"){if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
EditMessageText($chat_id,$message_id,'اهلا بك في قسم الحظر',null,"markdown",true,$keyboardBa);
}

if($data=="Aban"){
$k="حسنا عزيزي ارسل ايدي العضو لحظره ⛔";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($Ty=="Aban"){
if(preg_match("/([0-9])/",$text)){
if(!preg_match("/([A-Z])|([a-z])|([ا-ي])/",$text)){
if(!in_array($text, $Js['band'])){
SendMessage($chat_id,"تم حظر العضو بنجاح","markdown",true,$message_id,$keyboard2);
$Js['band'][]="$text";unset($Js['type'][$chat_id]);SV("Js.json",$Js);
}else{SendMessage($chat_id,"العضو محظور من قبل","markdown",true,$message_id,$keyboard2);
}}}}
if($data=="AllB"){
if(count($Js['band'])!=0){
$reply_markup = [];
foreach($Js['band'] as $T){
$P=GetChat($T)->result;
if($P->username==null){
$o="tg://openmessage?user_id=$T";}else{$o="t.me/".$P->username;}$reply_markup['inline_keyboard'][] =[['text'=>$T,'url'=>"$o"],['text'=>"🗑",'callback_data'=>"unban_$T"]];}$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"band"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,'اليك قائمه المحظورين ',null,"markdown",true,$K);
}else{
EditMessageText($chat_id,$message_id,"لايوجد محظورين",null,"markdown",true,$keyboard2);
}}
if(preg_match("/(unban_)(.*?)/",$data)){
$st=str_replace("unban_","",$data);
$st=array_search($st,$Js['band']);
unset($Js['band'][$st]);
SV("Js.json",$Js);
$Js['band']=array_values($Js['band']);
SV("Js.json",$Js);
$k="تم الغاء حظر العضو";
$reply_markup = [];
foreach($Js['band'] as $T){
if($T!=$st){
$P=GetChat($T)->result;
if($P->username==null){
$o="tg://openmessage?user_id=$T";}else{$o="t.me/".$P->username;}$reply_markup['inline_keyboard'][] =[['text'=>$T,'url'=>"$o"],['text'=>"🗑",'callback_data'=>"unban_$T"]];}}$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"band"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$K);
}
//قسم الحظر

//قسم الادمنيه
if($data=="Admins"){
if($from_id==$sudo){if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
EditMessageText($chat_id,$message_id,'اهلا بك في قسم الادمنيه',null,"markdown",true,$keyboardAd);
}else{AnswerCallbackQuery($update->callback_query->id,"عذرا عزيزي هذا القسم مخصص للمطور الاساسي فقط 🚫",true);}}

if($data=="Admin"){
$k="حسنا عزيزي ارسل ايدي العضو لرفعه ادمن⛔";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}if($Ty=="Admin"){
if(preg_match("/([0-9])/",$text) and $from_id==$sudo){
if(!preg_match("/([A-Z])|([a-z])|([ا-ي])/",$text)){
if(!in_array($text, $Js['admin'])){
SendMessage($chat_id,"تم رفع العضو بنجاح","markdown",true,$message_id,$keyboard2);
$Js['admin'][]=$text;unset($Js['type'][$chat_id]);SV("Js.json",$Js);
}else{SendMessage($chat_id,"العضو ادمن من قبل","markdown",true,$message_id,$keyboard2);
}}}}if($data=="Allad"){
if(count($Js['admin'])!=0){
$reply_markup = [];
foreach($Js['admin'] as $T){
$P=GetChat($T)->result;
if($P->username==null){
$o="tg://openmessage?user_id=$T";}else{$o="t.me/".$P->username;}$reply_markup['inline_keyboard'][] =[['text'=>$T,'url'=>"$o"],['text'=>"🗑",'callback_data'=>"delAd_$T"]];}$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"Admins"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,'اليك قائمه الادمنيه ',null,"markdown",true,$K);
}else{
EditMessageText($chat_id,$message_id,"لايوجد ادمنيه",null,"markdown",true,$keyboard2);
}}if(preg_match("/(delAd_)(.*?)/",$data)){
$st=str_replace("delAd_","",$data);
$st=array_search($st,$Js['admin']);
unset($Js['admin'][$st]);
SV("Js.json",$Js);
$Js['admin']=array_values($Js['admin']);
SV("Js.json",$Js);
$k="تم تنزيله من الادمنيه";
$reply_markup = [];
foreach($Js['admin'] as $T){
if($T!=$st){
$P=GetChat($T)->result;
if($P->username==null){
$o="tg://openmessage?user_id=$T";}else{$o="t.me/".$P->username;}$reply_markup['inline_keyboard'][] =[['text'=>$T,'url'=>"$o"],['text'=>"🗑",'callback_data'=>"delAd_$T"]];}}$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"Admins"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$K);
}
//قسم الادمنيه

//قسم الاذاعه
if($data=="broDa"){
if (file_exists("$path/broadcast$chat_id.txt")) :
unlink("$path/broadcast$chat_id.txt");
unlink("$path/type$chat_id.txt");
endif;
EditMessageText($chat_id,$message_id,"اهلا بك في قسم الاذاعه",null,"markdown",true,$keyboardB);
}
if($data=="caBr"){
unlink($path . "/counter.txt");
unlink($path . "/type.txt");
unlink($path . "/index.txt");
unlink($path . "/m.txt");
unlink($path . "/msg.txt");
unlink($path . "/sender.txt");
EditMessageText($chat_id,$message_id,"تم الغاء الاذاعه ✅",null,"markdown",true,$keyboard2);
} 
if ($data == "Pbroadcast") { // broadcast
file_put_contents("$path/broadcast$chat_id.txt", $chat_id);
file_put_contents("$path/type$chat_id.txt", $data);
$inf = "حسنا عزيزي ارسل رسالتك 📢";
EditMessageText($chat_id, $message_id, $inf, null, "MARKDOWN", true, $keyboard2);
}

if ($data == "Gbroadcast") { // broadcast Group
file_put_contents("$path/broadcast$chat_id.txt", $chat_id);
file_put_contents("$path/type$chat_id.txt", $data);
$inf = "حسنا عزيزي ارسل رسالتك 📢";
EditMessageText($chat_id, $message_id, $inf, null, "MARKDOWN", true, $keyboard2);
}
if ($data == "Fbroadcast") { // broadcast forward
file_put_contents("$path/broadcast$chat_id.txt", $chat_id);
file_put_contents("$path/type$chat_id.txt", $data);
$inf = "حسنا عزيزي وجه الرساله 📢";
EditMessageText($chat_id, $message_id, $inf, null, "MARKDOWN", true, $keyboard2);
}
if ($data == "FGbroadcast") { // broadcast forward Group
file_put_contents("$path/broadcast$chat_id.txt", $chat_id);
file_put_contents("$path/type$chat_id.txt", $data);
$inf = "حسنا عزيزي وجه الرساله 📢";
EditMessageText($chat_id, $message_id, $inf, null, "MARKDOWN", true, $keyboard2);
}
if ($message && file_get_contents("$path/broadcast$chat_id.txt") == $chat_id) { // brodcast for members
txt("$path/m.txt", $message_id+1);
if (file_get_contents("$path/type$chat_id.txt") == "Pbroadcast") {
$count = count(isthere("$path/member.txt")) - 1;
$inf = "جاري الارسال الى $Members عضو";
SendMessage($chat_id, $inf, "MARKDOWN", true, $message_id, $keyboar2);
broadcast($Vs,"member", $caption);
}
if (file_get_contents("$path/type$chat_id.txt") == "Gbroadcast") {
$count = count(isthere("$path/chat.txt")) - 1;
$inf = "جاري الارسال الى $Groups كروب";
SendMessage($chat_id, $inf, "MARKDOWN", true, $message_id, $keyboar2);
broadcast($Vs,"chat", $caption);
}
if (file_get_contents("$path/type$chat_id.txt") == "Fbroadcast") {
$inf = "جاري التوجيه الى $Members عضو";
SendMessage($chat_id, $inf, "MARKDOWN", true, $message_id, $keyboar2);
forward($Vs,"member");
}
if (file_get_contents("$path/type$chat_id.txt") == "FGbroadcast") {
$count = count(isthere("$path/chat.txt")) - 1;
$inf = "جاري التوجيه الى $Groups كروب";
SendMessage($chat_id, $inf, "MARKDOWN", true, $message_id, $keyboar2);
forward($Vs,"chat");
}
if (file_exists("$path/broadcast$chat_id.txt")) : unlink("$path/broadcast$chat_id.txt");
unlink("$path/type$chat_id.txt");
endif;
}
//قسم الاذاعه



//-------------
} 


if($text=="/start ".$Js['sudoF']){
SendMessage($sudo,"- تم نقل البوت لـ$name_tag","markdown",true);
SendMessage($chat_id,"- تم نقل الملكيه لك ارسل /start","markdown",true,$message_id);
$Js['sudo']=$from_id;
unset($Js['sudoF']);
SV("Js.json",$Js);
}
//التصفيه والتوجيه
if($Js['Forward']=="✅"){
if($message and $from_id!=$sudo and !in_array($from_id, $Js['admin'])){
$ss=ForwardMessage($sudo, $from_id, $message_id)->result->message_id;
$forwardM[$ss]=$from_id;
file_put_contents("forwardM.json",json_encode($forwardM));
}
if($forwardM[$reply_message_id]!=null and $from_id==$sudo){
SendMessage($forwardM[$reply_message_id],$text,"markdown",true,null,null);
}
}
if($Js['TSF']=="✅"){
if($update->my_chat_member->new_chat_member->status=="kicked"){
file_put_contents("$path/member.txt",str_replace($update->my_chat_member->from->id."\n","",file_get_contents("$path/member.txt")));
}
} 



if(preg_match('/\/(start)(.*)/', $text)){
 $ex = explode(' ', $text);
if($chat_id == $ex[1]){
bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"",]);
     exit;}}
 if(preg_match('/\/(start)(.*)/', $text )){
  $ex = explode(' ', $text);
$okl = bot('getchat',['chat_id'=>$ex[1]])->result->type;
  if(isset($ex[1])){
   if(!in_array($chat_id, $sales[$chat_id]['id'])){
    if($okl == "private"){
    $sales[$chat_id]['baageel']=$ex[1];
    $sales[$chat_id]['c'] = 'Ok';
    }
    $sales[$chat_id]['id'][] = $chat_id;
    $Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
   }
 }
}

//التصفيه والتوجيه

if($update and in_array($from_id, $Js['band'])){exit;}if($update and $Js['BotS']=="❌" and $from_id!=$sudo and !in_array($from_id, $Js['admin'])){
SendMessage($chat_id,"البوت تحت الصيانه ⚙️","markdown",true,$message_id,null);exit;}
function Slink($a){
$P=GetChat($a)->result;
if($P->username==null){
if($P->invite_link!=null){
$d=$P->invite_link;$tc="خاصه";
}else{
$d=ExportChatInviteLink($a)->result;$tc="خاصه";
}
}else{$d="t.me/".$P->username;$tc="عامه";} 
return $d;}
if($update and count($Js['TMM'])!=0 and $type=="private"){
for($i=0;$i<count($Js['TMM']);$i++){
$c6=GetChatMember($Js['TMM'][$i],$from_id)->result->status;
$tl=Slink($Js['TMM'][$i]);
if(strpos($tl,"+")!==false){
$tll=$tl;
}else{
$tll=str_replace("t.me/","@",$tl);
}
$c66=GetChat($Js['TMM'][$i])->result->title;
if(!in_array($from_id, $Js['admin']) and $message){
if($c6=="left" or $c6=="kicked"){
if(!in_array($chat_id,$Ds['TMo'][$Js['TMM'][$i]]['count'])){
$Ds['X'][$Js['TMM'][$i]][]=$from_id;SV("Ds.json", $Ds);  
} 
SendMessage($chat_id,"انت غير مشترك بقناه البوت △\nاشترك ثم ارسل /start \n \n [$tll] ","markdown",true,$message_id,json_encode(['inline_keyboard'=>[[['text'=>"$c66",'url'=>$tl]]]]));
exit();
break;
}else{
if(count($Ds['TMo'][$Js['TMM'][$i]]['count'])<$Ds['TMo'][$Js['TMM'][$i]]['C']){
if(!in_array($chat_id,$Ds['TMo'][$Js['TMM'][$i]]['count']) and in_array($from_id,$Ds['X'][$Js['TMM'][$i]])){
$Ds['TMo'][$Js['TMM'][$i]]['count'][]=$chat_id;
$a=array_search($chat_id,$Ds['X'][$Js['TMM'][$i]]); 
unset($Ds['X'][$Js['TMM'][$i]][$a]); 
SV("Ds.json",$Ds);
$Ds['X'][$Js['TMM'][$i]]=array_values($Ds['X'][$Js['TMM'][$i]]); 
SV("Ds.json", $Ds); 
} 
}elseif(count($Ds['TMo'][$Js['TMM'][$i]]['count'])>=$Ds['TMo'][$Js['TMM'][$i]]['C']){
$y=$Ds['TMo'][$Js['TMM'][$i]]['C']; 
$z=GetChatMembersCount($Js['TMM'][$i])->result; 
SendMessage($sudo,"
انتهى تمويل القناه 

- القناه: [$tl] 

- العدد المطلوب: *$y*

- عدد اعضاء القناه الان: *$z*

","markdown",true); 
if(count($Js['ETM'])!=3){
$Js['ETM'][]=$tl."+".$y; 
SV("Js.json",$Js);
}else{
unset($Js['ETM'][0]); 
SV("Js.json",$Js);
$Js['ETM']=array_values($Js['ETM']);
SV("Js.json",$Js); 
$Js['ETM'][]=$tl."+".$y; 
SV("Js.json",$Js);
} 
unset($Ds['TMo'][$Js['TMM'][$i]]); 
unset($Ds['X'][$Js['TMM'][$i]]); 
SV("Ds.json", $Ds); 
unset($Js['TMM'][$i]);
SV("Js.json",$Js);
$Js['TMM']=array_values($Js['TMM']);
SV("Js.json",$Js); 
} 
} 
}
} 
} 
if($update and $Ch!=null and $type=="private"){
if($Js['SubC']=="✅"){
for($i=0;$i<count($Ch);$i++){
$c6=GetChatMember($Ch[$i],$from_id)->result->status;
$tl=Slink($Ch[$i]);
if(strpos($tl,"+")!==false){$tl=$tl;}else{$tl=str_replace("t.me/","@",$tl);}
$c66=GetChat($Ch[$i])->result->title;
if($c6=="left" or $c6=="kicked"){
$Y="$Y - [$tl]($tl) \n\n";
}
}
if($Y!=null and !in_array($from_id, $Js['admin']) and $message){
SendMessage($chat_id,"[$SubK] \n\n $Y","markdown",true,$message_id);exit();
}
}
if($Js['SubC']=="❌"){
for($i=0;$i<count($Ch);$i++){
$c6=GetChatMember($Ch[$i],$from_id)->result->status;
$tl=Slink($Ch[$i]);
if(strpos($tl,"+")!==false){
$tll=$tl;
}else{
$tll=str_replace("t.me/","@",$tl);
}
$c66=GetChat($Ch[$i])->result->title;
if($c6=="left" or $c6=="kicked"){
if(!in_array($from_id, $Js['admin']) and $message){
SendMessage($chat_id,"[$SubK] \n \n - [$tll] ","markdown",true,$message_id,json_encode(['inline_keyboard'=>[[['text'=>"$c66",'url'=>$tl]]]]));
exit();
break;
}
}
}
} 
}


if($Js['fakesub']!=null and $chat_id!=$sudo and!in_array($chat_id,$Js['admin'])){
if($Ds['fakesub'][$from_id]!=2){
$Ds['fakesub'][$from_id]=$Ds['fakesub'][$from_id]+1;
SV("Ds.json",$Ds);
SendMessage($chat_id,$Js['fakesub'],null,true,$message_id);exit;
}} 
if($Js['Notices']=="✅" and $text=="/start" || $text and $from_id!=$sudo and !in_array($from_id, $Js['admin']) and !in_array($from_id,isthere("$path/member.txt"))){
$Allcount =$Groups + $Members +1;
$m="
*٭ تم دخول شخص جديد الى البوت الخاص بك 🧩
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭*

• الاسم : $name_tag
• المعرف : [$Suser]
• الايدي :  $from_id
*٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭

٭ عدد اعضاء بوتك الكلي : $Allcount*
";
SendMessage($sudo,$m,"markdown",true,null,null);
}
if ($message) { // used to check members and save them
if (!in_array($from_id, isthere("$path/member.txt"))) {
if ($itprivate) {
file_put_contents("$path/member.txt", "$from_id\n", FILE_APPEND);
}}}
if (!in_array($chat_id, isthere("$path/chat.txt"))) {
if($itgroup or $itsupergroup ){
file_put_contents("$path/chat.txt","$chat_id\n", FILE_APPEND);}
}
if ($update->channel_post and !in_array($update->channel_post->chat->id, explode("\n",file_get_contents("Users/chat.txt")))) {
if($update->channel_post->sender_chat->type=="channel"){
file_put_contents("Users/chat.txt",$update->channel_post->chat->id."\n", FILE_APPEND);}
}
if($text=="/start" and !in_array($chat_id,$sudos) and !in_array($from_id, $Js['admin']) and $type=="private" and $Js['ads']!=null){
$u=json_decode($Js['ads']);
if(!in_array($chat_id,$Js['adss'])){
if(!isset($u->message->reply_markup)){
SendMessage($chat_id,$u->message->text,null,null);
}else{
SendMessage($chat_id,$u->message->text,null,null,null,json_encode($u->message->reply_markup));
}
$Js['adss'][]=$chat_id;
SV("Js.json",$Js); 
}
} 
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$userr = '@'.$message->from->username;
$userrr = '@'.$update->callback_query->from->username;
$name = $message->from->first_name;
$message_id2 = $update->callback_query->message->message_id;
$chat_id2 = $update->callback_query->message->chat->id;
$from_id = $message->from->id;
$nammee = $update->callback_query->from->first_name;
$bot_tele1 = file_get_contents('userstart.json');
$sting = file_get_contents("sting.txt");
$start = file_get_contents("start.txt") ;
$setengss = file_get_contents("setengss.txt");
$setengssj = file_get_contents("setengss.txt");
$hadehday = file_get_contents("hadehday.txt");
$hadehdayj = file_get_contents("hadehday.txt");
$sss = file_get_contents('sss.txt');
$bott = bot('getme',['bot'])->result->username;
$ccoinj = file_get_contents("ccoin.txt");
$ccoin = file_get_contents("ccoin.txt");
$photo = $message->photo;
$cutideo = $message->video;
$sticker = $message->sticker;
$file = $message->document;
$audio = $message->audio;
$cutoice = $message->voice;
$caption = $message->caption;
$photo_id = $message->photo[0]->file_id;
$cutideo_id= $message->video->file_id;
$sticker_id = $message->sticker->file_id;
$file_id = $message->document->file_id;
$music_id = $message->audio->file_id;
$cutoice_id = $message->voice->file_id;
$cut = explode("\n",file_get_contents("users.txt"));
$users = count($cut)-0;
$cccoin = $ccoin;
$admin = 1126359517;
$JAMALJO = bot('getchat',['chat_id'=>$admin])->result->username;
$jamalcoann = 1126359517;
$sudo = $admin;
$stingggg = json_decode(file_get_contents("stingggg.json"),true);
$band = array($stingggg['stingggg']['band']);
$admins = array($chat_id,$stingggg['stingggg']['admins']);
$rdod['rd'][$rdod['txt']]['caption'] = $message->caption;
$type = $update->message->chat->type;
$u = json_decode(file_get_contents('member.json'),true);
if(!in_array($chat_id, $u) and $type == "private") {
      $u[] = "$chat_id";
      file_put_contents('member.json',json_encode($u));
  }
function jamalusd($method,$datas=[]){
$aws_c9 = http_build_query($datas);
$url = "https://api.telegram.org/bot5340566676:AAHY6HpRPEJnf5Xnv5mX4JcSZt9G8jliamU/".$method."?$aws_c9";
$aws_c9 = file_get_contents($url);
return json_decode($aws_c9);
}
function save($array){
    file_put_contents('sales.json', json_encode($array));
}
if(isset($update->message)){
$message = $update->message;
$message_id = $update->message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$tc = $message->chat->type;
}
if(isset($update->callback_query)){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $chat_id;
$tc = $update->callback_query->message->chat->type;
}
$members = explode("\n",file_get_contents("users.txt"));
$countmembers = count($members);
$sting = json_decode(file_get_contents("sting.json"),true); 
$update = json_decode(file_get_contents('php://input'));
function YhyaSyrian($Size)
{
    if ($Size < 1000) {
        return "$Size B";
    } elseif (($Size / 1024) < 1000) {
        return round($Size / 1024,1).' KB';
    } elseif (($Size / 1024 / 1024) < 1000) {
        return round($Size / 1024 / 1024,1).' MB';
    } elseif (($Size / 1024 / 1024 / 1024) < 1000) {
        return round($Size / 1024 / 1024 / 1024,1).' GB';
    } else {
        return round($Size / 1024 / 1024 / 1024 / 1024,1).' TB';
    }
}
 function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
function sender(){
$members = explode("\n",file_get_contents("users.txt"));
$sting = json_decode(file_get_contents("sting.json"),true); 
 $method = $sting['send']['method'];
    $count = count($members);
 $text = $sting['send']['text'];
 $mode = $sting['send']['mode'];
 $num = $sting['send']['num'];
 $id = $sting['send']['from'];
 $mes = $sting['send']['id'];
 $ms = $sting['send']['mesid'];
 $file = $sting['send']['file'];
 $caption = $sting['send']['caption'];
 for($i=$num;$i<=$num + 30;$i++){
  $to = $members[$i];
  if($i > $count){
   break;
  }
  if($to == null){
   $sting['send']['ban'] += 1;
   continue;
  }
  if($method == 'text'){
   $ok = bot('sendmessage',[
   'chat_id'=>$to, 
   'text'=>$text]);
  }elseif($method == "forward"){
   $ok = bot('forwardMessage',[
  'chat_id'=>$to,
  'from_chat_id'=>$id,
  'message_id'=>$ms,
  ]);
  }else{
  $ok = bot('send'.str_replace('_','',$method),[
   "chat_id"=>$to,
   $method=>$file,
  'caption'=>$caption,
   ]);
  }
  if(!$ok->ok){
  $sting['send']['ban'] += 1;
  continue;
  }
  if($mode == 'pin'){
   bot('pinchatMessage', [
   'chat_id'=>$to,
   'message_id'=>$ok->result->message_id,
   ]);
  } 
 } // End Loop
$ban = $sting['send']['ban'];
$all = $count - $ban;
if($i > $count){
bot('EditMessageText',[
 'chat_id'=>$id, 
 'message_id'=>$mes,
 'text'=>"
تم الإنتهاء من الإذاعة بنجاح ✓
عدد الأشخاص التي تم الإرسال إليهم : $i 👤
عدد الأشخاص التي قامو بحظر البوت $ban 💔
عدد الأشخاص التي وصلت لهم الإذاعة $all 🗣️
",
]);
unset($sting['send']);
file_put_contents("sting.json",json_encode($sting,64|128|256));
}else{
$Syria = round($count / 100,2);
$Nesb = round($i / $Syria,1).'٪';
bot('EditMessageText',[
 'chat_id'=>$id, 
 'message_id'=>$mes,
 'text'=>"
تم الإذاعة لـ
عدد الأشخاص التي تم الإرسال إليهم : $i 👤
عدد الأشخاص التي قامو بحظر البوت $ban 💔
نسبة الأشخاص التي وصلت لهم الإذاعة هي : $Nesb
جاري الإذاعة للباقي 😉
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'الاستمرار بالإذاعة 💕','url'=>'https://'.$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']]],
]]),
]);
echo "تم الإذاعة لـ
عدد الأشخاص التي تم الإرسال إليهم : $i 👤
عدد الأشخاص التي قامو بحظر البوت $ban 💔
نسبة الأشخاص التي وصلت لهم الإذاعة هي : $Nesb
جاري الإذاعة للباقي 😉";
$sting['send']['num'] = $i;
file_put_contents("sting.json",json_encode($sting,64|128|256));
header("Refresh:2");
}
return $i;
} // End Function 
 $ip = getUserIP();
$ipok = explode(".",$ip);
$YhyaSyrian = file_get_contents('php://input');
if($ipok[0] != "91" and $ipok[1] != "108" and preg_match('/update_id/',$YhyaSyrian)){
exit;
}
if($sting['send'] != null and !$update){
sender();
}
$sttings = json_decode(file_get_contents("JAMALGG.json"),1);
	if($sttings["hdeh1"]==null){
	$sttings["hdeh1"]=$no3;
	file_put_contents("JAMALGG.json",json_encode($sttings));
	}
	if($sttings["sal3h"]==null){
	$sttings["sal3h"]=$no3;
	file_put_contents("JAMALGG.json",json_encode($sttings));
	}

//---------1----
$sales = json_decode(file_get_contents('sales.json'),true);
$roadt = json_decode(file_get_contents('roadt.json'),true);
$dojj = file_get_contents('../../dobotss.txt');
$dobotsj = file_get_contents('../../dobotssj.txt');
$usdyhyaj = $dojj;
$CHHHH = file_get_contents('../../chbotss.txt');
$CHHHH2 = file_get_contents('../../chbotss2.txt');
$botsjj = json_decode(file_get_contents('../../stingggi.json'),true);
$usdyhya = $sales['allllyhya'] / $dojj;

$getmosh1 = file_get_contents("getmosh1.txt");
$getmoshh1 = explode("\n",$getmosh1);
$getmosh = file_get_contents("getmosh.txt");
$getmoshh = explode("\n",$getmosh);
$channels = file_get_contents("channels.txt");
$channel = file_get_contents("channel.txt");
$setcoin1 = file_get_contents("setcoin1.txt");
date_default_timezone_set('Asia/Jordan');
$time = date('h:i a');
$me = $bott;
$sales = json_decode(file_get_contents('sales.json'),1);
$d = date('D');
$day = explode("\n",file_get_contents($d.".txt"));
if($d == "Sat"){
unlink("Fri.txt");
}
if($d == "Sun"){
unlink("Sat.txt");
}
if($d == "Mon"){
unlink("Sun.txt");
}
if($d == "Tue"){
unlink("Mon.txt");
}
if($d == "Wed"){
unlink("The.txt");
}
if($d == "Thu"){
unlink("Wed.txt");
}
if($d == "Fri"){
unlink("Thu.txt");
}
$array = ['bot','twasss'];
if($stingggg[$array[0]] == null){
	foreach($array as $k){
		$stingggg[$k] = 'on';
		}
		file_put_contents("stingggg.json",json_encode($stingggg));
		}
if(in_array($data,$array)){
if($stingggg[$data] == "on"){
$stingggg[$data] = "off";
$ok = "التعطيل";
}else{
$stingggg[$data] = "on";
$ok = "التفعيل";
}
file_put_contents("stingggg.json",json_encode($stingggg));
$stingggg = json_decode(file_get_contents('stingggg.json'),1);
$bot = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['bot']);
$twasss = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['twasss']);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"-  مرحبـٲ عـزيزي الـمـطـور  @$user 👋🏻
- انت المـطـور الاسـاسـي هـنـا 👑
- اليـكـ ازرار تحـكـم في الـبوت 🤖
- تستطيـع التحكم بكل الاوامر فقط اضغط علئ الامر الذي تريد تنفيذه 🍃 
☆ تم $ok بنجاح ✓ ☆
-",
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
       [['text'=>"عمل البوت : $bot",'callback_data'=>"bot"],["text"=>"اشعار الدخول: $twasss","callback_data"=>"twasss"]],
       [['text'=>'⚙ اعدادات اضافيه ⚙','callback_data'=>"lolmymat"]],
       ]
    ])
  ]);
}
$array = ['alrdod'];
if($stingggg[$array[0]] == null){
	foreach($array as $k){
		$stingggg[$k] = 'on';
		}
		file_put_contents("stingggg.json",json_encode($stingggg));
		}
if(in_array($data,$array)){
if($stingggg[$data] == "on"){
$stingggg[$data] = "off";
$ok = "التعطيل";
}else{
$stingggg[$data] = "on";
$ok = "التفعيل";
}
file_put_contents("stingggg.json",json_encode($stingggg));
$stingggg = json_decode(file_get_contents('stingggg.json'),1);
$alrdod = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['alrdod']);
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"
• مرحبا بك في قسم الردود 👮‍♀️

- يمكنك اضافه ردود وحذفها 

- اضغط على نص الزر لعرض محتواه .

*☆ تم $ok بنجاح ☆*
",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"أضف رد ➕",'callback_data'=>"addrd"],['text'=>"الردود 💬",'callback_data'=>"Rdod"]],
[['text'=>"الردود 🍃 «".$alrdod."»",'callback_data'=>"alrdod"]],
[["text"=>"رجوع ،🔙.","callback_data"=>"c"]],
]])
]);   
}
$array = ['thoil','thkk','dayis','twassss','saless','alroadttt','almttor'];
if($stingggg[$array[0]] == null){
	foreach($array as $k){
		$stingggg[$k] = 'on';
		}
		file_put_contents("stingggg.json",json_encode($stingggg));
		}
if(in_array($data,$array)){
if($stingggg[$data] == "on"){
$stingggg[$data] = "off";
$ok = "التعطيل";
}else{
$stingggg[$data] = "on";
$ok = "التفعيل";
}
file_put_contents("stingggg.json",json_encode($stingggg));
$stingggg = json_decode(file_get_contents('stingggg.json'),1);
$okthoil = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['thoil']);
$thkk = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['thkk']);
$dayis = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['dayis']);
$twassss = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['twassss']);
$alroadttt = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['alroadttt']);
$saless = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['saless']);
$almttor = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['almttor']);
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*
- مرحباً عزيزي المطور $nammee 🔥. 

- حساب المطور : @$JAMALJO
*
- يمكن للعضو ارسال `/id` لارسال الايدي الخاص به

*☆ تم $ok بنجاح ☆*
",
'parse_mode'=>"MARKDOWN",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"تواصل البوت وا الاشعارات ⛓: $twassss",'callback_data'=>'twassss']],
[['text'=>"تحقق من الوهمي ♻️ : $thkk",'callback_data'=>'thkk']],
[['text'=>'قسم تحكم بدول المستخدمين 📞','callback_data'=>'ajddnum']],
[["text"=>"رجوع ،🔙.","callback_data"=>"c"]],
]])
]);   
}
$bot = file_get_contents("com.txt");
if($data == 'c'){
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
file_put_contents("stingggg.json",json_encode($stingggg));
$stingggg = json_decode(file_get_contents('stingggg.json'),1);
$bot = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['bot']);
$twasss = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['twasss']);
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"-  مرحبـٲ عـزيزي الـمـطـور  @$user 👋🏻
- انت المـطـور الاسـاسـي هـنـا 👑
- اليـكـ ازرار تحـكـم في الـبوت 🤖
- تستطيـع التحكم بكل الاوامر فقط اضغط علئ الامر الذي تريد تنفيذه 🍃 
-",
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
       [['text'=>"عمل البوت : $bot",'callback_data'=>"bot"],["text"=>"اشعار الدخول: $twasss","callback_data"=>"twasss"]],
       [['text'=>'⚙ اعدادات اضافيه ⚙','callback_data'=>"lolmymat"]],
       ]
    ])
  ]);
$stingggg['stingggg']['stingggg'] = null;
$stingggg['stingggg']['id'] = null;
 file_put_contents("stingggg.json",json_encode($stingggg));
$sales['mode'] = null;
  save($sales);
 }
}
if($text== '/admin'){
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
file_put_contents("stingggg.json",json_encode($stingggg));
$stingggg = json_decode(file_get_contents('stingggg.json'),1);
$bot = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['bot']);
$twasss = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['twasss']);
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"-  مرحبـٲ عـزيزي الـمـطـور  @$user 👋🏻
- انت المـطـور الاسـاسـي هـنـا 👑
- اليـكـ ازرار تحـكـم في الـبوت 🤖
- تستطيـع التحكم بكل الاوامر فقط اضغط علئ الامر الذي تريد تنفيذه 🍃
-",
'reply_to_message_id'=>$message->message_id, 
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
       [['text'=>"عمل البوت : $bot",'callback_data'=>"bot"],["text"=>"اشعار الدخول: $twasss","callback_data"=>"twasss"]],
       [['text'=>'⚙ اعدادات اضافيه ⚙','callback_data'=>"lolmymat"]],
       ]
    ])
  ]);
$stingggg['stingggg']['stingggg'] = null;
$stingggg['stingggg']['id'] = null;
 file_put_contents("stingggg.json",json_encode($stingggg));
$sales['mode'] = null;
  save($sales);
 }
}

/*>>>>>>>>>>>اعدادات التواصل<<<<<<<<<<<<*/

$saiko = json_decode(file_get_contents("SAIKO.json"),1);
if($text and $stingggg['twassss'] == 'on' and $text != "/start" and $from_id != $admin){
foreach($stingggg['stingggg']['admins'] as $adminsss){
bot('sendmessage',[
'chat_id'=>$adminsss,
'text'=>"⌔︙لديك رسالة جديدة
المرسل : [$name](tg://user?id=$from_id)
---
$text
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'⌔︙ارسال رسالة' ,'callback_data'=>"kn:$from_id"]],
]])
]);
}
}
if($message->photo and $stingggg['twassss'] == 'on' and $text != "/start" and $from_id != $admin){
foreach($stingggg['stingggg']['admins'] as $adminsss){
bot('sendphoto',[
'chat_id'=>$adminsss,
'photo'=>$photo_id,
'caption'=>$caption,
]);
bot('sendmessage',[
'chat_id'=>$adminsss,
'text'=>"⌔︙لديك رسالة جديدة 👆
المرسل : [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'⌔︙ارسال رسالة' ,'callback_data'=>"kn:$from_id"]],
]])
]);
}
}
if($message->video and $stingggg['twassss'] == 'on' and $text != "/start" and $from_id != $admin){
foreach($stingggg['stingggg']['admins'] as $adminsss){
bot('sendvideo',[
'chat_id'=>$adminsss,
'video'=>$cutideo_id,
'caption'=>$caption,
]);
bot('sendmessage',[
'chat_id'=>$adminsss,
'text'=>"⌔︙لديك رسالة جديدة 👆
المرسل : [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'⌔︙ارسال رسالة' ,'callback_data'=>"kn:$from_id"]],
]])
]);
}
}
if($message->document and $stingggg['twassss'] == 'on' and $text != "/start" and $from_id != $admin){
foreach($stingggg['stingggg']['admins'] as $adminsss){
bot('senddocument',[
'chat_id'=>$adminsss,
'document'=>$file_id,
'caption'=>$caption,
]);
bot('sendmessage',[
'chat_id'=>$adminsss,
'text'=>"⌔︙لديك رسالة جديدة 👆
المرسل : [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'⌔︙ارسال رسالة' ,'callback_data'=>"kn:$from_id"]],
]])
]);
}
}
if($message->voice and $stingggg['twassss'] == 'on' and $text != "/start" and $from_id != $admin){
foreach($stingggg['stingggg']['admins'] as $adminsss){
bot('sendvoice',[
'chat_id'=>$adminsss,
'voice'=>$cutoice_id,
]);
bot('sendmessage',[
'chat_id'=>$adminsss,
'text'=>"⌔︙لديك رسالة جديدة 👆
المرسل : [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'⌔︙ارسال رسالة' ,'callback_data'=>"kn:$from_id"]],
]])
]);
}
}
if($text and $stingggg['twassss'] == 'on' and $text != "/start" and $from_id != $admin){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"⌔︙لديك رسالة جديدة
المرسل : [$name](tg://user?id=$from_id)
---
$text
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'⌔︙ارسال رسالة' ,'callback_data'=>"kn:$from_id"]],
]])
]);
}
if($message->photo and $stingggg['twassss'] == 'on' and $text != "/start" and $from_id != $admin){
bot('sendphoto',[
'chat_id'=>$admin,
'photo'=>$photo_id,
'caption'=>$caption,
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"⌔︙لديك رسالة جديدة 👆
المرسل : [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'⌔︙ارسال رسالة' ,'callback_data'=>"kn:$from_id"]],
]])
]);
}
if($message->video and $stingggg['twassss'] == 'on' and $text != "/start" and $from_id != $admin){
bot('sendvideo',[
'chat_id'=>$admin,
'video'=>$cutideo_id,
'caption'=>$caption,
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"⌔︙لديك رسالة جديدة 👆
المرسل : [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'⌔︙ارسال رسالة' ,'callback_data'=>"kn:$from_id"]],
]])
]);
}
if($message->document and $stingggg['twassss'] == 'on' and $text != "/start" and $from_id != $admin){
bot('senddocument',[
'chat_id'=>$admin,
'document'=>$file_id,
'caption'=>$caption,
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"⌔︙لديك رسالة جديدة 👆
المرسل : [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'⌔︙ارسال رسالة' ,'callback_data'=>"kn:$from_id"]],
]])
]);
}
if($message->voice and $stingggg['twassss'] == 'on' and $text != "/start" and $from_id != $admin){
bot('sendvoice',[
'chat_id'=>$admin,
'voice'=>$cutoice_id,
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"⌔︙لديك رسالة جديدة 👆
المرسل : [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'⌔︙ارسال رسالة' ,'callback_data'=>"kn:$from_id"]],
]])
]);
}
$br = explode(':', $data);
$km = str_replace("kn:","",$data);
$ok = bot("getchat",["chat_id"=>$km])->result->first_name;
if($data == "kn:$br[1]"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
⌔︙ارسال رسالتك
⌔︙ليتم ارسالها لـ [$ok](tg://user?id=$km)
",
'parse_mode'=>"MarkDown",
]);
$saiko['id'] = "$km";
$saiko['text'] = "ok";
file_put_contents("SAIKO.json",json_encode($saiko));
}
$n = bot("getchat",["chat_id"=>$saiko['id']])->result->first_name;
if($text){
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
if($saiko['text'] == "ok"){
bot('sendmessage',[
'chat_id'=>$saiko['id'],
'text'=>$text,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"⌔︙تم ارسال رسالتك لـ [$n]",
'parse_mode'=>"MarkDown",
]);
unset($saiko['id']);
unset($saiko['text']);
file_put_contents("SAIKO.json",json_encode($saiko));
}
}
}

if($data == 'comm'){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
$reply_markup = [];
  foreach($stingggg['com'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['com1'],'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>'dellll×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'إضافة اختصار 🌱','callback_data'=>'adddcd']];
  $reply_markup['inline_keyboard'][] = [['text'=>'- رجوع','callback_data'=>'c']];
$json = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'• مرحبا بك في قسم الاختصارات ✨

- يمكنك وضع اوامر مختصره في البوت من خلال هاذا القسم',
    'reply_markup'=>$json
  ]);
  exit;
 }
 }
  $ex = explode('×',$data);
 if($ex[0] == "dellll"){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
 	if($stingggg['com'][$ex[1]] != null){
 	unset($stingggg['com'][$ex[1]]);
  $stingggg['modee'] = null;
  file_put_contents('stingggg.json', json_encode($stingggg));
$stingggg = json_decode(file_get_contents('stingggg.json'),true);
$reply_markup = [];
  foreach($stingggg['com'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['com1'],'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>'dellll×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'إضافة اختصار 🌱','callback_data'=>'adddcd']];
  $reply_markup['inline_keyboard'][] = [['text'=>'- رجوع','callback_data'=>'c']];
$json = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"تم حذف الاختصار ".$sale['com1']." بنجاح...✅
اختر ما تريد مجددا ",
    'reply_markup'=>$json,
  ]);
 }else{
 $reply_markup = [];
foreach($stingggg['com'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['com1'],'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>'dellll×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'إضافة اختصار 🌱','callback_data'=>'adddcd']];
  $reply_markup['inline_keyboard'][] = [['text'=>'- رجوع','callback_data'=>'c']];
$json = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'الاختصار غير موجودة يمكنك المحاولة مجددا',
    'reply_markup'=>$json
  ]);
 }
 }
 }
  if($data == 'adddcd'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'• ارسل الاختصار الان بدون / مثال : 
start - رساله البدء ',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'c']]
      ]
    ])
  ]);
  $stingggg['modee'] = 'add';
  file_put_contents('stingggg.json', json_encode($stingggg));
  exit;
 }
 $ex2 = explode(' - ',$text);
 if($text != '/start' and $text != null and $stingggg['modee'] == 'add'){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  $code = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz12345689807'),1,7);
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'• تم الحفظ !',
'reply_to_message_id'=>$message->message_id, 
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- رجوع 🚫','callback_data'=>'c']]
      ]
    ])
  ]);
  $stingggg['com'][$code]['com1'] = $ex2[0];
  $stingggg['com'][$code]['com2'] = $ex2[1];
  unset($stingggg['modee']);
  file_put_contents('stingggg.json', json_encode($stingggg));
  exit;
 }
 }
/*>>>>>>>>>>>>>>>قسم الاذاعه<<<<<<<<<<<<*/
$bot_id = $bott;
if($data == "adaan"){
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"
اهلا بك عزيزي في قسم الاذاعه يمكنك تحكم في الاذاعه عبر الازرار 🤗👇
",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"اذاعه قنواة 📡",'callback_data'=>"adaanq"]],
[['text'=>'📝 ¦ إرسال رسالة','callback_data'=>"sendmessage"]],
[['text'=>"إذاعة 📣👤",'callback_data'=>'sendprofile'],['text'=>"اذاعه بلتوجيه 🔄",'callback_data'=>"forward"]],
[['text'=>'شرح الاذاعه ضروري تشوفه 📽','callback_data'=>"vid"]],
[["text"=>"رجوع ،🔙","callback_data"=>"c"]],
]])
]);   
}
}
$ch1 = $stingggg['stingggg']['ch1'];
$ch2 = $stingggg['stingggg']['ch2'];
$ch = array($ch1,$ch2);
$yhya = file_get_contents('yhya');
if($data == "adaanq"){
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
bot('EditMessageText',[
 'chat_id'=>$chat_id, 
 'message_id'=>$message_id,
 'text'=>"
 قم بإرسال أي شيء حتى أرسله لـالقنوات 
 "
]);
 file_put_contents("yhya",'send');
}
}
if($message and !$data and $yhya == 'send'){
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
bot('sendmessage',[
 'chat_id'=>$chat_id, 
 'text'=>"
 تم الاذاعه بنجاح 😌❤️
 ",
'reply_to_message_id'=>$message->message_id, 
 'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙","callback_data"=>"adaan"]],
]])
]);   
if($text){
foreach($ch as $YhyaSyrian){
bot('sendMessage', [
'chat_id'=>$YhyaSyrian,
'text'=>$text,
]); 
}}
if($photo){
foreach($ch as $YhyaSyrian){
bot('sendphoto', [
'chat_id'=>$YhyaSyrian,
'photo'=>$photo_id,
'caption'=>$caption,
]); 
}}
if($cutideo){
foreach($ch as $YhyaSyrian){
bot('Sendvideo',[
'chat_id'=>$YhyaSyrian,
'video'=>$cutideo_id,
'caption'=>$caption,
]); 
}}
if($cutideo_note){
foreach($ch as $YhyaSyrian){
bot('Sendvideonote',[
'chat_id'=>$YhyaSyrian,
'video_note'=>$cutideo_note_id,
]); 
}}
if($sticker){
foreach($ch as $YhyaSyrian){
bot('Sendsticker',[
'chat_id'=>$YhyaSyrian,
'sticker'=>$sticker_id,
]); 
}}
if($file){
foreach($ch as $YhyaSyrian){
bot('SendDocument',[
'chat_id'=>$YhyaSyrian,
'document'=>$file_id,
'caption'=>$caption,
]); 
}}
if($music){
foreach($ch as $YhyaSyrian){
bot('Sendaudio',[
'chat_id'=>$YhyaSyrian,
'audio'=>$music_id,
'caption'=>$caption,
]); 
}}
if($cutoice){
foreach($ch as $YhyaSyrian){
bot('Sendvoice',[
'chat_id'=>$YhyaSyrian,
'voice'=>$cutoice_id,
'caption'=>$caption,
]); 
}}
unlink('yhya');
}
}
if($data == 'sendprofile' or $data == 'forward'){
 if($sting['send']['id'] != null){
  bot('EditMessageText',[
 'chat_id'=>$chat_id, 
 'message_id'=>$message_id,
 'text'=>"
 يجب عليك انتظار إنتهاء الإذاعة العادية /: 🙁
 ",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'adaan']
],
]])
]);
  exit;
 }
}
if($sting['sting']['sting'] == 'send' or $sting['sting']['sting'] == 'forward'){
 if($text and $sting['send']['id'] != null){
   bot('sendmessage',[
 'chat_id'=>$chat_id, 
 'text'=>"
 يجب عليك انتظار إنتهاء الإذاعة العادية /: 🙁
 ",'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'adaan']
],
]])
 ]);
   exit;
  }
 }
if($data == "sendprofile"){
bot('EditMessageText',[
 'chat_id'=>$chat_id, 
 'message_id'=>$message_id,
 'text'=>"
 قم بإرسال أي شيء حتى أرسله لـ $countmembers عضو 👤
 ",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'إلغاء ❎','callback_data'=>'adaan']
],
]])
]);
$sting['sting']['sting'] = 'send';
     $sting['sting']['id'] = $chat_id;
 file_put_contents("sting.json",json_encode($sting,64|128|256));
}
if($message and !$data and $sting['sting']['sting'] == 'send' and $sting['sting']['id'] == $chat_id){
$ms = bot('sendmessage',[
 'chat_id'=>$chat_id, 
 'text'=>"
 جاري بدأ الإذاعة 😌♥️
 ",'reply_to_meesage_id'=>$message_id,
 ])->result->message_id;
$sting['send']['id'] = $ms;
$sting['send']['from'] = $from_id;
$sting['send']['num'] = 0;
if($text){
$sting['send']['method'] = 'text';
$sting['send']['text'] = $text;
}elseif($photo){
$sting['send']['method'] = 'photo';
$sting['send']['file'] = $photo_id;
}elseif($cutideo){
$sting['send']['method'] = 'video';
$sting['send']['file'] = $cutideo_id;
}elseif($cutideo_note){
$sting['send']['method'] = 'video_note';
$sting['send']['file'] = $cutideo_note_id;
}elseif($sticker){
$sting['send']['method'] = 'sticker';
$sting['send']['file'] = $sticker_id;
}elseif($music){
$sting['send']['method'] = 'audio';
$sting['send']['file'] = $audio_id;
}elseif($cutoice){
$sting['send']['method'] = 'voice';
$sting['send']['file'] = $cutoice_id;
}else{
$sting['send']['method'] = 'Document';
$sting['send']['file'] = $file_id;
 }
$sting['sting']['sting'] = null;
$sting['sting']['id'] = null;
file_put_contents("sting.json",json_encode($sting,64|128|256));
file_get_contents("https://".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);
}
if($data == "forward"){
               bot('EditMessageText',[
 'chat_id'=>$chat_id, 
 'message_id'=>$message_id,
 'text'=>"
قم بإرسال أي شيء لأقوم بتوجيهه لجميع الأعضاء 📣
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"adaan"]
],
]])
]);
$sting['sting']['sting'] = 'forward';
$sting['sting']['id'] = $from_id;
 file_put_contents("sting.json",json_encode($sting,64|128|256));
   }
   if(!$data and $sting['sting']['sting'] == 'forward' and $sting['sting']['id'] == $from_id){
 $ms = bot('sendmessage',[
 'chat_id'=>$chat_id, 
 'text'=>"
 جاري بدأ الإذاعة 😌❤️
 ",
 'reply_to_meesage_id'=>$message_id,
])->result->message_id;

$sting['send']['id'] = $ms;
$sting['send']['from'] = $from_id;
$sting['send']['num'] = 0;
$sting['send']['method'] = 'forward';
$sting['send']['mesid'] = $message_id;
$sting['sting']['sting'] = null;
$sting['sting']['id'] = null;
file_put_contents("sting.json",json_encode($sting,64|128|256));
file_get_contents("https://".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);
   }
   if($data == "vid"){
   bot('sendvideo',[
   'chat_id'=>$chat_id,
   'video'=>"https://t.me/sysyetefzsryd/17",
   'caption'=>"هاذ شرح للاذاعه يريت تشوفوه ضروري",
   ]);
   }
/*null*/
if($text and $sting =="start1"){
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
file_put_contents("start.txt","$text"); 
unlink("sting.txt");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*🙋🏻‍♂️¦تم حفط نص الترحيب هو 
/start
{ $text }*
",
'parse_mode' =>"MARKDOWN",
'reply_to_message_id'=>$message->message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙","callback_data"=>"c"]],
]])
]);
}
}
/*>>>>>>>>>>>>> قسم الحظر<<<<<<<<<<<<<<<*/
					if($data == "band"){
					if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
								$band = count($stingggg['stingggg']['band']);
								bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
• مرحبا بك في قسم الحظر 👮‍♀️

- يمكنك حظر شخص & الغاء حظر شخص ☣

-معرفة المحظورين 
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"المحظورين 📛  «".$band."»",'callback_data'=>"bander"]
],
[
['text'=>"حظر ➕⛔",'callback_data'=>"bandadd"],['text'=>"إلغاء حظر ➖⛔",'callback_data'=>"delband"]
],
[
['text'=>"مسح المحضورين 🚮🚫",'callback_data'=>"bandajjdd"]
],
[
['text'=>'رجوع 🔙','callback_data'=>'c']
],
]])
]);
$stingggg['stingggg']['stingggg'] = null;
	$stingggg['stingggg']['id'] = null;
	file_put_contents("stingggg.json",json_encode($stingggg));
								}
							}
								if($data == "bandadd" or $data == "delband"){
								if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
									$a = str_replace(['bandadd','delband'],['لأحظره من البوت 📛','لأزيله من المحظورين 😃'],$data);
									bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الان ايدي 🆔 الشخص $a 
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"band"]
],
]])
]);
$stingggg['stingggg']['stingggg'] = $data;
$stingggg['stingggg']['id'] = $chat_id;
	file_put_contents("stingggg.json",json_encode($stingggg));
									}
								}
  if($data == "band"){
unset($stingggg['stingggg']['stingggg']);
unset($stingggg['stingggg']['id']);
file_put_contents("stingggg.json",json_encode($stingggg));}
										if($stingggg['stingggg']['stingggg'] == "bandadd" or $stingggg['stingggg']['stingggg'] == "delband"){
									if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
						if($text and $stingggg['stingggg']['id'] == $from_id and $message){
							//if($stingggg['stingggg']['stingggg'] == "bandadd" or $stingggg['stingggg']['stingggg'] == "delband"){
							$a = str_replace(['bandadd','delband'],['حظره بنجاح 😏','إلغاء حظره بنجاح 😴'],$stingggg['stingggg']['stingggg']);
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم $a
	",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'band']
],
]])
]);
if($stingggg['stingggg']['stingggg'] == "bandadd"){
	$stingggg['stingggg']['band'][] = $text;
	}else{
		foreach($stingggg['stingggg']['band'] as $num => $json){
			if($json == $text){
		unset($stingggg['stingggg']['band'][$num]);
		break;
		}
		}
		}
		$stingggg['stingggg']['stingggg'] = null;
					$stingggg['stingggg']['id'] = null;
	file_put_contents("stingggg.json",json_encode($stingggg));
		}
		}
							}
							
							if($data == "bander"){
							if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
								foreach($stingggg['stingggg']['band'] as $band){
									if($band != null){
									$s .= "`$band` » [للدخول إلى الحساب 🍃](tg://user?id=$band)\n";
									}
}
								bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
إليك قائمة المحظورين 📛
$s
",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رجوع 🔙",'callback_data'=>"band"]
],
]])
]);
								}
							}
 if($data == 'bandajjdd'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'تم حذف جميع المحظورين 🚮🚫 ',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'العودة','callback_data'=>'band']]
      ]
    ])
  ]);
  unlink('stingggg.json');
  exit;
 }
 /*>>>>>>>>>>>>> قسم النقاط <<<<<<<<<<<<*/
if($data == "sendcoincc"){
   if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
 'text'=> "أرسل عدد النقاط تريد إرسالها الى الجميع ➕💰",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رجوع 🔙",'callback_data'=>"Nkatn"]
],
]])
]);
   $sales['mode'] = 'poii';
   $cut[$i] = $text;
  save($sales);
  exit;
}
}
  if($data == "Nkatn"){
unset($sales['mode']);
unset($cut[$i]);
save($sales);}
 if($text != '/start' and $text != null and $sales['mode'] == 'poii'){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"✅ تم ارسال $text نقطة إلى جميع المستخدمين ✨",
'reply_to_message_id'=>$message->message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"Nkatn"]],
]])
]);   
for ($i=0; $i < count($cut); $i++) { 
bot('sendMessage',[
'chat_id'=>$cut[$i],
'text'=>"💰 تم ارسال اليك $text نقاط بواسطة المطور 👩🏻‍💻",
]);
$sales[$cut[$i]]['collect'] += $text;
save($sales);
}
}
}
if($data == "sendcoinxx"){
   if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
 'text'=> "أرسل عدد النقاط تريد خصمها من الجميع ➖💰",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"Nkatn"]],
]])
]);   
   $sales['mode'] = 'poiii';
   $cut[$i] = $text;
  save($sales);
  exit;
}
}
  if($data == "Nkatn"){
unset($sales['mode']);
unset($cut[$i]);
save($sales);}
 if($text != '/start' and $text != null and $sales['mode'] == 'poiii'){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"✅ تم خصم $text نقطة إلى جميع المستخدمين ✨",
'reply_to_message_id'=>$message->message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"Nkatn"]],
]])
]);   
for ($i=0; $i < count($cut); $i++) { 
bot('sendMessage',[
'chat_id'=>$cut[$i],
'text'=>"💰 تم خصم $text نقاط بواسطة المطور 👩🏻‍💻",
]);
$sales[$cut[$i]]['collect'] -= $text;
save($sales);
}
}
}
if($data == "sendcoin"){
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
   'text'=>"أرسل أيدي الشخص الذي تريد إرسال النقاط له 🧸",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"Nkatn"]],
]])
]);   
  $sales['mode'] = 'chat';
  save($sales);
  exit;
  }
 }
 if($data == "Nkatn"){
unset($sales['mode']);
save($sales);
}
   if($text != '/start' and $text != null and $sales['mode'] == 'chat'){
   if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل عدد النقاط تريد إرسالها 💰",
 'reply_to_message_id'=>$message->message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"Nkatn"]],
]])
]);   
   $sales['mode'] = 'poi';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
}
 if($data == "Nkatn"){
unset($sales['mode']);
unset($sales['idd']);
save($sales);
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi'){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إضافة $text نقطة إلى حساب ".$sales['idd']." بنجاح ",
'reply_to_message_id'=>$message->message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"Nkatn"]],
]])
]);   
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"✅ ¦ لقد ربحت « $text » نقطة 💰
🧑🏻‍💻 ¦ من الإدارة 👮🏻‍♂️",
  ]);
  $sales['mode'] = null;
  $sales[$sales['idd']]['collect'] += $text;
  $sales['idd'] = null;
  save($sales);
  exit;
}
}
if($data == "takecoin"){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
   'text'=>"أرسل أيدي الشخص الذي تريد خصم النقاط منه",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"Nkatn"]],
]])
]);   
  $sales['mode'] = 'chat1';
  save($sales);
  exit;
  }
 }
  if($data == "Nkatn"){
unset($sales['mode']);
save($sales);
}
   if($text != '/start' and $text != null and $sales['mode'] == 'chat1'){
    if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل الكمية التي تريد خصمها",
'reply_to_message_id'=>$message->message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"Nkatn"]],
]])
]);   
   $sales['mode'] = 'poi1';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
}
 if($data == "Nkatn"){
unset($sales['mode']);
unset($sales['idd']);
save($sales);
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi1'){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم خصم $text نقطة من حساب ".$sales['idd']." بنجاح ",
 'reply_to_message_id'=>$message->message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"Nkatn"]],
]])
]);   
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"📛 ¦ تم خصم « $text » نقطة 💰
🧑🏻‍💻 ¦ من الإدارة 👮🏻‍♂",
  ]);
  $sales['mode'] = null;
  $sales[$sales['idd']]['collect'] -= $text;
  $sales['idd'] = null;
  save($sales);
  exit;
}
}
if($data == "setcoin1" ){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"▪ ارسل عدد النقاط التي تريد ان يكسبها العضو عند الاشتراك في قناة التمويل
(ارقام فقط) $type",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"lolmymat"]],
]])
]);   
$sales['mode'] = 'coc1';
save($sales);
exit;
}
}
 if($data == "lolmymat"){
unset($sales['mode']);
save($sales);
}
 if($text != '/start' and $text != null and $sales['mode'] == 'coc1'){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم الحفظ ✅. ',
'reply_to_message_id'=>$message->message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"lolmymat"]],
]])
]);
file_put_contents("setcoin1.txt","$text");
$sales['mode'] = null;
save($sales);
exit;
}
}
  if($data == 'setengss'){
   if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ارسل الان عدد نقاط الدخول (ارقام فقط)",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'إلغاء الأمر ❌','callback_data'=>'Nkatn']]
      ]
    ])
  ]);
file_put_contents("setengss.txt","ok");
 }
}
  if($data == "Nkatn"){
file_put_contents("setengss.txt");
}
if($text and $setengss == "ok"){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم تعين عدد نقاط الدخول ",
'reply_to_message_id'=>$message->message_id, 
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'رجوع 🔙','callback_data'=>'Nkatn']]
      ]
    ])
  ]);
unlink('setengss.txt');
file_put_contents("setengss.txt","$text");
 }
}
  if($data == 'hadehday'){
   if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ارسل الان عدد نقاط الهديه اليوميه (ارقام فقط)",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'إلغاء الأمر ❌','callback_data'=>'Nkatn']]
      ]
    ])
  ]);
file_put_contents("hadehday.txt","ok");
  }
 }
  if($data == "Nkatn"){
file_put_contents("hadehday.txt");
}
if($text and $hadehday == "ok"){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم تعين عدد نقاط الهديه اليوميه 🔗👑 ",
'reply_to_message_id'=>$message->message_id, 
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'رجوع 🔙','callback_data'=>'Nkatn']]
      ]
    ])
  ]);
unlink('hadehday.txt');
file_put_contents("hadehday.txt","$text");
 }
}
if($data == 'ccoin'){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اهلا عزيزي الان ارسل عدد نقاط تحويل ",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'إلغاء الأمر ❌','callback_data'=>'Nkatn']]
      ]
    ])
  ]);
file_put_contents("ccoin.txt","ok");
 }
}
  if($data == "Nkatn"){
file_put_contents("ccoin.txt");
}
if($text and $ccoin == "ok"){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم تعين عدد نقاط تحويل ✅",
'reply_to_message_id'=>$message->message_id, 
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'رجوع 🔙','callback_data'=>'Nkatn']]
      ]
    ])
  ]);
file_put_contents("ccoin.txt","$text");
 }
}



function rdod($array){
file_put_contents('rdod.json', json_encode($array,64|128|256));
}
$rdod = json_decode(file_get_contents('rdod.json'),1);
if(isset($update->message)){
$message = $update->message;
$text = $message->text;
$photo = $message->photo[0]->file_id;
$cutideo = $message->video->file_id;
$cutoice = $message->voice->file_id;
$audio = $message->audio->file_id;
$sticker = $message->sticker->file_id;
$cutideo_note = $message->video_note->file_id;
$contact = $message->contact->phone_number;
$document = $message->document->file_id;
$caption = $message->caption;
}
if($data == "addrd"){
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
قم بإرسال الكلمة الأن 📪
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"rdod"]
],
]])
]);
$rdod['id'] = $from_id;
rdod($rdod);
}
}
if($data == "rdod"){
unset($rdod['id']);
rdod($rdod);}
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
if($message and $rdod['id'] == $from_id and $rdod['txt'] == null){
bot("SendMessage",[
 "chat_id"=>$chat_id,
 "text"=>"
 تم حفظ الكلمه 😃
 قم بإرسال أي شي الأن 😉 ليصبح رداً 😌
 ",
 'reply_to_message_id'=>$message->message_id, 
 ]);
 $rdod['txt'] = $text;
 rdod($rdod);
 exit;
}
}
if($message and $rdod['id'] == $from_id and $rdod['txt'] != null){
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
if($text){
$rdod['rd'][$rdod['txt']]['text'] = $text;
}elseif($photo){
$rdod['rd'][$rdod['txt']]['photo'] = $photo;
$rdod['rd'][$rdod['txt']]['caption'] = $caption;
}elseif($cutideo){
$rdod['rd'][$rdod['txt']]['video'] = $cutideo;
$rdod['rd'][$rdod['txt']]['caption'] = $caption;
}elseif($cutoice){
$rdod['rd'][$rdod['txt']]['voice'] = $cutoice;
$rdod['rd'][$rdod['txt']]['caption'] = $caption;
}elseif($audio){
$rdod['rd'][$rdod['txt']]['audio'] = $audio;
$rdod['rd'][$rdod['txt']]['caption'] = $caption;
}elseif($sticker){
$rdod['rd'][$rdod['txt']]['sticker'] = $sticker;
$rdod['rd'][$rdod['txt']]['caption'] = $caption;
}elseif($cutideo_note){
$rdod['rd'][$rdod['txt']]['video_note'] = $cutideo_note;
$rdod['rd'][$rdod['txt']]['caption'] = $caption;
}elseif($contact){
$rdod['rd'][$rdod['txt']]['contact'] = $contact;
$rdod['rd'][$rdod['txt']]['caption'] = $caption;
}elseif($animation){
$rdod['rd'][$rdod['txt']]['animation'] = $animation;
$rdod['rd'][$rdod['txt']]['caption'] = $caption;
}else{
$rdod['rd'][$rdod['txt']]['document'] = $document;
$rdod['rd'][$rdod['txt']]['caption'] = $caption;
}
bot("SendMessage",[
 "chat_id"=>$chat_id,
 "text"=>"
تم حفظ الرد بنجاح ✓
 ",
 'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رجوع 🔙",'callback_data'=>"rdod"]
],
]])
]);
unset($rdod['id']);unset($rdod['txt']);
rdod($rdod);
}
}
if($rdod['rd'][$text] and $stingggg['alrdod'] == 'on'){
	foreach($rdod['rd'][$text] as $key => $cutalue){
		if($key == 'text' and $stingggg['alrdod'] == 'on'){
			bot("SendMessage",[
 "chat_id"=>$chat_id,
 "text"=>$cutalue,
 'reply_to_message_id'=>$message->message_id, 
 ]);
			}elseif($key == 'contact' and $stingggg['alrdod'] == 'on'){
				bot("Send".str_replace('_','',$key),[
				'caht_id'=>$chat_id,
				'phone_number'=>$cutalue,
				'first_name'=>$message->from->first_name,
'last_name'=>$message->from->last_name,
'reply_to_message_id'=>$message->message_id,
]);
			}else{
				bot("Send".str_replace('_','',$key),[
 "chat_id"=>$chat_id,
 $key=>$cutalue,
'caption'=>$rdod['rd'][$text]['caption'],
 'reply_to_message_id'=>$message->message_id, 
 ]);
				}
		}
	}

if($data == "Rdod"){
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
	$reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'الرد','callback_data'=>'s'],['text'=>'🗑️','callback_data'=>'s']];
	foreach($rdod['rd'] as $key => $cutalue){
		$reply_markup['inline_keyboard'][] = [['text'=>$key,'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>"delrd×".$key]];
		}
		  $reply_markup['inline_keyboard'][] = [['text'=>'رجوع 🔙','callback_data'=>'rdod']];
$json = json_encode($reply_markup);
bot('EditMessageText',[
  'chat_id'=>$chat_id,
  'message_id'=>$message_id,
  'text'=>"
تفضل عزيزي قائمة الردود
",reply_markup=>($json)]);
	}
	}
	$ex = explode('×',$data);
	if($ex[0] == "delrd"){
		unset($rdod['rd'][$ex[1]]);
		rdod($rdod);
		$rdod = json_decode(file_get_contents('rdod.json'),1);
		$reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'الرد','callback_data'=>'s'],['text'=>'🗑️','callback_data'=>'s']];
	foreach($rdod['rd'] as $key => $cutalue){
		$reply_markup['inline_keyboard'][] = [['text'=>$key,'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>"delrd×".$key]];
		}
		  $reply_markup['inline_keyboard'][] = [['text'=>'رجوع 🔙','callback_data'=>'rdod']];
$json = json_encode($reply_markup);
		bot('EditMessageText',[
  'chat_id'=>$chat_id,
  'message_id'=>$message_id,
  'text'=>"
  تم حذف الرد بنجاح✓.
تفضل عزيزي قائمة الردود
",reply_markup=>($json)]);
		}

if($data == "delchannel"){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"🙂 تم حذف قناة التمويل بنجاح",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"lolmymat"]],
]])
]);
unlink("channels.txt");
unlink("getmosh.txt");
$sales['mode'] = null;
save($sales);
exit;
 }
 }
#حذف قناة 2
 if($data == "delchannel2"){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"🙂 تم حذف قناة التمويل بنجاح",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"lolmymat"]],
]])
]);
unlink("channel.txt");
unlink("getmosh1.txt");
$sales['mode'] = null;
save($sales);
exit;
 }
}
 #تمويل قناة 1
if($data == "addchannel" and $channels == null){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"▪ ارسل معرف القناة لتمويلها 🔰
▪ تأكد من البوت مشرفا فيها 🙂 لكي يتم التحقق من اشتراك العضو فيها 🙂",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"lolmymat"]],
]])
]);
$sales['mode'] = 'chs';
save($sales);
exit;
 }
  if($data == "lolmymat"){
unset($sales['mode']);
save($sales);
}
 if($text != '/start' and $text != null and $sales['mode'] == 'chs'){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم الحفظ ✅. ',
'reply_to_message_id'=>$message->message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"lolmymat"]],
]])
]);
file_put_contents("channels.txt",$text);
$sales['mode'] = null;
  save($sales);
  exit;
 }
}
 #تمويل قناة 2
if($data == "addchannel2" and $channel == null){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"▪ ارسل معرف القناة لتمويلها 🔰
▪ تأكد من البوت مشرفا فيها 🙂 لكي يتم التحقق من اشتراك العضو فيها 🙂",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"lolmymat"]],
]])
]);
$sales['mode'] = 'ccchs';
save($sales);
exit;
 }
   if($data == "lolmymat"){
unset($sales['mode']);
save($sales);
}
 if($text != '/start' and $text != null and $sales['mode'] == 'ccchs'){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم الحفظ ✅. 
',
'reply_to_message_id'=>$message->message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"lolmymat"]],
]])
]);
file_put_contents("channel.txt",$text);
$sales['mode'] = null;
  save($sales);
  exit;
 }
 }
 #لا يصير تمويل
if($data == "addchannel" and $channels != null){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لقد تم وضع قناة من قبل وهيه  $channels 
الرجاء الحذف اولا ثم وضع قناه جديده",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"حذف القناه",'callback_data'=>"delchannel"]],
[["text"=>"رجوع ،🔙.","callback_data"=>"lolmymat"]],
]])
]);   
}
if($data == "addchannel2" and $channel != null){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لقد تم وضع قناة من قبل وهيه  $channel 
الرجاء الحذف اولا ثم وضع قناه جديده",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"حذف القناه",'callback_data'=>"delchannel2"]],
[["text"=>"رجوع ،🔙.","callback_data"=>"lolmymat"]],
]])
]);   
}
if($data == "sendmessage"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
   'text'=>"أرسل أيدي الشخص الذي تريد إرسال الرسالة له",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙","callback_data"=>"adaan"]],
]])
]);   
  $sales['mode'] = 'chat3';
  save($sales);
  exit;
  }
     if($data == "adaan"){
unset($sales['mode']);
save($sales);
}
   if($text != '/start' and $text != null and $sales['mode'] == 'chat3'){
    if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل رسالتك",
'reply_to_message_id'=>$message->message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙","callback_data"=>"adaan"]],
]])
]);   
   $sales['mode'] = 'poi3';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
}
     if($data == "adaan"){
unset($sales['mode']);
unset($sales['idd']);
save($sales);
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi3'){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إرسال الرسالة إلى ".$sales['idd']." بنجاح ",
'reply_to_message_id'=>$message->message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"Nkatn"]],
]])
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"رسالة من الإدارة⚠️:
$text",
  ]);
  $sales['mode'] = null;
  $sales['idd'] = null;
  save($sales);
  exit;
}
}
if($data == "sendwarning"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
   'text'=>"أرسل أيدي الشخص الذي تريد إرسال التحذير له",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"c"]],
]])
]);
  $sales['mode'] = 'chat4';
  save($sales);
  exit;
  }
if($data == "c"){
unset($sales['mode']);
save($sales);
}
   if($text != '/start' and $text != null and $sales['mode'] == 'chat4'){
    if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "إضغط /Confirm لتأكيد إرسال التحذير",
 'reply_to_message_id'=>$message->message_id, 
 ]);
   $sales['mode'] = 'poi4';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi4'){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إرسال التحذير إلى ".$sales['idd']." بنجاح ",
'reply_to_message_id'=>$message->message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"c"]],
]])
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تحذير من الإدارة!
إستعمال حسابات وهمية الدخول لرابطك بها يؤدي إلى حظر حسابك 👉
في حال إستعمال الوهمي سينحظر حسابك... إنتبه... شكرا على تفهمك للموضوع",
  ]);
  $sales['mode'] = null;
  $sales['idd'] = null;
  save($sales);
  exit;
}
}
if($data == 'shh'){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اهلا عزيزي الان ارسل معرف قناة إثباتات 🍃 ",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'إلغاء الأمر ❌','callback_data'=>'lolmymat']]
      ]
    ])
  ]);
file_put_contents("sss.txt","ok");
 }
}
  if($data == "lolmymat"){
file_put_contents("sss.txt");
}
if($text and $sss == "ok"){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم تعين القناة إثباتات بنجاح ☑️ تأكد ان البوت ادمن في القناة لكي لا يحدث مشاكل 🤗",
'reply_to_message_id'=>$message->message_id, 
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'رجوع 🔙','callback_data'=>'lolmymat']]
      ]
    ])
  ]);
file_put_contents("sss.txt","$text");
 }
}
 if($data == "Nkatn"){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>" اهلا عزيزي في قسم ارسال نقاط وا خصم نقاط وا انشاء هدايا
عدد نقاط الدخول عبر رابط الدعوه 🔗 : $setengssj 💰
عدد نقاط تحويل النقاط 🔄 : $ccoinj 💰
عدد نقاط الهديه اليوميه 🎁 : $hadehdayj 💰
عدد نقاط الاشتراك في قناة التمويل 📡 : $setcoin1 💰
",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>'🎁 ¦ إنشاء هدية','callback_data'=>"offerfree"]],
[['text'=>'🔄 ¦ تعيين عدد نقاط تحويل','callback_data'=>"ccoin"]],
[['text'=>'➕ ¦ إرسال نقاط','callback_data'=>"sendcoin"],['text'=>'➖ ¦ خصم نقاط','callback_data'=>"takecoin"]],
[['text'=>"تصفير النقاط 🗑️",'callback_data'=>'delallnkat']],
[['text'=>'📬 ¦ إرسال نقاط للكل','callback_data'=>"sendcoincc"],['text'=>'📈 ¦ خصم نقاط للكل','callback_data'=>"sendcoinxx"]],
[['text'=>'تعيين عدد نقاط الدخول ☢','callback_data'=>"setengss"]],
[['text'=>'تعيين عدد نقاط الهديه اليوميه 🎁','callback_data'=>"hadehday"]],
[['text'=>"👥 ¦ تمويل قناة ¹",'callback_data'=>"addchannel"],['text'=>"✖️ ¦ حذف تمويل قناة ¹",'callback_data'=>"delchannel"]],
[['text'=>"💰 ¦ تحديد نقآط الاشتراك في قناة تمويل",'callback_data'=>"setcoin1"]],   
[['text'=>"👥 ¦ تمويل قناة ²",'callback_data'=>"addchannel2"],['text'=>"✖️ ¦ حذف تمويل قناة ²",'callback_data'=>"delchannel2"]],
[["text"=>"رجوع ،🔙","callback_data"=>"lolmymat"]],
]])
]);   
}
}
if($data == "rdod"){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
file_put_contents("stingggg.json",json_encode($stingggg));
$stingggg = json_decode(file_get_contents('stingggg.json'),1);
$alrdod = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['alrdod']);
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"
• مرحبا بك في قسم الردود 👮‍♀️

- يمكنك اضافه ردود وحذفها 

- اضغط على نص الزر لعرض محتواه .
",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"أضف رد ➕",'callback_data'=>"addrd"],['text'=>"الردود 💬",'callback_data'=>"Rdod"]],
[['text'=>"الردود 🍃 «".$alrdod."»",'callback_data'=>"alrdod"]],
[["text"=>"رجوع ،🔙.","callback_data"=>"c"]],
]])
]);   
}
}
if($data == "addadm" and $chat_id == $admin){
$adminss = count($stingggg['stingggg']['admins']);
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"
• مرحبا بك في الادمنيه 👮‍♀️
- يمكنك رفع ادمن وتنزيل ادمن 👮🏻‍♂️

- يمكن للادمنيه تحكم في لوحه البوت مثلك
",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"  الأدمنة 👥👮 «".$adminss."»",'callback_data'=>"admins"]],
[['text'=>"رفع مشرف ⁦👮🏻‍♂️⁩",'callback_data'=>"addadmin"],['text'=>"تنزيل مشرف ⁦👳🏻‍♂️⁩",'callback_data'=>"deladmin"]],
[["text"=>"مسح الادمنيه 🚮💂‍♂️","callback_data"=>"dalalladmin"]],
[["text"=>"رجوع ،🔙.","callback_data"=>"c"]],
]])
]);   
}
if($data == "lolmymat"){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
 file_put_contents("stingggg.json",json_encode($stingggg));
$stingggg = json_decode(file_get_contents('stingggg.json'),1);
$okthoil = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['thoil']);
$thkk = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['thkk']);
$dayis = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['dayis']);
$twassss = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['twassss']);
$saless = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['saless']);
$alroadttt = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['alroadttt']);
$almttor = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['almttor']);
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*
- مرحباً عزيزي المطور $nammee 🔥. 

- حساب المطور : @$JAMALJO
*
- يمكن للعضو ارسال `/id` لارسال الايدي الخاص به
",
'parse_mode'=>"MARKDOWN",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"تواصل البوت وا الاشعارات ⛓: $twassss",'callback_data'=>'twassss']],
[['text'=>"تحقق من الوهمي ♻️ : $thkk",'callback_data'=>'thkk']],
[['text'=>'قسم تحكم بدول المستخدمين 📞','callback_data'=>'ajddnum']],
[["text"=>"رجوع ،🔙.","callback_data"=>"c"]],
]])
]);   
}
}

				if($data == "ch" or $data == "ch1del" or $data == "ch2del"){
					if($data == "ch1del"){
					 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 1 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($stingggg['stingggg']['ch1']);
						}
						}
						if($data == "ch2del"){
						 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
						bot('answerCallbackQuery',[ 
            'callback_query_id'=>$update->callback_query->id, 
            'text'=>"
            تم حذف قناة 2 من الإشتراك الإجباري ✅
", 
            'show_alert'=>true 
            ]); 
            unset($stingggg['stingggg']['ch2']);
						}
						}
					if($stingggg['stingggg']['ch1'] == null){
						$ch1 = "قناة 1 🔱 لا يوجد 😴";
						}else{
							$ch3 = bot('getchat',['chat_id'=>$stingggg['stingggg']['ch1']]);
							if($ch3->ok == true){
								$ch1 = $ch3->result->title;
								}else{
									$ch1 = "قناة 1 🔱 لا يوجد 😴";
									}
							}
							if($stingggg['stingggg']['ch2'] == null){
						$ch2 = "قناة 2 🔱 لا يوجد 🌚";
						}else{
							$ch = bot('getchat',['chat_id'=>$stingggg['stingggg']['ch2']]);
							if($ch->ok == true){
								$ch2 = $ch->result->title;
								}else{
									$ch2 = "قناة 2 🔱 لا يوجد 🌚";
									}
							}
					bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"
اهلا عزيزي 🙋‍♂️ اليك قسم الاشتراك الاجباري
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$ch1",'callback_data'=>"ch"]],
[['text'=>"وضع قناة 👌",'callback_data'=>"ch1add"],['text'=>"حذف قناة 🤟",'callback_data'=>"ch1del"]],
[['text'=>"$ch2",'callback_data'=>"ch"]],
[['text'=>"وضع قناة 😼",'callback_data'=>"ch2add"],['text'=>"حذف قناة 🤙",'callback_data'=>"ch2del"]],
[['text'=>'رجوع 🔙','callback_data'=>'c']],
]])
]);
$stingggg['stingggg']['stingggg'] = null;
	$stingggg['stingggg']['id'] = null;
	file_put_contents("stingggg.json",json_encode($stingggg));
					}
					if($data == "ch1add" or $data == "ch2add"){
					 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
						bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الأن معرف القناة Ⓜ️ او وجه أي رسالة من القناة 🔄
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"ch"]
]
]])
]);
if($data == "ch1add"){
$stingggg['stingggg']['stingggg'] = "ch1";
}else{
	$stingggg['stingggg']['stingggg'] = "ch2";
	}
	$stingggg['stingggg']['id'] = $from_id;
	file_put_contents("stingggg.json",json_encode($stingggg));
						}
						}
						 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
						if(!$data and $stingggg['stingggg']['stingggg'] == 'ch1' or $stingggg['stingggg']['stingggg'] == 'ch2' and $stingggg['stingggg']['id'] == $from_id and $update->message->forward_from_chat or preg_match("/(@)(.)/", $text)){
							if($stingggg['stingggg']['stingggg'] == 'ch1' or $stingggg['stingggg']['stingggg'] == 'ch2'){
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
	تم حفظ القناة بنجاح ✅
	تأكد أن البوت مشرف في القناة ⁦👮🏻‍♂️⁩
	",
	'reply_to_meesage_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'ch']
],
]])
]);
if($update->message->forward_from_chat){
	$stingggg['stingggg'][$stingggg['stingggg']['stingggg']] = $update->message->forward_from_chat->id;
	}else{
		$stingggg['stingggg'][$stingggg['stingggg']['stingggg']] = $text;
		}
					$stingggg['stingggg']['stingggg'] = null;
					$stingggg['stingggg']['id'] = null;
	file_put_contents("stingggg.json",json_encode($stingggg));
							}
							}
							}
if($text == "/id"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
هاذا هو ايديك عزيزي 😊
`$chat_id`
",
 'parse_mode'=>"MARKDOWN",
'reply_to_message_id'=>$message->message_id, 
]);
}

	if($data == "admins"){
		foreach($stingggg['stingggg']['admins'] as $admins){
		$names = bot("getchat",["chat_id"=>$admins])->result->first_name;
		if($names != null){
		$addmins .= "[$names](tg://user?id=$admins)\n";
		}
		}
		bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
	تفضل عزيزي الأدمن ⁦👮🏻‍♂️⁩ قائمة الأدمنة 📃
	$addmins
",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'addadm']
],
]])
]);
		}
								if($data == "addadmin" or $data == "deladmin"){
									$a = str_replace(['addadmin','deladmin'],['لأرفعه أدمن ⁦☺️⁩','لأزيله من قائمة الأدمنة 😼'],$data);
									bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
	'text'=>"
أرسل الان ايدي 🆔 الشخص $a 
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"إلغاء ❎",'callback_data'=>"addadm"]
],
]])
]);
$stingggg['stingggg']['stingggg'] = $data;
$stingggg['stingggg']['id'] = $from_id;
	file_put_contents("stingggg.json",json_encode($stingggg));
									}
  if($data == "addadm"){
unset($stingggg['stingggg']['stingggg']);
unset($stingggg['stingggg']['id']);
	file_put_contents("stingggg.json",json_encode($stingggg));
}
										if($stingggg['stingggg']['stingggg'] == "addadmin" or $stingggg['stingggg']['stingggg'] == "deladmin"){
						if($text and $message and $stingggg['stingggg']['id'] == $from_id){
							$a = str_replace(['addadmin','deladmin'],['تم رفعه بنجاح 😉','تم تنزيله بنجاح 😏'],$stingggg['stingggg']['stingggg']);
							bot('sendmessage',[
	'chat_id'=>$chat_id, 
	'text'=>"
 $a
	",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'رجوع 🔙','callback_data'=>'addadm']
],
]])
]);
if($stingggg['stingggg']['stingggg'] == "addadmin"){
	$stingggg['stingggg']['admins'][] = $text;
	bot('sendmessage',[
	'chat_id'=>$text, 
	'text'=>"
	مبارك تم رفعك كمشرف في البوت 🤩
	",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'القائمة الرئيسية 🏠','callback_data'=>'c']
],
]])
]);
	}else{
		foreach($stingggg['stingggg']['admins'] as $num => $json){
			if($json == $text){
		unset($stingggg['stingggg']['admins'][$num]);
		bot('sendmessage',[
	'chat_id'=>$text, 
	'text'=>"
	تم تنزيلك من الإشراف 😒
	",
]);
		break;
		}
		}
		}
					$stingggg['stingggg']['stingggg'] = null;
					$stingggg['stingggg']['id'] = null;
	file_put_contents("stingggg.json",json_encode($stingggg));
							}
							}
							
  if($data == 'dalalladmin'){
  $adminss = count($stingggg['stingggg']['admins']);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"
    هل انت متأكد حذف جميع الادمنيه 🚮💂‍♂️
عدد الادمنيه  «".$adminss."»
    ",
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'نعم✅!','callback_data'=>'cd2']],
      [['text'=>'رجوع 🔙','callback_data'=>'addadm']]
      ]
    ])
  ]);
  exit;
 }

 if($data == 'cd2'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'تم حذف جميع الادمنيه✔',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'العودة','callback_data'=>'addadm']]
      ]
    ])
  ]);
  unlink('stingggg.json');
  exit;
 }

 if($data == 'delallnkat'){
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
هل انت متأكد انك تريد تصفير النقاط للكل !!؟
",
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>'نعم ✅','callback_data'=>'yesdelall'],['text'=>"لاء ❎",'callback_data'=>'c']],
     ]])
     ]);
	}
	}
	if($data == 'yesdelall'){
	if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
		foreach($cut as $a){
			$sales[$a]['collect'] = 0;
			}
			save($sales);
		bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تم تصفير النقاط الكل 🗑
-",
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
[['text'=>'رجوع 🔙','callback_data'=>"Nkatn"]],
      ]
    ])
  ]);
		}
		}
    if($data == "starts"){ 
$bot = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['bot']);
$twasss = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['twasss']);
$okthoil = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['thoil']);
$thkk = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['thkk']);
$dayis = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['dayis']);
$twassss = str_replace(['off','on'],['معطل ❎','مفعل ✅'],$stingggg['twassss']);
 		foreach($stingggg['stingggg']['admins'] as $admins){
		$names = bot("getchat",["chat_id"=>$admins])->result->first_name;
		if($names != null){
		$addmins .= "[$names](tg://user?id=$admins)\n";
		}
		}
			foreach($stingggg['stingggg']['band'] as $band){
									if($band != null){
									$s .= "`$band` » [للدخول إلى الحساب 🍃](tg://user?id=$band)\n";
									}
}
								$band = count($stingggg['stingggg']['band']);
						  $adminss = count($stingggg['stingggg']['admins']);
$rm20 = $sttings["hdeh1"];
$rm30 = $sttings["sal3h"];
$members = explode("\n",file_get_contents("users.txt"));
$m = count($members) -1;
$n = $m - 6;
for($i=$m; $i>$n; $i--){
$saiko .= "$members[$i]\n";
}
file_put_contents("saiko.txt",$saiko);
$array = explode("\n",file_get_contents("saiko.txt"));
for($b=1;$b<=5;$b++){
$saiko .= "- $b : [$array[$b]](tg://user?id=$array[$b])\n";
}
$g = file_get_contents("saiko.txt");
$ex = explode($g,$saiko);
     bot('EditMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$update->callback_query->message->message_id,
        'text' =>"
احصائيات البوت:🔱
📮¦ عدد المشتركين في البوت : $users
💠💠💠💠💠💠💠💠💠💠💠💠💠
🎁︙عدد الذين اخذو هدية اليومية « $rm20 »
🛍️︙عدد الطلبات تم تسليمها « $rm30 »
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆
المحظورين 📛  «".$band."»
$s
♧♧♧♧♧♧♧♧♧♧♧♧♧♧♧♧♧
  الأدمنة 👥👮 «".$adminss."»
$addmins
♡♡♡♡♡♡♡♡♡♡♡♡♡♡♡♡♡
اخر 5 اشخاص اشتركو ⚠️
$ex[1]
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'رجوع ','callback_data'=>'c']],
            ]
        ])
       ]);
    }
    $mlkk = file_get_contents('mlkk');
if($data == "mlk" and $chat_id == $admin){
bot('Editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ارسل الايدي الان لتحويل الملكيه 👮‍♂️
⌔︙ملاحضه :- لا يمكنك استرجاع الملكيه بعد التحويل
⌔︙اذا لا تريد تحويل الملكيه لاحد قم بي ارسال ايديك انت
",
]);
file_put_contents("mlkk",'send');
}
if($text and $mlkk == 'send' and $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم تحويل الملكيه الى ( $text ) بنجاح 👮‍♂️",
'reply_to_message_id'=>$message->message_id,
]);
bot('sendmessage',[
'chat_id'=>$text,
'text'=>"تم تحويل الملكيه لك بنجاح 👮‍♂️✔",
]);
file_put_contents("index.php",'<?php $token = "'.$token.'"; $admin = "'.$text.'"; include "../../shop.php"; ?>');
unlink("mlkk");
}
 if($data == 'add'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'أرسل إسم السلعة؟!',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']]
      ]
    ])
  ]);
  $sales['mode'] = 'add';
  save($sales);
  exit;
 }
 if($data == "lolmymat"){
unset($sales['mode']);
save($sales);}
 if($text != '/start' and $text != null and $sales['mode'] == 'add'){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- تم حفظ إسم السلعة💸 
أرسل الآن سعرها',
'reply_to_message_id'=>$message->message_id, 
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']]
      ]
    ])
  ]);
  $sales['n'] = $text;
  $sales['mode'] = 'addm';
  save($sales);
  exit;
 }
 }
  if($data == "lolmymat"){
unset($sales['n']);
unset($sales['mode']);
save($sales);}
 if($text != '/start' and $text != null and $sales['mode'] == 'addm'){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"تم حفظ الإسم والسعر...✅
📮 ¦ إسم السلعة: $sales[n]
💰 ¦ السعر: $text
📚 ¦ ارسل صورة السلعة مع الوصف
",
         "parse_mode"=>"markdown",
'reply_to_message_id'=>$message->message_id, 
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']]
      ]
    ])
  ]);
  $sales['p'] = $text;
  $sales['mode'] = "photo";
  save($sales);
  exit;
 }
 }
   if($data == "lolmymat"){
unset($sales['p']);
unset($sales['mode']);
save($sales);}
 if($text != '/start' and $message->photo != null and $sales['mode'] == 'photo'){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  $code = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz12345689807'),1,7);
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"تم حفظ الصورة✅
🏷 ¦ الكود: (`$code` )
📚 ¦ ارسل السلعة اللذي تريد تسليمه  تلقائياً
ارسل ( ملف او نص او صوره او فيديو )
",
         "parse_mode"=>"markdown",
'reply_to_message_id'=>$message->message_id, 
  ]);
  $dayy_s = array("Sat","Sun","Mon","Tue","Wed","Thu","Fri");
 $dayy_s1 = array("السبت","الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة");
$dayy_s2 = date('D');
$dayy = str_replace($dayy_s, $dayy_s1, $dayy_s2);
date_default_timezone_set('Asia/Jordan');
$time = date('h:i a');
$year = date('Y');
$month = date('n');
$day = date('j');
  bot('sendMessage',[
   'chat_id'=>$sss,
   'text'=>"
- تم اضافة سلعة جديدة ✅
- من ماركت : [@$bott] 🤍

🏷 ¦ السلعة :- *$sales[n]* 📱
💰 ¦ السعر :- *$sales[p]*
📆 ¦ التاريخ :- *$dayy - $year/$month/$day*
",
'parse_mode'=>"MarkDown",
	'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
[['text'=>"بوت الماركت 🤖",'url'=>"https://t.me/$bott?start"] ] ] ])
  ]);
  $sales['sales'][$code]['name'] = $sales['n'];
  $sales['sales'][$code]['price'] = $sales['p'];
  $sales['sales'][$code]['photo'] = $message->photo[0]->file_id;
  $sales['sales'][$code]['caption'] = $message->caption;
  $sales['p'] = null;
  $sales['n'] = null;
  $sales['mode'] = "file";
  $sales["baageel"]=$code;
  $sales['allcodes'][] = $code;
  save($sales);
  exit;
 }
 }
 
 if($text != '/start'  and $sales['mode'] == 'file'){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
 if($message->document){
  $file_id=$message->document->file_id;
 $ty="document";
}elseif($message->video){
 $file_id=$message->video->file_id;
 $ty="video";
 }elseif($message->text){
 $file_id=$text;
 $ty="text";
}elseif($message->photo){
 $file_id=$message->photo[0]->file_id;
 $ty="photo";
 }
 $sales['sales'][$sales["baageel"]]['file']=$file_id;
 $sales['sales'][$sales["baageel"]]['file2']=$ty;
 $sales['sales'][$sales["baageel"]]['numbers']='end';
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- تم حفظ التسليم التلقائي ✔

ارسل عدد مرات بيع السلعة

اذا تريد بيع السلعه للجميع اضغط على غير محدود ♻️',
'reply_to_message_id'=>$message->message_id, 
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- غير محدود ♻️','callback_data'=>'lolmymattt']]
      ]
    ])
  ]);
  $sales['mode'] = "Numbers";
  save($sales);
  exit;
 }
}
if(is_numeric($text) and $sales['mode'] == 'Numbers'){
	if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
		 $sales['sales'][$sales["baageel"]]['numbers']= $text;
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'
- تم حفظ عدد مرات بيع السلعة
وتم اضافة السلعه بنجاح ✅
',
'reply_to_message_id'=>$message->message_id, 
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- رجوع 🔙','callback_data'=>'lolmymat']]
      ]
    ])
  ]);
  $sales['mode'] = "type";
  save($sales);
  exit;
	}
	}
if($data == "lolmymattt"){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*
- تم حفظ السلعه
عدد التسليم => غير محدود ♻️
*
",
'parse_mode'=>"MARKDOWN",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"lolmymat"]],
]])
]);   
}
}
 if($data == 'del'){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
 	$reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'اسم السلعة 🎟️','callback_data'=>'s'],['text'=>'حذف 🗑️','callback_data'=>'s'],['text'=>'تعديل ✍🏻','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['name'],'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>'del×'.$code],['text'=>'✍🏻','callback_data'=>'edit×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']];
$json = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'اختر ما تشاء الان',
    'reply_markup'=>$json
  ]);
  exit;
 }
 }
  $ex = explode('×',$data);
 if($ex[0] == "del"){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
 	if($sales['sales'][$ex[1]] != null){
 	unset($sales['sales'][$ex[1]]);
  $sales['mode'] = null;
  save($sales);
$sales = json_decode(file_get_contents('sales.json'),true);
 	$reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'اسم السلعة 🎟️','callback_data'=>'s'],['text'=>'حذف 🗑️','callback_data'=>'s'],['text'=>'تعديل ✍🏻','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['name'],'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>'del×'.$code],['text'=>'✍🏻','callback_data'=>'edit×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']];
$json = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'تم الحذف السلعه بنجاح...✅
اختر ما تريد مجددا ',
    'reply_markup'=>$json
  ]);
 }else{
 	 	$reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'اسم السلعة 🎟️','callback_data'=>'s'],['text'=>'حذف 🗑️','callback_data'=>'s'],['text'=>'تعديل ✍🏻','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['name'],'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>'del×'.$code],['text'=>'✍🏻','callback_data'=>'edit×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']];
$json = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'السلعة غير موجودة يمكنك المحاولة مجددا',
    'reply_markup'=>$json
  ]);
 }
 }
 }
 if($ex[0] == "edit"){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
 	if($sales['sales'][$ex[1]] != null){
 	bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'اختر ماذا تريد ان تقوم بتعديله',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
   [['text'=>"الاسم 👥",'callback_data'=>'Names×'.$ex[1]]],
   [['text'=>"السعر 💰",'callback_data'=>'coin×'.$ex[1]]],
   [['text'=>"الصورة و الوصف 🖼️",'callback_data'=>'photo×'.$ex[1]]],
   [['text'=>"تسليم السلعة 🎟️",'callback_data'=>'sales×'.$ex[1]]],
   [['text'=>"الكمية ♻️",'callback_data'=>'km×'.$ex[1]]],
   [["text"=>"رجوع ،🔙.","callback_data"=>"lolmymat"]],
    ]])
  ]);
 	}else{
 	 	$reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'اسم السلعة 🎟️','callback_data'=>'s'],['text'=>'حذف 🗑️','callback_data'=>'s'],['text'=>'تعديل ✍🏻','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['name'],'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>'del×'.$code],['text'=>'✍🏻','callback_data'=>'edit×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']];
$json = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'السلعة غير موجودة يمكنك المحاولة مجددا',
    'reply_markup'=>$json
  ]);
 }
 }
 }
  if($ex[0] == "Names"){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
 	bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'قم بإرسال الاسم الجديد',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
   [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']]
    ]])
  ]);
$sales['mode'] = "name×".$ex[1];
save($sales);
 	}
 	}
  if($ex[0] == "coin"){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
 	bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'قم بإرسال السعر الجديد',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
   [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']]
    ]])
  ]);
$sales['mode'] = "price×".$ex[1];
save($sales);
}
}
  if($ex[0] == "photo"){
if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
 	bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'قم بإرسال الصورة والوصف الجديد',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
   [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']]
    ]])
  ]);
$sales['mode'] = "photo×".$ex[1];
save($sales);
}
}
  if($ex[0] == "sales"){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
 	bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'قم بإرسال السلعة الجديد',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
   [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']]
    ]])
  ]);
$sales['mode'] = "sales×".$ex[1];
save($sales);
}
}
  if($ex[0] == "km"){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
 	bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'قم بإرسال عدد مرات بيع السلعة الجديد',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
   [['text'=>'لا نهائي ♻️','callback_data'=>'lolmymattt']]
    ]])
  ]);
  $sales['sales'][$ex[1]]['numbers'] = 'end';
$sales['mode'] = "km×".$ex[1];
save($sales);
}
}
 $ex = explode('×',$sales['mode']);
 if($sales['sales'][$ex[1]]['name'] and $message and !$data){
 if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
 	if($ex[0] == "name"){
 	$sales['sales'][$ex[1]]['name'] = $text;
 $tttype = 'الاسم';
 }elseif($ex[0] == "price"){
 	$sales['sales'][$ex[1]]['price'] = $text;
 $tttype = 'السعر';
 }elseif($ex[0] == "photo"){
 	$sales['sales'][$ex[1]]['photo'] = $photo_id;
	 $sales['sales'][$ex[1]]['caption'] = $caption;
	$tttype = 'الصورة وا الوصف';
 }elseif($ex[0] == "sales"){
 	 if($message->document){
  $file_id=$message->document->file_id;
 $ty="document";
}elseif($message->video){
 $file_id=$message->video->file_id;
 $ty="video";
 }elseif($message->text){
 $file_id=$text;
 $ty="text";
}elseif($message->photo){
 $file_id=$message->photo[0]->file_id;
 $ty="photo";
 }
  $sales['sales'][$ex[1]]['file']=$file_id;
 $sales['sales'][$ex[1]]['file2']=$ty;
 $tttype = 'السلعة';
 }elseif($ex[0] == "km"){
 	$sales['sales'][$ex[1]]['numbers'] = $text;
 $tttype = 'كمية السلع';
 }
 bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    تم تحديث $tttype بنجاح ✓.
    ",
'reply_to_message_id'=>$message->message_id, 
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- رجوع 🔙','callback_data'=>'lolmymat']]
      ]
    ])
   ]);
   $sales['mode'] = null;
   save($sales);
 }
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'del'){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  if($sales['sales'][$text] != null){
   bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"",
   ]);
  unlink('codejj.json',$text);
  unset($sales['sales'][$text]);
  $sales['mode'] = null;
  save($sales);
  exit;
  } else {
   bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>'خطأ - الكود غير صحيح 💢'
   ]);
  }
exit;
}
}
 if($data == 'deljj'){
 	$reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'اسم السلعة 🎟️','callback_data'=>'s'],['text'=>'حذف 🗑️','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['name'],'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>'deljj×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']];
$json = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'اختر السلعة المراد حذفها',
    'reply_markup'=>$json
  ]);
  exit;
 }
 $ex = explode('×',$data);
 if($ex[0] == "deljj"){
 	if($sales['sales'][$ex[1]] != null){
 	unset($sales['sales'][$ex[1]]);
  $sales['mode'] = null;
  save($sales);
$sales = json_decode(file_get_contents('sales.json'),true);
  $reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'اسم السلعة 🎟️','callback_data'=>'s'],['text'=>'حذف 🗑️','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['name'],'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>'deljj×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']];
$jsonn = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'تم الحذف السلعه بنجاح...✅

اختر السلعة المراد حذفها الذي تريد حذفها 

اذا لا تريد حذف السلعه اضغط على الغاء الامر ',
    'reply_markup'=>$jsonn
  ]);
 }else{
 	$reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'اسم السلعة 🎟️','callback_data'=>'s'],['text'=>'حذف 🗑️','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['name'],'callback_data'=>"s"],['text'=>'🗑️','callback_data'=>'deljj×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']];
$jsonn = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'السلعة غير موجودة يمكنك المحاولة مجددا',
    'reply_markup'=>$jsonn
  ]);
 }
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'del'){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  if($sales['sales'][$text] != null){
   bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"",
   ]);
  unlink('codejj.json',$text);
  unset($sales['sales'][$text]);
  $sales['mode'] = null;
  save($sales);
  exit;
  } else {
   bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>'خطأ - الكود غير صحيح 💢'
   ]);
  }
exit;
}
}
$roadt = json_decode(file_get_contents('roadt.json'),true);
$fakyou1 = file_get_contents("fakyou1.txt");
if($data == "raddtt"){
bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"
ارسل عدد النقاط 
      ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'إلغاء ❌','callback_data'=>"c"]],
    ]])
     ]);
   file_put_contents("fakyou1.txt","offerfree");
           }
           if(is_numeric($text) and $fakyou1 == "offerfree"){
            $codd = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz12345689807'),1,10);
            bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
تم صنع رابط بقيمة $text 💸

قم بي نسخ الرابط وضعه في موقع اختصار الروابط وقم بي بعت رابط مختصر 🔗

الرابط : 
https://t.me/$bott?start=giftt=$codd
      ",
'reply_to_message_id'=>$message->message_id, 
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
     [['text'=>'رجوع 🔙','callback_data'=>"lolmymat"]],
     ]])
     ]);
     $roadt['p'] = $text;
     $roadt['mode'] = "admm";
     file_put_contents("roadt.json",json_encode($roadt));
     file_put_contents($codd.".txt",$codd."\n".$text);
     unlink("fakyou1.txt");
     exit;
            }
 if($text != '/start' and $text != null and $roadt['mode'] == 'admm'){
  if(in_array($chat_id,$stingggg['stingggg']['admins']) or $chat_id == $admin){
  $code = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz12345689807'),1,10);
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"تم حفظ الرابط ✔
🏷 ¦ الكود رابط : (`$code` )

",
         "parse_mode"=>"markdown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"• رجوع 🔙",'callback_data'=>"lolmymat"]],
]])
  ]);
  $roadt['n'] = $text;
  $roadt['roadt'][$code]['name'] = $roadt['n'];
  $roadt['roadt'][$code]['price'] = $roadt['p'];
  $roadt['p'] = null;
  $roadt['n'] = null;
  $roadt["baageel"]= $code;
  unset($roadt['mode']);
  file_put_contents("roadt.json",json_encode($roadt));
 }
 }
 
 if($data == 'dettjj'){
 	$reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'الرابط ️','callback_data'=>'s'],['text'=>'حذف 🗑️','callback_data'=>'s']];
 foreach($roadt['roadt'] as $code => $road){
   $reply_markup['inline_keyboard'][] = [['text'=>$road['name'],'url'=>$road['name']],['text'=>'🗑️','callback_data'=>'dettjj×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']];
$json = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'اختر الرابط المراد حذفها',
    'reply_markup'=>$json
  ]);
  exit;
 }
 $ex = explode('×',$data);
 if($ex[0] == "dettjj"){
 	unset($roadt['roadt'][$ex[1]]);
  file_put_contents("roadt.json",json_encode($roadt));
$roadt = json_decode(file_get_contents('roadt.json'),true);
  $reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'الرابط ️','callback_data'=>'s'],['text'=>'حذف 🗑️','callback_data'=>'s']];
 foreach($roadt['roadt'] as $code => $road){
   $reply_markup['inline_keyboard'][] = [['text'=>$road['name'],'url'=>$road['name']],['text'=>'🗑️','callback_data'=>'dettjj×'.$code]];
  }
  $reply_markup['inline_keyboard'][] = [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'lolmymat']];
$jsonn = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'تم الحذف الرابط بنجاح...✅

اختر الرابط المراد حذفها الذي تريد حذفها 

اذا لا تريد حذف رابط اضغط على الغاء الامر ',
    'reply_markup'=>$jsonn
  ]);
 }
$fake = explode("\n",file_get_contents('fake.txt'));
$countries = json_decode(file_get_contents('countries.json'),true);
$countts = count($fake)-1;
$eysbott = $countries['numeys'] + 22;
$nobott = $countries['numno'] + 0;
if($data == "ajddnum"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
اهلا بك عزيزي الادمن
هاذ القسم يحتوي على سماح بدوله وا حظر دوله 📞
( تحقق من الوهمي ) ♻️

اذا تريد حظر دوله من استخدام البوت اضغط على حظر دوله وتبع الخطوات ❇

وا اذا تريد سماح بدوله بس استخدام البوت اضغط على سماح بدوله وتبع الخطوات ♻️
*",
'parse_mode'=>"MarkDown",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"سماح بي دوله ✴","callback_data"=>"addnum"],["text"=>"حظر دوله 🔅","callback_data"=>"delnum"]],
[["text"=>"عدد الوهميين قامو بدخول بوتك «".$countts."» ☣","callback_data"=>"ttu74565"]],
[["text"=>"عدد الدول المحظوره «".$nobott."» 🚫","callback_data"=>"ttu74565"],["text"=>"عدد دول المسموحه «".$eysbott."» ✔","callback_data"=>"ttu74565"]],
[["text"=>"رجوع ،🔙.","callback_data"=>"lolmymat"]],
]])
]);
}
if($data == "addnum"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
اهلا بك عزيزي الادمن ارسل رمز الدوله بدون + لسمح الدوله بي دخول البوت
مثل 
962
964
966
ارسل رمز دوله واحده فقط *",
'parse_mode'=>"MarkDown",
]);
$sales['hfutg'] = 'end';
save($sales);
}
if($data == "delnum"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
اهلا بك عزيزي الادمن ارسل رمز الدوله بدون + لحظر الدوله من البوت
مثل 
962
964
966
ارسل رمز دوله واحده فقط *",
'parse_mode'=>"MarkDown",
]);
$sales['hfutg1'] = 'end';
save($sales);
}
if($message){
$carab = [966,973,965,968,974,971,213,269,253,20,964,962,961,218,222,212,970,252,249,963,216,967];
$countries = json_decode(file_get_contents('countries.json'),true);
if($update){
if($countries[$carab[0]] !== "ok"){
foreach($carab as $key){
$countries[$key] = "ok";
file_put_contents('countries.json',json_encode($countries,64|128|256));
}}}
if(is_numeric($text) and $sales['hfutg'] == 'end'){
if(isset($text) && ! empty ($text)){
$json = json_decode(file_get_contents('https://raw.githubusercontent.com/AnasSbeinati/A-list-of-countries-Arabic-names-and-codes-in-JSON/master/countries.json'),true);
for($i=0;$i<=count($json)-1;$i++){
if($json[$i]['dialCode'] == $text){
break;}}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
- رمز الدولة : $text
\n - تم السماح لمستخدمين ارقام هذه الدولة باستخدام البوت 💯",
'reply_to_message_id'=>$message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"ajddnum"]],
]])
]);
$countries['numeys'] += 1;
$countries[$text] = "ok";
file_put_contents('countries.json',json_encode($countries));
unset($sales['hfutg']);
save($sales);
}
}
if(is_numeric($text) and $sales['hfutg1'] == 'end'){
if(isset($text) && ! empty ($text)){
$json = json_decode(file_get_contents('https://raw.githubusercontent.com/AnasSbeinati/A-list-of-countries-Arabic-names-and-codes-in-JSON/master/countries.json'),true);
for($i=0;$i<=count($json)-1;$i++){
if($json[$i]['dialCode'] == $text){
break;}}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
- رمز الدولة : $text
\n - تم عدم السماح لمستخدمين ارقام هذه الدولة باستخدام البوت 💯",
'reply_to_message_id'=>$message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🔙.","callback_data"=>"ajddnum"]],
]])
]);
$countries['numno'] += 1;
$countries[$text] = "no";
file_put_contents('countries.json',json_encode($countries));
unset($sales['hfutg1']);
save($sales);
}
}
$v = explode("\n",file_get_contents('v.txt'));
if(in_array($from_id,$fake)){
exit;}
if(in_array($from_id,$admin) && !in_array($from_id,$v)){
file_put_contents('v.txt',$from_id . "\n",FILE_APPEND);}
if($update->message->contact && !in_array($from_id,$v) && !in_array($from_id,$fake) && !$text && !in_array($from_id,$admin)){
if($update->message->from->id == $update->message->contact->user_id){
$num1 = str_split ($update->message->contact->phone_number,1);
$num2 = str_split ($update->message->contact->phone_number,2);
$num3 = str_split ($update->message->contact->phone_number,3);
$num4 = str_split ($update->message->contact->phone_number,4);
if($countries[$num1[0]] == "ok" || $countries[$num2[0]] == "ok" ||$countries[$num3[0]] == "ok" || $countries[$num4[0]] == "ok"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
تم التحقق بانك ليست روبوت تهانينا ☺

- يمكن استخدام البوت من الآن عزيزي 🌸

- ارسل /start",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
]),
]);
file_put_contents('v.txt',$from_id . "\n",FILE_APPEND);
sleep(2);
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
exit;
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم حظرك لاستخدمك رقم وهمي ☺",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
]),
]);
$sales['allllyhya'] -= 1;
save($sales);
file_put_contents('fake.txt',$from_id . "\n",FILE_APPEND);
sleep(2);
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
}}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"الرجاء ارسال رقم صحيح 😑",
'reply_to_message_id'=>$message_id,
]);
return false;
}}}
include("File.php");
