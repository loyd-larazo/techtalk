<script>
  const BASEURL = 'http://127.0.0.1:8000';
  var apiList = [
    { key: 'login', header: false },
    { key: 'logout', header: true },
    { key: 'register', header: false },
    { key: 'users', header: true },
    { key: 'users-show', header: true },
    { key: 'users-delete', header: true },
    { key: 'users-edit', header: true },
    { key: 'post', header: true },
    { key: 'posts', header: true },
    { key: 'post-show', header: true },
    { key: 'post-edit', header: true },
    { key: 'post-delete', header: true },
  ];

  var apiKey = '';
  var selectedAPI = null;
  $(function() {
    $('.api').click(function() {
      var apiKey = $(this).data('api');
      selectedAPI = apiList.find(apiL => apiL.key == apiKey);
      if (selectedAPI) {
        $('.api').removeClass('active');
        $(this).addClass('active');

        $('.form-api').removeClass('active');
        $(`#form-${selectedAPI.key}`).addClass('active');

        $('#testApi').removeClass('disabled');
      } else {
        $('#testApi').addClass('disabled');
      }
    });

    $('#testApi').click(function() {
      $(`#form-${selectedAPI.key}`).submit();
    });

    $('form').on('submit', function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      var method = $(this).attr('method');
      var endpoint = $(this).attr('action');

      var URLPath = `${BASEURL}${endpoint}`;

      if (endpoint.indexOf(':') >= 0) {
        var arrEnd = endpoint.split('/');
        var newPath = '';
        arrEnd.map(path => {
          if (path) {
            if (path.indexOf(':') >= 0) {
              var pathKey = path.replace(':', '');
              var replacedPath = $(`#${$(this).attr('id')} input[name="${pathKey}"]`).val();
              newPath += `/${replacedPath}`;
            } else {
              newPath += `/${path}`;
            }
          }
        });
        URLPath = `${BASEURL}${newPath}`;
      }

      var requestParam = {
        url: URLPath,
        type: method,
        data: formData
      };

      if (selectedAPI.header) {
        var token = $(`#${$(this).attr('id')} input[name="token"]`).val();
        requestParam.beforeSend = function (xhr) {
          xhr.setRequestHeader('Authorization', `Bearer ${token}`);
        }
      }

      var request = $.ajax(requestParam);

      request.done(function (res, status, jqXHR) {
        var errorStr = JSON.stringify(res, undefined, 4);
        $('#result').html(syntaxHighlight(errorStr));
      });

      request.fail(function (jqXHR, textStatus, errorThrown) {
        var errorRes = JSON.parse(jqXHR.responseText);
        var errorStr = JSON.stringify(errorRes, undefined, 4);
        $('#result').html(syntaxHighlight(errorStr));
      });
    });

    $('.idChange').keyup(function(e) {
      var formId = $(this).attr('id');
      var val = $(this).val();
      $(`#${formId}-span`).html(val ? val : '{id}');
    })
  });

function syntaxHighlight(json) {
  json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
  return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
      var cls = 'number';
      if (/^"/.test(match)) {
          if (/:$/.test(match)) {
              cls = 'key';
          } else {
              cls = 'string';
          }
      } else if (/true|false/.test(match)) {
          cls = 'boolean';
      } else if (/null/.test(match)) {
          cls = 'null';
      }
      return '<span class="' + cls + '">' + match + '</span>';
  });
}
</script>