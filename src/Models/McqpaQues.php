<?php
namespace Edgewizz\Mcqpa\Models;

use Illuminate\Database\Eloquent\Model;

class McqpaQues extends Model{
    public function answers(){
        return $this->hasMany('Edgewizz\Mcqpa\Models\McqpaAns', 'question_id');
    }
    protected $table = 'fmt_mcqpa_ques';
}