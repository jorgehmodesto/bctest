<!DOCTYPE html>
<html>
    <head>
        <title>My nice shortener! :)</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <script type="text/javascript">
            function short() {
                $.post('/shortener/url', $('#shortener_form').serialize(), function(response) {
                    $('#shortened_url').val(response.short_url);
                });
            }
        </script>

    </head>
    <body>
        <div class="container-sm" style="margin-top: 50px;">
            <div style="width:100%;text-align:center;font-size:50px;margin-bottom:50px">
                The ultimate URL Shortener!
            </div>
            <form class="" method="post" action="javascript:short()" id="shortener_form">
                @csrf
                <div class="mb-3">
                    <label for="url" class="form-label">URL to be shortened</label>
                    <input type="url" class="form-control" id="url" name="url" placeholder="https://www.google.com">
                </div>
                <div class="mb-3">
                    <label for="shortened_url" class="form-label">Shortened URL</label>
                    <input type="url" class="form-control" id="shortened_url" disabled>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Short It!</button>
                </div>
            </form>
        </div>
    </body>
</html>
