<!DOCTYPE html>
<html lang="en">

<head>
    @include ('layout.header')
</head>

{{-- SIDEBAR --}}
@include ('layout.sidebar')
{{-- AKHIR SIDEBAR --}}

@yield ('content')

{{-- FOOTER --}}
@include ('layout.footer')
{{-- AKHIR FOOTER --}}

</body>

</html>
