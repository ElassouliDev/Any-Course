<?php

namespace App\Http\Controllers\Student;

use App\Comment;
use App\Course;
use App\Http\Controllers\BaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewCourseController extends BaseController
{

    /***
     * method for save or update course review
     * @param $course_slug
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     *
     */

    function review($course_slug, Request $request)
    {
        $course = Course::where('slug_ar', $course_slug)->orWhere('slug_en', $course_slug)->first();

        $course->ratingUnique([
            'rating' => $request->rating
        ], auth()->user());
        $rating_id = $course->ratings()->where('author_id', \auth()->id())->first()->id;
        $comment = $course->comments()->where('user_id', \auth()->id())->first();
        if (!empty($comment)) {
            $comment->update(['content' => $request->comment]);

        } else {
            $comment = new Comment();
            $comment->content = $request->comment;
            $comment->rating_id = $rating_id;
            $comment->user_id = \auth()->id();
            $course->comments()->save($comment);


        }

        $comment->date=Carbon::parse($comment->created_at)->diffForHumans();
        return response(['status' => true,'comment'=>$comment]);
    }

}
