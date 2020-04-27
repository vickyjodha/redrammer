@foreach($messages as $message)

{{$message->first()->message}}
@endforeach