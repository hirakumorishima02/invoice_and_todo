<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!--MaterializeCSS-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Google Web Font-->
    <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru&display=swap" rel="stylesheet">
    <!--CSS-->
    <link href="{{ secure_asset('/css/styles.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
  </head>
  <body>

@yield('body') 
<!--MaterializeJS読み込み-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!--SliderJS読み込み-->
<script>
  const slide = document.querySelector('.slider');
  M.Slider.init(slide,{});
</script>
<!--ParallaxJS読み込み-->
<script>
    const para = document.querySelectorAll('.parallax');
    M.Parallax.init(para,{});
</script>
</body>
</html>