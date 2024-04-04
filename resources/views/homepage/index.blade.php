@extends('layouts.index')    

@section('pageTitle')
    Home
@endsection

@section('pageContent')
    
<div class="dashboard-info">
        <h2><span class="icon solid fa-info-circle"></span> Welcome to the Learners Attendance Information System Dashboard</h2>
        <p class="subheading">LAIS is a sophisticated solution designed to streamline the management and monitoring of student attendance within educational institutions.</p>
        
        <div class="feature">
            <h3><span class="icon solid fa-check-circle"></span> Key Features:</h3>
            <ul class="feature-list">
                <li><strong>Automated Attendance Tracking:</strong> LAIS records student entries and exits, eliminating manual processes.</li>
                <li><strong>Monthly Attendance Reports:</strong> Generates comprehensive reports (SF2) for easy submission.</li>
                <li><strong>Real-time Monitoring:</strong> Provides instant access to student attendance status.</li>
                <li><strong>User-friendly Interface:</strong> Intuitive design for effortless navigation.</li>
                <li><strong>Customizable Settings:</strong> Tailor settings to suit institutional requirements.</li>
                <li><strong>Data Security:</strong> Ensures data protection through advanced encryption.</li>
            </ul>
        </div>
        
        <div class="how-it-works">
            <h3><span class="icon solid fa-cogs"></span> How it Works:</h3>
            <p>LAIS leverages advanced technologies such as barcode scanning to accurately track student attendance. When students enter or leave the school premises, their attendance data is automatically captured and stored in the system's database when the student scans their ID's in the scanner. Teachers can then view and manage attendance records through the dashboard by Loging.</p>
        </div>
        
        <div class="benefits">
            <h3><span class="icon solid fa-star"></span> Benefits:</h3>
            <ul class="benefits-list">
                <li><strong>Efficiency:</strong> Streamlines attendance tracking, saving time.</li>
                <li><strong>Accuracy:</strong> Minimizes errors for reliable data.</li>
                <li><strong>Transparency:</strong> Provides real-time access to attendance information.</li>
                <li><strong>Insights:</strong> Generates reports for informed decision-making.</li>
                <li><strong>Compliance:</strong> Helps meet regulatory requirements.</li>
                <li><strong>Parental Engagement:</strong> Enhances communication with parents/guardians.</li>
            </ul>
        </div>
        
        <p class="call-to-action">Experience the power of LAIS and revolutionize your institution's attendance management process today!</p>
    </div>
@endsection



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
       .dashboard-info {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f8f8f8;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .intro {
        font-size: 1.2em;
        margin-bottom: 20px;
        }

    .features,
    .how-it-works,
    .benefits {
        margin-bottom: 30px;
    }

    .features h3,
    .how-it-works h3,
    .benefits h3 {
        font-size: 1.3em;
        margin-bottom: 10px;
    }

    .features ul,
    .benefits ul {
        padding-left: 20px;
    }

    .features ul li,
    .benefits ul li {
        margin-bottom: 10px;
    }

    .cta {
        font-weight: bold;
        font-style: italic;
        text-align: center;
    }

    </style>
@stop
