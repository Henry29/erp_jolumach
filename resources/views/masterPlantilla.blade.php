<html>
  <head>
    <meta charset="utf-8">
    <style>
      div {
        font-size: 14px;
      }
      div .bloque {
        display: inline-block;
        text-align: center;
      }
      div .subray{
        border-bottom: 1px solid;
      }
      div .capsula{
        border: 1px solid black;
        padding: 15px;
        margin-bottom: 10px;
      }
      table, th, td {
        border: 1px solid;
        border-collapse: collapse;
      }
      td {
        font-size: 11px;
        width: 1%;
      }
    </style>
  </head>
  <body>
      <div class="container">
          @yield('content')
      </div>
  </body>
</html>