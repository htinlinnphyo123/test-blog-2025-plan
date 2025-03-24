<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- csrf token need for using ajax post method --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Buddhist News</title>
    <link rel="icon" type="image/jpg"
        href="{{ asset('https://buddha.sgp1.digitaloceanspaces.com/logo/2024-08-30%2015.45.06.jpg') }}">
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])
    <script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
    <script>
        window.OneSignalDeferred = window.OneSignalDeferred || [];
        OneSignalDeferred.push(async function(OneSignal) {
            await OneSignal.init({
                appId: "{{ env('ONE_SIGNAL_APP_ID') }}",
                allowLocalhostAsSecureOrigin: true,
            });
        });
    </script>
</head>

<body class="dark:bg-black">
    {{ $slot }}
    <!-- Spinner element -->
    <div class="custom-spinner"></div>
</body>
@vite(['resources/js/common/validateDisappear.js'])

</html>
