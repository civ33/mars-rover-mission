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
            <div>
                <span class="text-success text-justify">The rover is currently at (x: {{ $mission->rover_coor_x }}, y: {{ $mission->rover_coor_y }}) facing {{ $mission->rover_z }}</span>
            </div>
            <div class="py-3">
                <form action="{{ route('travel') }}" method="post">
                    {{ csrf_field() }}
                    <label for="commands" class="text-success py-3">Tell the rover where to go (F, L or R):</label>
                    <input type="text" name="commands" id="commands" class="form-control" placeholder="e.g. FFLRF" required>
                    <input type="submit" value="Send Command" class="btn btn-success my-3 mx-5">

                </form>
                
                <form action="{{ route('home') }}" method="post">
                {{ csrf_field() }}    
                <input type="submit" value="End Mission" class="btn btn-secondary px-4 my-3 mx-5">
                </form>
            </div>
            @if ($out_of_bounds ?? false)
                    <div class="text-success" role="alert">
                        {{ $message }}
                    </div>
            @endif
        </div>
    </body>
</html>