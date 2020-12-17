<div>
    <style>
        .fmt_box{
            margin: 10px 20px;
            padding: 10px 20px;
            border: 4px solid #eeeeee;
            background: #fff;
            box-shadow: 2px 4px 8px #b1b1b1;
        }
        .fmt_headline{
            font-size: 20px;
            margin:10px 0;
        }
        .fmt_label{
            font-size: 14px;
        }
        .fmt_input{
            padding:4px 10px;
            border:1px solid #707070;
            border-radius: 4px;
            display: block;
            font-size: 16px;
        }
        .fmt_sub_btn{
            padding:6px 20px;
            margin:10px 0;
            border-radius: 8px;
            background:#0047d4;
            color:#fff;
            border:none;
            letter-spacing: 1px;
            cursor: pointer;
        }
        .fmt_checkbox{
            margin-left: 10px;
            width: 34px;
            height: 34px;
            display: block;
        }
        .fmt_flex{
            display: flex;
            margin: 10px 0;
        }
        #addOption{
            padding: 6px 20px;
            background: #049e04;
            color: #fff;
            cursor: pointer;
        }
    </style>
    <form action="{{route('fmt.mcqpa.store')}}" method="post" class="fmt_box" enctype="multipart/form-data">
        <input type="integer" name="problem_set_id" value="{{$pbs72 ?? ''}}" hidden style="border:1px solid #000000;">
        <input type="integer" name="format_type_id" value="{{$fmt72 ?? ''}}" hidden style="border:1px solid #000000;">
        <div class="fmt_headline">Add a MCQpa</div>
        <div style="margin:10px 10px;">
            <label class="fmt_label" for="">Question</label>
            <input style="width:100%" class="fmt_input" type="text" name="question" placeholder="Question" required>
        </div>
        <div class="my-2" style="margin: 20px 0;">
            <label class="bloc" for="">Difficulty Level</label>
            @php $d_levels = DB::table('difficulty_levels')->get(); @endphp
            <select name="difficulty_level_id" id="" class="w-full my-2 px-2 py-2 border border-gray-500 rounded-lg">
                @foreach ($d_levels as $level)
                <option value="{{$level->id}}">{{$level->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="fmt_flex">
            <div style="margin:10px 10px;">
                <label class="fmt_label" for="">Audio</label>
                <input style="display:block;" type="file" accept="audio/*" name="ques_1_audio" id="">
            </div>
            <div style="margin:10px 10px;">
                <label class="fmt_label" for="">Image</label>
                <input style="display:block;" type="file" accept="image/*" name="ques_1_image" id="">
            </div>
        </div>
        <hr>
        {{-- answer1-match1 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 1</label>
                <input class="fmt_input" type="text" name="answer_1" placeholder="Answer">
            </div>
            <div>
                <label class="fmt_label" for="">Correct</label>
                <input class="fmt_checkbox" type="checkbox" name="ans_correct_1" id="">
            </div>
        </div>
        {{-- //answer2-match2 --}}
        {{-- answer2-match2 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 2</label>
                <input class="fmt_input" type="text" name="answer_2" placeholder="Answer">
            </div>
            <div>
                <label class="fmt_label" for="">Correct</label>
                <input class="fmt_checkbox" type="checkbox" name="ans_correct_2" id="">
            </div>
        </div>
        {{-- //answer2-match2 --}}
        {{-- answer3-match3 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 3</label>
                <input class="fmt_input" type="text" name="answer_3" placeholder="Answer">
            </div>
            <div>
                <label class="fmt_label" for="">Correct</label>
                <input class="fmt_checkbox" type="checkbox" name="ans_correct_3" id="">
            </div>
        </div>
        {{-- //answer3-match3 --}}
        {{-- answer4-match4 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 4</label>
                <input class="fmt_input" type="text" name="answer_4" placeholder="Answer">
            </div>
            <div>
                <label class="fmt_label" for="">Correct</label>
                <input class="fmt_checkbox" type="checkbox" name="ans_correct_4" id="">
            </div>
        </div>
        {{-- //answer4-match4 --}}
        {{-- answer5-match5 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 5</label>
                <input class="fmt_input" type="text" name="answer_5" placeholder="Answer">
            </div>
            <div>
                <label class="fmt_label" for="">Correct</label>
                <input class="fmt_checkbox" type="checkbox" name="ans_correct_5" id="">
            </div>
        </div>
        {{-- //answer5-match5 --}}
        {{-- answer6-match6 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 6</label>
                <input class="fmt_input" type="text" name="answer_6" placeholder="Answer">
            </div>
            <div>
                <label class="fmt_label" for="">Correct</label>
                <input class="fmt_checkbox" type="checkbox" name="ans_correct_6" id="">
            </div>
        </div>
        {{-- //answer6-match6 --}}
        <div>
            <input type="submit" class="fmt_sub_btn" value="Submit">
        </div>
    </form>
    {{-- <button id="addOption">Add option</button> --}}
    {{--  --}}
    <form action="{{route('fmt.mcqpa.csv')}}" method="POST" enctype='multipart/form-data' style="margin:20px 40px;">
        @csrf
        <div style="display:block; padding:10px;">
            <div style="font-size:12px;">CSV</div>
            <input style="display:block;" type="file" name="file" >
        </div>
        <div style="display:block; padding:10px;">
            <div style="font-size:12px;">Images</div>
            <input style="display:block;" type="file" name="images[]" multiple accept="image/*" placeholder="image" required>
        </div>
        <div style="display:block; padding:10px;">
            <div style="font-size:12px;">Audio</div>
            <input style="display:block;" type="file" name="audio[]" multiple accept="audio/*" placeholder="audio" required>
        </div>
        <button type="submit" style="display: inline-block; margin:10px; padding:4px 20px; background:green; color:#fff; text-transform:uppercase; border-radius:4px;">submit</button>
    </form>
    {{--  --}}
</div>
{{-- <script>
    var addOption = document.getElementById('addOption');

</script> --}}