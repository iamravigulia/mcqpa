<style>
    table {
        background: #fff;
        width: 94%;
        border: 0;
    }
    th {
        text-align: left;
        padding: 5px;
        background: rgb(218, 218, 218);
    }
    td {
        border: 1px solid rgb(218, 218, 218);
        padding: 0 5px;
    }
    tr:nth-child(odd) {
        background: rgb(243, 242, 242);
    }
</style>
<table>
    <thead>
        <th>#</th>
        <th>Question</th>
        <th>Answers</th>
        <th>Created/Updated</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @php
        $fmt_mof_ques = DB::table('fmt_mcqpa_ques')->get();
        @endphp
        @foreach ($fmt_mof_ques as $que)
        <tr>
            <td>{{$que->id}}</td>
            <td>
                <div>{{$que->question}}</div>
                <div>
                    @php $audio = DB::table('media')->where('id', $que->audio_id)->first() @endphp
                    @if($audio)
                    <audio controls="controls" src="{{url('/')}}/storage/{{$audio->url}}"></audio>
                    @endif
                </div>
                <div>
                    @php $image = DB::table('media')->where('id', $que->image_id)->first() @endphp
                    @if($image)
                    <img src="{{url('/')}}/storage/{{$image->url}}" style="width:40px; height:30px; object-fit:cover;"></li>
                    @endif
                </div>
                
            </td>
            @php $fmt_mof_ans = DB::table('fmt_mcqpa_ans')->where('question_id', $que->id)->get() @endphp
            <td>
                <ul>
                    @foreach ($fmt_mof_ans as $ans)
                    
                    <li @if($ans->arrange == 1) style="color:blue;" @endif>
                        <span>{{$ans->answer}}</span>
                    @endforeach
                </ul>
            </td>
            <td>
                <div style="font-size:12px;">
                    <span>Created: </span>
                    {{date('d-n-Y g:i a',strtotime($que->created_at))}}
                </div>
                <div style="font-size:12px;">
                    <span>Updated: </span>
                    {{date('d-n-Y g:i a',strtotime($que->updated_at))}}
                </div>
            </td>
            <td>
                <a style="font-size: 12px; background:#4450f3; color:#fff; border-radius:4px; padding:2px 4px;" href="javascript:void(0);"  onclick="modalCMA({{$que->id}})">Edit</a>
                <a style="font-size: 12px; background:#f23939; color:#fff; border-radius:4px; padding:2px 4px;" href="{{route('fmt.mcqpa.delete', $que->id)}}">Delete</a>
            </td>
        </tr>
        <x-mcqpa.edit :message="$que->id"/>
        @endforeach
    </tbody>
</table>
<script>
    function modalCMA($id){
        var modal = document.getElementById('modalCMA'+$id);
        modal.classList.remove("hidden");
    }
    function closeModalCMA($id){
        var modal = document.getElementById('modalCMA'+$id);
        modal.classList.add("hidden");
    }
</script>