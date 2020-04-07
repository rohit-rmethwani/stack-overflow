<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use Illuminate\Support\Str;


class Question extends BaseModel
{
    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //Isko MUTATOR bolte hai. Mutator inshort ek event generate karega jab bhi koi variable ka value change hoga.
    //Yaha humara slug title pe dependent hai isiliye humne uske liye ek mutator likha.
    //setAttribute karke magic method hai laravel ke paas jo php ke __set se banaya hai.
    //$title matlab current ka title lega. attributes[] array jo hai wo variable mapping ke liye hai.
    //Har time laravel map karne nai baihtta instead wo key-value paired array bana deta hai uss model ke fields ko use access ke liye.
    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    //Inko ACCESSORS bolte hai. Ye koi property ko get karne me kaam aate hai taaki ui side pe computation ka need naa pade aur hum directly display kar paye. Ye b laravel ke setAttribute ki tarah php ke __get se banaya hai.
    public function getUrlAttribute(){
        return "questions/{$this->slug}";
    }

    //diffForHumans() 7hrs ago aise format me dega jabki $question->createdAt maara rehta to wo raw datetime deta.
    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getAnswersStylesAttribute(){
        if($this->answers_count > 0)
        {
            if($this->best_answer_id){
                return "has-best-answer";
            }
            return "answered";
        }
        return "unanswered";
    }

}
