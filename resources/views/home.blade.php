
@extends('layouts.app')
<!-- se manda el contendio para yield con campo titulo en app,balde -->
@section('titulo')
Home
@endsection

@section('contenido')
<!-- uso de componente despues de los puntos se usa para paso de variables
-- variable enviado ListarPost.php
-->
<x-listar-post :post="$post"/>  

@endsection
