
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<table style='margin:auto;text-align:center'>   
    <tr style='background-color:#563d7c;color:white'>  
        <td style='width:200px'>ID</td>
        <td style='width:200px'>Name</td>
        <td style='width:400px'>Email</td>
        <td style='width:300px'>Action</td>
       
</tr>
@include('includes.navbar')
    @foreach($users as $user)
       <tr>
       <td style="border-right:1px solid #563d7c70;border-bottom:1px solid #563d7c70"> {{$user['id']}} </td>
       <td  style="border-right:1px solid #563d7c70;border-bottom:1px solid #563d7c70"><a style='color:#563d7c' href="{{ route('users.show',$user['id']) }} " > {{$user['name']}}</a></td>
       <td style="border-right:1px solid #563d7c70;border-bottom:1px solid #563d7c70">{{$user['email']}}</td>
       <td style="border-right:1px solid #563d7c70;border-bottom:1px solid #563d7c70">
        <table style="margin: auto">
        <tr>
            <td style='width:150px'><form action=" {{ route('users.edit',$user['id']) }}" method='GET'>
         
            @csrf
              
             <!-- <input hidden value= " {{ $user['id'] }} " name='myid'>    -->
            <button type='submit' style='border:none;background-color:#563d7c80;border-radius:5px;width:80px'>Edit</button></form></td>
            <td><form action=" {{ route('users.destroy',$user['id']) }}" method='POST'>
                @method('Delete')
            @csrf

                 <button type='submit' style='border:none;background-color:#563d7c;border-radius:5px;color:white;width:80px'>Delete</button></form></td>
            
</tr>      
        </table>
       </td>
</tr>
    @endforeach
</table>
</body>
</html>