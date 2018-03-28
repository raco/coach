<div style="padding: 30px">
    <h3>Imagen de <strong>{{ $image->user->full_name }}</strong></h3>
    <br>
    <img src="{{ $image->url }}" style="max-width: 100%">
    <br>
    <br>
    <p>{{ $image->created_at->format('d/m/Y') }}</p>
    <p>{{ $image->comment }}</p>
</div>

