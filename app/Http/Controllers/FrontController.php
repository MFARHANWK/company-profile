<?php

namespace App\Http\Controllers;

use App\Models\CompanyAbout;
use App\Models\CompanyStatistic;
use App\Models\HeroSection;
use App\Models\OurPrinciple;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        $principles = OurPrinciple::take(4)->get();
        $statistics = CompanyStatistic::take(4)->get();
        $products = Product::take(4)->get();
        $teams = OurTeam::take(7)->get();
        $testimonials = Testimonial::take(7)->get();
        $hero_section = HeroSection::OrderByDesc('id')->take(1)->get();
        return view('front.index', compact('statistics', 'principles', 'products', 'teams', 'testimonials', 'hero_section'));
    }

    public function team()
    {
        $teams = OurTeam::take(7)->get();
        $statistics = CompanyStatistic::take(4)->get();

        return view('Front.team', compact('teams', 'statistics'));
    }

    public function about(){
        $statistics = CompanyStatistic::take(4)->get();
        $abouts = CompanyAbout::take(2)->get();
        return view('Front.about', compact('statistics', 'abouts'));
    }
}
