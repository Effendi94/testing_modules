<?php

namespace App\Http\Controllers;

use App\Http\Resources\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\JobCollection;

class HomeController extends Controller
{
  protected $listJob = 'http://dev3.dansmultipro.co.id/api/recruitment/positions.json';
  protected $detailJob = 'http://dev3.dansmultipro.co.id/api/recruitment/positions/';
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(Request $request)
  {
    $param = [
      'description' => $request->input('description'),
      'location' => $request->input('location'),
      'full_time' => $request->input('type') ? 'true' : 'false',
    ];
    $response = Http::get($this->listJob, $param);
    if ($response->status() == 200) {
      // return json_decode($response->body());
      $jobs = new JobCollection(json_decode($response->body()));

      return view('pages.job')->with(['jobs' => $jobs, 'data' => $param]);
    }
  }

  public function show($id)
  {

    $response = Http::get($this->detailJob . "/$id");
    if ($response->status() == 200) {
      $job = new Jobs(json_decode($response->body()));
      return view('pages.job_detail')->with(['job' => $job]);
    }
  }
}
