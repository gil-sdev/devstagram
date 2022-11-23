<!-- Directiva que sirve para heredar las vistas 
-- equivalente a layouts/app.blade.php
-->
@extends('layouts.app')
<!-- se manda el contendio para yield con campo titulo en app,balde -->
@section('titulo')
Home
@endsection

@section('contenido')
HOla estes un texto de muestra para test del app Laravel
@endsection
