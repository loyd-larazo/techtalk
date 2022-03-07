<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TechTalk API</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
      body {
        font-family: 'Nunito', sans-serif;
      }

      .api-list {
        margin: 10px;
        padding: 10px;
        border: 1px solid #d0d0d0;
      }
      .api-endpoints {
        max-height: 300px;
      }
      .api {
        margin: 10px 0px;
        padding: 5px 10px;
      }
      .api.active {
        background: #f6f6f6;
      }
      .api:hover {
        background: #f6f6f6;
        cursor: pointer;
      }
      .api label {
        padding-right: 10px;
        min-width: 70px;
      }

      .api-form {
        margin: 10px;
        padding: 10px;
        border: 1px solid #d0d0d0;
      }

      .form-api {
        display: none;
      }
      .form-api.active {
        display: block !important;
      }

      .results {
        margin: 10px;
        padding: 10px;
        border: 1px solid #d0d0d0;
        max-height: 100%;
      }

      pre { padding: 5px; margin: 5px; }
      .string { color: green; }
      .number { color: darkorange; }
      .boolean { color: blue; }
      .null { color: magenta; }
      .key { color: red; }

    </style>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </head>
  <body class="antialiased">
    <div class="">
      <div class="row m-0 mt-2">
        <div class="col-5">
          <div class="api-list">
            <h4>API Endpoint</h4>
            <div class="w-100 overflow-auto api-endpoints">
              @include('api')
            </div>
          </div>
          <div class="api-form">
            @include('test')
          </div>
        </div>
        <div class="col-7">
          <div class="results">
            <h4>Output</h4>
            <pre id="result"></pre>
          </div>
        </div>
      </div>
    </div>

    @include('script')
  </body>
</html>
