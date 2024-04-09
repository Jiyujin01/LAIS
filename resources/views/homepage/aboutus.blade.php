@extends('layouts.index')

@section('pageTitle')
    About us
@endsection

@section('pageContent')
<div id="reader"></div>
<input type="file" id="qr-input-file" accept="image/*">
<!-- 
  Or add captured if you only want to enable smartphone camera, PC browsers will ignore it.
-->

<input type="file" id="qr-input-file" accept="image/*" capture>

@endsection