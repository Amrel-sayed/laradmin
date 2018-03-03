<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Hello,
        @if (is_array($name))
             @foreach ($name as $nm)
                {{ $nm }},
            @endforeach
        @else
        {{ $name }}
        @endif
      
    
     </h1>
</body>
</html>