


 <strong>These are your Current Tasks</strong>

 <tbody>
     @foreach ($tasks as $task)
         <tr>
             <td class="table-text"><div>{{ $task->name }}</div></td>


         </tr>

     @endforeach
     <img src="{{ $message->embed(base_path('public/Events-Icon.png')) }}">

 </tbody>
