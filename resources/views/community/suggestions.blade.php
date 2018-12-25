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

<style>
     .left-side-pic{
        width: 100px !important;
        height: 100px;
    }
    a{
            color:black;
        }
        a:hover{
            text-decoration: none;
            
        }
    .vcenter {
    margin-top: 30px;
}

    .mleft{
        margin-left: 40px;
    }

</style>
       
@endsection



@section('body')

    @include('includes.sidebar')

    @if (count($users) > 0)    
        @foreach ($users as $user)
            
        <div class="row p-4 mleft">
                <div class="col-md-1">
                  <a href="community/{{$user->id}}">  <img  class="left-side-pic" src="{{url('images/user_no_image.png')}}"/></a>
                </div>
                <div class="col-md-2 vcenter">
                    <a href="community/{{$user->id}}"> <h4>{{$user->name}}<h4></a>
                </div>
            <div class="col-md-4 vcenter">
                <button class="btn btn-primary" id='{{$user->id}}' onclick="follow({{$user->id}});">Follow</button>
            </div>
            </div>    
            
        @endforeach
    @endif
@endsection