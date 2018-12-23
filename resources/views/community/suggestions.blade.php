@extends('layouts.app')

@section('head')

<script type="text/javascript">

    // Called when recommend button is clicked 
    // Fires a get request 
    function follow(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(id).remove();
                }
           
        };
        xhttp.open("GET", '/follow/'+id, true);
        xhttp.send();
    } 
    

    
    
</script>  
       
@endsection



@section('body')
    @if (count($users) > 0)    
        @foreach ($users as $user)
       
            {{$user->name}}
        <button id='{{$user->id}}' onclick="follow({{$user->id}});">Follow</button>
       <br>
        @endforeach
    @endif
@endsection