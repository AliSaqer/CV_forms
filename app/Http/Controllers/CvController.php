<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CvController extends Controller
{
    public function index(){
        return view('Cv.index');
    }

    public function Experience() {

        $Experience=[
                ['title'=>'Senior Web Developer',
                'subtitle'=>'INTELITEC SOLUTIONS',
                'discreption'=>'Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.',
                'date'=>'March 2013 - Present'],

                ['title'=>'Senior Web Developer1',
                'subtitle'=>'INTELITEC SOLUTIONS',
                'discreption'=>'Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.',
                'date'=>'March 2013 - Present'],

                ['title'=>'Senior Web Developer2',
                'subtitle'=>'INTELITEC SOLUTIONS',
                'discreption'=>'Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.',
                'date'=>'March 2013 - Present']
                ];

        return view('cv.Experience',compact('Experience'));

    }

    public function Education() {
        return view('cv.Education');

    }

    public function Skills() {
        return view('cv.Skills');

    }

    public function Interests() {
        return view('cv.Interests');

    }

    public function Awards() {
        return view('cv.Awards');

    }
}


