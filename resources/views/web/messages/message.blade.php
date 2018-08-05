<div class="message">
    <div class="img_tab">
        <img src="{{ getFullImageUrl($message->user->avatar, 'avatar')  }}">
    </div>
    <div class="message_body">
        <div class="message_name">
        {{ $message->user->name }}</div>
        <div class="message_destime">{{ $message->created_at->DiffForHumans()}}</div>
        <div class="message_desc">{{ $message->message }}</div>
    </div>
</div>