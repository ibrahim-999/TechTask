<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css')}}">
</head>

<body>
<section id="login">
    <div class="login-container">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div>
                            <h3>Slots</h3>
                        </div>
                        <form method="post" action="{{url('/doctor/edit-slot/'.$slot->id)}}">
                            @csrf
                            <div class="input-container">
                                <input name="date" class="selector" placeholder="Select Date.."@if(!empty($slot['date']))value="{{$slot['date']}}" @else value="{{old('date')}}" @endif>
                            </div>
                            <div class="input-container">
                                <input name="hour" class="selector-time" placeholder="From"@if(!empty($slot['hour']))value="{{$slot['hour']}}" @else value="{{old('hour')}}" @endif>
                            </div>

                            <button type="submit">Add Slot</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


</body>
<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/flatpickr')}}"></script>

<script>
    $(".selector").flatpickr(
        {
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        }
    );

    $(".selector-time").flatpickr(
        {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            defaultDate: "13:45"
        }
    );


    $(".selector-date-time").flatpickr(
        {
            enableTime: true,
            minTime: "16:00",
            maxTime: "22:00"
        }
    );



</script>
</html>

