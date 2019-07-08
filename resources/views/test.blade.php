<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Materialize_sample</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <ul id="slide-out" class="sidenav">
      <li><a href="#!">First Sidebar Link</a></li>
      <li><a href="#!">Second Sidebar Link</a></li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header" data-target="dropdown1">Dropdown<i class="material-icons">arrow_drop_down</i></a>
            <ul id='dropdown1' class='dropdown-content'>
              <li><a href="#!">one</a></li>
              <li><a href="#!">two</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a href="#!">three</a></li>
              <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
              <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
            </ul>
          </li>
        </ul>
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header" data-target="dropdown2">Dropdown<i class="material-icons">arrow_drop_down</i></a>
            <ul id='dropdown2' class='dropdown-content'>
            <li><a href="#!">1</a></li>
            <li><a href="#!">2</a></li>
            <li class="divider" tabindex="-1"></li>
            <li><a href="#!">three</a></li>
            <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
            <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {});
     var drop = document.querySelectorAll('.dropdown-trigger');
    var drop_instances = M.Dropdown.init(drop, {});
     var drop_in_nav = document.querySelectorAll('.collapsible-header');
    var drop_instances = M.Dropdown.init(drop_in_nav, {});
    $()
  });
</script>
</body>
</html>