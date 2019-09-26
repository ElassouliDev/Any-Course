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

            $course_id = Course::where('slug_en', $request->route()->parameters())->orWhere('slug_ar', $request->route()->parameters())->first()->id;
            $course = Course::with(['students' => function ($q) use ($course_id) {
                $q->where('course_student.user_id', Auth::id());
            }])->find($course_id);
            $course['is_enroll'] = (count($course->students) > 0) ? true : false;
            if ($course['is_enroll']) {
                return $next($request);

            }
            return redirect('/404');
        }
    }
}
