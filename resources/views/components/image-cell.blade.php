@props(['photo', 'width', 'height'])

<img src="{{ asset($photo) }}" 
    class="img-radius align-top m-r-15"
    alt="image-cell" 
    style="width:{{ $width }}px; height:{{ $height }}px; object-fit:cover;">