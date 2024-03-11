@extends('layouts.template')    

@section('pageTitle')
    Home
@endsection

@section('pageContent')
    This is the Home Content

    <style>
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #reader {
            width: 600px;
            display: none; /* Hide the scanner initially */
        }
        #result {
            text-align: center;
            font-size: 1.5rem;
        }
    </style>

    <main>
        <button id="activateScanner">Activate QR Code Scanner</button>
        <div id="reader">
        </div>
        <div id="result"></div>
    </main>

    <script src="{{ asset('js/qrcode-scanner.js') }}" defer></script>
    <script>
        document.getElementById('activateScanner').addEventListener('click', function() {
            activateQRCodeScanner();
        });

        function activateQRCodeScanner() {
            document.getElementById('activateScanner').style.display = 'none';
            document.getElementById('reader').style.display = 'block';
            
            // Add any additional logic to start or initialize the scanner if needed
            // For example, you can call functions from your qrcode-scanner.js file.
            // If the initialization is already happening in qrcode-scanner.js, you might not need additional logic here.
        }
    </script>
@endsection
