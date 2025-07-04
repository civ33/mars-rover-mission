<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body class="bg-black">
        <div class="w-100 d-flex flex-column align-items-center justify-content-top vh-100 pt-3">
            <h3 class="text-success">Mars Rover Mission</h3>
            <div class="py-3">
                <form action="{{ route('createMission') }}" method="post">
                    {{ csrf_field() }}
                    <label for="mission_name" class="text-success py-3">Enter mission's name:</label>
                    <input type="text" name="mission_name" id="mission_name" class="form-control" placeholder="e.g. Explore Mars" required>
                    <input type="submit" value="Save Name" class="btn btn-success my-3 mr-5">
                </form>
            </div>
        </div>
    </body>
</html>
