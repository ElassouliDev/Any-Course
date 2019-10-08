<?php

namespace App\Http\Middleware;

use Closure;
use App\Course;
use Illuminate\Support\Facades\Auth;

class LessonRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()) {

            $courses = Course::where('slug_en', $request->route()->parameters())->orWhere('slug_ar', $request->route()->parameters())->first();
            $course = Course::with(['students' => function ($q)  {
                $q->where('course_student.user_id', Auth::id());
            }])->find($courses->id);
            $course['is_enroll'] = (count($course->students) > 0) ? true : false;
            if ($course['is_enroll'] || $courses->user_id === \auth()->id()) {
                return $next($request);

            }
            return abort('404');
        }
    }
}
